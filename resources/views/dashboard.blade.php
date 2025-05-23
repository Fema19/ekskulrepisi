@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="container-fluid py-4" style="background-color: #f8f9fa;">
            <!-- Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <h2 class="fw-bold display-5">👋 Yokoso!</h2>
                    <p class="text-muted mt-2">Selamat datang di sistem ekstrakurikuler</p>
                    <a href="{{ route('sesi.logout') }}" class="btn btn-outline-danger mt-2">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card border-0 shadow rounded-4 hover-card bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h5 class="fw-semibold mb-0">Total Anggota</h5>
                                    <h3 class="text-success mb-0">{{ $totalAnggota }}</h3>
                                </div>
                                <div class="icon-box bg-success-subtle rounded-3 p-3">
                                    <i class="bi bi-people display-6 text-success"></i>
                                </div>
                            </div>
                            <div id="anggotaChart" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow rounded-4 hover-card bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h5 class="fw-semibold mb-0">Pembina</h5>
                                    <h3 class="text-warning mb-0">{{ $totalPembina }}</h3>
                                </div>
                                <div class="icon-box bg-warning-subtle rounded-3 p-3">
                                    <i class="bi bi-person-badge display-6 text-warning"></i>
                                </div>
                            </div>
                            <div id="pembinaChart" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow rounded-4 hover-card bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h5 class="fw-semibold mb-0">Kegiatan</h5>
                                    <h3 class="text-primary mb-0">{{ $totalKegiatan }}</h3>
                                </div>
                                <div class="icon-box bg-primary-subtle rounded-3 p-3">
                                    <i class="bi bi-calendar-event display-6 text-primary"></i>
                                </div>
                            </div>
                            <div id="kegiatanChart" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ekskul Populer -->
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title fw-bold mb-0">
                                    <i class="bi bi-trophy-fill me-2 text-warning"></i>Ekskul & Daftar Anggota
                                </h5>
                                <div class="d-flex gap-2">
                                    <select class="form-select form-select-sm" id="generasiFilter">
                                        <option value="">Semua Generasi</option>
                                        @foreach($generasiList as $gen)
                                            <option value="{{ $gen }}">Generasi {{ $gen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if (!empty($ekskulDenganAnggota) && $ekskulDenganAnggota->isNotEmpty())
                                @foreach ($ekskulDenganAnggota as $item)
                                    @php
                                        $anggotaList = $item->anggota()->with(['jabatan'])->get();
                                        $groupedAnggota = $anggotaList->groupBy('generasi');
                                    @endphp

                                    <div class="ekskul-card border-0 rounded-4 p-4 shadow-sm mb-4 hover-card {{ $loop->first ? 'bg-gradient-primary text-white' : 'bg-light' }}">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <h5 class="mb-1 fw-bold d-flex align-items-center">
                                                    @if($loop->first)
                                                        <span class="badge bg-warning me-2">
                                                            <i class="bi bi-trophy-fill"></i>
                                                        </span>
                                                    @else
                                                        <span class="badge bg-primary me-2">
                                                            <i class="bi bi-star-fill"></i>
                                                        </span>
                                                    @endif
                                                    {{ $item->nama_ekskul }}
                                                </h5>
                                                <p class="mb-0 {{ $loop->first ? 'text-white-50' : 'text-muted' }}">
                                                    <i class="bi bi-people-fill me-1"></i>
                                                    <span class="badge {{ $loop->first ? 'bg-white text-primary' : 'bg-primary' }} rounded-pill">
                                                        {{ $anggotaList->count() }} Anggota
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="text-end">
                                                <button class="btn {{ $loop->first ? 'btn-light' : 'btn-primary' }} btn-sm rounded-3 shadow-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ekskulModal_{{ $item->id }}">
                                                    <i class="bi bi-eye me-1"></i>
                                                    Lihat Semua
                                                </button>
                                            </div>
                                        </div>

                                        <hr class="my-3 {{ $loop->first ? 'border-white opacity-25' : '' }}">

                                        <!-- Preview Anggota -->
                                        <div class="mt-3">
                                            @foreach($groupedAnggota->take(2) as $generasi => $anggotaPerGen)
                                                <div class="mb-4" data-generasi="{{ $generasi }}">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="generation-badge {{ $loop->parent->first ? 'bg-white text-primary' : 'bg-primary text-white' }} rounded-circle d-flex align-items-center justify-content-center me-2" 
                                                             style="width: 32px; height: 32px;">
                                                            <span class="fw-bold">{{ $generasi }}</span>
                                                        </div>
                                                        <h6 class="mb-0 {{ $loop->parent->first ? 'text-white-50' : 'text-muted' }}">
                                                            Generasi {{ $generasi }}
                                                        </h6>
                                                    </div>
                                                    <div class="row g-3">
                                                        @foreach($anggotaPerGen->take(4) as $anggota)
                                                            <div class="col-md-6">
                                                                <div class="d-flex align-items-center p-3 rounded-3 {{ $loop->parent->parent->first ? 'bg-white bg-opacity-10' : 'bg-white shadow-sm' }}">
                                                                    <div class="me-3">
                                                                        @if($anggota->foto_profil)
                                                                            <img src="{{ asset('storage/' . $anggota->foto_profil) }}"
                                                                                 class="rounded-circle border border-2 border-white shadow-sm"
                                                                                 style="width: 45px; height: 45px; object-fit: cover;"
                                                                                 alt="{{ $anggota->nama_anggota }}">
                                                                        @else
                                                                            <div class="rounded-circle {{ $loop->parent->parent->first ? 'bg-white text-primary' : 'bg-primary bg-opacity-10 text-primary' }} d-flex align-items-center justify-content-center border border-2 border-white shadow-sm"
                                                                                 style="width: 45px; height: 45px;">
                                                                                <i class="bi bi-person-fill"></i>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <h6 class="mb-1 {{ $loop->parent->parent->first ? 'text-white' : '' }}">
                                                                            {{ $anggota->nama_anggota }}
                                                                        </h6>
                                                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                                                            @if($anggota->jabatan)
                                                                                <span class="badge {{ $loop->parent->parent->first ? 'bg-white text-primary' : 'bg-info bg-opacity-10 text-info' }}">
                                                                                    <i class="bi bi-award me-1"></i>
                                                                                    {{ $anggota->jabatan->nama_jabatan }}
                                                                                </span>
                                                                            @endif
                                                                            <small class="{{ $loop->parent->parent->first ? 'text-white-50' : 'text-muted' }}">
                                                                                <i class="bi bi-person-badge me-1"></i>
                                                                                {{ $anggota->nim }}
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    @if($anggotaPerGen->count() > 4)
                                                        <div class="text-center mt-3">
                                                            <button class="btn {{ $loop->parent->first ? 'btn-light btn-sm' : 'btn-primary btn-sm' }} rounded-pill"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#ekskulModal_{{ $item->id }}">
                                                                <i class="bi bi-plus-circle me-1"></i>
                                                                Lihat {{ $anggotaPerGen->count() - 4 }} Anggota Lainnya
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Modal untuk detail anggota -->
                                    <div class="modal fade" id="ekskulModal_{{ $item->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header align-items-center">
                                                    <h5 class="modal-title">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-primary p-2 me-2">
                                                                <i class="bi bi-people-fill"></i>
                                                            </span>
                                                            {{ $item->nama_ekskul }}
                                                        </div>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach($groupedAnggota as $generasi => $anggotaPerGen)
                                                        <div class="generation-section mb-4" data-generasi="{{ $generasi }}">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="generation-badge bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" 
                                                                     style="width: 35px; height: 35px;">
                                                                    <span class="fw-bold">{{ $generasi }}</span>
                                                                </div>
                                                                <h6 class="fw-bold mb-0">
                                                                    Generasi {{ $generasi }}
                                                                    <span class="badge bg-primary bg-opacity-10 text-primary ms-2">
                                                                        {{ $anggotaPerGen->count() }} Anggota
                                                                    </span>
                                                                </h6>
                                                            </div>
                                                            <div class="row g-3">
                                                                @foreach($anggotaPerGen as $anggota)
                                                                    <div class="col-md-6">
                                                                        <div class="member-card p-3 rounded-3 bg-light border-start border-4 border-primary h-100">
                                                                            <div class="d-flex">
                                                                                <div class="me-3">
                                                                                    @if($anggota->foto_profil)
                                                                                        <img src="{{ asset('storage/' . $anggota->foto_profil) }}"
                                                                                             class="rounded-circle border border-2 border-white shadow-sm"
                                                                                             style="width: 50px; height: 50px; object-fit: cover;"
                                                                                             alt="{{ $anggota->nama_anggota }}">
                                                                                    @else
                                                                                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center border border-2 border-white shadow-sm"
                                                                                             style="width: 50px; height: 50px;">
                                                                                            <i class="bi bi-person-fill text-primary"></i>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="flex-grow-1">
                                                                                    <h6 class="fw-bold mb-1">{{ $anggota->nama_anggota }}</h6>
                                                                                    <div class="d-flex flex-wrap gap-2 align-items-center">
                                                                                        @if($anggota->jabatan)
                                                                                            <span class="badge bg-info bg-opacity-10 text-info">
                                                                                                <i class="bi bi-award me-1"></i>
                                                                                                {{ $anggota->jabatan->nama_jabatan }}
                                                                                            </span>
                                                                                        @endif
                                                                                        <small class="text-muted">
                                                                                            <i class="bi bi-person-badge me-1"></i>
                                                                                            {{ $anggota->nim }}
                                                                                        </small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center rounded-4">
                                    <i class="bi bi-info-circle me-2"></i>Tidak ada ekskul tersedia.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Access -->
            <div class="row mt-4 mb-5">
                <div class="col-md-12">
                    <h4 class="mb-4 fw-bold d-flex align-items-center">
                        <i class="bi bi-speedometer2 me-2 text-primary"></i> Akses Cepat
                    </h4>
                    <div class="row g-4">
                        <div class="col-md-3">
                            <a href="{{ route('jabatan.index') }}" class="card link-card text-decoration-none text-dark bg-light shadow-sm rounded-4 hover-scale">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-briefcase-fill display-5 text-primary"></i>
                                    <p class="mt-3 mb-0 fw-semibold">Jabatan</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('ekskul.index') }}" class="card link-card text-decoration-none text-dark bg-light shadow-sm rounded-4 hover-scale">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-lightbulb-fill display-5 text-success"></i>
                                    <p class="mt-3 mb-0 fw-semibold">Ekskul</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('kegiatan.index') }}" class="card link-card text-decoration-none text-dark bg-light shadow-sm rounded-4 hover-scale">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-calendar-check display-5 text-danger"></i>
                                    <p class="mt-3 mb-0 fw-semibold">Kegiatan</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('pembina.index') }}" class="card link-card text-decoration-none text-dark bg-light shadow-sm rounded-4 hover-scale">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-person-vcard display-5 text-info"></i>
                                    <p class="mt-3 mb-0 fw-semibold">Pembina</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="alert alert-danger text-center rounded-4 shadow-sm">
                <h5>🚫 Anda tidak memiliki akses ke halaman ini.</h5>
                <p>Silakan <a href="{{ route('login') }}" class="alert-link">login</a> terlebih dahulu.</p>
            </div>
        </div>
    @endif
