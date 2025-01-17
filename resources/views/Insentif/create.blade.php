<x-layouts>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Insentif Baru</h2>
        <form action="{{ route('insentif.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tipe_insentif">Tipe Insentif:</label>
                <select name="tipe_insentif" id="tipe_insentif" required>
                    <option value="persen">Persen</option>
                    <option value="harga">Harga</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nilai_insentif">Nilai Insentif:</label>
                <input type="number" name="nilai_insentif" id="nilai_insentif" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="produk_id">Produk:</label>
                <select name="produk_id" id="produk_id" required>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->produk_nama }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Insentif</button>
            <a href="{{ route('insentif.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</x-layouts>
