<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kriteria;
use App\Models\perbandingan;

class PerbandinganController extends Controller
{
    public function index()
    {
        $kriteria = kriteria::all();
        $perbandingan = perbandingan::all();
        return view('admin.perbandingan.index', compact('kriteria', 'perbandingan'));
    }

   public function store(Request $request)
    {
        $kriteria = kriteria::all();

        foreach ($kriteria as $i => $k1) {
            for ($j = $i + 1; $j < count($kriteria); $j++) {
                $k2 = $kriteria[$j];
                $key = 'nilai_' . $k1->id . '_' . $k2->id;

                if ($request->filled($key)) {
                    $nilaiInput = trim($request->$key);

                    // Cek apakah nilai pecahan (misal "1/3")
                    if (str_contains($nilaiInput, '/')) {
                        [$num, $den] = explode('/', $nilaiInput);
                        $nilai = floatval($num) / floatval($den);
                    } else {
                        $nilai = floatval($nilaiInput);
                    }

                    // Simpan hanya satu arah (k1 -> k2)
                    perbandingan::updateOrCreate(
                        [
                            'kriteria_1_id' => $k1->id,
                            'kriteria_2_id' => $k2->id
                        ],
                        ['nilai' => $nilai]
                    );
                }
            }
        }

        return redirect()
            ->route('perbandingan.index')
            ->with('success', 'Perbandingan kriteria berhasil disimpan');
    }


    public function update(Request $request)
{
    $kriteria = kriteria::all();

    foreach ($kriteria as $i => $k1) {
        for ($j = $i + 1; $j < count($kriteria); $j++) {
            $k2 = $kriteria[$j];
            $key = 'nilai_' . $k1->id . '_' . $k2->id;

            if ($request->filled($key)) {
                $nilaiInput = trim($request->$key);

                // Cek apakah pecahan
                if (str_contains($nilaiInput, '/')) {
                    [$num, $den] = explode('/', $nilaiInput);
                    $nilai = floatval($num) / floatval($den);
                } else {
                    $nilai = floatval($nilaiInput);
                }

                // Update jika sudah ada, atau create baru
                perbandingan::updateOrCreate(
                    [
                        'kriteria_1_id' => $k1->id,
                        'kriteria_2_id' => $k2->id
                    ],
                    ['nilai' => $nilai]
                );
            }
        }
    }

    return redirect()
        ->route('perbandingan.index')
        ->with('success', 'Data perbandingan berhasil diperbarui ✅');
}


    public function hitungBobot()
    {
        $kriteria = kriteria::all();
        $n = $kriteria->count();

        if ($n < 2) {
            return redirect()->back()->with('error', 'Minimal harus ada 2 kriteria.');
        }

        $data = perbandingan::all();
        $matrix = array_fill(0, $n, array_fill(0, $n, 1));

        // Isi matriks dengan nilai dan kebalikannya
        foreach ($data as $p) {
            $i = $kriteria->search(fn($item) => $item->id == $p->kriteria_1_id);
            $j = $kriteria->search(fn($item) => $item->id == $p->kriteria_2_id);

            if ($i !== false && $j !== false) {
                $matrix[$i][$j] = $p->nilai;
                $matrix[$j][$i] = 1 / $p->nilai;
            }
        }

        // Normalisasi kolom
        $colSum = array_fill(0, $n, 0);
        for ($j = 0; $j < $n; $j++) {
            for ($i = 0; $i < $n; $i++) {
                $colSum[$j] += $matrix[$i][$j];
            }
        }

        $normalized = array_fill(0, $n, array_fill(0, $n, 0));
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $normalized[$i][$j] = $matrix[$i][$j] / $colSum[$j];
            }
        }

        // Hitung bobot (eigen vector)
        $weights = [];
        for ($i = 0; $i < $n; $i++) {
            $weights[$i] = array_sum($normalized[$i]) / $n;
        }

        // Hitung λmax
        $lambdaMax = 0;
        for ($i = 0; $i < $n; $i++) {
            $rowSum = 0;
            for ($j = 0; $j < $n; $j++) {
                $rowSum += $matrix[$i][$j] * $weights[$j];
            }
            $lambdaMax += $rowSum / $weights[$i];
        }
        $lambdaMax = $lambdaMax / $n;

        // Hitung CI dan CR
        $CI = ($lambdaMax - $n) / ($n - 1);
        $RIList = [0, 0, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45];
        $RI = $RIList[$n - 1] ?? 1.45;
        $CR = $RI == 0 ? 0 : $CI / $RI;

        // Simpan bobot
        foreach ($kriteria as $index => $krit) {
            $krit->update(['bobot' => $weights[$index]]);
        }

        return redirect()
            ->route('perbandingan.index')
            ->with('success', 'Bobot berhasil dihitung. λmax = ' . round($lambdaMax, 4) .
                ', CI = ' . round($CI, 4) .
                ', CR = ' . round($CR, 4) .
                ($CR <= 0.1 ? ' ✅ (Konsisten)' : ' ⚠️ (Tidak konsisten)'));
    }

}
