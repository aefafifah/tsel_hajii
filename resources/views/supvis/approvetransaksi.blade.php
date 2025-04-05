<x-supvis.supvislayouts>

    <div class="container mt-4">
        <h2 class="mb-4">Daftar Transaksi</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table id="transactionTable" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Tanggal</th>
                    <th>Jenis Paket</th>
                    <th>Merchandise</th>
                    <th>Pembayaran</th>
                    <th>Setor</th>
                    <th>Status</th>
                    <th>Bayar?</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item->id_transaksi }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                        <td>{{ $item->tanggal_transaksi }}</td>
                        <td>{{ $item->produk ? $item->produk->produk_nama : 'Tidak ditemukan' }}</td>
                        <td>{{ $item->merchandise }}</td>
                        <td>{{ $item->metode_pembayaran }}</td>
                        <td>{{ $item->is_setor ? 'Sudah' : 'Belum' }}</td>
                        <td>
                            @if ($item->is_paid)
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-warning text-dark">Belum</span>
                            @endif
                        </td>
                        <td>
                            @if (!$item->is_paid)
                                <input type="checkbox" class="checkbox-bayar" data-id="{{ $item->id_transaksi }}"
                                    data-nama="{{ $item->nama_pelanggan }}">
                            @else
                                ✔
                            @endif
                        </td>
                        <td>
                            @if (Auth::user() && Auth::user()->is_superuser)
                                <a href="{{ route('transaksi.edit', $item->id_transaksi) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                {{-- <a href="{{ route('transaksi.edit.bayar', $item->id_transaksi) }}" class="btn btn-primary btn-sm">Bayar</a> --}}
                            @endif
                            @php
                                $no_hp = preg_replace('/[^0-9]/', '', $item->nomor_telepon);
                                if (substr($no_hp, 0, 1) === '0') {
                                    $no_hp = '62' . substr($no_hp, 1);
                                }
                                $pesan =
                                    "Halo {$item->nama_pelanggan},%0AKwitansi transaksi ID *{$item->id_transaksi}* bisa dilihat di:%0A" .
                                    asset('storage/kwitansi/' . $item->id_transaksi . '.jpg') .
                                    '%0A%0ATerima kasih telah menggunakan layanan kami 🙏😊';
                            @endphp

                            <a href="https://wa.me/{{ $no_hp }}?text={{ $pesan }}"
                                class="btn btn-success btn-sm" target="_blank">WA</a>

                            {{-- <form action="" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus transaksi ini?')">Hapus</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Bayar -->
        <div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="modalBayarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBayarLabel">Konfirmasi Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin memproses pembayaran untuk <strong id="nama_transaksi"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" id="btnLanjutBayar" class="btn btn-success">Lanjutkan</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('styles')
        {{-- <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
        <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                $('#transactionTable').DataTable({
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ entri",
                        info: "Menampilkan _PAGE_ dari _PAGES_",
                        zeroRecords: "Tidak ada data ditemukan",
                        infoEmpty: "Tidak ada data tersedia",
                        paginate: {
                            previous: "Sebelumnya",
                            next: "Berikutnya"
                        }
                    }
                });

                $('.checkbox-bayar').on('change', function() {
                    const id = $(this).data('id');
                    const nama = $(this).data('nama');
                    const checkbox = $(this);

                    Swal.fire({
                        title: 'Konfirmasi Pembayaran',
                        text: `Apakah Anda ingin memproses pembayaran untuk ${nama}?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Lanjutkan',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        checkbox.prop('checked', false); // reset checkbox

                        if (result.isConfirmed) {
                            window.location.href = `/programhaji/supvis/transaksi/${id}/bayar`;
                        }
                    });
                });
            });
        </script>
    @endpush
</x-supvis.supvislayouts>
@stack('scripts')
