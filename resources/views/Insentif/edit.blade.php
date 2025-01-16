<x-layouts>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Insentif</h2>
        <form action="{{ route('insentif.update', $insentif->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tipe_insentif">Tipe Insentif:</label>
            <select name="tipe_insentif" id="tipe_insentif" required>
                <option value="persen" {{ $insentif->tipe_insentif == 'persen' ? 'selected' : '' }}>Persen</option>
                <option value="harga" {{ $insentif->tipe_insentif == 'harga' ? 'selected' : '' }}>Harga</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="nilai_insentif">Nilai Insentif:</label>
                <input type="number" name="nilai_insentif" id="nilai_insentif" step="0.01" value="{{ $insentif->nilai_insentif }}" required>
            </div>

            <div class="mb-3">
                <label for="produk_id">Produk ID:</label>
                <input type="number" name="produk_id" id="produk_id" value="{{ $insentif->produk_id }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Insentif</button>
        </form>
    </div>

</x-layouts>
