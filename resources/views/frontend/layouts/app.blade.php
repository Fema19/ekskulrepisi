<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Website Ekskul</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary-color: #fd0d0d;
            --secondary-color: #0d6efd;
            --bg-color: #f0f2f5;
            --text-color: #000;
            --navbar-bg: linear-gradient(90deg, #fd0d0d, #f21010);
            --card-bg: #fff;
            --card-hover: rgba(13, 110, 253, 0.25);
        }

        [data-bs-theme="dark"] {
            --bg-color: #1a1d20;
            --text-color: #fff;
            --navbar-bg: linear-gradient(90deg, #8b0000, #6b0000);
            --card-bg: #2d3238;
            --card-hover: rgba(255, 255, 255, 0.1);
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            animation: fadeIn 1s ease-in-out;
            transition: background-color 0.3s ease, color 0.3s ease;
            padding-top: 88px; /* Menambahkan padding untuk navbar fixed */
        }

        .navbar {
            background: linear-gradient(90deg, #fd0d0d, #f21010);
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar.scrolled {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            background: rgba(253, 13, 13, 0.95);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: #fff !important;
        }

        .navbar-brand:hover {
            color: #d6d6f7 !important;
        }

        .navbar-brand img {
            height: 55px;
            width: auto;
        }

        header {
            background-color: #fd0d0d;
            color: white;
            padding: 2rem 0 1.5rem;
            text-align: center;
            box-shadow: 0 4px 10px rgb(13 110 253 / 0.3);
            margin-bottom: 2.5rem;
        }

        header img {
            height: 80px;
            margin-bottom: 1rem;
        }

        .typing-text {
            border-right: .15em solid #fff;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            display: inline-block;
            animation: typing 3s steps(40, end) forwards, blink 0.7s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink {
            50% { border-color: transparent }
        }

        footer {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
            box-shadow: 0 -4px 10px rgb(13 110 253 / 0.3);
            font-size: 0.9rem;
        }

        .table thead th {
            vertical-align: middle;
            background-color: #0dcdfd;
            color: white;
            text-align: center;
            letter-spacing: 0.05em;
        }

        .table tbody tr:hover {
            background-color: #e9f0ff;
            transition: background-color 0.3s ease;
        }

        main {
            flex: 1 0 auto;
            max-width: 1200px;
            margin: 0 auto 3rem;
            padding: 0 1rem;
        }

        .btn i {
            margin-right: 6px;
        }

        /* Navigation Styles */
        .navbar .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .navbar .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: white;
            transition: width 0.3s ease;
        }

        .navbar .nav-link:hover::before,
        .navbar .nav-link.active::before {
            width: 100%;
        }

        .navbar .nav-link:active {
            transform: scale(0.95);
        }

        /* Prevent white flash on click */
        .navbar .nav-link,
        .navbar .nav-link:active,
        .navbar .nav-link:focus,
        .navbar .nav-link:hover {
            color: white !important;
            -webkit-tap-highlight-color: transparent;
        }

        .dropdown-menu {
            background: rgba(253, 13, 13, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            animation: dropdownFade 0.3s ease;
        }

        @keyframes dropdownFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            color: white;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        /* Active nav item styles */
        .nav-link.active {
            position: relative;
            font-weight: bold;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 2px;
            background-color: white;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 40px;
        }

        /* Smooth scroll padding to account for fixed navbar */
        html {
            scroll-padding-top: 100px;
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container d-flex justify-content-start">
            <!-- Logo dan Teks di Kiri -->
            <a class="navbar-brand d-flex align-items-center gap-3 me-auto" href="{{ url('/sesi') }}">
                <img src="{{ asset('/img/logo-sekolah1.png') }}" alt="Logo Sekolah">
                <span>Ekskul Sekolah</span>
            </a>

            <!-- Toggle Button untuk Mobile -->
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-semibold">
                    <li class="nav-item"><a class="nav-link text-white" href="#anggota-section"><i class="fas fa-users me-1"></i>Anggota</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#daftar-pembina-section"><i class="fas fa-chalkboard-teacher me-1"></i>Pembina</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#ekskul-section"><i class="fas fa-dumbbell me-1"></i>Ekskul</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#daftar-kegiatan-section"><i class="fas fa-calendar-alt me-1"></i>Kegiatan</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-arrows-alt-v me-1"></i>Navigasi
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item scroll-top" href="#"><i class="fas fa-arrow-up me-2"></i>Ke Atas</a></li>
                            <li><a class="dropdown-item scroll-bottom" href="#footer"><i class="fas fa-arrow-down me-2"></i>Ke Bawah</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <button class="btn text-white ms-2" id="themeToggle">
                            <i class="fas fa-moon" id="themeIcon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <img src="{{ asset('/img/logo-sekolah.png') }}" alt="Logo Sekolah">
        <h1 class="fw-bold typing-text" data-text="Website Ekstrakurikuler Sekolah"></h1>
        <p class="lead typing-text" data-text="Temukan informasi lengkap tentang kegiatan dan anggota ekstrakurikuler kami."></p>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="footer">
        <small>&copy; {{ date('Y') }} Sekolah Kami. All rights reserved.</small>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Navbar Scroll Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>

    <!-- Dark Mode Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const html = document.documentElement;

            // Check for saved theme preference or system preference
            const savedTheme = localStorage.getItem('theme');
            const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            const currentTheme = savedTheme || systemTheme;

            // Set initial theme
            html.setAttribute('data-bs-theme', currentTheme);
            updateIcon(currentTheme);

            themeToggle.addEventListener('click', () => {
                const newTheme = html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
                html.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcon(newTheme);
            });

            function updateIcon(theme) {
                themeIcon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
            }
        });
    </script>

    <!-- Improved Smooth Scrolling Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
            const sections = {};
            const navHeight = navbar.offsetHeight;

            // Collect all sections
            navLinks.forEach(link => {
                const section = document.querySelector(link.getAttribute('href'));
                if (section) {
                    sections[link.getAttribute('href')] = section;
                }
            });

            // Smooth scroll handling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');

                    if (targetId === '#') {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    } else if (this.classList.contains('scroll-bottom')) {
                        window.scrollTo({
                            top: document.documentElement.scrollHeight,
                            behavior: 'smooth'
                        });
                    } else {
                        const target = document.querySelector(targetId);
                        if (target) {
                            const offset = navHeight;
                            const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
                            const offsetPosition = elementPosition - offset;

                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });

            // Highlight nav link on scroll
            window.addEventListener('scroll', () => {
                const scrollPosition = window.pageYOffset + navHeight;

                for (const id in sections) {
                    const section = sections[id];
                    if (section.offsetTop <= scrollPosition && section.offsetTop + section.offsetHeight > scrollPosition) {
                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${section.id}`) {
                                link.classList.add('active');
