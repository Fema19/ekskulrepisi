@extends('layouts.app')
@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Ekskul</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manajemen Ekskul</h6>
            </div>
            <div class="card-body">
                <a class="btn btn-primary mb-3" href="{{ route('ekskul.create') }}">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ekskul</th>
                                <th>Deskripsi</th>
                                <th>Logo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($ekskul as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_ekskul }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>
                                        @if ($item->logo)
                                            <img src="{{ asset('storage/' . $item->logo) }}" width="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('ekskul.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('ekskul.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
