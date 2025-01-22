<x-sales.saleslayouts>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Transaksi</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            form {
                max-width: 600px;
                margin: auto;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-group label {
                display: block;
                margin-bottom: 5px;
            }
            .form-group input,
            .form-group select {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
            }
            small {
                color: red;
                display: none;
            }
            button {
                padding: 10px 15px;
                background-color: #007BFF;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <h1>Form Transaksi</h1>
        <form action="{{ route('sales/transaksi/submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_sales">Nama Sales</label>
                <input type="text" name="nama_sales" id="nama_sales" placeholder="Masukkan nama Anda"
                    oninput="validateInput(this, /[^a-zA-Z\s]/g, 'error-message-name')" required>
                <small id="error-message-name">Harap masukkan hanya huruf</small>
            </div>

            <div class="form-group">
                <label for="no_telepon">Nomor Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" placeholder="Masukkan nomor telepon Anda"
                    oninput="validateInput(this, /[^0-9]/g, 'error-message-phone')" required>
                <small id="error-message-phone">Harap masukkan hanya angka</small>
            </div>

            <div class="form-group">
                <label>Pilih Paket Internet:</label>
                <input type="radio" name="paket_internet" value="Paket A" required> Paket A<br>
                <input type="radio" name="paket_internet" value="Paket B" required> Paket B<br>
            </div>

            <div class="form-group">
                <label>Pilih Merchandise:</label>
                <input type="checkbox" name="merchandise[]" value="Kaos"> Kaos<br>
                <input type="checkbox" name="merchandise[]" value="Mug"> Mug<br>
            </div>

            <div class="form-group">
                <label>Metode Pembayaran:</label>
                <input type="radio" name="metode_pembayaran" value="Cash" required> Cash<br>
                <input type="radio" name="metode_pembayaran" value="Transfer" required> Transfer<br>
            </div>

            <button type="submit">Submit</button>
        </form>

        <script>
            function validateInput(input, regex, errorMessageId) {
                const errorMessage = document.getElementById(errorMessageId);
                const validValue = input.value.replace(regex, '');

                if (input.value !== validValue) {
                    errorMessage.style.display = 'block';
                } else {
                    errorMessage.style.display = 'none';
                }

                input.value = validValue;
            }
        </script>
    </body>
</x-sales.saleslayouts>
