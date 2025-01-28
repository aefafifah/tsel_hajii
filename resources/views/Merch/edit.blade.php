<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #333;">Edit Merchandise</h2>
        <form action="{{ route('merch.update', $merchandise->id) }}" method="POST" class="shadow p-4 rounded" style="background-color: #f8f9fa;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="merch_nama" class="form-label" style="font-weight: bold;">Nama Merchandise</label>
                <input type="text" name="merch_nama" id="merch_nama" class="form-control" value="{{ $merchandise->merch_nama }}" placeholder="Masukkan nama merchandise" required>
            </div>

            <div class="mb-3">
                <label for="merch_detail" class="form-label" style="font-weight: bold;">Detail Merchandise</label>
                <textarea name="merch_detail" id="merch_detail" class="form-control" rows="4" placeholder="Masukkan detail merchandise" required>{{ $merchandise->merch_detail }}</textarea>
            </div>

            <div class="mb-3">
                <label for="merch_stok" class="form-label" style="font-weight: bold;">Stok Merchandise</label>
                <input type="number" name="merch_stok" id="merch_stok" class="form-control" value="{{ $merchandise->merch_stok }}" placeholder="Masukkan stok merchandise" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" style="flex: 1; margin-right: 10px;">Perbarui Merch</button>
                <a href="{{ route('merch.index') }}" class="btn btn-secondary" style="flex: 1; margin-left: 10px;">Batal</a>
            </div>
        </form>
    </div>
</x-supvis.supvislayouts>