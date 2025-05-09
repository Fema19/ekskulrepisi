<!-- resources/views/pembina/create.blade.php -->
@extends('layouts.app')

@section('content')
    <form action="{{ route('pembina.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Pembina</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" name="nip" value="{{ old('nip') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pembina">Nama Pembina</label>
                            <input type="text" class="form-control" name="nama_pembina" value="{{ old('nama_pembina') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_ekskul">Ekskul</label>
                            <select class="form-control" name="id_ekskul" required>
                                <option value="">Pilih Ekskul</option>
                                @foreach ($ekskul as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_ekskul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto_profil">Foto Profil</label>
                            <input type="file" class="form-control" name="foto_profil">
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
