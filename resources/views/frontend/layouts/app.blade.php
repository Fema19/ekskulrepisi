<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Website Ekskul</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
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
            background-color: #f0f2f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            animation: fadeIn 1s ease-in-out;
        }

        .navbar {
            background: linear-gradient(90deg, #fd0d0d, #f21010);
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
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
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
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
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('anggota.index') }}">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('pembina.index') }}">Pembina</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('ekskul.index') }}">Ekskul</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('kegiatan.index') }}">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('jabatan.index') }}">Jabatan</a></li>
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
    <footer>
        <small>&copy; {{ date('Y') }} Sekolah Kami. All rights reserved.</small>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Typing Animation Script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const texts = document.querySelectorAll(".typing-text");
            texts.forEach((el, i) => {
                const fullText = el.getAttribute("data-text");
                el.innerHTML = "";
                el.style.width = "0";

                setTimeout(() => {
                    let index = 0;
                    const type = setInterval(() => {
                        if (index < fullText.length) {
                            el.textContent += fullText.charAt(index);
                            index++;
                        } else {
                            clearInterval(type);
                            el.style.borderRight = "none";
                        }
                    }, 50);
                }, i * 500);
            });
        });
    </script>

</body>
</html>
