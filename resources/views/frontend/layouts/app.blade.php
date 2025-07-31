<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website User')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/frontend.css') }}">

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
                <a class="nav-link" href="#" onclick="scrollToSection('ekskuls')">Ekskul</a>
                <a class="nav-link" href="#" onclick="scrollToSection('pembina')">Pembina</a>
                <a class="nav-link" href="#" onclick="scrollToSection('anggota')">Anggota</a>
                <a class="nav-link" href="#" onclick="scrollToSection('kegiatan')">Kegiatan</a>
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
    <script>
    function scrollToSection(id) {
        event.preventDefault(); // Cegah munculnya #
        const section = document.getElementById(id);
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>

</body>
</html>
