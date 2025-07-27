@extends('frontend.layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Ekstrakurikuler</h2>
        <div class="row">
            @foreach ($ekskul as $item)
                <div class="col-md-6 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            @if ($item->logo)
                                <img src="{{ asset('storage/' . $item->logo) }}" class="img-fluid" alt="Logo {{ $item->nama_ekskul }}">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
