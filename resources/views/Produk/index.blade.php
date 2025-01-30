<x-supvis.supvislayouts>
    <div class="container mt-5">
    <h2 class="mb-4" style="text-align: center;">Daftar Produk</h2>

    <a href="{{ route('produk.create') }}" class="btn btn-success mb-3" style="background: linear-gradient(to right, #28a745, #2575FC); color: #fff; border: none;">Tambah Produk</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <style>
           body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #43e97b, #2575FC);
    color: #333;
    margin: 0;
    padding: 0;
    height: 100vh;
}

h1 {
    color:#2575FC;
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

.insentif th {
    padding: 9px;
    text-align: left;
    border: 1px solid #ddd;
}

.penjualan {
    background: linear-gradient(135deg, #2575FC, #43e97b); /* Warna gradasi hijau-biru */
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
}  
        </style>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <th>Merchandise</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                    <td data-label="No">{{ $loop->iteration }}</td>
                    <td data-label="Nama Produk">{{ $produk->produk_nama }}</td>
                    <td data-label="Harga">Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}</td>
                    <td data-label="Diskon">Rp{{ number_format($produk->produk_diskon ?? 0, 0, ',', '.') }}</td>
                    <td data-label="Stok">{{ $produk->produk_stok }}</td>
                    
                        <td data-label="Merchandise">
                            @if ($produk->merchandises->isNotEmpty())
                                <ul >
                                    @foreach ($produk->merchandises as $merchandise)
                                        <li>{{ $merchandise->merch_nama }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Tidak ada merchandise
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-supvis.supvislayouts>
