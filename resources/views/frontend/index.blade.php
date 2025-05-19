@extends('frontend.layouts.app')

@section('title', 'Daftar Anggota Ekskul')

{{-- Link Google Fonts Poppins --}}
@section('head')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
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

    /* Jika ingin container max-width lebih besar, bisa custom: */
    /*
    @media (min-width: 1200px) {
        .container-custom {
            max-width: 1400px;
        }
    }
    */
</style>
@endsection

@section('content')
<div class="container-fluid wide-container py-5">

    {{-- Hero Section --}}
    <div class="bg-light p-5 rounded-4 shadow mb-5 text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, #dcefff, #f0f9ff);">

        {{-- Logo Sekolah + Judul --}}
        <div class="d-flex align-items-center justify-content-center mb-3 flex-wrap">
            <img src="{{ asset('storage/logo-sekolah.png') }}" alt="Logo Sekolah" style="height: 60px; width: auto; margin-right: 15px;">
            <h1 class="display-4 fw-bold text-primary mb-0">Selamat Datang di Halaman Ekstrakurikuler</h1>
        </div>

        <p class="lead text-muted">Temukan informasi lengkap tentang ekstrakurikuler, anggota, dan kegiatan menarik di sekolah.</p>

    </div>

    {{-- Section Profil Ekskul --}}
    <div class="mb-5">
        <h2 class="fw-bold text-primary text-center display-5 mb-4">Profil Ekskul</h2>
        <hr class="w-25 mx-auto border-3 border-primary mb-5">

        <div class="row justify-content-center gy-5">
            @forelse($ekskul as $esk)
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card shadow-sm rounded-4 border-0 p-4" style="transition: box-shadow 0.3s ease;">
                        <div class="row g-0 align-items-center">
                            {{-- Deskripsi Ekskul --}}
                            <div class="col-12 col-md-8 pe-md-5" style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; color: #333; line-height: 1.7;">
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
<div class="mb-5">
    <h2 class="fw-bold text-primary text-center display-5 mb-4">Daftar Pembina Ekskul</h2>
    <hr class="w-25 mx-auto border-3 border-primary mb-5">

    <div class="row g-4 justify-content-center">
        @forelse($pembina as $p)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm rounded-4 h-100 border-0">
                    @if($p->foto_profil)
                        <img src="{{ asset('storage/' . $p->foto_profil) }}" class="card-img-top rounded-top" alt="{{ $p->nama_pembina }}" style="height: 250px; object-fit: cover;">
                    @else
                        <div class="d-flex justify-content-center align-items-center bg-light rounded-top" style="height: 250px;">
                            <i class="fa-solid fa-user-tie fa-5x text-primary"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $p->nama_pembina }}</h5>
                        <p class="card-text mb-1"><strong>Ekskul:</strong> {{ $p->ekskul?->nama_ekskul ?? '-' }}</p>
                        <p class="text-muted small mb-0"><strong>NIP:</strong> {{ $p->nip }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted fst-italic">Belum ada data pembina.</p>
        @endforelse
    </div>
</div>


    {{-- Judul Daftar Anggota --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary display-4">Daftar Anggota Ekstrakurikuler</h1>
        <p class="text-muted fs-5">Menampilkan seluruh anggota dari berbagai ekstrakurikuler dan jabatannya</p>
        <hr class="w-25 mx-auto border-3 border-primary">
    </div>

    {{-- Tabel Daftar Anggota --}}
    <div class="table-responsive shadow-sm rounded-4 bg-white p-4 mb-5">
        <table class="table table-bordered table-hover align-middle text-center mb-0">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Ekskul</th>
                    <th>Jabatan</th>
                    <th>Generasi</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anggota as $index => $item)
                    <tr>
                        <td class="fw-semibold">{{ $index + 1 }}</td>
                        <td>
                            <div class="mx-auto" style="width: 60px; height: 60px;">
                                @if($item->foto_profil)
                                    <img src="{{ asset('storage/' . $item->foto_profil) }}" class="img-fluid rounded-circle shadow border border-3 border-primary" style="width: 60px; height: 60px; object-fit: cover;" alt="Foto Profil">
                                @else
                                    <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary text-white shadow" style="width:60px; height:60px;">
                                        <i class="fa-solid fa-user fa-lg"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="fw-semibold text-start">{{ $item->nama_anggota }}</td>
                        <td>
                            <span class="badge rounded-pill bg-info text-dark px-3 py-2 fs-6">{{ $item->ekskul?->nama_ekskul ?? '-' }}</span>
                        </td>
                        <td class="text-capitalize">{{ $item->jabatan?->nama_jabatan ?? '-' }}</td>
                        <td>{{ $item->generasi }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>
                            <span class="badge rounded-pill bg-{{ $item->status === 'aktif' ? 'success' : 'secondary' }} px-3 py-2 fs-6">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted fst-italic">Belum ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
                            <img src="{{ asset('storage/' . $keg->foto) }}" class="card-img-top rounded-top" alt="{{ $keg->nama_kegiatan }}" style="height:220px; object-fit: cover;">
                        @else
                            <div class="d-flex justify-content-center align-items-center bg-light rounded-top" style="height:220px;">
                                <i class="fa-solid fa-calendar-days fa-5x text-secondary"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $keg->nama_kegiatan }}</h5>
                            <p class="card-text text-muted" style="max-height: 5.5em; overflow: hidden;">{{ $keg->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                            <ul class="list-unstyled small text-mutedmt-3">
<li><i class="fa-regular fa-calendar me-2"></i><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($keg->tanggal)->translatedFormat('d M Y') }}</li>
<li><i class="fa-solid fa-school me-2"></i><strong>Ekskul:</strong> {{ $keg->ekskul?->nama_ekskul ?? '-' }}</li>
</ul>
</div>
</div>
</div>
@empty
<p class="text-center text-muted fst-italic">Belum ada data kegiatan.</p>
@endforelse
</div>
</div>

</div> @endsection
