<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4">Detail Merchandise</h2>
        <div class="mb-3">
            <label class="form-label"><strong>Nama Merchandise:</strong></label>
            <p>{{ $merchandise->merch_nama }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Detail:</strong></label>
            <p>{{ $merchandise->merch_detail }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Stok:</strong></label>
            <p>{{ $merchandise->merch_stok }}</p>
        </div>
        <a href="{{ route('merch.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-supvis.supvislayouts>
