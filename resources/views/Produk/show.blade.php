<x-supvis.supvislayouts>
    <div class="container">
        <h1>Detail Produk</h1>

        <div class="card">
            <div class="card-header">
                <h2>{{ $produk->produk_nama }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Harga:</strong> Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}</p>
                <p><strong>Diskon:</strong> {{ $produk->produk_diskon }}%</p>
                <p><strong>Stok:</strong> {{ $produk->produk_stok }}</p>
                <p><strong>Detail:</strong> {{ $produk->produk_detail ?? 'Tidak ada detail' }}</p>
                <p><strong>Insentif:</strong> Rp
                    {{ number_format($produk->produk_insentif, 0, ',', '.') ?? 'Tidak ada insentif' }}</p>
                <p><strong>Status:</strong> {{ $produk->is_active ? 'Aktif' : 'Non-Aktif' }}</p>
            </div>
        </div>

        <div class="mt-4">
            <h3>Merchandise Terkait</h3>
            @if ($produk->merchandises->isEmpty())
                <p>Tidak ada merchandise terkait.</p>
            @else
                <pre>{{ json_encode($produk->merchandises->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            @endif
        </div>

        <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Produk</a>
    </div>
</x-supvis.supvislayouts>
