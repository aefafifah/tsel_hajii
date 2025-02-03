<x-supvis.supvislayouts>
    <div class="container">
        <h2>Budget Insentif</h2>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <h3>Total Budget: {{ number_format($totalBudget, 2) }}</h3>
        <h3>Total Insentif: {{ number_format($totalInsentif, 2) }}</h3>
        <h3>Sisa Budget: {{ number_format($sisaBudget, 2) }}</h3>


        <form action="{{ route('supvis.budget_insentif.update') }}" method="POST">
            @csrf
            <label for="total_insentif">Tambah Total Budget:</label>
            <input type="number" name="total_insentif" id="total_insentif" value="{{ old('total_insentif') }}" required>
            <button type="submit">Update</button>
        </form>

    </div>
</x-supvis.supvislayouts>
