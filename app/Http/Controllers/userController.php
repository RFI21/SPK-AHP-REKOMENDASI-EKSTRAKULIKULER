<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kriteria;
use App\Models\alternatif;
use App\Models\perbandinganalternatif;
use App\Models\PreferensiPembeli;

class userController extends Controller
{
    public function profil()
    {

        return view('user.profil');
    }

    public function ekstra()
    {
        $alternatif = alternatif::all();


        return view('user.ekstra', compact('alternatif'));
    }
    public function form()
    {
        $kriteria = kriteria::all();
        return view('user.form', compact('kriteria'));
    }

    public function show($id)
    {
        $alternatif = alternatif::findOrFail($id);
        return view('user.detail', compact('alternatif'));
    }

    public function hasil(Request $request)
    {
        $pembeli = 'Pembeli';
        $validated = $request->validate([
            'kriteria' => 'required|array',
        ]);

        // Simpan preferensi pembeli
        $preferensi = PreferensiPembeli::create([
            'nama_pembeli' => $pembeli,
            'nilai_kriteria' => $validated['kriteria'],
        ]);

        $kriteria = kriteria::all();
        $alternatif = alternatif::all();

        // Bobot kriteria disesuaikan dengan input user
        $userBobot = collect($validated['kriteria']);
        $totalUserBobot = $userBobot->sum();
        $userNormalized = $userBobot->map(fn($val) => $val / $totalUserBobot);

        // Ambil bobot alternatif dari tabel PerbandinganAlternatif (hasil AHP admin)
        $nAlt = $alternatif->count();
        $hasil = [];

        foreach ($kriteria as $krit) {
            $data = perbandinganalternatif::where('kriteria_id', $krit->id)->get();
            $matrix = array_fill(0, $nAlt, array_fill(0, $nAlt, 1));

            foreach ($data as $p) {
                $i = $alternatif->search(fn($a) => $a->id == $p->alternatif_1_id);
                $j = $alternatif->search(fn($a) => $a->id == $p->alternatif_2_id);
                if ($i !== false && $j !== false) {
                    $matrix[$i][$j] = $p->nilai;
                    $matrix[$j][$i] = 1 / $p->nilai;
                }
            }

            $colSum = array_fill(0, $nAlt, 0);
            for ($j = 0; $j < $nAlt; $j++) {
                for ($i = 0; $i < $nAlt; $i++) {
                    $colSum[$j] += $matrix[$i][$j];
                }
            }

            $normalized = [];
            for ($i = 0; $i < $nAlt; $i++) {
                $normalized[$i] = [];
                for ($j = 0; $j < $nAlt; $j++) {
                    $normalized[$i][$j] = $matrix[$i][$j] / $colSum[$j];
                }
            }

            $weights = [];
            for ($i = 0; $i < $nAlt; $i++) {
                $weights[$i] = array_sum($normalized[$i]) / $nAlt;
            }

            foreach ($alternatif as $index => $alt) {
                $hasil[$alt->id][$krit->id] = $weights[$index];
            }
        }

        // Hitung skor akhir berdasarkan preferensi user
        $finalScores = [];
        $detailScores = [];   // simpan nilai per kriteria
        foreach ($alternatif as $alt) {
            $total = 0;
            foreach ($kriteria as $krit) {
                $nilai = ($userNormalized[$krit->id] ?? 0) * ($hasil[$alt->id][$krit->id] ?? 0);
                $total += $nilai;
                $detailScores[$alt->nama][$krit->nama] = $nilai;
            }
            $finalScores[$alt->nama] = $total;
        }

        arsort($finalScores);

        /*** ======================================================
         * 4. BANGUN KETERANGAN REKOMENDASI (SMART EXPLANATION)
         * ====================================================== */
        $keterangan = [];
        foreach ($finalScores as $altNama => $score) {
            // ambil 2 kriteria paling dominan
            $sorted = collect($detailScores[$altNama])->sortDesc();

            $top = $sorted->keys()->take(2)->toArray();

            $keterangan[$altNama] =
                "Unggul pada kriteria \"" .
                implode('" dan "', $top) .
                "\", sesuai dengan prioritas penilaian Anda.";
        }

        $altData = $alternatif->keyBy('nama');


        session(['from_page' => 'hasil']);
        return view('user.hasil', compact('preferensi', 'finalScores', 'detailScores', 'keterangan', 'altData'));
    }
}
