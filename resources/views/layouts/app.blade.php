<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:#f1f5f9;
            color:#1e293b;
        }

        /* ================= HEADER ================= */

        .header{
            position:fixed;
            top:0;
            left:0;
            right:0;
            height:78px;
            background:rgba(255,255,255,0.8);
            backdrop-filter:blur(18px);
            -webkit-backdrop-filter:blur(18px);
            border-bottom:1px solid rgba(226,232,240,.8);
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 30px;
            z-index:1000;
        }

        .header-left{
            display:flex;
            align-items:center;
            gap:16px;
        }

        .logo-box{
            width:52px;
            height:52px;
            border-radius:18px;
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-size:24px;
            box-shadow:0 10px 20px rgba(37,99,235,.25);
        }

        .header-title h1{
            font-size:17px;
            font-weight:700;
            margin-bottom:2px;
            color:#0f172a;
        }

        .header-title p{
            font-size:13px;
            color:#64748b;
            margin:0;
        }

        /* ================= USER ================= */

        .user-area{
            position:relative;
        }

        .user-card{
            display:flex;
            align-items:center;
            gap:12px;
            background:white;
            border:1px solid #e2e8f0;
            padding:8px 14px;
            border-radius:18px;
            cursor:pointer;
            transition:.3s;
            box-shadow:0 4px 10px rgba(0,0,0,.03);
        }

        .user-card:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 20px rgba(0,0,0,.06);
        }

        .user-avatar{
            width:42px;
            height:42px;
            border-radius:14px;
            background:linear-gradient(135deg,#3b82f6,#2563eb);
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:18px;
        }

        .user-name{
            font-size:14px;
            font-weight:600;
            color:#0f172a;
            margin:0;
        }

        .user-role{
            font-size:12px;
            color:#64748b;
        }

        /* ================= DROPDOWN ================= */

        .dropdown-custom{
            position:absolute;
            top:115%;
            right:0;
            width:190px;
            background:white;
            border-radius:18px;
            padding:10px;
            box-shadow:0 15px 35px rgba(0,0,0,.08);
            border:1px solid #e2e8f0;
            display:none;
        }

        .dropdown-custom button{
            width:100%;
            border:none;
            background:none;
            text-align:left;
            padding:12px 14px;
            border-radius:12px;
            font-size:14px;
            transition:.2s;
        }

        .dropdown-custom button:hover{
            background:#eff6ff;
            color:#2563eb;
        }

        /* ================= LAYOUT ================= */

        .layout{
            display:flex;
            margin-top:78px;
        }

        /* ================= SIDEBAR ================= */

        .sidebar{
            width:270px;
            height:calc(100vh - 78px);
            position:fixed;
            left:0;
            top:78px;
            background:white;
            border-right:1px solid #e2e8f0;
            padding:28px 18px;
            overflow-y:auto;
        }

        .sidebar-title{
            font-size:12px;
            font-weight:700;
            color:#94a3b8;
            text-transform:uppercase;
            margin-bottom:18px;
            padding-left:14px;
            letter-spacing:.08em;
        }

        .sidebar-menu{
            list-style:none;
            padding:0;
            margin:0;
        }

        .sidebar-menu li{
            margin-bottom:8px;
        }

        .sidebar-menu a{
            display:flex;
            align-items:center;
            gap:14px;
            padding:14px 16px;
            border-radius:18px;
            text-decoration:none;
            color:#475569;
            font-size:15px;
            font-weight:500;
            transition:.3s;
        }

        .sidebar-menu a:hover{
            background:#eff6ff;
            color:#2563eb;
            transform:translateX(3px);
        }

        .sidebar-menu a.active{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            box-shadow:0 10px 20px rgba(37,99,235,.2);
        }

        .menu-icon{
            font-size:18px;
        }

        /* ================= CONTENT ================= */

        .main-content{
            margin-left:270px;
            width:calc(100% - 270px);
            padding:35px;
        }

        .content-card{
            background:white;
            border-radius:28px;
            padding:30px;
            box-shadow:0 10px 30px rgba(15,23,42,.04);
            border:1px solid #e2e8f0;
        }

        /* ================= MOBILE ================= */

        @media(max-width:992px){

            .sidebar{
                width:90px;
                padding:20px 10px;
            }

            .sidebar-menu a span{
                display:none;
            }

            .sidebar-menu a{
                justify-content:center;
            }

            .main-content{
                margin-left:90px;
                width:calc(100% - 90px);
            }

            .header-title{
                display:none;
            }
        }

        @media(max-width:768px){

            .header{
                padding:0 16px;
            }

            .sidebar{
                display:none;
            }

            .main-content{
                margin-left:0;
                width:100%;
                padding:20px;
            }

            .user-name,
            .user-role{
                display:none;
            }

        }

    </style>
</head>

<body>

<!-- HEADER -->
<header class="header">

    <div class="header-left">

        <div class="logo-box">
            <i data-lucide="graduation-cap" class="w-6 h-6"></i>
        </div>

        <div class="header-title">
            <h1>Sistem Pendukung Keputusan</h1>
            <p>Pemilihan Ekstrakurikuler</p>
        </div>

    </div>

    <!-- USER -->
    <div class="user-area" id="userDropdown">

        <div class="user-card">

            <div class="user-avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <div>
                <p class="user-name">
                    {{ Auth::check() ? Auth::user()->name : 'Tamu' }}
                </p>

                <small class="user-role">
                    Administrator
                </small>
            </div>

            <i class="bi bi-chevron-down text-secondary"></i>

        </div>

        <!-- Dropdown -->
        <div class="dropdown-custom" id="userMenu">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </button>
            </form>

        </div>

    </div>

</header>

<!-- LAYOUT -->
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

 

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill menu-icon"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('alternatif.index') }}"
                   class="{{ request()->routeIs('alternatif.*') ? 'active' : '' }}">
                    <i class="bi bi-buildings-fill menu-icon"></i>
                    <span>Data Alternatif</span>
                </a>
            </li>

            <li>
                <a href="{{ route('kriteria.index') }}"
                   class="{{ request()->routeIs('kriteria.*') ? 'active' : '' }}">
                    <i class="bi bi-ui-checks-grid menu-icon"></i>
                    <span>Data Kriteria</span>
                </a>
            </li>

            <li>
                <a href="{{ route('perbandingan.index') }}"
                   class="{{ request()->routeIs('perbandingan.index') ? 'active' : '' }}">
                    <i class="bi bi-sliders menu-icon"></i>
                    <span>Perbandingan Kriteria</span>
                </a>
            </li>

            <li>
                <a href="{{ route('perbandingan-alternatif.index') }}"
                   class="{{ request()->routeIs('perbandingan-alternatif.*') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart-fill menu-icon"></i>
                    <span>Perbandingan Alternatif</span>
                </a>
            </li>

        </ul>

    </aside>

    <!-- CONTENT -->
    <main class="main-content">

        <div class="content-card">

            @yield('content')

        </div>

    </main>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

    const userDropdown = document.getElementById('userDropdown');
    const userMenu = document.getElementById('userMenu');

    userDropdown.addEventListener('click', function(e){
        e.stopPropagation();

        userMenu.style.display =
            userMenu.style.display === 'block'
            ? 'none'
            : 'block';
    });

    document.addEventListener('click', function(){
        userMenu.style.display = 'none';
    });

</script>
    <!-- Initializing Lucide Icons -->
    <script>
        lucide.createIcons();
        
        // Mobile simple scroll behavior
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });
    </script>
</body>
</html>