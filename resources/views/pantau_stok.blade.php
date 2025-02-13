<x-supvis.supvislayouts>
    <div class="container">
        <h2 class="text-center mt-5 mb-5"><b>Riwayat Perubahan Stok</b></h2>

        <table id="stock-table" class="table table-bordered">
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
                @foreach ($stockHistories as $history)
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
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Script DataTables --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#stock-table').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 10,
                language: {
                    paginate: {
                        previous: "« Sebelumnya",
                        next: "Berikutnya »"
                    },
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    zeroRecords: "Tidak ada data yang ditemukan",
                }
            });
        });
    </script>
</x-supvis.supvislayouts>
