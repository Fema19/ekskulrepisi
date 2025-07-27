<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website User')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">User Panel</a>
            <div class="navbar-nav">
                {{-- Gunakan URL langsung atau pastikan route tersedia --}}
                <a class="nav-link" href="/ekskul">Ekskul</a>
                <a class="nav-link" href="/pembina">Pembina</a>
                <a class="nav-link" href="/anggota">Anggota</a>
                <a class="nav-link" href="/kegiatan">Kegiatan</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
