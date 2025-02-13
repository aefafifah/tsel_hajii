<x-supvis.supvislayouts>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Transactions</title>
        <style>
            body {
                background: linear-gradient(135deg, #43e97b, #2575FC);
                color: #333;
                margin: 0;
                padding: 0;
                height: 100vh;
                overflow: hidden;
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
            }

            th, td {
                padding: 9px;
                text-align: left;
                border: 1px solid #ddd;
            }

            .insentif th {
                padding: 9px;
                text-align: left;
                border: 1px solid #ddd;
            }

            .penjualan {
                background: linear-gradient(135deg, #2575FC, #43e97b);
                color: white;
                font-weight: bold;
            }

            thead tr {
                background: linear-gradient(135deg, #2575FC, #43e97b);
                color: white;
                font-weight: bold;
            }

            th {
                color: white;
                font-weight: bold;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #ddd;
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
            }  
        </style>
    </head>

    <body>
        <h1><b>Riwayat Transaksi</b></h1>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @elseif(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <div class="search-container">
            <div class="filter-box">
                <select id="filter-transaksi">
                    <option value="all">Riwayat</option>
                    <option value="1">ID Transaksi</option>
                    <option value="7">Nomor telepon</option>
                    <option value="7">Nama Pelanggan</option>
                    <option value="30">Nama Transaksi</option>
                    <option value="365-sales">Nama Sales</option>
                    <option value="365-package">Jenis Paket</option>
                    <option value="365-merchandise">Merchandise</option>
                    <option value="365-payment">Metode Pembayaran</option>
                </select>
            </div>
            <div class="search-box">
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari...">
                <i class="fa fa-search"></i>
            </div>
        </div>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <div class="container d-flex justify-content-center align-items-center mt-3">
            <div class="row w-100">

                <div class="col-md-6">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-success">Total Penjualan</h3>
                            <p class="card-text fw-bold">Rp {{ number_format($totalPenjualan, 0, ',', '.') }},-</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Total Insentif</h3>
                            <p class="card-text fw-bold">Rp {{ number_format($totalInsentif, 0, ',', '.') }},-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="data-table" id="transactionTable">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $transaction)
                    <tr>
                        <td data-label="ID Transaksi">{{ $transaction->id_transaksi }}</td>
                        <td data-label="Nomor Telepon">{{ $transaction->nomor_telepon }}</td>
                        <td data-label="Nama Pelanggan">{{ $transaction->nama_pelanggan }}</td>
                        <td data-label="Tanggal Transaksi">{{ $transaction->aktivasi_tanggal }}</td>
                        <td data-label="Nama Sales">{{ $transaction->nama_sales }}</td>
                        <td data-label="Jenis Paket">
                            {{ $transaction->produk ? $transaction->produk->produk_nama : 'Produk tidak ditemukan' }}
                        </td>
                        <td data-label="Merchandise">{{ $transaction->merchandise }}</td>
                        <td data-label="Metode Pembayaran">{{ $transaction->metode_pembayaran }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function searchTable() {
                const input = document.getElementById('searchInput');
                const filter = input.value.toLowerCase();
                const table = document.getElementById('transactionTable');
                const rows = table.getElementsByTagName('tr');

                for (let i = 1; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    let match = false;

                    for (let j = 0; j < cells.length; j++) {
                        if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }

                    rows[i].style.display = match ? '' : 'none';
                }
            }
        </script>
    </body>
    </html>
</x-supvis.supvislayouts>
