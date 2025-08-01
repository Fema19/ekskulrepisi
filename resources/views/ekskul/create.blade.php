@extends('layouts.app')
@section('content')
    <form action="{{ route('ekskul.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Tambah Ekskul</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Ekskul</label>
                            <input type="text" class="form-control" name="nama_ekskul" value="{{ old('nama_ekskul') }}">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Tahun Dibentuk</label>
                            <input type="number" class="form-control" name="tahun_dibentuk" value="{{ old('tahun_dibentuk') }}" placeholder="Contoh: 2020">
                        </div>

                        <div class="form-group">
                            <label>Visi</label>
                            <textarea class="form-control" name="visi" rows="2">{{ old('visi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Misi</label>
                            <textarea class="form-control" name="misi" rows="3">{{ old('misi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Logo (opsional)</label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
