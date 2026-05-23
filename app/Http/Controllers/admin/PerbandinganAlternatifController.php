<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kriteria;
use App\Models\alternatif;
use App\Models\perbandinganalternatif;
use App\Models\kriteria as kriteriaModel;

class PerbandinganAlternatifController extends Controller
{
public function index(Request $request)
{
    $kriteriaList = kriteria::all();
    $alternatif = alternatif::all();

    // Tentukan selectedKriteria: dari query param atau fallback ke id kriteria pertama (jika ada)
    $selectedKriteria = $request->get('kriteria_id');
    if (!$selectedKriteria) {
        $selectedKriteria = $kriteriaList->first()?->id ?? null;
    }

    // Ambil perbandingan hanya jika selectedKriteria tersedia
    $perbandingan = collect();
    if ($selectedKriteria) {
        $perbandingan = perbandinganalternatif::where('kriteria_id', $selectedKriteria)->get();
    }

    return view('perbandingan_alternatif.index', compact(
        'kriteriaList',
        'selectedKriteria',
        'alternatif',
        'perbandingan'
    ));
}


    public function store(Request $request)
    {
        $kriteria_id = $request->kriteria_id;
        $alternatif = alternatif::all();

        foreach ($alternatif as $a1) {
            foreach ($alternatif as $a2) {
                if ($a1->id != $a2->id) {
                    $key = 'nilai_' . $a1->id . '_' . $a2->id;
                    if ($request->has($key)) {
                        $nilaiInput = trim($request->$key);

                        // Parsing pecahan (contoh: 1/3 → 0.3333)
                        if (str_contains($nilaiInput, '/')) {
                            [$num, $den] = explode('/', $nilaiInput);
                            $nilai = floatval($num) / floatval($den);
                        } else {
                            $nilai = floatval($nilaiInput);
                        }

                        perbandinganalternatif::updateOrCreate(
                            ['alternatif_1_id' => $a1->id, 'alternatif_2_id' => $a2->id, 'kriteria_id' => $kriteria_id],
                            ['nilai' => $nilai]
                        );
                    }
                }
            }
        }

        return redirect()->route('perbandingan-alternatif.index', ['kriteria_id' => $kriteria_id])
            ->with('success', 'Perbandingan alternatif berhasil disimpan!');
    }


    public function update(Request $request)
{
    $kriteria_id = $request->kriteria_id;
    $alternatif = alternatif::all();

    foreach ($alternatif as $a1) {
        foreach ($alternatif as $a2) {
            if ($a1->id != $a2->id) {
                $key = 'nilai_' . $a1->id . '_' . $a2->id;

                if ($request->filled($key)) {
                    $nilaiInput = trim($request->$key);

                    // Cek apakah pecahan (misal 1/3)
                    if (str_contains($nilaiInput, '/')) {
                        [$num, $den] = explode('/', $nilaiInput);
                        $nilai = floatval($num) / floatval($den);
                    } else {
                        $nilai = floatval($nilaiInput);
                    }

                    // Update atau buat baru
                    \App\Models\perbandinganalternatif::updateOrCreate(
                        [
                            'alternatif_1_id' => $a1->id,
                            'alternatif_2_id' => $a2->id,
                            'kriteria_id' => $kriteria_id
                        ],
                        ['nilai' => $nilai]
                    );
                }
            }
        }
    }

    return redirect()
        ->route('perbandingan-alternatif.index', ['kriteria_id' => $kriteria_id])
        ->with('success', 'Data perbandingan alternatif berhasil diperbarui ✅');
}


    public function hitungBobot()
    {
        $kriteria = kriteria::all();
        $alternatif = alternatif::all();
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

            // Normalisasi kolom
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

            // Eigenvector (rata-rata baris)
            $weights = [];
            for ($i = 0; $i < $nAlt; $i++) {
                $weights[$i] = array_sum($normalized[$i]) / $nAlt;
            }

            // Simpan hasil ke array
            foreach ($alternatif as $index => $alt) {
                $hasil[$alt->id][$krit->id] = $weights[$index];
            }
        }

        // Hitung skor global
        $finalScores = [];
        foreach ($alternatif as $alt) {
            $total = 0;
            foreach ($kriteria as $krit) {
                $total += ($krit->bobot ?? 0) * ($hasil[$alt->id][$krit->id] ?? 0);
            }
            $finalScores[$alt->nama] = $total;
        }

        arsort($finalScores);

        return view('perbandingan_alternatif.hasil', compact('finalScores'));
    }
}
