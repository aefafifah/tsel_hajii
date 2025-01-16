<x-layouts>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Merchandise</h2>
        <form action="{{ route('merch.update', $merchandise->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="merch_nama" class="form-label">Nama Merchandise</label>
                <input type="text" name="merch_nama" id="merch_nama" class="form-control" value="{{ $merchandise->merch_nama }}" required>
            </div>

            <div class="mb-3">
                <label for="merch_detail" class="form-label">Detail Merchandise</label>
                <textarea name="merch_detail" id="merch_detail" class="form-control" rows="4" required>{{ $merchandise->merch_detail }}</textarea>
            </div>

            <div class="mb-3">
                <label for="merch_stok" class="form-label">Stok Merchandise</label>
                <input type="number" name="merch_stok" id="merch_stok" class="form-control" value="{{ $merchandise->merch_stok }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Merchandise</button>
        </form>
    </div>
</x-layouts>
