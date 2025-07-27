@extends('frontend.layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Anggota Ekstrakurikuler</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Ekskul</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->ekskul->nama_ekskul ?? '-' }}</td>
                            <td>{{ $item->jabatan->nama_jabatan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
