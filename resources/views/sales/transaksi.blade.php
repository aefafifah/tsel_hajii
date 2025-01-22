<x-sales.saleslayouts>

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

        .header {
            text-align: right;
            background-color: rgba(255, 0, 0, 0.72);
            color: #fff;
            padding: 15px 25px; /* Menambah padding */
            font-size: 20px; /* Memperbesar ukuran teks */
        }
        .title {
            text-align: center;
            margin: 25px 0;
            font-size: 23px; /* Memperbesar judul */
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
            font-size: 14px; /* Memperbesar teks label */
            margin-bottom: 10px;
            color: #333;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px; /* Memperbesar padding */
            font-size: 13px; /* Memperbesar teks */
            border: 1px solid #ccc;
            border-radius: 6px; /* Membuat lebih bulat */
            box-sizing: border-box;
        }
        .checkbox-group {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 15px;
        padding: 10px;
    }

    .checkbox-box {
        display: flex;
        align-items: center;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fefefe;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: 0.3s;
    }

    .checkbox-box:hover {
        border-color: #0056b3;
        background-color: #e0f0ff;
        box-shadow: 0 4px 8px rgba(0, 86, 179, 0.2);
    }

    .checkbox-box input {
        display: none;
    }

    .checkbox-box label {
        display: flex;
        align-items: center;
        font-size: 8px;
        font-weight: bold;
        cursor: pointer;
        color: #333;
        flex-grow: 1;
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
        transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
    }

    /* Checkbox Checked State */
    input:checked + label .checkbox-icon {
        background-color: #007bff;
        border-color: #007bff;
        transform: scale(1.1); /* Animasi kecil */
    }
    input:checked + label .checkbox-icon::after {
        content: '✔';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 10px;
        font-weight: bold;
    }

