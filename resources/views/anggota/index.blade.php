    @extends('layouts.app')

    @section('content')
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manajemen Anggota</h6>
                    <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Anggota</th>
                                    <th>Ekskul</th>
                                    <th>Jabatan</th>
                                    <th>Generasi</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($anggota as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->nama_anggota }}</td>
                                        <td>{{ $item->ekskul?->nama_ekskul ?? '-' }}</td>
                                        <td>{{ $item->jabatan?->nama_jabatan ?? '-' }}</td>
                                        <td>{{ $item->generasi }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ ucfirst($item->status) }}</td>
                                        <td>
                                            <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
