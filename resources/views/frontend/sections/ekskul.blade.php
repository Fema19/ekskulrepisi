<section id="ekskuls" class="mb-5">
    <div class="container">
        <div class="row g-4">
            @forelse ($ekskul as $item)
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($item->logo)
                                    <img src="{{ asset('storage/' . $item->logo) }}" class="img-fluid h-100 object-fit-cover" alt="{{ $item->nama_ekskul }}" style="min-height: 100%; object-fit: cover;">
                                @else
                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 100%; min-height: 200px;">
                                        <span class="fw-bold">Tidak ada gambar</span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title text-danger fw-bold">{{ $item->nama_ekskul }}</h4>
                                    <p class="card-text text-muted mb-2">
                                        {{ $item->deskripsi ?: 'Tidak ada deskripsi.' }}
                                    </p>
                                    @if ($item->tahun_dibentuk)
                                        <p class="mb-1"><strong>Tahun Dibentuk:</strong> {{ $item->tahun_dibentuk }}</p>
                                    @endif
                                    @if ($item->visi)
                                        <p class="mb-1"><strong>Visi:</strong> {{ $item->visi }}</p>
                                    @endif
                                    @if ($item->misi)
                                        <p class="mb-0"><strong>Misi:</strong> {{ $item->misi }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada data ekstrakurikuler.</p>
            @endforelse
        </div>
    </div>
</section>
