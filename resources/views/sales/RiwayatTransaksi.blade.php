<!DOCTYPE html>
<x-sales.saleslayouts>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Transactions</title>
<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        color: #333;
        margin: 0;
        padding: 0;
        height: 100vh;
    }

    h1 {
        color: #2a3d56;
        font-size: 2.5rem;
        margin-bottom: 20px;
        text-align: center;
    }

    .search-container {
    display: flex;
    justify-content: center;
    margin: 10px auto;
}

.search-box {
    display: flex;
    align-items: center;
    width: 140%;
    max-width: 800px;
    border: 1px solid #ccc;
    border-radius: 80px;
    padding: 7px 15px;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.search-box i {
    color: #aaa;
    margin-right: 10px;
    font-size: 16px;
}

.search-box input {
    border: none;
    outline: none;
    width: 100%;
    font-size: 14px;
    color: #333;
}

.search-box input::placeholder {
    color: #aaa;
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

    th {
        background-color: #4CAF50;
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
            text-align: left;
            color: #4CAF50;
        }
    }
</style>
</head>
<body>
    <h1>Riwayat Transaksi</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @elseif(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <div class="search-container">
    <div class="search-box">
        <i class="fa fa-search"></i>
        <input
            type="text"
            id="searchInput"
            onkeyup="searchTable()"
            placeholder="Search"
        />
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


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
                    <td data-label="Jenis Paket">{{ $transaction->jenis_paket }}</td>
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
</x-sales.saleslayouts>
