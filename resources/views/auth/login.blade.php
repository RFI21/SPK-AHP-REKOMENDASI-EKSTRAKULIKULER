<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pendukung Keputusan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            background:
                radial-gradient(circle at top left,#3b82f6 0%,transparent 30%),
                radial-gradient(circle at bottom right,#1d4ed8 0%,transparent 30%),
                linear-gradient(135deg,#0f172a,#1e293b);
            padding:20px;
            position:relative;
        }

        /* Blur Circle */
        .blur-circle{
            position:absolute;
            width:300px;
            height:300px;
            border-radius:50%;
            filter:blur(80px);
            opacity:.25;
            z-index:0;
        }

        .blur-1{
            background:#3b82f6;
            top:-100px;
            left:-100px;
        }

        .blur-2{
            background:#60a5fa;
            bottom:-120px;
            right:-120px;
        }

        /* Card */
.login-card{
    position:relative;
    z-index:2;
    width:100%;
    max-width:380px; /* sebelumnya 430px */
    padding:35px; /* sebelumnya 45px */
    border-radius:28px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,0.12);
    box-shadow:
        0 10px 40px rgba(0,0,0,.25),
        inset 0 1px 1px rgba(255,255,255,.08);
}

.logo-box{
    width:65px;
    height:65px;
    margin:auto;
    border-radius:20px;
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:28px;
    margin-bottom:20px;
    box-shadow:0 15px 30px rgba(59,130,246,.35);
}

.login-title{
    font-size:24px;
    color:white;
    font-weight:700;
    text-align:center;
    margin-bottom:10px;
}

.login-subtitle{
    font-size:13px;
    margin-bottom:28px;
    text-align:center;
    color:rgba(255,255,255,.7);

}

        /* Input */
        .input-group-modern{
            position:relative;
            margin-bottom:22px;
        }

        .input-group-modern i{
            position:absolute;
            top:50%;
            left:18px;
            transform:translateY(-50%);
            color:rgba(255,255,255,.6);
            font-size:18px;
        }

.form-control-modern{
    width:100%;
    height:52px;
    border:none;
    outline:none;
    border-radius:16px;
    padding:0 18px 0 52px;
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.08);
    color:white;
    font-size:14px;
    transition:.3s;
}

.btn-login{
    width:100%;
    height:52px;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    font-size:15px;
    font-weight:600;
    transition:.3s;
    margin-top:10px;
    box-shadow:0 15px 30px rgba(37,99,235,.35);
    cursor:pointer;
}

        .form-control-modern::placeholder{
            color:rgba(255,255,255,.45);
        }

        .form-control-modern:focus{
            border-color:#60a5fa;
            background:rgba(255,255,255,.12);
            box-shadow:0 0 0 4px rgba(96,165,250,.15);
        }

        /* Button */


        .btn-login:hover{
            transform:translateY(-2px);
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
        }

        /* Alert */
        .alert-modern{
            border:none;
            border-radius:16px;
            padding:14px 18px;
            font-size:14px;
            margin-bottom:20px;
        }

        .alert-success{
            background:rgba(34,197,94,.12);
            color:#bbf7d0;
            border:1px solid rgba(34,197,94,.25);
        }

        .alert-danger{
            background:rgba(239,68,68,.12);
            color:#fecaca;
            border:1px solid rgba(239,68,68,.25);
        }

        .footer-text{
            margin-top:28px;
            text-align:center;
            color:rgba(255,255,255,.5);
            font-size:13px;
        }

        @media(max-width:576px){

            .login-card{
                padding:35px 25px;
                border-radius:26px;
            }

            .login-title{
                font-size:24px;
            }

            .logo-box{
                width:70px;
                height:70px;
                font-size:30px;
            }
        }
    </style>
</head>

<body>

    <!-- Background Blur -->
    <div class="blur-circle blur-1"></div>
    <div class="blur-circle blur-2"></div>

    <!-- Login Card -->
    <div class="login-card">

        <!-- Logo -->
        <div class="logo-box">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <!-- Title -->
        <h1 class="login-title">
            Sistem Pendukung Keputusan
        </h1>

        <p class="login-subtitle">
            Silakan login untuk masuk ke dashboard admin
        </p>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-modern">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-modern">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('login.proses') }}" method="POST">

            @csrf

            <!-- Username -->
            <div class="input-group-modern">

                <i class="bi bi-person"></i>

                <input
                    type="text"
                    name="username"
                    class="form-control-modern"
                    placeholder="Masukkan username"
                    required
                    autocomplete="username"
                >

            </div>

            <!-- Password -->
            <div class="input-group-modern">

                <i class="bi bi-lock"></i>

                <input
                    type="password"
                    name="password"
                    class="form-control-modern"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                >

            </div>

            <!-- Button -->
            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Masuk Sekarang
            </button>

        </form>

        <!-- Footer -->
        <div class="footer-text">
            © 2026 MAN Palopo • Sistem SPK
        </div>

    </div>

</body>
</html>