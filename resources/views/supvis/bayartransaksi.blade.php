<x-supvis.supvislayouts>

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

            /* Responsive Design */
            @media (max-width: 600px) {
                .card {
                    max-width: 100%;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Edit Transaksi</h2>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('transaksi.bayar', $transaksi->id_transaksi) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control"
                        value="{{ old('nomor_telepon', $transaksi->nomor_telepon) }}" disabled>
                </div>

                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control"
                        value="{{ old('nama_pelanggan', $transaksi->nama_pelanggan) }}" disabled>
                </div>

                <div class="form-group">
                    <label>Produk</label>
                    <select name="produk" class="form-control" disabled>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}"
                                {{ $produk->id == $transaksi->jenis_paket ? 'selected' : '' }}>
                                {{ $produk->produk_nama }} - Rp{{ number_format($produk->produk_harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" name="tanggal_transaksi" class="form-control"
                        value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi) }}" disabled>
                </div>

                <div class="form-group">
                    <label>Aktivasi Tanggal</label>
                    <input type="date" name="aktivasi_tanggal" class="form-control"
                        value="{{ old('aktivasi_tanggal', $transaksi->aktivasi_tanggal) }}" disabled>
                </div>

                <div class="form-group">
                    <label>Telepon Pelanggan</label>
                    <input type="text" name="telepon_pelanggan" class="form-control"
                        value="{{ old('telepon_pelanggan', $transaksi->telepon_pelanggan) }}" disabled>
                </div>

                <div class="form-group">
                    <label>Nomor Injeksi</label>
                    <input type="text" name="nomor_injeksi" class="form-control"
                        value="{{ old('nomor_injeksi', $transaksi->nomor_injeksi ?? '') }}" disabled>
                </div>

                <div class="form-group">
                    <label>Merchandise</label>
                    <select name="merchandise" class="form-control" disabled>
                        @foreach ($merchandises as $merch)
                            <option value="{{ $merch->id }}"
                                {{ $merch->merch_nama == $transaksi->merchandise ? 'selected' : '' }}>
                                {{ $merch->merch_nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <div class="checkbox-group">
                        <div class="checkbox-box">
                            <input type="radio" id="metode1" name="metode_pembayaran" value="Tunai"
                                {{ old('metode_pembayaran', $transaksi->metode_pembayaran) === 'Tunai' ? 'checked' : '' }}
                                required>
                            <label for="metode1">
                                <span class="checkbox-icon"></span>
                                Tunai
                            </label>
                        </div>
                        <div class="checkbox-box">
                            <input type="radio" id="metode2" name="metode_pembayaran" value="Non Tunai"
                                {{ old('metode_pembayaran', $transaksi->metode_pembayaran) === 'Non Tunai' ? 'checked' : '' }}
                                required>
                            <label for="metode2">
                                <span class="checkbox-icon"></span>
                                Non Tunai
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Sales</label>
                    <input type="text" name="nama_sales" class="form-control"
                        value="{{ old('nama_sales', $transaksi->nama_sales) }}" disabled>
                </div>

                <div class="form-group">
                    <label>Addon Perdana</label>
                    <input type="checkbox" name="addon_perdana" value="1"
                        {{ $transaksi->addon_perdana ? 'checked' : '' }} disabled>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
</x-supvis.supvislayouts>
