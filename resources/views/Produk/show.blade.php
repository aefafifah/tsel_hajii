<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4">Detail Produk</h2>
        <div class="mb-3">
            <label class="form-label"><strong>Nama Produk:</strong></label>
            <p>{{ $produk->produk_nama }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Harga:</strong></label>
            <p>Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Diskon:</strong></label>
            <p>{{ $produk->produk_diskon ?? 0 }}%</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Stok:</strong></label>
            <p>{{ $produk->produk_stok }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Detail:</strong></label>
            <p>{{ $produk->produk_detail }}</p>
        </div>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-supvis.supvislayouts>
