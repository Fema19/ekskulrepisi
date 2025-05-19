@extends('frontend.layouts.app')

@section('title', 'Daftar Anggota Ekskul')

@section('content')
<div class="container py-5">

    {{-- Hero Section --}}
    <div class="bg-light p-5 rounded-4 shadow mb-5 text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, #dcefff, #f0f9ff);">
        <h1 class="display-4 fw-bold text-primary mb-3">Selamat Datang di Halaman Ekstrakurikuler</h1>
        <p class="lead text-muted">Temukan informasi lengkap tentang ekstrakurikuler, anggota, dan kegiatan menarik di sekolah.</p>
        <i class="fa-solid fa-people-group fa-5x text-primary opacity-25 position-absolute top-50 start-50 translate-middle"></i>
    </div>

    {{-- Section Profil Ekskul --}}
    <div class="mb-5">
        <h2 class="fw-bold text-primary text-center display-5 mb-4">Profil Ekskul</h2>
        <hr class="w-25 mx-auto border-3 border-primary mb-5">
        <div class="row g-4 justify-content-center">
            @forelse($ekskul as $esk)
                <div class="col-md-5 col-lg-4">
                    <div class="card shadow rounded-4 h-100 border-0">
                        @if($esk->logo)
                            <div class="d-flex justify-content-center align-items-center p-4" style="height: 200px;">
                                <img src="{{ asset('storage/' . $esk->logo) }}" class="img-fluid" alt="{{ $esk->nama_ekskul }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center bg-light" style="height:200px;">
                                <i class="fa-solid fa-school fa-4x text-secondary"></i>
                            </div>
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title fw-semibold">{{ $esk->nama_ekskul }}</h5>
                            <p class="card-text text-muted text-truncate" style="max-height: 4.5em;">{{ $esk->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-primary">Ekskul</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted fst-italic">Belum ada data ekstrakurikuler.</p>
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
                            <ul class="list-unstyled small text-muted mt-3">
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

</div>
@endsection
