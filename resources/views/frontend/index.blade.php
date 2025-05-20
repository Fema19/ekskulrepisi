@extends('frontend.layouts.app')

@section('title', 'Daftar Anggota Ekskul')

{{-- Link Google Fonts Poppins --}}
@section('head')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    /* Global Styles */
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Dark Mode Styles */
    [data-bs-theme="dark"] .bg-light {
        background-color: #2d3238 !important;
    }

    [data-bs-theme="dark"] .text-secondary {
        color: rgba(255, 255, 255, 0.5) !important;
    }

    [data-bs-theme="dark"] .bg-secondary {
        background-color: #2d3238 !important;
    }

    [data-bs-theme="dark"] .section-title {
        color: #fff;
    }

    /* Card Styles and Animations */
    .card {
        transition: all 0.3s ease;
        border: none;
        background: var(--card-bg);
    }

    .card.shadow-sm:hover {
        box-shadow: 0 10px 20px var(--card-hover) !important;
        transform: translateY(-5px);
    }

    /* Improved Container Spacing */
    .wide-container {
        padding-left: clamp(1rem, 5vw, 3rem);
        padding-right: clamp(1rem, 5vw, 3rem);
    }

    /* Section Headers */
    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 50%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        bottom: 0;
        left: 25%;
        border-radius: 2px;
    }

    /* Card Image Effects */
    .card-img-hover {
        overflow: hidden;
        border-radius: 1rem;
    }

    .card-img-hover img {
        transition: transform 0.5s ease;
    }

    .card-img-hover:hover img {
        transform: scale(1.05);
    }

    /* Badge Styles */
    .custom-badge {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 0.5em 1em;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Scroll Animations */
    .scroll-fade {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .scroll-fade.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
    // Scroll Animation
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.scroll-fade').forEach(el => observer.observe(el));

        // Image error handling
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.onerror = null;
                this.src = '{{ asset('/img/logo-sekolah.png') }}';
                this.alt = 'Default Image';
            });
        });
    });
</script>
@endsection

