<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 800px;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: right;
            margin-bottom: 20px;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
        }
        .checkbox-group div {
            width: 48%;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .footer .sign {
            width: 48%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
        .notification {
            color: red;
            display: none;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span>Telkomsel</span>
        </div>
        <div class="title">
            KWITANSI PEMBAYARAN
        </div>
        <form action="{{ url('/transaksi/submit') }}" method="POST">   
        <div class="form-group">
    <label>No:</label>
    <input 
        type="text" 
        name="no" 
        placeholder="Masukkan nomor" 
        pattern="\d+" 
        oninput="validateInput(this)" 
        required>
    <small id="error-message" style="color: red; display: none;">Harap masukkan hanya angka (nomor)</small>
</div>

<script>
    function validateInput(input) {
        const errorMessage = document.getElementById('error-message');
        
        // Cek apakah input hanya berisi angka
        if (!/^\d*$/.test(input.value)) { // Ubah regex agar menerima kosong untuk validasi berjalan saat input kosong
            // Set pesan error jika input tidak valid
            input.setCustomValidity('Harap masukkan hanya angka (nomor)');
            errorMessage.style.display = 'block'; // Tampilkan pesan error
        } else {
            // Hapus pesan error jika input valid
            input.setCustomValidity('');
            errorMessage.style.display = 'none'; // Sembunyikan pesan error
        }
    }
</script>

</script>
<div class="form-group">
    <label>Telah Terima Dari:</label>
    <input 
        type="text" 
        name="telah_terima_dari" 
        placeholder="Masukkan nama penerima" 
        pattern="[a-zA-Z\s]+" 
        oninvalid="this.setCustomValidity('Harap masukkan huruf saja')" 
        oninput="this.setCustomValidity('')" 
        required>
        
</div>
<div class="form-group">
    <label>Nomor Telepon:</label>
    <input 
        type="text" 
        name="nomor_telepon" 
        placeholder="Masukkan nomor telepon" 
        pattern="\d+" 
        oninvalid="this.setCustomValidity('Harap masukkan nomor saja')" 
        oninput="this.setCustomValidity('')" 
        required>
</div>
<div class="form-group">
    <label>Nama Pelanggan:</label>
    <input 
        type="text" 
        name="nama_pelanggan" 
        placeholder="Masukkan nama pelanggan" 
        pattern="[a-zA-Z\s]+" 
        oninvalid="this.setCustomValidity('Harap masukkan huruf saja')" 
        oninput="this.setCustomValidity('')" 
        required>
</div>
<div class="form-group">
    <label>Uang Sejumlah:</label>
    <input 
        type="text" 
        name="uang_sejumlah" 
        placeholder="Masukkan jumlah uang"
        pattern="[a-zA-Z0-9\s]+" 
        oninvalid="this.setCustomValidity
        oninput="this.setCustomValidity
        required>
</div>

            <div class="form-group">
                <label>Aktivasi Tanggal:</label>
                <input type="date" name="aktivasi_tanggal">
            </div>
            <div class="form-group">
                <label>Untuk Pembayaran: Paket Haji</label>
            </div>

            <div class="form-group">
    <label>Pilih Paket Internet:</label>
    <div class="checkbox-group">
        <div class="checkbox-box">
            <input type="radio" id="paket1" name="paket" value="11GB_COMBO_20D_590000">
            <label for="paket1">
                <span class="checkbox-icon"></span>
                11 GB - COMBO - 20D<br>Rp 590,000
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="paket2" name="paket" value="17GB_COMBO_30D_850000">
            <label for="paket2">
                <span class="checkbox-icon"></span>
                17 GB - COMBO - 30D<br>Rp 850,000
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="paket3" name="paket" value="23GB_COMBO_45D_1010000">
            <label for="paket3">
                <span class="checkbox-icon"></span>
                23 GB - COMBO - 45D<br>Rp 1,010,000
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="paket4" name="paket" value="11GB_INTERNET_20D_490000">
            <label for="paket4">
                <span class="checkbox-icon"></span>
                11 GB - INTERNET - 20D<br>Rp 490,000
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="paket5" name="paket" value="17GB_INTERNET_30D_700000">
            <label for="paket5">
                <span class="checkbox-icon"></span>
                17 GB - INTERNET - 30D<br>Rp 700,000
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="paket6" name="paket" value="23GB_INTERNET_45D_855000">
            <label for="paket6">
                <span class="checkbox-icon"></span>
                23 GB - INTERNET - 45D<br>Rp 855,000
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Pilih Merchandise:</label>
    <div class="checkbox-group">
        <div class="checkbox-box">
            <input type="radio" id="merch1" name="merchandise" value="bantal_leher">
            <label for="merch1">
                <span class="checkbox-icon"></span>
                Bantal Leher
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="merch2" name="merchandise" value="payung">
            <label for="merch2">
                <span class="checkbox-icon"></span>
                Payung
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="merch3" name="merchandise" value="tas_serut">
            <label for="merch3">
                <span class="checkbox-icon"></span>
                Tas Serut
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="merch4" name="merchandise" value="tumbler">
            <label for="merch4">
                <span class="checkbox-icon"></span>
                Tumbler
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="merch5" name="merchandise" value="kipas">
            <label for="merch5">
                <span class="checkbox-icon"></span>
                Kipas
            </label>
        </div>
    </div>
</div>

<style>
    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    .checkbox-box {
        display: flex;
        align-items: center;
        width: 48%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fefefe;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: 0.3s;
    }
    .checkbox-box:hover {
        border-color: #007bff;
        background-color: #eaf4ff;
    }
    .checkbox-box input {
        display: none;
    }
    .checkbox-box label {
        display: flex;
        align-items: center;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        color: #333;
    }
    .checkbox-icon {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin-right: 10px;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        position: relative;
        transition: background-color 0.3s, border-color 0.3s;
    }
    input:checked + label .checkbox-icon {
        background-color: #007bff;
        border-color: #007bff;
    }
    input:checked + label .checkbox-icon::after {
        content: '✔';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 14px;
        font-weight: bold;
    }
</style>
   
            <div class="form-group">
                <label>Tanggal Pembelian:</label>
                <input type="date" name="tanggal_pembelian">
            </div>
        </form>
    </div>
</body>
</html>
