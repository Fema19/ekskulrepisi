<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website User')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            min-height: 100vh;
            background:
                linear-gradient(135deg, #FFE6F0 0%, #FFCCE5 100%),
                url('data:image/svg+xml;utf8,<svg width="320" height="120" viewBox="0 0 320 120" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 80 Q80 120 160 80 T320 80 V120 H0 Z" fill="%23ffb6d5" fill-opacity="0.13"/><path d="M0 100 Q80 140 160 100 T320 100 V120 H0 Z" fill="%23ffb6d5" fill-opacity="0.09"/></svg>') repeat-x;
            background-size: cover, 1000px 120px;
            font-family: 'Poppins', Arial, sans-serif;
            position: relative;
            overflow-x: hidden;
        }
        .navbar {
            background: linear-gradient(90deg, #ff4b6e 0%, #b31217 100%);
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 16px rgba(255, 75, 110, 0.18);
        }
        .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 2rem;
            color: #fff !important;
            letter-spacing: 2px;
            text-shadow: 1px 2px 8px #b31217;
        }
        .nav-link {
            color: #fff !important;
            font-weight: 600;
            margin-right: 1rem;
            transition: color 0.2s;
        }
        .nav-link:hover {
            color: #fff0f6 !important;
            text-shadow: 0 0 8px #b31217;
        }
        .container {
            margin-top: 30px;
            margin-bottom: 30px;
            max-width: 900px;
        }
        section {
            padding: 2.5rem 0 2.5rem 0;
        }
        .sakura-card {
            background: #fff;
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px 0 rgba(255, 75, 110, 0.10), 0 1.5px 8px 0 rgba(255, 182, 213, 0.10);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .sakura-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 8px 32px 0 rgba(255, 75, 110, 0.13);
        }
        .sakura-title {
            font-family: 'Pacifico', cursive;
            color: #b31217;
            font-size: 1.7rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        /* Sakura petal effect removed */
        .footer {
            background: linear-gradient(90deg, #ff4b6e 0%, #b31217 100%);
            color: #fff;
            border-radius: 30px 30px 0 0;
            text-align: center;
            padding: 18px 0 10px 0;
            font-size: 1.1rem;
            font-family: 'Poppins', Arial, sans-serif;
            box-shadow: 0 -4px 16px rgba(179, 18, 23, 0.13);
        }
        /* Responsive tweaks */
        @media (max-width: 992px) {
            .container { max-width: 98vw; }
        }
        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.3rem; }
            .container { margin-top: 15px; margin-bottom: 15px; }
            section { padding: 1.2rem 0 1.2rem 0; }
        }
    </style>
</head>
<body>
    <!-- Sakura petal effect removed -->
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Japan Club</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    {{-- Gunakan URL langsung atau pastikan route tersedia --}}
                    <a class="nav-link" href="#ekskuls">Ekskul</a>
                    <a class="nav-link" href="#pembina">Pembina</a>
                    <a class="nav-link" href="#anggota">Anggota</a>
                    <a class="nav-link" href="#kegiatan">Kegiatan</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container position-relative" style="z-index:2;">
        @yield('content')
    </div>

    <footer class="footer mt-5">
        <div>
            <i class="bi bi-flower1"></i> &copy; {{ now()->year }} Japan Club. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
