<section id="kegiatan" class="mb-16">
    <h2 class="text-2xl font-bold mb-4">Kegiatan Ekstrakurikuler</h2>
    <div class="row">
        @foreach ($kegiatan as $item)
            <div class="col-md-6 mb-4">
                <div class="card">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_kegiatan }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_kegiatan }}</h5>
                        <p class="card-text"><strong>Ekstrakurikuler:</strong> {{ $item->ekskul->nama_ekskul ?? '-' }}</p>
                        <p class="card-text"><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
