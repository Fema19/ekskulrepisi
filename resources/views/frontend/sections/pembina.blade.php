<section id="pembina" class="mb-16">
    <div class="row">
        @foreach ($pembina as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($item->foto_profil)
                        <img src="{{ asset('storage/' . $item->foto_profil) }}" class="card-img-top" alt="{{ $item->nama_pembina }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_pembina }}</h5>
                        <p class="card-text">Ekstrakurikuler: {{ $item->ekskul->nama_ekskul ?? '-' }}</p>
                        @if($item->deskripsi)
                            <p class="card-text">{{ $item->deskripsi }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
