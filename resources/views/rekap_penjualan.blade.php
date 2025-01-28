<x-sales.saleslayouts>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan dan Insentif</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
        }

        .filter-btn {
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
            margin: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .filter-btn:hover {
            background-color: #357abd;
        }

        .table-container {
            overflow-x: auto;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .responsive-table {
            display: block;
            width: 100%;
            overflow-x: auto;
            padding: 10px;
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

        @media (max-width: 768px) {
        table {
            min-width: 100%;
        }

        th, td {
            padding: 10px;
            font-size: 14px;
        }

        .table-container {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        th, td {
            font-size: 12px;
            padding: 8px;
        }
    }
    </style>

<div class="dashboard">
    <div class="filter-box">
        <button class="filter-btn" data-filter="all">All Transaksi</button>
        <button class="filter-btn" data-filter="today">Hari Ini</button>
        <button class="filter-btn" data-filter="7days">7 Hari Terakhir</button>
        <button class="filter-btn" data-filter="1month">1 Bulan</button>
        <button class="filter-btn" data-filter="1year">1 Tahun</button>
    </div>

    <div class="table-container">
        <table id="dataTable">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Insentif</th>
                </tr>
            </thead>
            <tbody>
                @if ($groupedTransaksi->isEmpty())
                    <tr>
                        <td colspan="4">Tidak ada transaksi yang ditemukan.</td>
                    </tr>
                @else
                    @foreach ($groupedTransaksi as $tanggal => $items)
                        <tr>
                            <th colspan="4">Tanggal: {{ $tanggal }}</th>
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</td>
                                <td>{{ $item->produk ? $item->produk->produk_nama : 'Produk tidak ditemukan' }}</td>
                                <td class="harga">
                                    {{ $item->produk ? $item->produk->produk_harga_akhir : 0 }}
                                </td>
                                <td class="insentif">
                                    {{ $item->produk ? $item->produk->produk_insentif : 0 }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td>Total Keseluruhan:</td>
                    <td></td>
                    <td id="total-penjualan">Rp 0</td>
                    <td id="total-insentif">Rp 0</td>
                </tr>
            </tfoot>
        </table>
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

        $('.filter-btn').on('click', function () {
            const filterType = $(this).data('filter');
            const today = new Date();
            const rows = $('#dataTable tbody tr');

            rows.show();
            rows.each(function () {
                const rowDateText = $(this).find('td:first').text();
                const rowDate = new Date(rowDateText);
                let showRow = true;

                if (filterType === 'today') {
                    showRow = rowDate.toDateString() === today.toDateString();
                } else if (filterType === '7days') {
                    const past7Days = new Date(today);
                    past7Days.setDate(today.getDate() - 7);
                    showRow = rowDate >= past7Days && rowDate <= today;
                } else if (filterType === '1month') {
                    const pastMonth = new Date(today);
                    pastMonth.setMonth(today.getMonth() - 1);
                    showRow = rowDate >= pastMonth && rowDate <= today;
                } else if (filterType === '1year') {
                    const pastYear = new Date(today);
                    pastYear.setFullYear(today.getFullYear() - 1);
                    showRow = rowDate >= pastYear && rowDate <= today;
                }

                if (!showRow) {
                    $(this).hide();
                }
            });

            calculateTotals();
        });

        calculateTotals(); 
    });
</script>
</x-sales.saleslayouts>
