<x-sales.saleslayouts>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan dan Insentif</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }
        .title-box {
            background-color: #4a90e2;
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            width: 90%;
        }
        .title-box h1 {
            margin: 0;
        }
        .table-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 90%;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
        .total-penjualan-row {
            background-color: rgb(153, 255, 153);
            color: rgb(0, 0, 0);
            font-weight: bold;
        }
        .total-insentif-row {
            background-color: #d1e7fd;
            color: #0d6efd;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="dashboard">
    <div class="title-box">
        <h1>Rekapitulasi Penjualan</h1>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $item)
                    <tr>
                        <td>{{ $item->jenis_paket }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Tidak ada transaksi.</td>
                    </tr>
                @endforelse
                <tr class="total-penjualan-row">
                    <td>Total Penjualan</td>
                    <td>Rp </td>
                </tr>
                <tr class="total-insentif-row">
                    <td>Total Insentif (10%)</td>
                    <td>Rp </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</x-sales.saleslayouts>
