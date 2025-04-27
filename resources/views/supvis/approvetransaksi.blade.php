<x-Supvis.SupvisLayouts>

<<<<<<< HEAD
    <link href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #43e97b, #2575FC);
            color: #333;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        h1 {
            color: rgb(0, 0, 0);
            font-size: 2.5rem;
            margin: 40px 0 20px;
            text-align: center;
        }

        .dashboard {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 9px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 9px auto;
        }

        .filter-box {
            flex: 1;
            margin-right: 5px;
        }

        .filter-box select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 12px;
            background-color: #fff;
            cursor: pointer;
        }

        .search-box {
            display: flex;
            align-items: center;
            position: relative;
            flex: 2;
        }

        .search-box input {
            width: 100%;
            padding: 5px 30px 5px 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 12px;
        }

        .search-box i {
            position: absolute;
            right: 8px;
            color: #888;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            background-color: #e3f2fd; /* Biru muda pada seluruh tabel */
        }

        .table-responsive-scroll {
            overflow-x: auto;
            width: 100%;
        }

        th, td {
            padding: 12px;
            text-align: center; /* Teks rata tengah */
            border: 1px solid #ddd;
        }

        .insentif th {
            padding: 9px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .penjualan {
            background: #23a0b0;
            color: white;
            font-weight: bold;
        }

        thead tr {
            background-color: #2196F3; /* Biru lebih gelap pada header */
            color: white;
            font-weight: bold;
        }

        th {
            color: white;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #bbdefb; /* Biru muda lebih terang pada baris genap */
        }

        tbody tr:hover {
            background-color: #90caf9; /* Efek hover dengan warna biru lebih gelap */
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                width: 100%;
            }

            thead {
                display: none;
            }

            tr {
                display: block;
                margin-bottom: 25px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            td {
                display: flex;
                justify-content: space-between;
                padding: 12px 15px;
                border-bottom: 1px solid #ddd;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                background: linear-gradient(135deg, #2575FC, #43e97b);
                -webkit-background-clip: text;
                color: transparent;
                text-align: left;
                padding: 5px;
            }
        }

        @media (max-width: 768px) {
            .search-container {
                width: 90%;
                margin: 20px auto;
            }

            .filter-box,
            .search-box {
                flex: 1;
            }

            .search-box input {
                font-size: 14px;
                padding: 5px 20px 5px 8px;
            }

            .search-box i {
                font-size: 16px;
            }
        }
    </style>
    <body>
        <h1><b>Daftar Transaksi</b></h1>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @elseif(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <div class="search-container">
            <div class="filter-box">
                <select id="filter-transaksi" onchange="filterByDateRange(this.value)">
                    <option value="all">Semua Transaksi</option>
                    <option value="7">7 Hari Terakhir</option>
                    <option value="30">1 Bulan Terakhir</option>
                    <option value="365">1 Tahun Terakhir</option>
                </select>
            </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center mt-3">
            <div class="row w-100">

                <div class="col-md-6 mb-3">
=======
    <div class="container mt-4">
        <h2 class="mb-4">Daftar Transaksi</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="container d-flex justify-content-center align-items-center mt-3">
            <div class="row w-100">
                <div class="col-md-6">
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-success">Kasir</h3>
                            <p class="card-text fw-bold">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Total Transaksimu</h3>
                            <p class="card-text fw-bold">Rp {{ number_format($totalPenjualan, 0, ',', '.') }},-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <div class="container mt-4">
            <div class="table-responsive">
=======

        <div class="table-responsive">
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
            <table id="transactionTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Kasir</th>
                        <th>Tempat Bertugas</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>No. Injeksi</th>
                        <th>Aktivasi Tanggal</th>
                        <th>Jenis Paket</th>
                        <th>Merchandise</th>
                        <th>Harga</th>
                        <th>Pembayaran</th>
                        <th>Setor</th>
                        <th>Status</th>
                        <th>Bayar?</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="transaksi-body">
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $item->id_transaksi }}</td>
                            <td>{{ $item->supervisor?->name }}</td>
                            <td>{{ optional($item->sales)->tempat_tugas ?? '-' }}
                            <td>{{ $item->tanggal_transaksi }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->telepon_pelanggan }}</td>
                            <td>{{ $item->nomor_injeksi }}</td>
                            <td>{{ $item->aktivasi_tanggal }}</td>
                            <td>{{ $item->produk ? $item->produk->produk_nama : 'Tidak ditemukan' }}</td>
                            <td>{{ $item->merchandise }}</td>
                            <td>{{ $item->produk ? $item->produk->produk_harga_akhir : 0 }}</td>
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
                                    $no_hp = preg_replace('/[^0-9]/', '', $item->telepon_pelanggan);
                                    if (substr($no_hp, 0, 1) === '0') {
                                        $no_hp = '62' . substr($no_hp, 1);
                                    }
                                    $pesan =
                                        "Halo {$item->nama_pelanggan},%0AKwitansi transaksi ID *{$item->id_transaksi}* bisa dilihat di:%0A" .
                                        asset('storage/kwitansi/' . $item->id_transaksi . '.jpg') .
                                        '%0A%0ATerima kasih telah menggunakan layanan kami 🙏😊';
                                @endphp

                                @if ($item->is_paid)
                                    <a href="{{ route('supvis.transaksi.kwitansi.whatsapp', $item->id_transaksi) }}"
                                        class="btn btn-success btn-sm" target="_blank">WA</a>

                                    {{-- <form action="" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus transaksi ini?')">Hapus</button>
                                </form> --}}

                                    <a href="{{ route('supvis.transaksi.kwitansi.print', $item->id_transaksi) }}"
                                        class="btn btn-success btn-sm" target="_blank">Print</a>

                                    @if (Auth::user() && Auth::user()->is_superuser)
                                        <a href="#" class="btn btn-warning btn-sm btn-unlunas"
                                            data-id="{{ $item->id_transaksi }}">Un-Lunas</a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
