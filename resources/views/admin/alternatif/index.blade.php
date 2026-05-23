@extends('layouts.app')

@section('title', 'Data Alternatif')

@section('content')

<style>
    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:28px;
        gap:20px;
        flex-wrap:wrap;
    }

    .page-title h2{
        font-size:30px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:6px;
    }

    .page-title p{
        color:#64748b;
        margin:0;
        font-size:14px;
    }

    .btn-modern{
        border:none;
        padding:12px 20px;
        border-radius:14px;
        font-weight:600;
        display:inline-flex;
        align-items:center;
        gap:10px;
        transition:.3s ease;
        text-decoration:none;
    }

    .btn-primary-modern{
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        color:white;
        box-shadow:0 10px 20px rgba(37,99,235,.20);
    }

    .btn-primary-modern:hover{
        transform:translateY(-2px);
        color:white;
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
        transform:scale(1.01);
        background:#f1f5f9;
    }

    .table-modern tbody td{
        padding:18px;
        vertical-align:middle;
        border:none;
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

    .price-badge{
        background:#dcfce7;
        color:#15803d;
        padding:8px 14px;
        border-radius:999px;
        font-size:13px;
        font-weight:600;
        display:inline-block;
    }

    .action-group{
        display:flex;
        gap:10px;
    }

    .btn-action{
        width:40px;
        height:40px;
        border:none;
        border-radius:12px;
        display:flex;
        align-items:center;
        justify-content:center;
        transition:.25s ease;
        text-decoration:none;
    }

    .btn-edit{
        background:#fef3c7;
        color:#d97706;
    }

    .btn-edit:hover{
        background:#f59e0b;
        color:white;
        transform:translateY(-2px);
    }

    .btn-delete{
        background:#fee2e2;
        color:#dc2626;
    }

    .btn-delete:hover{
        background:#dc2626;
        color:white;
        transform:translateY(-2px);
    }

    .empty-data{
        text-align:center;
        padding:40px 20px;
        color:#94a3b8;
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
            min-width:850px;
        }

        .page-title h2{
            font-size:24px;
        }
    }
</style>

<!-- Header -->
<div class="page-header">

    <div class="page-title">
        <h2>Data Alternatif</h2>
        <p>Kelola data alternatif perumahan untuk proses SPK AHP</p>
    </div>

    <a href="{{ route('alternatif.create') }}"
       class="btn-modern btn-primary-modern">

        <i class="bi bi-plus-circle-fill"></i>
        Tambah Alternatif
    </a>

</div>

<!-- Alert -->
@if(session('success'))
    <div class="alert alert-success alert-modern">
        {{ session('success') }}
    </div>
@endif

<!-- Table -->
<div class="table-wrapper">

    <table class="table-modern">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                <th>Deskripsi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($data as $a)

            <tr>

                <td>
                    <strong>{{ $loop->iteration }}</strong>
                </td>

                <td>
                    <strong>{{ $a->nama }}</strong>
                </td>

                <td>
                    {{ Str::limit($a->deskripsi, 60) }}
                </td>

                <td>

                    <div class="action-group justify-content-center">

                        <!-- Edit -->
                        <a href="{{ route('alternatif.edit', $a->id) }}"
                           class="btn-action btn-edit">

                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('alternatif.destroy', $a->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-action btn-delete">

                                <i class="bi bi-trash-fill"></i>
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6">

                    <div class="empty-data">
                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                        Belum ada data alternatif
                    </div>

                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection