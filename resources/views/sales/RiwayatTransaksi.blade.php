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

td {
    background-color: #ffffff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

.alert {
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    margin: 15px 0;
}

.alert-success {
    background-color: #4CAF50;
    color: white;
}

.alert-error {
    background-color: #f44336;
    color: white;
}

.container {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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
        margin-bottom: 25px; /* Menambahkan ruang antar riwayat */
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 15px; /* Tambahkan padding untuk tampilan lebih baik */
    }

    td {
        display: flex;
        justify-content: space-between;
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        position: relative;
    }

    td::before {
        content: attr(data-label);
        font-weight: bold;
        text-align: left;
        color: #4CAF50;
    }

    td:last-child {
        border-bottom: 0;
    }

    tr:last-child {
        margin-bottom: 0;
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

    <table class="data-table">
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
</body>
</html>
</x-sales.saleslayouts>
