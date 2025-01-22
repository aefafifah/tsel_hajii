<x-sales.saleslayouts>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Transactions</title>
</head>
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
    margin-top: 20px;
}

th, td {
    padding: 12px;
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

@media screen and (max-width: 768px) {
    .table-responsive {
        overflow-y: auto; 
        max-height: 400px; 
    }

    table {
        width: 100%; 
        border-collapse: collapse;
    }

    th, td {
        font-size: 0.8rem;
        padding: 10px;
    }
}
</style>


    </style>
<body>
    <h1>Riwayat Transaksi</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @elseif(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <table border="1">
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
                <td>{{ $transaction->id_transaksi }}</td>
                <td>{{ $transaction->nomor_telepon }}</td>
                <td>{{ $transaction->nama_pelanggan }}</td>
                <td>{{ $transaction->aktivasi_tanggal }}</td>
                <td>{{ $transaction->nama_sales }}</td>
                <td>{{ $transaction->jenis_paket }}</td>
                <td>{{ $transaction->merchandise }}</td>
                <td>{{ $transaction->metode_pembayaran }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>



</x-sales.saleslayouts>