<<<<<<< HEAD

        </div>
        <div class="container mt-3">
            <!-- Tombol Export di atas dekat search -->
            <div class="d-flex justify-content-between">
                <!-- Tombol Export ke Excel -->
                <a href="{{ route('export.pdf') }}" class="btn btn-danger">Export ke PDF</a>
            </div>
=======
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
        </div>

        <form id="unlunasForm" method="POST" style="display: none;">
            @csrf
            @method('PUT') {{-- Or DELETE / POST depending on your route --}}
        </form>

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
        <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    @endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {

            // Delegated: handle checkbox-bayar
            $(document).on('change', '.checkbox-bayar', function () {
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
<<<<<<< HEAD
 // Lilin Export PDF button click handler
 $('#exportPDF').click(function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let table = $('#transactionTable');

            // Add title
            doc.setFontSize(18);
            doc.text("Daftar Transaksi", 14, 16);

            // Get the table content and add it to PDF
            doc.autoTable({
                html: '#transactionTable',
                startY: 20, // Start adding the table below the title
                theme: 'grid', // Optional: Change the table theme
                margin: { top: 20 },
            });

            // Save the PDF with a custom name
            doc.save('Daftar_Transaksi.pdf');
        });
=======
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972

            // Delegated: handle btn-unlunas
            $(document).on('click', '.btn-unlunas', function (e) {
                e.preventDefault();
                const transaksiId = $(this).data('id');
                const actionUrl = `/programhaji/supvis/transaksi/kwitansi/unlunas/${transaksiId}`;

                Swal.fire({
                    title: 'Yakin ubah status menjadi belum lunas?',
                    text: "Transaksi ini akan dianggap belum dibayar.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, ubah!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = $('#unlunasForm');
                        form.attr('action', actionUrl);
                        form.submit();
                    }
                });
            });
<<<<<<< HEAD

=======
            
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const nama = $(this).data('nama');
<<<<<<< HEAD

=======
                
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
                if (confirm(`Are you sure you want to permanently delete transaction for ${nama}?`)) {
                    $.ajax({
                        url: `/programhaji/supvis/transaksi/${id}/forcedelete`,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert('Transaction has been permanently deleted');
                            // Refresh the table immediately instead of waiting for interval
                            $.ajax({
                                url: '/programhaji/supvis/approvetransaksi/refresh',
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    table.clear();
                                    response.transaksi.forEach(function(item) {
                                        // Reuse your existing row creation logic
                                        // For brevity, I've not repeated it here
                                    });
                                    table.draw();
                                }
                            });
                        },
                        error: function(err) {
                            console.error('Delete error:', err);
                            alert('Failed to delete transaction');
                        }
                    });
                }
            });

            function formatDateTime(dateString) {
                if (!dateString) return '';
                const date = new Date(dateString);
                const pad = (n) => n.toString().padStart(2, '0');

                const year = date.getFullYear();
                const month = pad(date.getMonth() + 1); // getMonth() is zero-based
                const day = pad(date.getDate());
                const hours = pad(date.getHours());
                const minutes = pad(date.getMinutes());
                const seconds = pad(date.getSeconds());

                return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            }

            const currentUser = {
                is_superuser: {{ Auth::user()->is_superuser ? 'true' : 'false' }},
                name: @json(Auth::user()->name)
            };
