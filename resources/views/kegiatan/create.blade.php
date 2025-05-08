@extends('layouts.app')

@section('content')
<form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>Formulir Tambah Kegiatan</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}">
                @error('nama_kegiatan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}">
                @error('tanggal')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Foto Dokumentasi</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                @error('foto')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
@endsection