<<<<<<< HEAD
    @media (max-width: 768px) {
        .checkbox-group {
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 13px;
=======
<body>
    <div class="container">
        <div>
            <img src="{{ asset('admin_asset/img/photos/logo_telkomsel.png') }}" alt="Logo Telkomsel" style="height: 40px; width: auto; filter: drop-shadow(2px 2px 5px rgba(0, 0, 0, 0.1));">
        </div>
        <div class="title">
            TRANSAKSI PEMBAYARAN
        </div>
        <form action="{{ route('sales.transaksi.submit') }}" method="POST">
        @csrf
            <div class="form-group">
                @php $id_transaksi = str()->random(); @endphp
                <label>No: {{ $id_transaksi }} </label>
                <input 
                    type="hidden" 
                    name="id_transaksi" 
                    id="id_transaksi"
                    value="{{ $id_transaksi }}"> 
                <div class="form-group">
                <label>Nama Sales:</label>
                <input 
                    type="text" 
                    name="nama_sales" 
                    id="nama_sales" 
                    placeholder="Masukkan nama Sales" 
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
                <label for="aktivasi-tanggal">Aktivasi Tanggal:</label>
                <input type="date" id="aktivasi-tanggal" name="aktivasi_tanggal" class="form-control" required>
            </div>
            <div class="form-group">
            </div>


            <div class="form-group">
                <label>Pilih Paket Internet:</label>
                <div class="checkbox-group">
                    @foreach($produks as $index => $produk)
                    <div class="checkbox-box">
                        <input 
                            type="radio" 
                            id="paket{{ $index + 1 }}" 
                            name="paket" 
                            value="{{ $produk->produk_id }}"
                        >
                        <label for="paket{{ $index + 1 }}">
                            <span class="checkbox-icon"></span>
                            {{ $produk->produk_nama }} <br>
                            {{ $produk->produk_detail }} <br>
                            Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="form-group">
                <label>Pilih Merchandise:</label>
                
                <div class="checkbox-group">
                    @foreach($merchandises as $index => $merchandise)
                    <div class="checkbox-box">
                        <input type="radio" id="merch{{ $index + 1 }}" name="merchandise" value="{{ $merchandise->merchandise_id }}">
                        <label for="merch{{ $index + 1 }}">
                            <span class="checkbox-icon"></span>
                            {{ $merchandise->merch_nama }}
                        </label>
                    </div>
                    @endforeach
                </div>
                
            </div>
   
            <div class="form-group">
                <label>Tanggal Pembelian:</label>
                <input type="date" name="tanggal_pembelian">
            </div>
    </div>

    <div class="form-group"> 
    <label>Metode Pembayaran:</label>
    <div class="checkbox-group">
        <div class="checkbox-box">
            <input type="radio" id="metode1" name="metode_pembayaran" value="tunai" required>
            <label for="metode1">
                <span class="checkbox-icon"></span>
                Tunai
            </label>
        </div>
        <div class="checkbox-box">
            <input type="radio" id="metode2" name="metode_pembayaran" value="non_tunai" required>
            <label for="metode2">
                <span class="checkbox-icon"></span>
                Non Tunai
            </label>
        </div>
        </form>
    </div>

    <div class="form-group" style="text-align: center; margin-top: 20px;">
    <!-- Tombol Oke untuk menyimpan data -->
    <button 
        type="submit" 
        onclick="return OkeForm()" 
        style="
            padding: 10px 20px; 
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
            padding: 10px 20px; 
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
   function OkeForm() {
    // Ambil semua input form dengan atribut required
    const inputs = document.querySelectorAll("input[required]");
    let isValid = true;

    // Periksa apakah semua input sudah terisi
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.style.borderColor = "red"; // Tandai input kosong dengan border merah
        } else {
            input.style.borderColor = ""; // Reset border jika valid
>>>>>>> yuan
        }
        .checkbox-box {
            padding: 13px;
            height: auto;
        }
        .checkbox-box label {
            font-size: 7px;
            line-height: 1.5;
        }
        .checkbox-icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }
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
            font-size: 10px;
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
            background-color:rgb(34, 39, 195);
            color: white;
        }
        .form-buttons button:hover {
            opacity: 0.9;
        }
    </style>

    </head>

    <body>
        <div class="container">
            <div>
                <img src="{{ asset('admin_asset/img/photos/logo_telkomsel.png') }}" alt="Logo Telkomsel" style="height: 40px; width: auto; filter: drop-shadow(2px 2px 5px rgba(0, 0, 0, 0.1));">
            </div>
            <div class="title">
                TRANSAKSI PEMBAYARAN
            </div>
            <form action="{{ route('sales/transaksi/submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    @php $id_transaksi = str()->random(); @endphp
                    <label>No: {{ $id_transaksi }} </label>
                    <input
                        type="hidden"
                        name="id_transaksi"
                        id="id_transaksi"
                        value="{{ $id_transaksi }}">
                    <div class="form-group">
                    <label>Nama Sales:</label>
                    <input
                        type="text"
                        name="nama_sales"
                        id="nama_sales"
                        placeholder="Masukkan nama Sales"
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
                    <label for="aktivasi-tanggal">Aktivasi Tanggal:</label>
                    <input type="date" id="aktivasi-tanggal" name="aktivasi_tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                </div>


                <div class="form-group">
                    <label>Pilih Paket Internet:</label>
                    <div class="checkbox-group">
                        @foreach($produks as $index => $produk)
                        <div class="checkbox-box">
                            <input
                                type="radio"
                                id="paket{{ $index + 1 }}"
                                name="paket"
                                value="{{ $produk->produk_id }}"
                            >
                            <label for="paket{{ $index + 1 }}">
                                <span class="checkbox-icon"></span>
                                {{ $produk->produk_nama }} <br>
                                {{ $produk->produk_detail }} <br>
                                Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label>Pilih Merchandise:</label>

                    <div class="checkbox-group">
                        @foreach($merchandises as $index => $merchandise)
                        <div class="checkbox-box">
                            <input type="radio" id="merch{{ $index + 1 }}" name="merchandise" value="{{ $merchandise->merchandise_id }}">
                            <label for="merch{{ $index + 1 }}">
                                <span class="checkbox-icon"></span>
                                {{ $merchandise->merch_nama }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="form-group">
                    <label>Tanggal Pembelian:</label>
                    <input type="date" name="tanggal_pembelian">
                </div>
        </div>

        <div class="form-group">
        <label>Metode Pembayaran:</label>
        <div class="checkbox-group">
            <div class="checkbox-box">
                <input type="radio" id="metode1" name="metode_pembayaran" value="tunai" required>
                <label for="metode1">
                    <span class="checkbox-icon"></span>
                    Tunai
                </label>
            </div>
            <div class="checkbox-box">
                <input type="radio" id="metode2" name="metode_pembayaran" value="non_tunai" required>
                <label for="metode2">
                    <span class="checkbox-icon"></span>
                    Non Tunai
                </label>
            </div>
            </form>
        </div>

        <div class="form-group" style="text-align: center; margin-top: 20px;">
        <!-- Tombol Oke untuk menyimpan data -->
        <button
            type="submit"
            onclick="return OkeForm()"
            style="
                padding: 10px 20px;
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
                padding: 10px 20px;
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
       function OkeForm() {
        // Ambil semua input form dengan atribut required
        const inputs = document.querySelectorAll("input[required]");
        let isValid = true;

        // Periksa apakah semua input sudah terisi
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = "red"; // Tandai input kosong dengan border merah
            } else {
                input.style.borderColor = ""; // Reset border jika valid
            }
        });
              // Tampilkan notifikasi
        if (isValid) {
            alert("Transaksi Sukses!");
            alert("Transaksi telah disimpan");

            // Reset form setelah data disimpan
            const form = document.getElementById("form-transaksi");
            if (form) {
                form.reset(); // Reset semua input ke nilai default
                inputs.forEach(input => {
                    if (input.type === "checkbox" || input.type === "radio") {
                        input.checked = false; // Hilangkan centang pada checkbox atau radio
                    } else {
                        input.value = ""; // Kosongkan input lainnya
                    }
                    input.style.borderColor = ""; // Reset warna border ke default
                });
            }
        } else {
            alert("Lengkapi kolom!");
        }
    }


    function cancelForm() {
        const confirmResult = confirm("Apakah Anda yakin ingin membatalkan pengisian formulir Transaksi?");

        if (confirmResult) {
            // Notifikasi pembatalan
            alert("Form Transaksi telah dibatalkan.");
      // Ambil elemen form berdasarkan ID
      const form = document.getElementById("form-transaksi");
            if (form) {
                // Gunakan reset untuk mengembalikan nilai default form
                form.reset();

                // Untuk memastikan, kosongkan nilai semua input secara manual
                const inputs = form.querySelectorAll("input, select, textarea");
                inputs.forEach(input => {
                    if (input.type === "checkbox" || input.type === "radio") {
                        input.checked = false; // Hilangkan checkbox atau radio yang dicentang
                    } else {
                        input.value = ""; // Kosongkan input lainnya
                    }
                    input.style.borderColor = ""; // Reset warna border ke default
                });
            }
    // Tambahan untuk mereset form lain atau elemen input lainnya yang mungkin ada di luar tag form
    const additionalInputs = document.querySelectorAll("input, select, textarea");
            additionalInputs.forEach(input => {
                if (input.type === "checkbox" || input.type === "radio") {
                    input.checked = false; // Reset checkbox atau radio
                } else {
                    input.value = ""; // Reset input lainnya
                }
                input.style.borderColor = ""; // Reset warna border ke default
            });
        }
    }
    </script>

    </body>
    </html>

    </x-sales.saleslayouts>