@endsection

@section('styles')
<style>
    .hover-card {
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .hover-card:hover {
        transform: translateY(-5px);
    }

    .hover-scale {
        transition: transform 0.2s ease;
    }

    .hover-scale:hover {
        transform: scale(1.03);
    }

    .ekskul-card {
        transition: all 0.3s ease;
    }

    .ekskul-card:hover {
        transform: translateY(-5px);
    }

    .member-card {
        transition: all 0.2s ease;
    }

    .member-card:hover {
        transform: translateX(5px);
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .icon-box {
        transition: all 0.3s ease;
    }

    .card:hover .icon-box {
        transform: scale(1.1);
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const defaultChartOptions = {
        chart: {
            height: 100,
            type: 'area',
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.3,
                stops: [0, 90, 100]
            }
        },
        tooltip: {
            theme: 'dark',
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return seriesName + ": "
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    // Anggota Chart
    new ApexCharts(document.querySelector("#anggotaChart"), {
        ...defaultChartOptions,
        series: [{
            name: 'Total Anggota',
            data: @json($anggotaTrend)
        }],
        colors: ['#198754']
    }).render();

    // Pembina Chart
    new ApexCharts(document.querySelector("#pembinaChart"), {
        ...defaultChartOptions,
        series: [{
            name: 'Total Pembina',
            data: @json($pembinaTrend)
        }],
        colors: ['#ffc107']
    }).render();

    // Kegiatan Chart
    new ApexCharts(document.querySelector("#kegiatanChart"), {
        ...defaultChartOptions,
        series: [{
            name: 'Total Kegiatan',
            data: @json($kegiatanTrend)
        }],
        colors: ['#0d6efd']
    }).render();

    // Generasi Filter
    document.getElementById('generasiFilter').addEventListener('change', function() {
        const generasi = this.value;
        const ekskulCards = document.querySelectorAll('.ekskul-card');
        
        ekskulCards.forEach(card => {
            const anggotaDivs = card.querySelectorAll('[data-generasi]');
            if (anggotaDivs.length === 0) return;

            if (!generasi) {
                card.style.display = 'block';
                anggotaDivs.forEach(div => div.style.display = 'block');
            } else {
                const hasGenerasi = Array.from(anggotaDivs).some(div =>
                    div.getAttribute('data-generasi') === generasi
                );
                card.style.display = hasGenerasi ? 'block' : 'none';
                
                anggotaDivs.forEach(div => {
                    div.style.display = div.getAttribute('data-generasi') === generasi ? 'block' : 'none';
                });
            }
        });
    });
});
</script>
@endsection
