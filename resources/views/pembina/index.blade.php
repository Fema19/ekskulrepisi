@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Pembina</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manajemen Pembina</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('pembina.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pembina</th>
                                <th>Ekskul</th>
                                <th>Foto Profil</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($pembina as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->nama_pembina }}</td>
                                    <td>{{ $item->ekskul->nama_ekskul ?? '-' }}</td>
                                    <td>
                                        @if ($item->foto_profil)
                                            <img src="{{ asset('storage/' . $item->foto_profil) }}" alt="Foto Profil" width="50" class="img-thumbnail">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->deskripsi ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('pembina.edit', $item->nip) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('pembina.destroy', $item->nip) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
