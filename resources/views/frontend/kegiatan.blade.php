@extends('frontend.layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Kegiatan Ekstrakurikuler</h2>
        <div class="row">
            @foreach ($kegiatan as $item)
                <div class="col-md-6 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_kegiatan }}</h5>
                            <p class="card-text">Ekskul: {{ $item->ekskul->nama_ekskul ?? '-' }}</p>
                            <p class="card-text">Waktu: {{ $item->waktu_kegiatan }}</p>
                            <p class="card-text">Tempat: {{ $item->tempat_kegiatan }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
