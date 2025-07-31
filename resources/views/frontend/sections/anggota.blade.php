<section id="anggota" class="mb-16">
    <h2 class="text-2xl font-bold mb-4">Anggota Ekstrakurikuler</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Anggota</th>
                    <th>Ekstrakurikuler</th>
                    <th>Jabatan</th>
                    <th>Generasi</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota as $item)
                    <tr>
                        <td>{{ $item->nama_anggota }}</td>
                        <td>{{ $item->ekskul->nama_ekskul ?? '-' }}</td>
                        <td>{{ $item->jabatan->nama_jabatan ?? '-' }}</td>
                        <td>{{ $item->generasi }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
