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
                {{-- Ekskul wrapper --}}
                <div class="ekskul-wrapper" data-ekskul-id="{{ $esk->id }}">
                    {{-- Ekskul Card --}}
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="card shadow-sm rounded-4 border-0 p-4 ekskul-card"
                             onclick="openEkskulModal('ekskulModal_{{ $esk->id }}')"
                             style="cursor: pointer; background-color: transparent; transition: all 0.3s ease;">
                            <div class="row g-0 align-items-center">
                                {{-- Deskripsi Ekskul --}}
                                <div class="col-12 col-md-8 pe-md-5" style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; color: var(--text-color); line-height: 1.7;">
                                    <h3 class="fw-bold text-primary mb-3">{{ $esk->nama_ekskul }}</h3>
                                    <p class="mb-0 description-preview">
                                        {{ \Str::limit($esk->deskripsi ?? 'Deskripsi ekstrakurikuler belum tersedia.', 150) }}
                                        @if(strlen($esk->deskripsi) > 150)
                                            <span class="text-primary read-more">Baca selengkapnya...</span>
                                        @endif
                                    </p>
                                </div>

                                {{-- Logo Ekskul --}}
                                <div class="col-12 col-md-4 d-flex justify-content-center mt-4 mt-md-0">
                                    @if($esk->logo)
                                        <div class="logo-wrapper">
                                            <img src="{{ asset('storage/' . $esk->logo) }}"
                                                 alt="{{ $esk->nama_ekskul }}"
                                                 class="img-fluid rounded-circle shadow ekskul-logo"
                                                 style="width: 180px; height: 180px; object-fit: cover; border: 5px solid var(--primary-color);">
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center bg-light rounded-circle shadow"
                                             style="width: 180px; height: 180px; border: 5px solid var(--primary-color);">
                                            <i class="fa-solid fa-school fa-4x text-primary"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal for this Ekskul --}}
                    <div class="modal fade" id="ekskulModal_{{ $esk->id }}" tabindex="-1" aria-labelledby="ekskulModalLabel_{{ $esk->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ekskulModalLabel_{{ $esk->id }}">{{ $esk->nama_ekskul }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        @if($esk->logo)
                                            <img src="{{ asset('storage/' . $esk->logo) }}"
                                                 alt="{{ $esk->nama_ekskul }}"
                                                 class="img-fluid rounded-circle shadow-sm mb-3"
                                                 style="max-width: 200px; max-height: 200px; object-fit: cover; border: 5px solid var(--primary-color);">
                                        @else
                                            <div class="d-flex justify-content-center align-items-center bg-light rounded-circle mx-auto mb-3"
                                                 style="width: 200px; height: 200px; border: 5px solid var(--primary-color);">
                                                <i class="fa-solid fa-school fa-5x text-primary"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="description-content" style="font-size: 1.1rem; line-height: 1.7;">
                                        {{ $esk->deskripsi ?? 'Deskripsi ekstrakurikuler belum tersedia.' }}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
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

    <div class="row g-4 justify-content-center">
        @forelse($pembina as $p)
            <div class="col-md-6 col-lg-4">
                <div class="card pembina-card shadow-sm border-0" 
                     onclick="openPembinaModal('pembinaModal_{{ $p->nip }}')"
                     style="cursor: pointer;">
                    {{-- Foto Pembina --}}
                    <div class="pembina-image">
                        @if($p->foto_profil)
                            <img src="{{ asset('storage/' . $p->foto_profil) }}" 
                                 alt="Foto {{ $p->nama_pembina }}"
                                 loading="lazy">
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100 bg-light">
                                <i class="fas fa-user-tie fa-4x text-secondary"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Informasi Pembina --}}
                    <div class="pembina-info text-center">
                        <h4 class="pembina-name">{{ $p->nama_pembina }}</h4>
                        <div class="pembina-badge">
                            <i class="fas fa-star me-2"></i>
                            Pembina {{ $p->ekskul->nama_ekskul ?? 'Ekskul' }}
                        </div>
                        <p class="pembina-description mb-0">
                            {{ \Str::limit($p->deskripsi ?? 'Deskripsi pembina belum tersedia.', 100) }}
                            @if(strlen($p->deskripsi ?? '') > 100)
                                <span class="text-primary read-more">Baca selengkapnya...</span>
                            @endif
                        </p>
                    </div>
                </div>

                {{-- Modal Pembina --}}
                <div class="modal fade" id="pembinaModal_{{ $p->nip }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">{{ $p->nama_pembina }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="modal-image h-100">
                                            @if($p->foto_profil)
                                                <img src="{{ asset('storage/' . $p->foto_profil) }}" 
                                                     alt="Foto {{ $p->nama_pembina }}"
                                                     class="w-100 h-100"
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="d-flex justify-content-center align-items-center h-100 bg-light">
                                                    <i class="fas fa-user-tie fa-5x text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="p-4">
                                            <div class="pembina-badge mb-4">
                                                <i class="fas fa-star me-2"></i>
                                                Pembina {{ $p->ekskul->nama_ekskul ?? 'Ekskul' }}
                                            </div>
                                            <div class="pembina-description">
                                                {{ $p->deskripsi ?? 'Deskripsi pembina belum tersedia.' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada data pembina.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>

<style>
    .pembina-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
        background: var(--card-bg);
        position: relative;
    }

    .pembina-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        opacity: 0;
        z-index: -1;
        transition: opacity 0.4s ease;
        border-radius: 1rem;
    }

    .pembina-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 30px rgba(var(--primary-color-rgb), 0.15) !important;
    }

    .pembina-card:hover::before {
        opacity: 0.1;
    }

    .pembina-image {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
        height: 280px;
    }

    .pembina-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .pembina-card:hover .pembina-image img {
        transform: scale(1.1);
    }

    .pembina-info {
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .pembina-name {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-color);
    }

    .pembina-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(var(--primary-color-rgb), 0.2);
    }

    .pembina-description {
        color: var(--text-muted);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Modal improvements */
    .modal.fade .modal-dialog {
        transform: scale(0.7);
        transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        opacity: 0;
    }

    .modal.show .modal-dialog {
        transform: scale(1);
        opacity: 1;
    }

    .modal-content {
        border: none;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        padding: 1.5rem;
    }

    .modal-header .btn-close {
        color: white;
        opacity: 0.8;
        transition: opacity 0.2s ease;
    }

    .modal-header .btn-close:hover {
        opacity: 1;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Store modal instances
    let modalInstances = new Map();

    // Initialize all modals
    document.querySelectorAll('.modal').forEach(modalElement => {
        const modal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',  // Prevent closing when clicking outside
            keyboard: false      // Prevent closing with ESC key
        });
        modalInstances.set(modalElement.id, modal);

        // Close button handler
        modalElement.querySelectorAll('[data-bs-dismiss="modal"]').forEach(closeBtn => {
            closeBtn.addEventListener('click', function() {
                modal.hide();
                cleanupModals();
            });
        });
    });

    // Clean up function for modals
    function cleanupModals() {
        const modalBackdrops = document.querySelectorAll('.modal-backdrop');
        modalBackdrops.forEach(backdrop => backdrop.remove());
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    }

    // Modal open functions
    window.openEkskulModal = function(modalId) {
        cleanupModals();
        const modalInstance = modalInstances.get(modalId);
        if (modalInstance) {
            modalInstance.show();
        }
    };

    window.openPembinaModal = function(modalId) {
        cleanupModals();
        const modalInstance = modalInstances.get(modalId);
        if (modalInstance) {
            modalInstance.show();
        }
    };
});
</script>

   {{-- Bagian Daftar Anggota Ekskul Berdasarkan Generasi --}}
