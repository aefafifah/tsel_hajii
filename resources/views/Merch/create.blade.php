<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Merchandise Baru</h2>
        <form action="{{ route('merch.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="merch_nama" class="form-label">Nama Merchandise</label>
                <input type="text" name="merch_nama" id="merch_nama" class="form-control" placeholder="Masukkan nama merchandise" required>
            </div>

            <div class="mb-3">
                <label for="merch_detail" class="form-label">Detail Merchandise</label>
                <textarea name="merch_detail" id="merch_detail" class="form-control" placeholder="Masukkan detail merchandise" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="merch_stok" class="form-label">Stok Merchandise</label>
                <input type="number" name="merch_stok" id="merch_stok" class="form-control" placeholder="Masukkan stok merchandise" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Merchandise</button>
            <a href="{{ route('merch.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</x-supvis.supvislayouts>
