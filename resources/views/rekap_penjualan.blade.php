<x-sales.saleslayouts>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan dan Insentif</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
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
            background-color: white;
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
            background-color: #4a90e2;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total-row {
            background-color: rgb(153, 255, 153);
            font-weight: bold;
        }

        .no-results {
            text-align: center;
            padding: 20px;
            color: #999;
            display: none; 
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
                        <th>ID Transaksi</th>
                        <th>Nomor Telepon</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Sales</th>
                        <th>Jenis Paket</th>
                        <th>Merchandise</th>
                        <th>Metode Pembayaran</th>
                        <th>Harga</th>
                        <th>Insentif</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($groupedTransaksi->isEmpty())
                        <tr>
                            <td colspan="10">Tidak ada transaksi yang ditemukan.</td>
                        </tr>
                    @else
                        @foreach ($groupedTransaksi as $tanggal => $items)
                            <tr>
                                <th colspan="10">Tanggal: {{ $tanggal }}</th>
                            </tr>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="id-transaksi">{{ $item->id_transaksi }}</td>
                                    <td class="nomor-telepon">{{ $item->nomor_telepon }}</td>
                                    <td class="nama-pelanggan">{{ $item->nama_pelanggan }}</td>
                                    <td class="tanggal">{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</td>
                                    <td class="nama-sales">{{ $item->nama_sales }}</td>
                                    <td class="jenis-paket">{{ $item->jenis_paket }}</td>
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
                        <td colspan="8">Total Keseluruhan:</td>
                        <td id="total-penjualan">Rp 0</td>
                        <td id="total-insentif">Rp 0</td>
                    </tr>
                </tfoot>
            </table>
            <div class="no-results">Tidak ada transaksi yang ditemukan.</div>
        </div>
    </div>

    <script>
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

            calculateTotals(); 
        });
    </script>
</x-sales.saleslayouts>