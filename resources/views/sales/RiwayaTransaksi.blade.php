<x-sales.saleslayouts>

<div class="container">
    <h1>Riwayat Transaksi</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Info Tambahan / Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Nomor Transaksi</th>
                <th>Total Penjualan</th>
                <th>Status</th>
                <th>Nomor Tagihan</th>
                <th>Metode Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->nama_pelanggan ?? '-' }}</td>
                <td>{{ $transaction->created_at->format('d-m-Y | H:i:s') }}</td>
                <td>{{ $transaction->id_transaksi }}</td>
                <td>Rp {{ number_format($transaction->total_penjualan, 0, ',', '.') }}</td>
                <td>
                    @if($transaction->status === 'berhasil')
                        <span class="badge badge-success">Berhasil</span>
                    @else
                        <span class="badge badge-danger">Gagal</span>
                    @endif
                </td>
                <td>{{ $transaction->nomor_tagihan }}</td>
                <td>{{ ucfirst($transaction->metode_pembayaran) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada transaksi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-sales.saleslayouts>
