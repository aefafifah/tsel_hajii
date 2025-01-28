<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Merchandise</h2>
        <a href="{{ route('merch.create') }}" class="btn btn-success mb-3">Tambah Merchandise</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($merchandises->isEmpty())
            <div class="alert alert-warning text-center">
                Belum ada merchandise yang tersedia.
            </div>
        @else
            <div class="row">
                @foreach ($merchandises as $merchandise)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $merchandise->merch_nama }}</h5>
                                <p class="card-text">{{ $merchandise->merch_detail }}</p>
                                <p class="card-text"><strong>Stok:</strong> {{ $merchandise->merch_stok }}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('merch.show', $merchandise->id) }}" class="btn btn-info btn-sm">🔍 Lihat</a>
                                    <a href="{{ route('merch.edit', $merchandise->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('merch.destroy', $merchandise->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus merchandise ini?')">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-supvis.supvislayouts>