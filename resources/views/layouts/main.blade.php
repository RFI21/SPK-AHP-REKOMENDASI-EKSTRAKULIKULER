<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Pemilihan Perumahan</title>
   <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
   
    <style>
        .welcome-box {background: white;padding: 20px 30px;border-radius: 10px;margin-bottom: 30px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);}

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #2c8c7d 0%, #1a5c52 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-circle {
            width: 50px;
            height: 50px;
            background: #ffd700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #1a5c52;
            font-size: 20px;
            border: 3px solid #fff;
        }

        .header-title {
            display: flex;
            flex-direction: column;
        }

        .header-title h1 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .header-title p {
            font-size: 13px;
            opacity: 0.9;
        }

        .user-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .user-icon:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .user-icon svg {
            width: 24px;
            height: 24px;
            fill: white;
        }

        /* Main Container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Welcome Section */
        .welcome-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 30px;
            align-items: center;
        }

        .welcome-content h2 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .welcome-content h3 {
            font-size: 18px;
            color: #2c8c7d;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .welcome-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .btn-consult {
            background: #2563eb;
            color: white;
            padding: 14px 32px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }

        .btn-consult:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .welcome-illustration {
            width: 200px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-circle {
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            position: relative;
        }

        /* Feature Cards */
        .feature-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .feature-card h4 {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .feature-card p,
        .feature-card ul {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .feature-card ul {
            list-style: none;
            text-align: left;
            padding-left: 20px;
        }

        .feature-card ul li {
            margin-bottom: 8px;
            position: relative;
        }

        .feature-card ul li:before {
            content: "•";
            color: #2563eb;
            font-weight: bold;
            position: absolute;
            left: -15px;
        }

        /* Footer Text */
        .footer-text {
            text-align: center;
            color: #666;
            font-size: 15px;
            font-style: italic;
            margin-top: 20px;
            padding: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 12px 20px;
            }

            .header-title h1 {
                font-size: 14px;
            }

            .header-title p {
                font-size: 11px;
            }

            .welcome-section {
                grid-template-columns: 1fr;
                padding: 30px 25px;
                text-align: center;
            }

            .welcome-content h2 {
                font-size: 26px;
            }

            .welcome-content h3 {
                font-size: 16px;
            }

            .welcome-illustration {
                margin: 0 auto;
            }

            .feature-cards {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 20px 15px;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome-section,
        .feature-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .feature-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .feature-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .feature-card:nth-child(3) {
            animation-delay: 0.3s;
        }
    </style>
</head>
<body>
   <!-- Header -->
    <div class="header">
        <div class="header-left">
            <div class="logo-circle">🏠</div>
            <div class="header-title">
                <h1>Sistem Pendukung Keputusan</h1>
                <p>Pemilihan Perumahan</p>
            </div>
        </div>

<div class="user-info">
    <a href="{{ route('login') }}" class="user-icon-link" title="Masuk ke akun Anda">
        <div class="user-icon">
            <svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 
                    1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 
                    1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>
    </a>
</div>

    </div>

        <!-- Main Content -->
            <div class="container">

            @yield('content')
            
            <!-- Footer Text -->
            <div class="footer-text">
                © 2025 Sitem Pendukung Keputusan Pemilian Perumahan. All rights reserved.
            </div>

        </div>
    </div>
      <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>