<div class="mb-5" id="anggota-section">
    <h2 class="fw-bold section-title text-center display-5 mb-4">Daftar Anggota Ekstrakurikuler</h2>
    <p class="text-center text-muted mb-5">Kenali rekan-rekan ekstrakurikulermu dari berbagai generasi</p>

    {{-- Filter Dropdown with improved styling --}}
    <div class="text-center mb-4">
        <form method="GET" action="{{ url()->current() }}" class="generation-filter">
            <div class="d-inline-block position-relative">
                <select name="generasi" onchange="this.form.submit()" class="form-select custom-select">
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

    <style>
        .generation-filter .custom-select {
            background-color: var(--card-bg);
            border: 2px solid var(--primary-color);
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            min-width: 200px;
        }

        .generation-filter .custom-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(253, 13, 13, 0.25);
        }

        .member-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
        }

        .member-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
            border-radius: 1rem;
        }

        .member-card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .member-card:hover::after {
            opacity: 0.1;
        }

        .member-card .card-img-wrapper {
            overflow: hidden;
            border-radius: 1rem 1rem 0 0;
            position: relative;
        }

        .member-card .card-img-wrapper img,
        .member-card .card-img-wrapper .placeholder {
            transition: transform 0.5s ease;
        }

        .member-card:hover .card-img-wrapper img,
        .member-card:hover .card-img-wrapper .placeholder {
            transform: scale(1.1);
        }

        .member-info {
            padding: 1.25rem;
            text-align: center;
        }

        .member-name {
            color: var(--text-color);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .member-role {
            font-size: 0.9rem;
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .status-badge {
            padding: 0.35rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 0.5rem;
            color: white;
        }

        .status-badge i {
            font-size: 0.75rem;
        }

        .member-department {
            margin-top: 0.75rem;
            font-size: 0.9rem;
            color: var(--text-color);
            opacity: 0.7;
        }

        .generation-number {
            display: inline-block;
            position: relative;
            padding: 0.5rem 2rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 25px;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(253, 13, 13, 0.2);
        }

        .empty-state {
            padding: 3rem;
            background: var(--card-bg);
            border-radius: 1rem;
            text-align: center;
        }
    </style>

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

    @forelse ($groupedAnggota as $generasi => $items)
        @php
            $sortedItems = $items->sortBy(function($item) use ($prioritasJabatan) {
                $jabatan = strtolower($item->jabatan->nama_jabatan ?? 'anggota');
                return $prioritasJabatan[$jabatan] ?? 999;
            });
        @endphp

        <div class="mb-4">
            <h3 class="text-center text-secondary fw-bold mb-4">
                <span class="generation-number">Generasi {{ $generasi }}</span>
            </h3>
            <div class="row g-4 justify-content-center">
                @foreach($sortedItems as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card member-card border-0 h-100">
                            <div class="card-img-wrapper">
                                @if($item->foto_profil)
                                    <img src="{{ asset('storage/' . $item->foto_profil) }}"
                                         alt="{{ $item->nama_anggota }}"
                                         class="w-100"
                                         style="height: 250px; object-fit: cover;">
                                @else
                                    <div class="placeholder d-flex justify-content-center align-items-center bg-light"
                                         style="height: 250px;">
                                        <i class="fa-solid fa-user fa-3x text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="member-info">
                                <h5 class="member-name">{{ $item->nama_anggota }}</h5>
                                <div class="member-role">
                                    <i class="fas fa-user-tag me-1"></i>
                                    {{ $item->jabatan->nama_jabatan ?? 'Anggota' }}
                                </div>
                                <div class="status-badge bg-{{ $item->status === 'aktif' ? 'success' : 'secondary' }}">
                                    <i class="fas fa-{{ $item->status === 'aktif' ? 'circle-check' : 'circle-minus' }}"></i>
                                    {{ ucfirst($item->status) }}
                                </div>
                                <div class="member-department">
                                    <i class="fas fa-graduation-cap me-1"></i>
                                    {{ $item->jurusan }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada data anggota untuk generasi ini.</p>
            </div>
        </div>
    @endforelse
</div>


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

<div class="mb-5" id="daftar-kegiatan-section">
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