<<<<<<< HEAD

=======
            
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
            let table;

            if (!$.fn.DataTable.isDataTable('#transactionTable')) {
                table = $('#transactionTable').DataTable({
                    language: {
                        search: "Cari:",
                        zeroRecords: "Tidak ada data ditemukan"
                    },
                    paging: false,
                    info: false,
                    lengthChange: false
                });
            } else {
                table = $('#transactionTable').DataTable(); // just get the instance
            }


            // Periodic AJAX refresh
            setInterval(function () {
                $.ajax({
                    url: '/programhaji/supvis/approvetransaksi/refresh',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        table.clear(); // Clears all rows from the table

                        response.transaksi.forEach(function (item) {
                            table.row.add([
                                item.id_transaksi,
                                item.supervisor?.name ?? '',
                                item.sales?.tempat_tugas ?? '-',
                                formatDateTime(item.tanggal_transaksi ?? ''),
                                item.nama_pelanggan ?? '',
                                item.telepon_pelanggan ?? '',
                                item.nomor_injeksi ?? '',
                                item.aktivasi_tanggal ?? '',
                                item.produk?.produk_nama ?? 'Tidak ditemukan',
                                item.merchandise ?? '',
                                item.produk?.produk_harga_akhir ?? 0,
                                item.metode_pembayaran ?? '',
                                item.is_setor ? 'Sudah' : 'Belum',
                                item.is_paid
                                    ? '<span class="badge bg-success">Lunas</span>'
                                    : '<span class="badge bg-warning text-dark">Belum</span>',
                                item.is_paid
                                    ? '✔'
                                    : `<input type="checkbox" class="checkbox-bayar" data-id="${item.id_transaksi}" data-nama="${item.nama_pelanggan}">`,
                                (function () {
                                    let btns = '';
                                    if (currentUser.is_superuser) {
                                        btns += `<a href="/programhaji/supvis/transaksi/${item.id_transaksi}/edit" class="btn btn-warning btn-sm">Edit</a> `;
                                        btns += `<a href="#" class="btn btn-danger btn-sm btn-delete" data-id="${item.id_transaksi}" data-nama="${item.nama_pelanggan}">Delete</a> `;
                                    }
                                    if (item.is_paid) {
                                        btns += `
<<<<<<< HEAD
=======
                                            <a href="/programhaji/supvis/transaksi/kwitansi/whatsapp/${item.id_transaksi}" class="btn btn-success btn-sm" target="_blank">WA</a>
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
                                            <a href="/programhaji/supvis/transaksi/kwitansi/print/${item.id_transaksi}" class="btn btn-success btn-sm" target="_blank">Print</a>
                                            ${currentUser.is_superuser
                                                ? `<a href="#" class="btn btn-warning btn-sm btn-unlunas" data-id="${item.id_transaksi}">Un-Lunas</a>`
                                                : ''}`;
                                    }
                                    return btns;
                                })()
                            ]);
                        });

                        table.draw(); // Redraw the DataTable with new data

                    },
                    error: function (err) {
                        console.error('AJAX error:', err);
                    }
                });
<<<<<<< HEAD
            }, 3000);
=======
            }, 3000); 
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
        });
    </script>
@endpush

</x-Supvis.SupvisLayouts>
@stack('scripts')
