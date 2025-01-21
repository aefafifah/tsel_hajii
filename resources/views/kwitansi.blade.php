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
            background-color: #f7f7f7;
        }
        .container {
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
    <img src="{{ asset('admin_asset/img/photos/icon_telkomsel.png') }}" alt="Icon Telkomsel"
    class="watermark">
        <div class="header">
            <img src="{{ asset('admin_asset/img/photos/logo_telkomsel.png') }}" alt="Logo">
            <h1>KWITANSI PEMBAYARAN</h1>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td class="label">No. Transaksi</td>
                    <td>trx-Vla6rUg1J</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Pembelian</td>
                    <td>20 Mei 2025</td>
                </tr>
                <tr>
                    <td class="label">Nama Sales</td>
                    <td>Telkomsel Event Haji</td>
                </tr>
                <tr>
                    <td class="label">Nama Pelanggan</td>
                    <td>bany_at_telkomsel</td>
                </tr>
                <tr>
                    <td class="label">No. Tlp Pelanggan</td>
                    <td>0812-xxxx-xxxx</td>
                </tr>
                <tr>
                    <td class="label">Aktivasi Tanggal</td>
                    <td>20 Mei 2025</td>
                </tr>
            </table>
            <h3 style="font-size: 12px; margin: 5px 0;">Paket Internet Haji</h3>
            <table style="width: 100%; border: 1px solid #ccc; text-align: center; padding: 10px;">
                <tr>
                    <td>
                        17 GB - COMBO - 30D <strike>Rp 870.000,-</strike><br>
                        <span style="display: block; margin-top: 10px; font-size: 13px; font-weight: bold; color:rgba(0, 0, 0, 0.99);">
                            (Rp 850.000,-)
                        </span>
                    </td>
                </tr>
            </table>

            <h3 style="font-size: 12px; margin: 5px 0;">Merchandise</h3>
            <table>
                <tr>
                    <td class="label">Barang</td>
                    <td>Tumbler</td>
                </tr>
            </table>
            <h3 style="font-size: 12px; margin: 5px 0;">Pembayaran</h3>
            <table>
                <tr>
                    <td class="label">Metode</td>
                    <td>Tunai</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Contact Person : Telkomsel Event Haji</p>
            <p>No Tlp : 0812-xxxx-xxxx</p>
        </div>
    </div>
</body>
</html>