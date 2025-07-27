@extends('frontend.layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-3xl font-bold text-center mb-8">Sistem Informasi Ekstrakurikuler</h1>

        <!-- Ekstrakurikuler Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Daftar Ekstrakurikuler</h2>
            <div class="row">
                @foreach ($ekskul as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if($item->logo)
                                <img src="{{ asset('storage/' . $item->logo) }}" class="card-img-top" alt="{{ $item->nama_ekskul }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Pembina Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Pembina Ekstrakurikuler</h2>
            <div class="row">
                @foreach ($pembina as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if($item->foto_profil)
                                <img src="{{ asset('storage/' . $item->foto_profil) }}" class="card-img-top" alt="{{ $item->nama_pembina }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_pembina }}</h5>
                                <p class="card-text">Ekstrakurikuler: {{ $item->ekskul->nama_ekskul ?? '-' }}</p>
                                @if($item->deskripsi)
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Anggota Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Anggota Ekstrakurikuler</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>Nama Anggota</th>
                            <th>Ekstrakurikuler</th>
                            <th>Jabatan</th>
                            <th>Generasi</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $item)
                            <tr>

                                <td>{{ $item->nama_anggota }}</td>
                                <td>{{ $item->ekskul->nama_ekskul ?? '-' }}</td>
                                <td>{{ $item->jabatan->nama_jabatan ?? '-' }}</td>
                                <td>{{ $item->generasi }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Kegiatan Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Kegiatan Ekstrakurikuler</h2>
            <div class="row">
                @foreach ($kegiatan as $item)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_kegiatan }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_kegiatan }}</h5>
                                <p class="card-text"><strong>Ekstrakurikuler:</strong> {{ $item->ekskul->nama_ekskul ?? '-' }}</p>
                                <p class="card-text"><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
