@extends('layouts.app')
@section('content')
    <form action="{{ route('ekskul.update', $ekskul->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit Ekskul</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Ekskul</label>
                            <input type="text" class="form-control" name="nama_ekskul" value="{{ $ekskul->nama_ekskul }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi">{{ $ekskul->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Logo (biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" class="form-control" name="logo">
                            @if($ekskul->logo)
                                <p>Logo sekarang: <img src="{{ asset('storage/' . $ekskul->logo) }}" width="100"></p>
                            @endif
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
