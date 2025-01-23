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
                max-width: 1000px;
                margin: 30px auto;
                background: none;
                border-radius: 0;
                overflow: visible;
                box-shadow: none;
            }

            .header {
                text-align: right;
                background-color: rgba(255, 0, 0, 0.72);
                color: #fff;
                padding: 15px 25px;
                font-size: 20px;
            }

            .title {
                text-align: center;
                margin: 25px 0;
                font-size: 23px;
                font-weight: bold;
                color: #333;
            }

            form {
                padding: 30px;
            }

            .form-group {
                margin-bottom: 25px;
            }

            .form-group label {
                display: block;
                font-size: 14px;
                margin-bottom: 10px;
                color: #333;
            }

            .form-group input,
            .form-group select {
                width: 100%;
                padding: 12px;
                font-size: 13px;
                border: 1px solid #ccc;
                border-radius: 6px;
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

            input:checked+label .checkbox-icon {
                background-color: #007bff;
                border-color: #007bff;
                transform: scale(1.1);
            }

            input:checked+label .checkbox-icon::after {
                content: '✔';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: #fff;
                font-size: 10px;
                font-weight: bold;
            }

            button[type="submit"] {
                padding: 10px 20px;
                margin-right: 10px;
                font-size: 16px;
                border: none;
                background-color: #007bff;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }

            button[type="button"] {
                padding: 10px 20px;
                font-size: 16px;
                border: none;
                background-color: #dc3545;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }

            button[type="submit"]:hover {
                background-color: #0056b3;
            }

            button[type="button"]:hover {
                background-color: #c82333;
            }

            .checkbox-box.highlight {
                background-color: #f0f9ff;
                border: 2px solid #007bff;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div>
                <img src="{{ asset('admin_asset/img/photos/logo_telkomsel.png') }}" alt="Logo Telkomsel"
                    style="height: 40px; width: auto; filter: drop-shadow(2px 2px 5px rgba(0, 0, 0, 0.1));">
            </div>
            <div class="title">TRANSAKSI PEMBAYARAN</div>
            <form action="{{ route('sales/transaksi/submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    @php $id_transaksi = str()->random(); @endphp
                    <label>No: {{ $id_transaksi }} </label>
                    <input type="hidden" name="id_transaksi" id="id_transaksi" value="{{ $id_transaksi }}">
                </div>

                <div class="form-group">
                    <label>Nama Sales:</label>
                    <input type="text" name="nama_sales" id="nama_sales" placeholder="Masukkan nama Sales"
                        oninput="restrictNameInput(this)" required>
                    <small id="error-message-name" style="color: red; display: none;">Harap masukkan hanya huruf</small>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon:</label>
                    <input type="text" name="nomor_telepon" placeholder="Masukkan nomor telepon"
                        oninput="restrictPhoneInput(this)" required>
                    <small id="error-message-phone" style="color: red; display: none;">Harap masukkan hanya
                        angka</small>
                </div>

                <div class="form-group">
                    <label>Nama Pelanggan:</label>
                    <input type="text" name="nama_pelanggan" placeholder="Masukkan nama pelanggan"
                        oninput="restrictNameInput(this)" required>
                    <small id="error-message-name" style="color: red; display: none;">Harap masukkan hanya huruf</small>
                </div>

                <div class="form-group">
                    <label for="aktivasi-tanggal">Aktivasi Tanggal:</label>
                    <input type="date" id="aktivasi-tanggal" name="aktivasi_tanggal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Pilih Paket Internet:</label>
                    <div class="checkbox-group">
                        @foreach ($produks as $produk)
                            <div class="checkbox-box">
                                <input type="radio" id="produk{{ $produk->id }}" name="produk"
                                    value="{{ $produk->id }}" onchange="filterMerchandises({{ $produk->id }})">
                                <label for="produk{{ $produk->id }}">
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
                    <div class="checkbox-group" id="merchandise-container">
                        @foreach ($merchandises as $merchandise)
                            <div class="checkbox-box" data-produk-ids="{{ json_encode($merchandise->produk_ids) }}">
                                <input type="radio" id="merch{{ $merchandise->id }}" name="merchandise"
                                    value="{{ $merchandise->id }}" disabled>
                                <label for="merch{{ $merchandise->id }}">
                                    <span class="checkbox-icon"></span>
                                    {{ $merchandise->merch_nama }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi">
                </div>

                <div class="form-group">
                    <label>Metode Pembayaran:</label>
                    <div class="checkbox-group">
                        <div class="checkbox-box">
                            <input type="radio" id="metode1" name="metode_pembayaran" value="Tunai" required>
                            <label for="metode1">
                                <span class="checkbox-icon"></span>
                                Tunai
                            </label>
                        </div>
                        <div class="checkbox-box">
                            <input type="radio" id="metode2" name="metode_pembayaran" value="Non Tunai" required>
                            <label for="metode2">
                                <span class="checkbox-icon"></span>
                                Non Tunai
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="text-align: center; margin-top: 20px;">
                    <button type="submit" onclick="return OkeForm()">Oke</button>
                    <button type="button" onclick="cancelForm()">Cancel</button>
                </div>
            </form>
        </div>

        <script>
            function restrictNameInput(input) {
                const errorMessage = document.getElementById('error-message-name');
                const onlyLetters = input.value.replace(/[^a-zA-Z\s]/g, '');
                input.value = onlyLetters;
                errorMessage.style.display = input.value === onlyLetters ? 'none' : 'block';
            }

            function restrictPhoneInput(input) {
                const errorMessage = document.getElementById('error-message-phone');
                const onlyNumbers = input.value.replace(/\D/g, '');
                input.value = onlyNumbers;
                errorMessage.style.display = input.value === onlyNumbers ? 'none' : 'block';
            }

            function OkeForm() {
                const inputs = document.querySelectorAll("input[required]");
                let isValid = true;
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = "red";
                    } else {
                        input.style.borderColor = "";
                    }
                });
                if (isValid) {
                    alert("Transaksi Sukses! Transaksi telah disimpan");
                    document.getElementById("form-transaksi").reset();
                } else {
                    alert("Lengkapi kolom!");
                }
            }

            function cancelForm() {
                if (confirm("Apakah Anda yakin ingin membatalkan pengisian formulir Transaksi?")) {
                    alert("Form Transaksi telah dibatalkan.");
                    document.getElementById("form-transaksi").reset();
                }
            }

            function filterMerchandises(selectedProdukId) {
                const merchandises = document.querySelectorAll('#merchandise-container .checkbox-box');

                merchandises.forEach(merchandise => {
                    const produkIds = JSON.parse(merchandise.getAttribute('data-produk-ids'));
                    const checkbox = merchandise.querySelector('input');
                    if (produkIds.includes(selectedProdukId)) {
                        checkbox.disabled = false;
                        merchandise.classList.add('highlight');
                    } else {
                        checkbox.disabled = true;
                        checkbox.checked = false;
                        merchandise.classList.remove('highlight');
                    }
                });
            }
        </script>
    </body>

    </html>
</x-sales.saleslayouts>
