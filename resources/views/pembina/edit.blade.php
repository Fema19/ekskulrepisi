<!-- resources/views/pembina/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <form action="{{ route('pembina.update', $pembina->nip) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Pembina</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" name="nip" value="{{ $pembina->nip }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_pembina">Nama Pembina</label>
                            <input type="text" class="form-control" name="nama_pembina" value="{{ old('nama_pembina', $pembina->nama_pembina) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_ekskul">Ekskul</label>
                            <select class="form-control" name="id_ekskul" required>
                                <option value="">Pilih Ekskul</option>
                                @foreach ($ekskul as $item)
                                    <option value="{{ $item->id }}" {{ $pembina->id_ekskul == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_ekskul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Foto Profil Saat Ini</label><br>
                            @if ($pembina->foto_profil)
                                <img src="{{ asset('storage/' . $pembina->foto_profil) }}" alt="Foto Profil" width="100" class="img-thumbnail">
                            @else
                                <p class="text-muted">Tidak ada foto profil.</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="foto_profil">Unggah Foto Profil Baru</label>
                            <input type="file" class="form-control" name="foto_profil">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4">{{ old('deskripsi', $pembina->deskripsi) }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pembina.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
