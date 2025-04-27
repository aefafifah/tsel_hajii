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
            width: 80mm;
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
            width: 100%;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .content table td {
            padding: 4px;
            border: none;
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

        .lunas-text {
            font-weight: bold;
            font-size: 14px;
            margin-top: 8px;
            display: block;
            text-align: center;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ $formData['logo'] }}" alt="Logo">
            <h1>KWITANSI PEMBAYARAN</h1>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td class="label">No. Transaksi</td>
                    <td>: {{ $formData['id_transaksi'] }}</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Pembelian</td>
                    <td>: {{ \Carbon\Carbon::parse($formData['tanggal_transaksi'])->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Sales</td>
                    <td>: {{ $formData['nama_sales'] }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Pelanggan</td>
                    <td>: {{ $formData['nama_pelanggan'] }}</td>
                </tr>
                <tr>
                    <td class="label">No. Tlp Pelanggan</td>
                    <td>: {{ $formData['telepon_pelanggan'] }}</td>
                </tr>
            </table>

            <table>
                <tr>
                    <td class="label">Nomor Injeksi</td>
                    <td>: {{ $formData['nomor_injeksi'] }}</td>
                </tr>
                <tr>
                    <td class="label">Aktivasi Tanggal</td>
                    <td>: {{ $formData['aktivasi_tanggal'] }}</td>
                </tr>
            </table>

            <h3 style="font-size: 12px; margin: 5px 0; text-align: left;">Paket Internet Haji</h3>
            <table style="width: 100%; text-align: center; padding: 10px;">
                <tr>
                    <td>
                        {{ $formData['produk_nama'] }} <s>Rp {{ number_format($formData['produk_harga'], 0, ',', '.') }},-</s>
                        <br>
                        <span style="display: block; margin-top: 10px; font-size: 13px; font-weight: bold;">
                            Rp {{ number_format($formData['produk_harga_akhir'], 0, ',', '.') }},-
                        </span>
                        <span class="lunas-text">LUNAS</span>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td class="label">Merchandise</td>
                    <td>: {{ $formData['merch_nama'] }}</td>
                </tr>
                <tr>
                    <td class="label">Pembayaran</td>
                    <td>: {{ $formData['metode_pembayaran'] }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Contact Person : {{ $formData['nama_sales'] }}</p>
            <p>No Tlp : {{ $formData['nomor_telepon'] }}</p>
        </div>
    </div>
</body>

</html>
