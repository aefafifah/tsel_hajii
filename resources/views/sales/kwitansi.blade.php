<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Pembayaran</title>
    <style>
 body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: transparent;
}
g        .container {
            width: 80mm;
            height: 125mm;
            margin: auto;
            background: #fff;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: 0;
            width: 60mm;
            height: 60mm;
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
                    <td>{{ $formData['tanggal_transaksi'] }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Sales</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Pelanggan</td>
                    <td>{{ $formData['nama_pelanggan'] }}</td>
                </tr>
                <tr>
                    <td class="label">No. Tlp Pelanggan</td>
                    <td>{{ $formData['nomor_injeksi'] }}</td>
                </tr>
                <tr>
                    <td class="label">Aktivasi Tanggal</td>
                    <td>{{ $formData['aktivasi_tanggal'] }}</td>
                </tr>
            </table>
            <h3 style="font-size: 12px; margin: 5px 0;">Paket Internet Haji</h3>
            <table style="width: 100%; border: 1px solid #ccc; text-align: center; padding: 10px;">
                <tr>
                    <td>
                        {{ $formData['produk_nama'] }} <s>Rp {{ number_format($formData['produk_harga'], 0, ',', '.') }},-</s> <br> 
                        <span
                            style="display: block; margin-top: 10px; font-size: 13px; font-weight: bold; color:rgba(0, 0, 0, 0.99);">
                            Rp {{ number_format($formData['produk_harga_akhir'], 0, ',', '.') }},-
                        </span>
                    </td>
                </tr>
            </table>

            <h3 style="font-size: 12px; margin: 5px 0;">Merchandise</h3>
            <table>
                <tr>
                    <td class="label">Barang</td>
                    <td>{{ $formData['merch_nama'] }}</td>
                </tr>
            </table>
            <h3 style="font-size: 12px; margin: 5px 0;">Pembayaran</h3>
            <table>
                <tr>
                    <td class="label">Metode</td>
                    <td>{{ $formData['metode_pembayaran'] }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Contact Person : {{ Auth::user()->name }}</p>
            <p>No Tlp : {{ Auth::user()->phone }}</p>
        </div>
    </div>
</body>
</html>