@section('content')
<div class="container-fluid wide-container py-5">



    {{-- Hero Section --}}
    <div class="hero-section p-5 rounded-4 shadow mb-5 text-center position-relative overflow-hidden">
        <div class="hero-content">
            <div class="d-flex align-items-center justify-content-center mb-4 flex-wrap">
                <img src="{{ asset('/img/logo-sekolah.png') }}" alt="Logo Sekolah" class="hero-logo animate-float">
                <h1 class="display-4 fw-bold text-gradient mb-0">Selamat Datang di Halaman Ekstrakurikuler</h1>
            </div>
            <p class="lead mb-4 text-muted">Mari bergabung dan kembangkan bakatmu bersama kami!</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#ekskul-section" class="btn btn-primary btn-lg px-4">
                    <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                </a>
                <a href="{{ route('anggota.index') }}" class="btn btn-outline-primary btn-lg px-4">
                    <i class="fas fa-users me-2"></i>Lihat Anggota
                </a>
            </div>
        </div>
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>

    <style>
    .hero-section {
        background: var(--card-bg);
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    [data-bs-theme="dark"] .hero-section {
        background: linear-gradient(135deg, #1a1d20, #2d3238);
    }

    .hero-logo {
        height: 80px;
        width: auto;
        margin-right: 20px;
    }

    .text-gradient {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .hero-shapes .shape {
        position: absolute;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        opacity: 0.1;
    }

    .shape-1 {
        width: 150px;
        height: 150px;
        top: -50px;
        right: -50px;
    }

    .shape-2 {
        width: 100px;
        height: 100px;
        bottom: -30px;
        left: -30px;
    }

    .shape-3 {
        width: 70px;
        height: 70px;
        bottom: 50%;
        right: 10%;
    }

    [data-bs-theme="dark"] .card {
        background-color: var(--card-bg);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    [data-bs-theme="dark"] .text-muted {
        color: rgba(255, 255, 255, 0.6) !important;
    }
    </style>

    {{-- Section Profil Ekskul --}}
    <div class="mb-5" id="ekskul-section">
        <h2 class="fw-bold section-title text-center display-5 mb-4">Profil Ekskul</h2>
        <p class="text-center text-muted mb-5">Temukan berbagai kegiatan ekstrakurikuler yang sesuai dengan minat dan bakatmu</p>

        <div class="row justify-content-center gy-5">
            @forelse($ekskul as $esk)
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card shadow-sm rounded-4 border-0 p-4" style="background-color: transparent; transition: box-shadow 0.3s ease;">
                        <div class="row g-0 align-items-center">
                            {{-- Deskripsi Ekskul --}}
                            <div class="col-12 col-md-8 pe-md-5" style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; color: #000000; line-height: 1.7;">
                                <h3 class="fw-bold text-primary mb-3">{{ $esk->nama_ekskul }}</h3>
                                <p class="mb-0">{{ $esk->deskripsi ?? 'Deskripsi ekstrakurikuler belum tersedia.' }}</p>
                            </div>

                            {{-- Logo Ekskul --}}
                            <div class="col-12 col-md-4 d-flex justify-content-center mt-4 mt-md-0">
                                @if($esk->logo)
                                    <img src="{{ asset('storage/' . $esk->logo) }}" alt="{{ $esk->nama_ekskul }}"
                                         class="img-fluid rounded-circle shadow"
                                         style="max-width: 180px; max-height: 180px; object-fit: cover; border: 5px solid #0d6efd;">
                                @else
                                    <div class="d-flex justify-content-center align-items-center bg-light rounded-circle shadow"
                                         style="width: 180px; height: 180px; border: 5px solid #0d6efd;">
                                        <i class="fa-solid fa-school fa-4x text-primary"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted fst-italic">Belum ada data ekstrakurikuler.</p>
            @endforelse
        </div>
    </div>


{{-- Section Pembina Ekskul --}}
<div class="mb-5 px-4" id="daftar-pembina-section">
    <h2 class="fw-bold section-title text-center display-5 mb-4">Daftar Pembina Ekskul</h2>
    <p class="text-center text-muted mb-5">Kenali para pembina yang akan membimbing perjalananmu</p>

    <div class="row g-5 justify-content-center">
        @forelse($pembina as $p)
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm rounded-4 h-100 border-0 d-flex flex-row align-items-center scroll-fade"
                     style="min-height: 250px;">

                    {{-- Konten teks di kiri --}}
                    <div class="card-body text-start px-4" style="flex: 1 1 65%;">
                        <h5 class="card-title fw-bold mb-3">{{ $p->nama_pembina }}</h5>
                        <div class="custom-badge mb-3">
                            <i class="fas fa-star me-1"></i>Pembina Ekskul
                        </div>


                        {{-- Deskripsi Pembina --}}
                        @if(!empty($p->deskripsi))
                            <p class="text-muted mt-3" style="font-size: 0.95rem;">{{ $p->deskripsi }}</p>
                        @endif
                    </div>

                    {{-- Foto di kanan --}}
                    <div style="flex: 0 0 35%; max-width: 35%; height: 250px; overflow: hidden; border-top-right-radius: 1rem; border-bottom-right-radius: 1rem; background-color: #f8f9fa;">
                        @if($p->foto_profil)
                            <img src="{{ asset('storage/' . $p->foto_profil) }}"
                                 alt="{{ $p->nama_pembina }}"
                                 style="height: 100%; width: 100%; object-fit: cover; border-top-right-radius: 1rem; border-bottom-right-radius: 1rem;">
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <i class="fa-solid fa-user-tie fa-6x text-primary"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted fst-italic">Belum ada data pembina.</p>
        @endforelse
    </div>
</div>


<style>
    .card.shadow-sm:hover {
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.25) !important;
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
</style>



   {{-- Bagian Daftar Anggota Ekskul Berdasarkan Generasi --}}
<div class="mb-5">
    <h2 class="fw-bold section-title text-center display-5 mb-4">Daftar Anggota Ekstrakurikuler</h2>
    <p class="text-center text-muted mb-5">Kenali rekan-rekan ekstrakurikulermu dari berbagai generasi</p>

    {{-- Filter Dropdown --}}
    <div class="text-center mb-4">
        <form method="GET" action="{{ url()->current() }}">
            <div class="d-inline-block">
                <select name="generasi" onchange="this.form.submit()" class="form-select">
                    <option value="">-- Semua Generasi --</option>
                    @foreach(($generasiList ?? collect([])) as $gen)
                        <option value="{{ $gen }}" {{ request('generasi') == $gen ? 'selected' : '' }}>
                            Generasi {{ $gen }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

   @php
    // Memastikan $anggota tidak null sebelum grouping
    $groupedAnggota = isset($anggota) ? $anggota->groupBy('generasi') : collect([]);

    // Mapping prioritas jabatan
    $prioritasJabatan = [
        'ketua' => 1,
        'wakil' => 2,
        'sekretaris' => 3,
        'bendahara' => 4,
        'anggota' => 5,
    ];
@endphp

@forelse (($groupedAnggota ?? collect([])) as $generasi => $items)
    @php
        // Urutkan berdasarkan prioritas jabatan
        $sortedItems = $items->sortBy(function($item) use ($prioritasJabatan) {
            $jabatan = strtolower($item->jabatan->nama_jabatan ?? 'anggota');
            return $prioritasJabatan[$jabatan] ?? 999; // jika jabatan tidak ditemukan, beri nilai besar
        });
    @endphp

    <div class="mb-4">
        <h3 class="text-center text-secondary fw-bold mb-3">Generasi {{ $generasi }}</h3>
        <div class="row g-4 justify-content-center">
            @foreach($sortedItems as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm rounded-4 border-0 h-100">
                        {{-- Foto Profil --}}
                        @if($item->foto_profil)
                            <img src="{{ asset('storage/' . $item->foto_profil) }}" alt="{{ $item->nama_anggota }}"
                                class="card-img-top rounded-top" style="height: 220px; object-fit: cover;">
                        @else
                            <div class="d-flex justify-content-center align-items-center bg-secondary text-white rounded-top" style="height: 220px;">
                                <i class="fa-solid fa-user fa-5x"></i>
                            </div>
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold mb-1" style="font-family: 'Poppins', sans-serif;">
                                {{ $item->nama_anggota }}
                            </h5>

                            <p class="mb-1">
                                <span class="badge bg-info text-dark fs-6 me-1">
                                    {{ $item->ekskul?->nama_ekskul ?? 'Ekskul tidak tersedia' }}
                                </span>
                                <span class="badge bg-primary text-white fs-6 text-capitalize">
                                    {{ $item->jabatan?->nama_jabatan ?? 'Anggota' }}
                                </span>
                            </p>

                            <p>
                                <span class="badge rounded-pill bg-{{ $item->status === 'aktif' ? 'success' : 'secondary' }} px-3 py-2 fs-6">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </p>

                            <small class="text-muted d-block">Jurusan: {{ $item->jurusan }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@empty
    <p class="text-center text-muted fst-italic">Belum ada data anggota untuk generasi ini.</p>
@endforelse




{{-- Section Kegiatan Ekskul --}}
<style>
    .card.shadow-sm:hover {
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.25) !important;
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    details summary {
        cursor: pointer;
        font-weight: 500;
        margin-top: 8px;
        list-style: none;
        color: inherit;
    }

    details[open] summary::after {
        content: " (sembunyikan)";
        font-weight: normal;
        font-size: 0.9em;
        color: #6c757d;
    }

    details:not([open]) summary::after {
        content: " (baca selengkapnya)";
        font-weight: normal;
        font-size: 0.9em;
        color: #6c757d;
    }
</style>

<div class="mb-5">
    <h2 class="fw-bold text-primary text-center display-5 mb-4">Daftar Kegiatan Ekskul</h2>
    <hr class="w-25 mx-auto border-3 border-primary mb-5">

    <div class="row g-4 justify-content-center">
        @forelse($kegiatan as $keg)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm rounded-4 h-100 border-0 scroll-fade">
                    {{-- Gambar --}}
                    <div class="card-img-hover">
                        @if($keg->foto)
                            <img src="{{ asset('storage/' . $keg->foto) }}"
                                class="card-img-top rounded-top"
                                alt="{{ $keg->nama_kegiatan }}"
                                style="height: 220px; object-fit: cover;">
                        @else
                            <div class="d-flex justify-content-center align-items-center bg-light rounded-top" style="height: 220px;">
                                <i class="fa-solid fa-calendar-days fa-5x text-secondary"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Konten --}}
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-3">{{ $keg->nama_kegiatan }}</h5>
                        <div class="custom-badge mb-3">
                            <i class="fas fa-calendar-check me-1"></i>Kegiatan
                        </div>

                        @php
                            $plainText = strip_tags($keg->deskripsi ?? 'Tidak ada deskripsi.');
                            // Ambil kalimat pertama
                            preg_match('/^.*?[.!?](\s|$)/', $plainText, $matches);
                            $firstSentence = $matches[0] ?? $plainText;
                            $remainingText = trim(str_replace($firstSentence, '', $plainText));
                        @endphp

                        @if($remainingText)
                            <p class="text-muted">{{ $firstSentence }}</p>
                            <details>
                                <summary class="text-muted">Lanjutkan membaca</summary>
                                <p class="mt-2 text-muted">{{ $remainingText }}</p>
                            </details>
                        @else
                            <p class="text-muted">{{ $plainText }}</p>
                        @endif

                        {{-- Tanggal --}}
                        <ul class="list-unstyled small text-muted mt-3 mb-0">
                            <li>
                                <i class="fa-regular fa-calendar me-2"></i>
                                <strong>Tanggal:</strong>
                                {{ $keg->tanggal ? \Carbon\Carbon::parse($keg->tanggal)->translatedFormat('d M Y') : '-' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted fst-italic">Belum ada data kegiatan.</p>
        @endforelse
    </div>
</div>

@endsection
