<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #333;">Tambah Merchandise Baru</h2>
        <form action="{{ route('merch.store') }}" method="POST" class="shadow p-4 rounded" style="background-color: #f8f9fa;">
            @csrf
            <div class="mb-3">
                <label for="merch_nama" class="form-label" style="font-weight: bold;">Nama Merchandise</label>
                <input type="text" name="merch_nama" id="merch_nama" class="form-control" placeholder="Masukkan nama merchandise" required>
            </div>

            <div class="mb-3">
                <label for="merch_detail" class="form-label" style="font-weight: bold;">Detail Merchandise</label>
                <textarea name="merch_detail" id="merch_detail" class="form-control" placeholder="Masukkan detail merchandise" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="merch_stok" class="form-label" style="font-weight: bold;">Stok Merchandise</label>
                <input type="number" name="merch_stok" id="merch_stok" class="form-control" placeholder="Masukkan stok merchandise" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" style="flex: 1; margin-right: 10px;">Simpan Merch</button>
                <a href="{{ route('merch.index') }}" class="btn btn-secondary" style="flex: 1; margin-left: 10px;">Batal</a>
            </div>
        </form>
    </div>
</x-supvis.supvislayouts>