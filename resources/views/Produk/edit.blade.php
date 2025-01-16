<x-layouts>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Produk</h2>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="produk_nama" class="form-label">Nama Produk</label>
                <input type="text" name="produk_nama" id="produk_nama" class="form-control" value="{{ $produk->produk_nama }}" required>
            </div>

            <div class="mb-3">
                <label for="produk_harga" class="form-label">Harga Produk</label>
                <input type="number" name="produk_harga" id="produk_harga" class="form-control" value="{{ $produk->produk_harga }}" required>
            </div>

            <div class="mb-3">
                <label for="produk_diskon" class="form-label">Diskon Produk (%)</label>
                <input type="number" name="produk_diskon" id="produk_diskon" class="form-control" value="{{ $produk->produk_diskon }}" min="0" max="100">
            </div>

            <div class="mb-3">
                <label for="produk_detail" class="form-label">Detail Produk</label>
                <textarea name="produk_detail" id="produk_detail" class="form-control" rows="4" required>{{ $produk->produk_detail }}</textarea>
            </div>

            <div class="mb-3">
                <label for="produk_stok" class="form-label">Stok Produk</label>
                <input type="number" name="produk_stok" id="produk_stok" class="form-control" value="{{ $produk->produk_stok }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Produk</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</x-layouts>
