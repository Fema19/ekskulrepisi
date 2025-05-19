@extends('frontend.layouts.app')

@section('title', 'Daftar Anggota Ekskul')

{{-- Link Google Fonts Poppins --}}
@section('head')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
    /* Marquee Container */
    .marquee-container {
        overflow: hidden;
        white-space: nowrap;
        background-color: #e9f2ff;
        border-radius: 10px;
        padding: 10px 0;
        margin-bottom: 1.5rem;
    }

    /* Marquee Text */
    .marquee-text {
        display: inline-block;
        padding-left: 100%; /* Mulai dari luar kanan */
        animation: marquee 15s linear infinite;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #0d6efd;
        font-size: 1.25rem;
    }

    /* Keyframes untuk marquee */
    @keyframes marquee {
        0%   { transform: translateX(100%); }  /* Mulai dari luar kanan */
        100% { transform: translateX(-100%); } /* Pergi ke kiri luar */
    }

    /* Efek hover untuk card Profil Ekskul */
    .card.shadow-sm:hover {
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.25) !important; /* shadow warna biru lembut */
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    /* Padding kiri kanan agar tidak terlalu mepet di layar besar */
    .wide-container {
        padding-left: 3rem;
        padding-right: 3rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid wide-container py-5">



    {{-- Hero Section --}}
    <div class="bg-light p-5 rounded-4 shadow mb-5 text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, #dcefff, #f0f9ff);">

        {{-- Logo Sekolah (TIDAK Bergerak) + Judul --}}
        <div class="d-flex align-items-center justify-content-center mb-3 flex-wrap">
            <img src="{{ asset('storage/logo-sekolah.png') }}" alt="Logo Sekolah" style="height: 60px; width: auto; margin-right: 15px;">
            <h1 class="display-4 fw-bold text-primary mb-0">Selamat Datang di Halaman Ekstrakurikuler</h1>
        </div>


    </div>

    {{-- Section Profil Ekskul --}}
    <div class="mb-5">
        <h2 class="fw-bold text-primary text-center display-5 mb-4">Profil Ekskul</h2>
        <hr class="w-25 mx-auto border-3 border-primary mb-5">

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
<div class="mb-5 px-4">
    <h2 class="fw-bold text-primary text-center display-5 mb-4">Daftar Pembina Ekskul</h2>
    <hr class="w-25 mx-auto border-3 border-primary mb-5">

    <div class="row g-5 justify-content-center"> {{-- justify-content-center untuk tengah --}}
        @forelse($pembina as $p)
            <div class="col-12 col-md-10 col-lg-8"> {{-- lebar card diatur agar tidak terlalu lebar --}}
                <div class="card shadow-sm rounded-4 h-100 border-0 d-flex flex-row align-items-center"
                     style="transition: box-shadow 0.3s ease, transform 0.3s ease; min-height: 250px;">

                    {{-- Konten teks di kiri --}}
                    <div class="card-body text-start px-4" style="flex: 1 1 65%;">
                        <h5 class="card-title fw-bold">{{ $p->nama_pembina }}</h5>
                        <p class="card-text mb-2"><strong>Ekskul:</strong> {{ $p->ekskul?->nama_ekskul ?? '-' }}</p>
                      
                    </div>

                    {{-- Foto di kanan dengan ruang kosong --}}
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



    {{-- Bagian Daftar Anggota Ekskul Minimalis --}}
<div class="mb-5">
    <h2 class="fw-bold text-primary text-center display-5 mb-4">Daftar Anggota Ekstrakurikuler</h2>
    <hr class="w-25 mx-auto border-3 border-primary mb-4">

    @if($anggota->isEmpty())
        <p class="text-center text-muted fst-italic">Belum ada data anggota.</p>
    @else
        <div class="row g-4 justify-content-center">
            @foreach($anggota as $item)
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
                            {{-- Nama Anggota --}}
                            <h5 class="card-title fw-bold mb-1" style="font-family: 'Poppins', sans-serif;">{{ $item->nama_anggota }}</h5>

                            {{-- Ekskul & Jabatan --}}
                            <p class="mb-1">
                                <span class="badge bg-info text-dark fs-6 me-1">
                                    {{ $item->ekskul?->nama_ekskul ?? 'Ekskul tidak tersedia' }}
                                </span>
                                <span class="badge bg-primary text-white fs-6 text-capitalize">
                                    {{ $item->jabatan?->nama_jabatan ?? 'Anggota' }}
                                </span>
                            </p>

                            {{-- Status --}}
                            <p>
                                <span class="badge rounded-pill bg-{{ $item->status === 'aktif' ? 'success' : 'secondary' }} px-3 py-2 fs-6">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </p>

                            {{-- Info tambahan --}}
                            <small class="text-muted d-block">Generasi: {{ $item->generasi }}</small>
                            <small class="text-muted d-block">Jurusan: {{ $item->jurusan }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- Section Kegiatan Ekskul --}}
<div class="mb-5">
    <h2 class="fw-bold text-primary text-center display-5 mb-4">Daftar Kegiatan Ekskul</h2>
    <hr class="w-25 mx-auto border-3 border-primary mb-5">

    <div class="row g-4 justify-content-center">
        @forelse($kegiatan as $keg)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow rounded-4 h-100 border-0">
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

                    <div class="card-body">
                        <h5 class="card-title fw-semibold">{{ $keg->nama_kegiatan }}</h5>
                        <p class="card-text text-muted" style="max-height: 5.5em; overflow: hidden;">
                            {{ $keg->deskripsi ?? 'Tidak ada deskripsi.' }}
                        </p>

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

