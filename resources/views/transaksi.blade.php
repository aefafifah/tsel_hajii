<x-layouts>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
    <style>

         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
    max-width: 1000px; /* Tetap sesuai kebutuhan */
    margin: 30px auto; /* Memberi jarak dengan bagian atas */
    background: none; /* Hapus background putih */
    border-radius: 0; /* Hapus sudut membulat */
    overflow: visible; /* Izinkan konten keluar */
    box-shadow: none; /* Hilangkan efek bayangan */
}

    .title {
        text-align: center;
        margin: 25px 0;
        font-size: 26px; /* Memperbesar judul */
        font-weight: bold;
        color: #333;
    }
    form {
        padding: 30px; /* Memperbesar jarak antar elemen */
    }
    .form-group {
        margin-bottom: 25px; /* Memberi jarak antar grup form */
    }
    .form-group label {
        display: block;
        font-size: 18px; /* Memperbesar teks label */
        margin-bottom: 10px;
        color: #333;
    }
    .form-group input, .form-group select {
        width: 100%;
        padding: 12px; /* Memperbesar padding */
        font-size: 18px; /* Memperbesar teks */
        border: 1px solid #ccc;
        border-radius: 6px; /* Membuat lebih bulat */
        box-sizing: border-box;
    }
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
            border-color:rgba(255, 0, 21, 0.79);
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
        .form-group small {
            color: red;
            display: none;
        }
        .form-buttons {
        text-align: center;
        margin-top: 30px; /* Menambah jarak dengan form */
    }
    .form-buttons button {
        padding: 12px 25px; /* Memperbesar tombol */
        font-size: 18px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin: 0 12px;
        transition: background-color 0.3s;
    }
    .form-buttons button.oke {
        background-color: #007bff;
        color: white;
    }
    .form-buttons button.cancel {
        background-color: #dc3545;
        color: white;
    }
    .form-buttons button:hover {
        opacity: 0.9;
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
        oninput="restrictInput(this)" 
        required>
    <small id="error-message" style="color: red; display: none;">Harap masukkan hanya angka (nomor)</small>
</div>

<script>
    function restrictInput(input) {
        const errorMessage = document.getElementById('error-message');
        const onlyNumbers = input.value.replace(/\D/g, ''); // Hapus karakter selain angka

        if (input.value !== onlyNumbers) {
            // Set pesan error jika ada karakter non-angka
            errorMessage.style.display = 'block'; // Tampilkan pesan error
        } else {
            // Sembunyikan pesan error jika valid
            errorMessage.style.display = 'none';
        }

        input.value = onlyNumbers; // Perbarui input hanya dengan angka
    }
</script>

<div class="form-group">
    <label>Telah Terima Dari:</label>
    <input 
        type="text" 
        name="telah_terima_dari" 
        placeholder="Masukkan nama penerima" 
        oninput="restrictTextInput(this)" 
        required>
    <small id="error-message-text" style="color: red; display: none;">Harap masukkan hanya huruf </small>
</div>

<script>
    function restrictTextInput(input) {
        const errorMessage = document.getElementById('error-message-text');
        const onlyLetters = input.value.replace(/[^a-zA-Z\s]/g, ''); // Hapus karakter selain huruf dan spasi

        if (input.value !== onlyLetters) {
            // Set pesan error jika ada karakter non-huruf
            errorMessage.style.display = 'block'; // Tampilkan pesan error
        } else {
            // Sembunyikan pesan error jika valid
            errorMessage.style.display = 'none';
        }

        input.value = onlyLetters; // Perbarui input hanya dengan huruf dan spasi
    }
</script>

<div class="form-group">
    <label>Nomor Telepon:</label>
    <input 
        type="text" 
        name="nomor_telepon" 
        placeholder="Masukkan nomor telepon" 
        oninput="restrictPhoneInput(this)" 
        required>
    <small id="error-message-phone" style="color: red; display: none;">Harap masukkan hanya angka</small>
</div>

<script>
    function restrictPhoneInput(input) {
        const errorMessage = document.getElementById('error-message-phone');
        const onlyNumbers = input.value.replace(/\D/g, ''); // Hapus karakter selain angka

        if (input.value !== onlyNumbers) {
            // Tampilkan pesan error jika input tidak valid
            errorMessage.style.display = 'block';
        } else {
            // Sembunyikan pesan error jika input valid
            errorMessage.style.display = 'none';
        }

        input.value = onlyNumbers; // Perbarui input agar hanya berisi angka
    }
</script>

<div class="form-group">
    <label>Nama Pelanggan:</label>
    <input 
        type="text" 
        name="nama_pelanggan" 
        placeholder="Masukkan nama pelanggan" 
        oninput="restrictNameInput(this)" 
        required>
    <small id="error-message-name" style="color: red; display: none;">Harap masukkan hanya huruf </small>
</div>

<script>
    function restrictNameInput(input) {
        const errorMessage = document.getElementById('error-message-name');
        const onlyLetters = input.value.replace(/[^a-zA-Z\s]/g, ''); // Hapus karakter selain huruf

        if (input.value !== onlyLetters) {
            // Tampilkan pesan error jika input tidak valid
            errorMessage.style.display = 'block';
        } else {
            // Sembunyikan pesan error jika input valid
            errorMessage.style.display = 'none';
        }

        input.value = onlyLetters; // Perbarui input hanya dengan huruf 
    }
</script>

<div class="form-group">
    <label>Uang Sejumlah:</label>
    <input 
        type="text" 
        name="uang_sejumlah" 
        placeholder="Masukkan jumlah uang" 
        oninput="validateAmountInput(this)" 
        required>
    <small id="error-message-amount" style="color: red; display: none;">Harap isi dengan angka atau huruf, jangan dibiarkan kosong</small>
</div>

<script>
    function validateAmountInput(input) {
        const errorMessage = document.getElementById('error-message-amount');
        const trimmedValue = input.value.trim(); // Menghilangkan spasi awal/akhir

        if (trimmedValue === '') {
            // Pesan error jika input kosong
            errorMessage.style.display = 'block';
            input.setCustomValidity('Input tidak boleh kosong');
        } else if (!/^[a-zA-Z0-9\s]+$/.test(trimmedValue)) {
            // Pesan error jika input memiliki karakter tidak valid
            errorMessage.style.display = 'block';
            input.setCustomValidity('Harap hanya masukkan huruf, angka,');
        } else {
            // Input valid
            errorMessage.style.display = 'none';
            input.setCustomValidity('');
        }
    }
</script>

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
   
            <div class="form-group">
                <label>Tanggal Pembelian:</label>
                <input type="date" name="tanggal_pembelian">
            </div>
        </form>
    </div>

    <div class="form-group" style="text-align: center; margin-top: 20px;">
    <!-- Tombol Oke untuk menyimpan data -->
    <button 
        type="button" 
        onclick="OkeForm()" 
        style="
            padding: 10px 50px; 
            margin-right: 10px; 
            font-size: 16px; 
            border: none; 
            background-color: #007bff; 
            color: white; 
            border-radius: 5px; 
            cursor: pointer;">
        Oke
    </button>
    
    <!-- Tombol Cancel untuk membatalkan pengisian -->
    <button 
        type="button" 
        onclick="cancelForm()" 
        style="
            padding: 10px 50px; 
            font-size: 16px; 
            border: none; 
            background-color: #dc3545; 
            color: white; 
            border-radius: 5px; 
            cursor: pointer;">
        Cancel
    </button>
</div>

<script>
    // Fungsi untuk tombol Cancel
    function cancelForm() {
        const confirmResult = confirm("Apakah Anda yakin ingin membatalkan pengisian formulir?");
        
        if (confirmResult) {
            // Notifikasi pembatalan
            alert("Form telah dibatalkan.");
            // Kembali ke halaman sebelumnya
            window.history.back();
        }
    }

    // Fungsi untuk tombol Oke
    function OkeForm() {
        const confirmResult = confirm("Apakah Anda yakin pengisian sudah selesai?");
        
        if (confirmResult) {
            // Notifikasi keberhasilan
            alert("Pengisian berhasil disimpan.");
        }
    }

// Fungsi untuk memvalidasi form sebelum menekan tombol Oke
function validateForm() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[required]');
    const errors = [];

    // Periksa setiap input yang memiliki atribut required
    inputs.forEach(input => {
        if (!input.value.trim()) {
            errors.push(input.name);
        }
    });

    // Jika ada kesalahan (kolom kosong), tampilkan notifikasi
    if (errors.length > 0) {
        alert("Lengkapi kolom yang kosong.");
        return false; // Hentikan proses OkeForm
    }

    return true; // Lanjutkan ke OkeForm jika semua kolom lengkap
}

// Fungsi yang terhubung dengan tombol Oke
function OkeForm() {
    if (validateForm()){
        const confirmResult = confirm("Apakah Anda yakin pengisian sudah selesai?");
        if (confirmResult) {
            // Notifikasi keberhasilan
            alert("Pengisian berhasil disimpan.");
        }
    }
}
</script>
</body>
</html>

</x-layouts>