@extends('frontend.layouts.app')

@section('title', 'Daftar Anggota Ekskul')

@section('content')
<div class="container py-5">

    {{-- Dark Mode Toggle --}}
    <div class="text-end mb-4">
        <button id="toggle-theme" class="btn btn-outline-dark btn-sm">
            <i class="fa-solid fa-moon me-2"></i><span>Dark Mode</span>
        </button>
    </div>

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary display-4 theme-text-primary">Daftar Anggota Ekstrakurikuler</h1>
        <p class="text-muted fs-5 theme-text-muted">Menampilkan seluruh anggota dari berbagai ekstrakurikuler dan jabatannya</p>
        <hr class="w-25 mx-auto border-3 border-primary theme-border-primary">
    </div>

    {{-- Tabel Daftar Anggota --}}
    <div class="table-responsive shadow-sm rounded-4 bg-white p-4 mb-5 theme-bg">
        <table class="table table-bordered align-middle mb-0 table-hover text-center theme-table">
            <thead class="table-primary theme-table-header">
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
                            <div class="profile-img-wrapper mx-auto" style="width: 60px; height: 60px;">
                                @if($item->foto_profil)
                                    <img src="{{ asset('storage/' . $item->foto_profil) }}" class="img-fluid rounded-circle shadow border border-3 border-primary profile-img" alt="Foto Profil">
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

    {{-- Section Info Ekskul --}}
    <div class="mb-5">
        <h2 class="fw-bold text-primary mb-4 text-center display-5 theme-text-primary">Profil Ekskul</h2>
        <hr class="w-25 mx-auto border-3 border-primary mb-5 theme-border-primary">
        <div class="row g-4 justify-content-center">
            @forelse($ekskul as $esk)
                <div class="col-md-5 col-lg-4">
                    <div class="card shadow rounded-4 h-100 border-0 hover-shadow transition position-relative theme-card">
                        @if($esk->logo)
                            <img src="{{ asset('storage/' . $esk->logo) }}" class="card-img-top p-4" alt="{{ $esk->nama_ekskul }}" style="height:180px; object-fit: contain;">
                        @else
                            <div class="d-flex justify-content-center align-items-center bg-light" style="height:180px;">
                                <i class="fa-solid fa-school fa-4x text-secondary"></i>
                            </div>
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title fw-semibold">{{ $esk->nama_ekskul }}</h5>
                            <p class="card-text text-muted text-truncate" style="max-height: 4.5em;">{{ $esk->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-primary text-white">Ekskul</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted fst-italic">Belum ada data ekstrakurikuler.</p>
            @endforelse
        </div>
    </div>

    {{-- Section Kegiatan --}}
    <div class="mb-5">
        <h2 class="fw-bold text-primary mb-4 text-center display-5 theme-text-primary">Daftar Kegiatan Ekskul</h2>
        <hr class="w-25 mx-auto border-3 border-primary mb-5 theme-border-primary">
        <div class="row g-4 justify-content-center">
            @forelse($kegiatan as $keg)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow rounded-4 h-100 border-0 hover-shadow transition theme-card">
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

{{-- CSS untuk Dark Mode --}}
<style>
    .hover-shadow:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 123, 255, 0.25);
        transform: translateY(-6px);
        transition: 0.3s ease-in-out;
    }
    .transition {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .profile-img-wrapper {
        overflow: hidden;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.4);
    }
    .profile-img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    body.dark-mode {
        background-color: #121212;
        color: #e0e0e0;
    }
    .dark-mode .theme-bg {
        background-color: #1e1e1e !important;
    }
    .dark-mode .theme-card {
        background-color: #1e1e1e;
        color: #ccc;
    }
    .dark-mode .theme-text-muted {
        color: #aaa !important;
    }
    .dark-mode .theme-text-primary {
        color: #90caf9 !important;
    }
    .dark-mode .theme-border-primary {
        border-color: #90caf9 !important;
    }
    .dark-mode .theme-table {
        color: #e0e0e0;
    }
    .dark-mode .theme-table-header {
        background-color: #2c2c2c;
        color: #fff;
    }
    .dark-mode .btn-outline-dark {
        border-color: #fff;
        color: #fff;
    }
    .dark-mode .btn-outline-dark:hover {
        background-color: #333;
    }
</style>

{{-- Script Dark Mode --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(el => new bootstrap.Tooltip(el));

        const themeToggle = document.getElementById('toggle-theme');
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const icon = themeToggle.querySelector('i');
            const label = themeToggle.querySelector('span');
            if (document.body.classList.contains('dark-mode')) {
                icon.classList.replace('fa-moon', 'fa-sun');
                label.textContent = 'Light Mode';
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
                label.textContent = 'Dark Mode';
            }
        });
    });
</script>
@endsection
