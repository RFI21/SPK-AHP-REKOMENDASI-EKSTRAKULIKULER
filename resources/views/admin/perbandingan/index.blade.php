@extends('layouts.app')

@section('title', 'Perbandingan Kriteria')

@section('content')

<style>
    .page-header{
        margin-bottom:28px;
    }

    .page-title{
        font-size:30px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:10px;
    }

    .page-subtitle{
        color:#64748b;
        font-size:15px;
        line-height:1.7;
        max-width:850px;
    }

    .info-card{
        background:linear-gradient(135deg,#eff6ff,#dbeafe);
        border:1px solid #bfdbfe;
        border-radius:22px;
        padding:22px 24px;
        margin-bottom:28px;
    }

    .info-card h5{
        font-weight:700;
        color:#1d4ed8;
        margin-bottom:10px;
    }

    .info-card p{
        margin:0;
        color:#475569;
        font-size:14px;
        line-height:1.7;
    }

    .table-wrapper{
        background:white;
        border-radius:24px;
        padding:24px;
        box-shadow:0 10px 35px rgba(15,23,42,.05);
        border:1px solid #eef2f7;
        overflow:hidden;
    }

    .table-modern{
        width:100%;
        border-collapse:separate;
        border-spacing:0 14px;
    }

    .table-modern thead th{
        font-size:13px;
        text-transform:uppercase;
        letter-spacing:.08em;
        color:#94a3b8;
        font-weight:700;
        border:none;
        padding:0 18px 10px;
        background:none;
    }

    .table-modern tbody tr{
        background:#f8fafc;
        transition:.3s ease;
    }

    .table-modern tbody tr:hover{
        background:#f1f5f9;
    }

    .table-modern tbody td{
        padding:18px;
        border:none;
        vertical-align:middle;
        color:#334155;
        font-size:14px;
    }

    .table-modern tbody tr td:first-child{
        border-top-left-radius:16px;
        border-bottom-left-radius:16px;
    }

    .table-modern tbody tr td:last-child{
        border-top-right-radius:16px;
        border-bottom-right-radius:16px;
    }

    .criteria-badge{
        background:#dbeafe;
        color:#2563eb;
        padding:8px 14px;
        border-radius:999px;
        font-size:13px;
        font-weight:600;
        display:inline-block;
    }

    .input-modern{
        width:100%;
        border:none;
        background:white;
        border:1px solid #e2e8f0;
        border-radius:14px;
        padding:14px 16px;
        font-size:14px;
        transition:.25s ease;
        outline:none;
    }

    .input-modern:focus{
        border-color:#3b82f6;
        box-shadow:0 0 0 4px rgba(59,130,246,.10);
    }

    .button-group{
        display:flex;
        gap:14px;
        margin-top:28px;
        flex-wrap:wrap;
    }

    .btn-modern{
        border:none;
        padding:14px 22px;
        border-radius:16px;
        font-weight:600;
        display:inline-flex;
        align-items:center;
        gap:10px;
        transition:.3s ease;
        text-decoration:none;
    }

    .btn-save{
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        color:white;
        box-shadow:0 10px 20px rgba(37,99,235,.20);
    }

    .btn-save:hover{
        transform:translateY(-2px);
    }

    .btn-calculate{
        background:linear-gradient(135deg,#16a34a,#15803d);
        color:white;
        box-shadow:0 10px 20px rgba(22,163,74,.20);
    }

    .btn-calculate:hover{
        transform:translateY(-2px);
    }

    .alert-modern{
        border:none;
        border-radius:16px;
        padding:16px 20px;
        margin-bottom:24px;
        font-weight:500;
    }

    @media(max-width:768px){

        .table-wrapper{
            overflow-x:auto;
        }

        .table-modern{
            min-width:800px;
        }

        .page-title{
            font-size:24px;
        }

        .button-group{
            flex-direction:column;
        }

        .btn-modern{
            justify-content:center;
            width:100%;
        }
    }
</style>

<!-- Header -->
<div class="page-header">

    <h2 class="page-title">
        Perbandingan Kriteria
    </h2>

 <p class="text-muted mb-0">
    Isi nilai perbandingan antar kriteria menggunakan angka desimal.
    <br>
    Contoh:
    <b>2</b> = Kriteria 1 lebih penting dari Kriteria 2,
    <b>0.5</b> = Kriteria 1 kurang penting dari Kriteria 2,
    <b>1</b> = keduanya sama penting.
</p>

</div>

<!-- Info -->
<div class="info-card">

    <h5>
        <i class="bi bi-info-circle-fill me-2"></i>
        Petunjuk Pengisian
    </h5>

    <p>
        Nilai <strong>1</strong> berarti kedua kriteria sama penting.
        Nilai <strong>3, 5, 7, 9</strong> menunjukkan tingkat kepentingan yang meningkat.
        Semakin besar nilai, semakin penting Kriteria 1 dibanding Kriteria 2.
    </p>

</div>

<!-- Alert -->
@if(session('success'))
    <div class="alert alert-success alert-modern">
        {{ session('success') }}
    </div>
@endif

<!-- Form -->
<form method="POST" action="{{ route('perbandingan.update') }}">

    @csrf

    <div class="table-wrapper">

        <table class="table-modern">

            <thead>
                <tr>
                    <th style="width:30%">Kriteria 1</th>
                    <th style="width:30%">Kriteria 2</th>
                    <th style="width:40%">Nilai Perbandingan</th>
                </tr>
            </thead>

            <tbody>

                @foreach($kriteria as $i => $k1)

                    @for($j = $i + 1; $j < count($kriteria); $j++)

                        @php
                            $k2 = $kriteria[$j];

                            $existing = $perbandingan
                                ->where('kriteria_1_id', $k1->id)
                                ->where('kriteria_2_id', $k2->id)
                                ->first();
                        @endphp

                        <tr>

                            <td>
                                <span class="criteria-badge">
                                    {{ $k1->nama }}
                                </span>
                            </td>

                            <td>
                                <span class="criteria-badge">
                                    {{ $k2->nama }}
                                </span>
                            </td>

                            <td>

                                <input
                                    type="text"
                                    name="nilai_{{ $k1->id }}_{{ $k2->id }}"
                                    value="{{ isset($existing->nilai) ? number_format($existing->nilai, 2) : '' }}"
                                    class="input-modern"
                                    placeholder="Contoh: 3 atau 1/3"
                                    required>

                            </td>

                        </tr>

                    @endfor

                @endforeach

            </tbody>

        </table>

    </div>

    <!-- Buttons -->
    <div class="button-group">

        <button type="submit"
                class="btn-modern btn-save">

            <i class="bi bi-floppy-fill"></i>
            Simpan Perbandingan

        </button>

        <button type="submit"
                formaction="{{ route('perbandingan.hitung') }}"
                class="btn-modern btn-calculate">

            <i class="bi bi-calculator-fill"></i>
            Hitung Bobot Kriteria

        </button>

    </div>

</form>

@endsection