<x-supvis.supvislayouts>
    <div class="container mt-4">
        <h2>Budget Insentif</h2>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card p-4 shadow-sm">
            <h3>Total Budget: <span class="text-primary">{{ number_format($totalBudget, 2) }}</span></h3>
            <h3>Total Insentif: <span class="text-danger">{{ number_format($totalInsentif, 2) }}</span></h3>
            <h3>Sisa Budget: <span class="text-success">{{ number_format($sisaBudget, 2) }}</span></h3>

            <form action="{{ route('supvis.budget_insentif.update') }}" method="POST" class="mt-3">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Aksi:</label><br>
                    <input type="radio" name="action" value="tambah" id="tambah" checked>
                    <label for="tambah">Tambah</label>
                    <input type="radio" name="action" value="ganti" id="ganti" class="ms-3">
                    <label for="ganti">Ganti</label>
                </div>

                <div class="mb-3">
                    <label for="total_insentif" class="form-label">Jumlah Budget:</label>
                    <input type="number" class="form-control" name="total_insentif" id="total_insentif"
                        value="{{ old('total_insentif') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</x-supvis.supvislayouts>
