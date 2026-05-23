@extends('layouts.app')

@section('title', 'Perbandingan Alternatif')

@section('content')

<style>
    .page-header{
        background: linear-gradient(135deg,#2563eb,#1d4ed8);
        border-radius: 24px;
        padding: 28px;
        color: white;
        margin-bottom: 24px;
        box-shadow: 0 10px 30px rgba(37,99,235,.15);
    }

    .page-header h2{
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .page-header p{
        margin: 0;
        opacity: .9;
    }

    .content-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        box-shadow: 0 10px 30px rgba(0,0,0,.05);
        border: 1px solid #eef2f7;
    }

    .modern-select{
        border: 1px solid #dbe3ef;
        border-radius: 14px;
        padding: 12px 16px;
        width: 100%;
        max-width: 320px;
        font-size: 14px;
        transition: .3s;
        outline: none;
    }

    .modern-select:focus{
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37,99,235,.12);
    }

    .table-modern{
        margin-top: 24px;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .table-modern thead th{
        background: #0f172a;
        color: white;
        border: none;
        padding: 16px;
        font-size: 14px;
        font-weight: 600;
    }

    .table-modern thead th:first-child{
        border-radius: 14px 0 0 14px;
    }

    .table-modern thead th:last-child{
        border-radius: 0 14px 14px 0;
    }

    .table-modern tbody tr{
        background: #fff;
        box-shadow: 0 4px 14px rgba(0,0,0,.04);
    }

    .table-modern tbody td{
        padding: 18px 16px;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
    }

    .table-modern tbody td:first-child{
        border-left: 1px solid #f1f5f9;
        border-radius: 14px 0 0 14px;
    }

    .table-modern tbody td:last-child{
        border-right: 1px solid #f1f5f9;
        border-radius: 0 14px 14px 0;
    }

    .form-control-modern{
        border: 1px solid #dbe3ef;
        border-radius: 12px;
        padding: 12px 14px;
        font-size: 14px;
        transition: .3s;
    }

    .form-control-modern:focus{
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37,99,235,.12);
        outline: none;
    }

    .btn-modern{
        border: none;
        border-radius: 14px;
        padding: 12px 22px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-primary-modern{
        background: linear-gradient(135deg,#2563eb,#1d4ed8);
        color: white;
    }

    .btn-primary-modern:hover{
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(37,99,235,.2);
    }

    .btn-success-modern{
        background: linear-gradient(135deg,#10b981,#059669);
        color: white;
    }

    .btn-success-modern:hover{
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16,185,129,.2);
    }

    .info-box{
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 18px;
        margin-top: 18px;
    }

    .info-box p{
        margin: 0;
        color: #475569;
        line-height: 1.7;
        font-size: 14px;
    }

    @media(max-width:768px){

        .page-header{
            padding: 22px;
        }

        .page-header h2{
            font-size: 22px;
        }

        .content-card{
            padding: 18px;
        }

        .table-modern{
            min-width: 700px;
        }
    }
</style>

<!-- HEADER -->
<div class="page-header">
    <h2>Perbandingan Alternatif</h2>
    <p>
        Bandingkan setiap alternatif berdasarkan kriteria yang dipilih menggunakan metode AHP.
    </p>
</div>

<div class="content-card">

    <!-- PILIH KRITERIA -->
    <form method="GET" action="{{ route('perbandingan-alternatif.index') }}">
        <label class="fw-semibold mb-2 d-block">
            Pilih Kriteria
        </label>

        <select
            name="kriteria_id"
            onchange="this.form.submit()"
            class="modern-select"
        >
            @foreach($kriteriaList as $krit)
                <option
                    value="{{ $krit->id }}"
                    {{ $krit->id == $selectedKriteria ? 'selected' : '' }}
                >
                    {{ $krit->nama }}
                </option>
            @endforeach
        </select>
    </form>

    <!-- PETUNJUK -->
    <div class="info-box">
        <p>
            Gunakan angka desimal untuk membandingkan alternatif.
            <br>
            <b>2</b> = Alternatif 1 lebih unggul dari Alternatif 2,
            <b>0.5</b> = Alternatif 1 kurang unggul dari Alternatif 2,
            <b>1</b> = Keduanya sama penting.
        </p>
    </div>

    @if($kriteriaList->isEmpty())
        <div class="alert alert-info mt-4">
            Belum ada kriteria. Silakan tambahkan kriteria terlebih dahulu.
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success mt-4 rounded-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- FORM -->
    <form
        method="POST"
        action="{{ route('perbandingan-alternatif.update') }}"
        class="mt-4"
    >
        @csrf

        <input
            type="hidden"
            name="kriteria_id"
            value="{{ $selectedKriteria }}"
        >

        <div class="table-responsive">
            <table class="table table-modern align-middle">
                <thead>
                    <tr>
                        <th>Alternatif 1</th>
                        <th>Alternatif 2</th>
                        <th>Nilai Perbandingan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($alternatif as $i => $a1)

                        @for($j = $i + 1; $j < count($alternatif); $j++)

                            @php
                                $a2 = $alternatif[$j];

                                $existing = $perbandingan->first(function($p) use ($a1, $a2) {
                                    return $p->alternatif_1_id == $a1->id
                                        && $p->alternatif_2_id == $a2->id;
                                });
                            @endphp

                            <tr>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $a1->nama }}
                                    </div>
                                </td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $a2->nama }}
                                    </div>
                                </td>

                                <td>
                                    <input
                                        type="text"
                                        name="nilai_{{ $a1->id }}_{{ $a2->id }}"
                                        value="{{ isset($existing->nilai) ? number_format($existing->nilai, 2) : '' }}"
                                        class="form-control form-control-modern"
                                        placeholder="Contoh: 2 atau 0.5"
                                    >
                                </td>

                            </tr>

                        @endfor

                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- BUTTON -->
        <div class="d-flex flex-wrap gap-3 mt-4">

            <button
                type="submit"
                class="btn-modern btn-primary-modern"
            >
                💾 Simpan Perbandingan
            </button>

            <button
                type="submit"
                formaction="{{ route('perbandingan-alternatif.hitung') }}"
                class="btn-modern btn-success-modern"
            >
                ⚙️ Hitung Bobot & Hasil Akhir
            </button>

        </div>

    </form>

</div>

@endsection