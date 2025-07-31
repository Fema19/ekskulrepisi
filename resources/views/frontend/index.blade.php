@extends('frontend.layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="text-center my-5">
        <h1 class="fw-bold text-pink display-4" style="font-family: 'Pacifico', cursive;">
            Sistem Informasi Ekstrakurikuler
        </h1>
        <p class="text-muted fs-5">Temukan informasi lengkap tentang kegiatan ekskul, pembina, dan anggotanya.</p>
    </div>

    <section id="ekskuls" class="py-5">
        <div class="container">
            <h2 class="section-title mb-4">Ekstrakurikuler</h2>
            @include('frontend.sections.ekskul')
        </div>
    </section>

    <section id="pembina" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title mb-4">Pembina Ekstrakurikuler</h2>
            @include('frontend.sections.pembina')
        </div>
    </section>

    <section id="anggota" class="py-5">
        <div class="container">
            <h2 class="section-title mb-4">Anggota Ekstrakurikuler</h2>
            @include('frontend.sections.anggota')
        </div>
    </section>

    <section id="kegiatan" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title mb-4">Kegiatan Ekstrakurikuler</h2>
            @include('frontend.sections.kegiatan')
        </div>
    </section>
@endsection
