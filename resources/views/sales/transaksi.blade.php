<x-Sales.SalesLayouts>

    <head>

        <style>
            body {
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
                background: linear-gradient(45deg, #2575FC, #00C853);
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
                border-color: #2575FC;
                background: linear-gradient(45deg, #2575FC, #00C853);
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
                background: linear-gradient(45deg, #2575FC, #00C853);
                border-color: #2575FC;
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
                background-color: #2575FC;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }

            button[type="button"] {
                padding: 10px 20px;
                font-size: 16px;
                border: none;
                background-color: #00C853;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }

            button[type="submit"]:hover {
                background-color: #0056b3;
            }

            button[type="button"]:hover {
                background-color: #009624;
            }

            .checkbox-box.highlight {
                background-color: #f0f9ff;
                border: 2px solid #00C853;
            }

        
        /* ✅ Tampilan HP (<= 600px) */
@media (max-width: 600px) {
    .card {
        max-width: 100%; /* Supaya card pas di layar */
    }
}

        </style>
    </head>

    <body>
        <div class="container">
            <div>
                <img src="{{ asset('admin_asset/img/photos/logo_telkomsel.png') }}" alt="Logo Telkomsel"
                    style="height: 40px; width: auto; filter: drop-shadow(2px 2px 5px rgba(0, 0, 0, 0.1));">
            </div>
            <div class="card mt-5" style="width: 50rem;">
            <div class="title">TRANSAKSI PEMBAYARAN</div>
            <form action="{{ route('sales/transaksi/submit') }}" method="POST" formtarget="_blank" target="_blank">
                @csrf
                <div class="form-group">
                    @php $id_transaksi = 'T' . str_pad(Auth::user()->id, 3, '0', STR_PAD_LEFT) . date('dmy') . substr(uniqid(), -4); @endphp
                    <label>No: {{ $id_transaksi }} </label>
                    <input type="hidden" name="id_transaksi" id="id_transaksi" value="{{ $id_transaksi }}">
                </div>

                <div class="form-group">
                    <label>Nama Sales: {{ Auth::user()->name }}</label>
                    <input type="hidden" name="nama_sales" id="nama_sales" value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <label>Nomor Sales: {{ Auth::user()->phone }}</label>
                    <input type="hidden" name="nomor_telepon" id="nomor_telepon" value="{{ Auth::user()->phone }}">
                </div>

                {{-- udah dicoba pake component x-form-group tapi tetep tambah error : billy 10/3 --}}

                <div class="form-group">
                    <label>Nama Pelanggan:</label>
                    <input type="text" name="nama_pelanggan" placeholder="Masukkan nama pelanggan"
                        oninput="restrictNameInput(this)" required>
                    <small id="error-message-name" style="color: red; display: none;">Harap masukkan hanya huruf</small>
                </div>

                <div class="form-group">
                    <label>Telepon yg bisa dihubungi:</label>
                    <input type="number" name="telepon_pelanggan" placeholder="Masukkan telepon pelanggan" maxlength="12"
                        oninput="validateInjectionNumber(this)" required>
                    <small id="error-message-injeksi" style="color: red; display: none;">Harap masukkan hanya angka dan
                        maksimal 12 digit</small>
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
                                    Rp {{ number_format($produk->produk_harga_akhir, 0, ',', '.') }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <label>Add on:</label>
                    <div>
                        <input type="checkbox" id="addon_perdana" name="addon_perdana" value="1">
                        <label> Nomor Perdana Baru </label>
                        <br><br>
                    </div>

                <div class="form-group">
                    <label>Nomor Injeksi: (opsional) (bisa diisi sales, ketika cust beli paket doang, nomor dah dapet gratis) (bisa diisi kasir, ketika cust beli dengan Addon nomor perdana baru)</label>
                    <input type="number" name="nomor_injeksi" placeholder="Masukkan nomor injeksi" maxlength="12"
                        oninput="validateInjectionNumber(this)">
                    <small id="error-message-injeksi" style="color: red; display: none;">Harap masukkan hanya angka dan
                        maksimal 12 digit</small>
                </div>

                <div class="form-group">
                     <label for="aktivasi-tanggal">Aktivasi Tanggal:</label>
                     <input type="date" id="aktivasi-tanggal" name="aktivasi_tanggal" class="form-control" required>
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
                    <input type="datetime-local" id="tanggal_transaksi" name="tanggal_transaksi" class="form-control"
                        value="<?php echo date('Y-m-d\TH:i'); ?>" readonly required>
                </div>
                
                <div class="form-group" style="text-align: center; margin-top: 20px;">
                    <button type="submit" onclick="return OkeForm()">Oke</button>
                    <button type="button" onclick="cancelForm()">Cancel</button>
                </div>
            </form>
            {{--  --}}

        </div>
        </div>
    </body>    
</x-Sales.SalesLayouts>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date().toISOString().split("T")[0]; // Ambil tanggal hari ini dalam format YYYY-MM-DD
        const dateInput = document.getElementById("aktivasi-tanggal");
        dateInput.setAttribute("min", today); // Set batas minimal tanggal ke hari ini
    });

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

    function validateInjectionNumber(input) {
        const errorMessage = document.getElementById('error-message-injeksi');
        let value = input.value.replace(/\D/g, '');
        if (value.length > 12) {
            value = value.slice(0, 12);
        }
        input.value = value;
        errorMessage.style.display = value.length === 0 ? 'none' : 'block';
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

        const selectedProduk = document.querySelector("input[name='produk']:checked");
        const selectedMerchandise = document.querySelector("input[name='merchandise']:checked");
        const errorMessage = "Harap lengkapi semua kolom!";

        if (!selectedProduk) {
            Swal.fire({ title: "Peringatan!", text: errorMessage, icon: "warning" });
            return false;
        }

        if (!selectedMerchandise) {
            Swal.fire({ title: "Peringatan!", text: "Harap pilih merchandise yang tersedia!", icon: "warning" });
            return false;
        }
        if (isValid) {
            alert("Transaksi sukses dan telah disimpan");

            // Clear all form inputs
            const form = document.querySelector("form");
            form.reset();

            // Clear any custom styling
            inputs.forEach(input => {
                input.style.borderColor = "";
            });

            // Refresh the page after a brief delay
            setTimeout(() => {
                window.location.reload();
            }, 500);
            return true;
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Lengkapi kolom!",
                icon: "warning"
            });
            return false;
        }

    }

    function cancelForm() {
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin membatalkan pengisian formulir Transaksi?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, batalkan!",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.isConfirmed) {
                // Refresh the page
                window.location.reload();
                
            }
        });
    }

</script>
