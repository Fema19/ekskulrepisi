@extends('frontend.layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="container py-4">
        <h1 class="text-3xl font-bold text-center mb-5">Sistem Informasi Ekstrakurikuler</h1>

        @include('frontend.sections.ekskul')
        @include('frontend.sections.pembina')
        @include('frontend.sections.anggota')
        @include('frontend.sections.kegiatan')
    </div>
@endsection
