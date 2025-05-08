@extends('layouts.app')

@section('content')
<form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>Formulir Edit Kegiatan</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}">
                @error('nama_kegiatan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal) }}">
                @error('tanggal')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Foto Dokumentasi (kosongkan jika tidak diganti)</label>
                <input type="file" class="form-control" name="foto">
                @if($kegiatan->foto)
                    <p><img src="{{ asset('storage/' . $kegiatan->foto) }}" width="100" alt="Foto Kegiatan"></p>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
@endsection
