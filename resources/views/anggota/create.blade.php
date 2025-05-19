@extends('layouts.app')

@section('content')
    <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Anggota</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" name="nisn" value="{{ old('nisn') }}" required>
                            @error('nisn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_anggota" value="{{ old('nama_anggota') }}" required>
                            @error('nama_anggota')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_ekskul">Ekskul</label>
                            <select class="form-control" name="id_ekskul" required>
                                <option value="">Pilih Ekskul</option>
                                @foreach ($ekskul as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_ekskul }}</option>
                                @endforeach
                            </select>
                            @error('id_ekskul')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_jabatan">Jabatan</label>
                            <select class="form-control" name="id_jabatan" required>
                                <option value="">Pilih Jabatan</option>
                                @foreach ($jabatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                                @endforeach
                            </select>
                            @error('id_jabatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="generasi">Generasi</label>
                            <input type="text" class="form-control" name="generasi" value="{{ old('generasi') }}" required>
                            @error('generasi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}" required>
                            @error('jurusan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto_profil">Foto Profil</label>
                            <input type="file" class="form-control-file" name="foto_profil" accept="image/*">
                            @error('foto_profil')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
