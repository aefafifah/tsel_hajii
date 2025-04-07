<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Pembayaran</title>
    <style>

@page {
    size: 80mm 150mm;
    margin: 0;
}

body {
    font-family: Arial, sans-serif;
    width: 65mm;
    margin: 0 auto;
    padding: 1mm;
    background: #fff;
    position: relative;
}

.container {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 1;
}

.watermark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.1;
    z-index: 0;
    width: 80mm;
    height: 80mm;
}

.header {
    text-align: center;
    margin-bottom: 5px;
    position: relative;
    z-index: 1;
}

.header h1 {
    margin: 5px 0;
    font-size: 14px;
}

.header img {
    max-width: 35mm;
    margin-bottom: 5px;
}

.content {
    margin-bottom: 5px;
    position: relative;
    z-index: 1;
}

.content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .content table td {
            padding: 4px;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        .content table td.label {
            font-weight: bold;
            width: 40%;
 }
.footer {
    text-align: center;
    font-size: 12px;
    position: relative;
    z-index: 1;
}

.footer p {
    margin: 2px 0;
}

.price-container {
    position: relative;
    display: inline-block;
}
.lunas-img {
    position: absolute;
    top: 60%;
    left: 80%;
    transform: translate(-50%, -50%) rotate(-15deg);
    width: 100px;
    height: auto;
    z-index: 2;
    opacity: 0.9;
}

    </style>
</head>

<body>
    <div class="container">
        <img src="{{ $formData['icon'] }}" alt="Icon Telkomsel" class="watermark">
        <div class="header">
            <img src="{{ $formData['logo'] }}" alt="Logo">
            <h1>KWITANSI PEMBAYARAN</h1>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td class="label">No. Transaksi</td>
                    <td>{{ $formData['id_transaksi'] }}</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Pembelian</td>
                    <td>{{ \Carbon\Carbon::parse($formData['tanggal_transaksi'])->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Sales</td>
                    <td>{{ $formData['nama_sales'] }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Pelanggan</td>
                    <td>{{ $formData['nama_pelanggan'] }}</td>
                </tr>
                <tr>
                    <td class="label">No. Tlp Pelanggan</td>
                    <td>{{ $formData['telepon_pelanggan'] }}</td>
                </tr>

            </table>

            <h3 style="font-size: 12px; text-align: left;">Nomor Injeksi</h3>
            <table style="width: 100%; border: 1px solid #ccc; padding: 0px;">
                <tr>
                    <td class="label">Nomor Injeksi</td>
                    <td>{{ $formData['nomor_injeksi'] }}</td>
                </tr>
                <tr>
                    <td class="label">Aktivasi Tanggal</td>
                    <td>{{ $formData['aktivasi_tanggal'] }}</td>
                </tr>
            </table>


            <h3 style="font-size: 12px; margin: 5px 0; text-align: left;">Paket Internet Haji</h3>
            <table style="width: 100%; border: 1px solid #ccc; text-align: center; padding: 10px;">
                <tr>
                        <td>
                            {{ $formData['produk_nama'] }} <s>Rp {{ number_format($formData['produk_harga'], 0, ',', '.') }},-</s>

                            <br>
                            <span
                                style="display: block; margin-top: 10px; font-size: 13px; font-weight: bold; color:rgba(0, 0, 0, 0.99);">
                                Rp {{ number_format($formData['produk_harga_akhir'], 0, ',', '.') }},-
                                <img src="{{ public_path('admin_asset/img/photos/lunas.png') }}" alt="LUNAS" class="lunas-img">
                            </span>
                        </td>
                </tr>
            </table>

            <h3 style="font-size: 12px; margin: 5px 0; text-align: left;">Merchandise</h3>
            <table>
                <tr>
                    <td class="label">Barang</td>
                    <td>{{ $formData['merch_nama'] }}</td>
                </tr>
            </table>
            <h3 style="font-size: 12px; margin: 5px 0; text-align: left;">Pembayaran</h3>
            <table>
                <tr>
                    <td class="label">Metode</td>
                    <td>{{ $formData['metode_pembayaran'] }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Contact Person :  {{ $formData['nama_sales'] }}</p>
            <p>No Tlp :  {{ $formData['nomor_telepon'] }}</p>
        </div>
    </div>
    </body>
</html>
