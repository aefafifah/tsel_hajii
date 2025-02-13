<x-sales.saleslayouts>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: #f1f1f1
            margin: 0;
            padding: 0;
        }

        .dashboard {
            padding: 20px;
        }

        .filter-box {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-select, .search-input {
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin: 5px;
            width: 200px;
        }

        .search-container {
            position: relative;
        }

        .search-container i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
        }

        .search-input {
            padding-right: 30px;
        }

        .table-container {
            overflow-x: auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: rgb(44, 54, 77);
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

        .total-row {
            background: rgb(44, 54, 77);
            border-radius: 15px;
            font-weight: bold;
            color: white;
        }

        .total-row:hover {
            background-color: rgb(44, 54, 77);
        }

        .no-results {
            text-align: center;
            padding: 20px;
            color: #999;
            display: none;
        }
        @media (max-width: 768px) {
            .filter-box {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-select, .search-input {
                width: 100%;
                margin: 10px 0;
            }

            .table-container {
                margin-top: 20px;
            }

            table {
                min-width: 300px; 
            }

            th, td {
                padding: 10px;
                font-size: 12px;
            }

            .search-input {
                font-size: 16px;
            }

            .no-results {
                padding: 10px;
                font-size: 14px;
            }

            .total-row {
                font-size: 14px;
                padding: 10px;
            }
        }

        .voided td {
            text-decoration: line-through;
            color: #999;
        }

    </style>

    <div class="dashboard">
        <div class="filter-box">
            <label for="filter-transaksi">Filter Transaksi: </label>
            <select id="filter-transaksi" class="filter-select">
                <option value="all">Semua Transaksi</option>
                <option value="1">Hari Ini</option>
                <option value="7">7 Hari Terakhir</option>
                <option value="30">1 Bulan Terakhir</option>
                <option value="365">1 Tahun Terakhir</option>
            </select>
            <div class="search-container">
                <input type="text" id="search-input" class="search-input" placeholder="Search">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <div class="table-container">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Void</th>
                        <th>ID Transaksi</th>
                        <th>Nomor Telepon</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Sales</th>
                        <th>Jenis Paket</th>
                        <th>No Injeksi</th>
                        <th>Merchandise</th>
                        <th>Metode Pembayaran</th>
                        <th>Harga</th>
                        <th>Insentif</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($groupedTransaksi->isEmpty())
                        <tr>
                            <td colspan="11">Tidak ada transaksi yang ditemukan.</td>
                        </tr>
                    @else
                        @foreach ($groupedTransaksi as $tanggal => $items)
                            <tr>
                                <th colspan="12">Tanggal: {{ $tanggal }}</th>
                            </tr>
                            @foreach ($items as $item)
                                <tr class="transaksi-row {{ $item->trashed() ? 'voided' : '' }}" data-id="{{ $item->id_transaksi }}">
                                    <td>
                                        <input type="checkbox" class="void-checkbox" data-id="{{ $item->id_transaksi }}" {{ $item->trashed() ? 'checked' : '' }}>
                                    </td>
                                    <td class="id-transaksi">{{ $item->id_transaksi }}</td>
                                    <td class="nomor-telepon">{{ $item->nomor_telepon }}</td>
                                    <td class="nama-pelanggan">{{ $item->nama_pelanggan }}</td>
                                    <td class="tanggal">{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</td>
                                    <td class="nama-sales">{{ $item->nama_sales }}</td>
                                    <td class="jenis-paket">{{ $item->produk->produk_nama }}</td>
                                    <td class="jenis-paket">{{ $item->nomor_injeksi}}</td>
                                    <td class="merchandise">{{ $item->merchandise }}</td>
                                    <td class="metode-pembayaran">{{ $item->metode_pembayaran }}</td>
                                    <td class="harga">{{ $item->produk ? $item->produk->produk_harga_akhir : 0 }}</td>
                                    <td class="insentif">{{ $item->produk ? $item->produk->produk_insentif : 0 }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr class="total-row" id="total-row">
                        <td colspan="10">Total Keseluruhan:</td>
                        <td id="total-penjualan">Rp 0</td>
                        <td id="total-insentif">Rp 0</td>
                    </tr>
                </tfoot>
            </table>
            <div class="no-results">Tidak ada transaksi yang ditemukan.</div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".void-checkbox").forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    let row = this.closest(".transaksi-row");
                    let transaksiId = this.getAttribute("data-id");

                    if (this.checked) {
                        row.classList.add("voided");
                    } else {
                        row.classList.remove("voided");
                    }

                    fetch(`/transaksi/${transaksiId}/toggle-void`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ is_void: this.checked })
                    });
                });

                if (checkbox.checked) {
                    checkbox.closest(".transaksi-row").classList.add("voided");
                }
            });
        });

        $(document).ready(function () {
            function calculateTotals() {
                let totalPenjualan = 0;
                let totalInsentif = 0;

                $('#dataTable tbody tr:visible').each(function () {
                    const harga = parseFloat($(this).find('.harga').text()) || 0;
                    const insentif = parseFloat($(this).find('.insentif').text()) || 0;
                    totalPenjualan += harga;
                    totalInsentif += insentif;
                });

                $('#total-penjualan').text(`Rp ${totalPenjualan.toLocaleString('id-ID')}`);
                $('#total-insentif').text(`Rp ${totalInsentif.toLocaleString('id-ID')}`);
            }

            $('#search-input').on('keyup', function () {
                const value = $(this).val().toLowerCase();
                let hasResults = false;

                $('#dataTable tbody tr').filter(function () {
                    const isVisible = $(this).text().toLowerCase().indexOf(value) > -1;
                    $(this).toggle(isVisible);
                    if (isVisible) {
                        hasResults = true;
                    }
                });

                if (hasResults) {
                    $('.no-results').hide();
                    $('#total-row').show();
                } else {
                    $('.no-results').show();
                    $('#total-row').hide();
                }

                calculateTotals();
            });

            $('#filter-transaksi').on('change', function () {
            const filterValue = $(this).val();
            const today = new Date();
            const filterDate = new Date();

            $('#dataTable tbody tr').show(); 

            if (filterValue === "1") { 
                $('#dataTable tbody tr').filter(function () {
                    const transactionDate = new Date($(this).find('.tanggal').text());
                    return transactionDate.toDateString() !== today.toDateString();
                }).hide();
            } else if (filterValue === "7") { 
                filterDate.setDate(today.getDate() - 7);
                $('#dataTable tbody tr').filter(function () {
                    const transactionDate = new Date($(this).find('.tanggal').text());
                    return transactionDate < filterDate;
                }).hide();
            } else if (filterValue === "30") { 
                filterDate.setMonth(today.getMonth() - 1);
                $('#dataTable tbody tr').filter(function () {
                    const transactionDate = new Date($(this).find('.tanggal').text());
                    return transactionDate < filterDate;
                }).hide();
            } else if (filterValue === "365") { 
                filterDate.setFullYear(today.getFullYear() - 1);
                $('#dataTable tbody tr').filter(function () {
                    const transactionDate = new Date($(this).find('.tanggal').text());
                    return transactionDate < filterDate;
                }).hide();
            }

            calculateTotals(); 
        });

            calculateTotals();
        });
    </script>
</x-sales.saleslayouts>
