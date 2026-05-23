@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard-wrapper{
        animation:fadeIn .5s ease;
    }

    @keyframes fadeIn{
        from{
            opacity:0;
            transform:translateY(15px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }

    /* Welcome */
    .welcome-modern{
        background: linear-gradient(135deg,#2563eb 0%,#1d4ed8 100%);
        border-radius: 28px;
        padding: 40px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(37,99,235,.25);
        margin-bottom: 30px;
    }

    .welcome-modern::before{
        content:'';
        position:absolute;
        width:250px;
        height:250px;
        border-radius:50%;
        background:rgba(255,255,255,.08);
        top:-120px;
        right:-80px;
    }

    .welcome-modern::after{
        content:'';
        position:absolute;
        width:180px;
        height:180px;
        border-radius:50%;
        background:rgba(255,255,255,.05);
        bottom:-80px;
        left:-60px;
    }

    .welcome-title{
        font-size:32px;
        font-weight:700;
        margin-bottom:10px;
        position:relative;
        z-index:2;
    }

    .welcome-subtitle{
        color:rgba(255,255,255,.85);
        font-size:15px;
        position:relative;
        z-index:2;
        max-width:600px;
    }

    /* Cards */
    .dashboard-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
        gap:24px;
    }

    .dashboard-card{
        background:#fff;
        border-radius:24px;
        padding:28px;
        position:relative;
        overflow:hidden;
        border:1px solid #eef2f7;
        transition:.3s ease;
        box-shadow:0 10px 30px rgba(15,23,42,.05);
    }

    .dashboard-card:hover{
        transform:translateY(-6px);
        box-shadow:0 20px 40px rgba(15,23,42,.10);
    }

    .dashboard-card .icon-box{
        width:64px;
        height:64px;
        border-radius:20px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:28px;
        margin-bottom:22px;
    }

    .dashboard-card h4{
        font-size:16px;
        color:#64748b;
        margin-bottom:10px;
        font-weight:500;
    }

    .dashboard-card .card-value{
        font-size:42px;
        font-weight:700;
        line-height:1;
        color:#0f172a;
        margin-bottom:12px;
    }

    .dashboard-card .card-desc{
        font-size:14px;
        color:#94a3b8;
    }

    /* Card Colors */
    .blue .icon-box{
        background:#dbeafe;
        color:#2563eb;
    }

    .green .icon-box{
        background:#dcfce7;
        color:#16a34a;
    }

    .orange .icon-box{
        background:#ffedd5;
        color:#ea580c;
    }

    /* Responsive */
    @media(max-width:768px){

        .welcome-modern{
            padding:30px 24px;
            border-radius:22px;
        }

        .welcome-title{
            font-size:24px;
        }

        .dashboard-card{
            border-radius:20px;
            padding:24px;
        }

        .dashboard-card .card-value{
            font-size:34px;
        }
    }
</style>

<div class="dashboard-wrapper">

    <!-- Welcome -->
    <div class="welcome-modern">
        <h1 class="welcome-title">
            Selamat Datang 👋
        </h1>

        <p class="welcome-subtitle">
            Sistem Pendukung Keputusan Pemilihan Ekstrakulikuler.
            Kelola data alternatif, kriteria, dan proses perhitungan AHP
            dengan lebih mudah dan efisien.
        </p>
    </div>

    <!-- Dashboard Cards -->
    <div class="dashboard-grid">

        <!-- Alternatif -->
        <div class="dashboard-card blue">
            <div class="icon-box">
                <i class="bi bi-house-door-fill"></i>
            </div>

            <h4>Data Alternatif</h4>

            <div class="card-value">
                {{ $jumlahAlternatif }}
            </div>

            <div class="card-desc">
                Total data alternatif ekstrakulikuler
            </div>
        </div>

        <!-- Kriteria -->
        <div class="dashboard-card green">
            <div class="icon-box">
                <i class="bi bi-ui-checks-grid"></i>
            </div>

            <h4>Data Kriteria</h4>

            <div class="card-value">
                {{ $jumlahKriteria }}
            </div>

            <div class="card-desc">
                Total kriteria penilaian AHP
            </div>
        </div>

        <!-- Sistem -->
        <div class="dashboard-card orange">
            <div class="icon-box">
                <i class="bi bi-bar-chart-fill"></i>
            </div>

            <h4>Metode Digunakan</h4>

            <div class="card-value" style="font-size:28px;">
                AHP
            </div>

            <div class="card-desc">
                Analytical Hierarchy Process
            </div>
        </div>

    </div>

</div>

@endsection