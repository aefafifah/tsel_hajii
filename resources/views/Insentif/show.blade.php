<x-layouts>
    <div class="container mt-5">
        <h2 class="mb-4">Detail Insentif</h2>
        <div class="mb-3">
            <label class="form-label"><strong>Tipe Insentif:</strong></label>
            <p>{{ $insentif->tipe_insentif }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Nilai Insentif</strong></label>
            <p>{{ $$insentif->nilai_insentif }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Stok:</strong></label>
            <p>{{ $insentif->produk_id }}</p>
        </div>
        <a href="{{ route('insentif.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-layouts>
