<section id="ekskuls" class="mb-16">
    <h2 class="text-2xl font-bold mb-4">Daftar Ekstrakurikuler</h2>
    <div class="row">
        @foreach ($ekskul as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($item->logo)
                        <img src="{{ asset('storage/' . $item->logo) }}" class="card-img-top" alt="{{ $item->nama_ekskul }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
