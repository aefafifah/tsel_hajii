<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="text-center mb-4"><strong>Riwayat Perubahan Stok</strong></h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Produk/Merchandise</th>
                    <th>Perubahan Stok</th>
                    <th>Stok Sebelum</th>
                    <th>Stok Sesudah</th>
                    <th>Aksi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockHistories as $history)
                    <tr class="text-center">
                        <td>{{ $history->id }}</td>
                        <td>
                            {{ $history->product->produk_nama ?? ($history->merchandise->merch_nama ?? 'Tidak Ditemukan') }}
                        </td>
                        <td class="{{ $history->change_amount > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $history->change_amount }}
                        </td>
                        <td>{{ $history->previous_stock ?? 'N/A' }}</td>
                        <td>{{ $history->current_stock ?? 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $history->action === 'add' ? 'bg-success' : 'bg-warning' }}">
                                {{ $history->action === 'add' ? 'Penambahan' : 'Penggantian' }}
                            </span>
                        </td>
                        <td>{{ $history->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada riwayat perubahan stok.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        {{-- <div class="d-flex justify-content-center mt-3">
            {{ $stockHistories->links('vendor.pagination.bootstrap-5') }}
        </div> --}}


        <div class="text-center mt-4">
            <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali ke Daftar Produk</a>
            <a href="{{ route('merch.index') }}" class="btn btn-secondary">Kembali ke Daftar Merchandise</a>
        </div>
    </div>
</x-supvis.supvislayouts>
