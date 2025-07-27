@extends('frontend.layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Pembina Ekstrakurikuler</h2>
        <div class="row">
            @foreach ($pembina as $item)
                <div class="col-md-6 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">Dari Ekskul: {{ $item->ekskul->nama_ekskul ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
