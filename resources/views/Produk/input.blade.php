<x-supvis.supvislayouts>
    <style>
        .custom-card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .custom-button {
            background: linear-gradient(135deg, rgb(33, 226, 62), #2575FC);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .custom-button:hover {
            background: linear-gradient(135deg, #2575FC, rgb(33, 226, 62));
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff4b5c, #d32f2f);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #d32f2f, #ff4b5c);
            transform: scale(1.05);
        }

        .is-invalid {
            border: 2px solid red;
            background-color: #ffe5e5;
    }
    </style>

    <div class="container mt-5">
        <h2 class="text-center mb-4"><strong>Tambah Produk</strong></h2>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card custom-card p-4">
            <form action="{{ route('produk.store') }}" method="POST" onsubmit="removeFormatBeforeSubmit()">
                @csrf
                
                <div class="form-group mb-3">
                    <label for="produk_nama">Nama Produk</label>
                    <input type="text" name="produk_nama" id="produk_nama" class="form-control" value="{{ old('produk_nama') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="produk_harga">Harga Produk</label>
                    <input type="text" name="produk_harga" id="produk_harga" class="form-control" value="{{ old('produk_harga') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="produk_diskon">Diskon (Rp)</label>
                    <input type="text" name="produk_diskon" id="produk_diskon" class="form-control" value="{{ old('produk_diskon') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="produk_stok">Stok Produk</label>
                    <input type="number" name="produk_stok" id="produk_stok" class="form-control" value="{{ old('produk_stok') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="produk_detail">Detail Produk</label>
                    <textarea name="produk_detail" id="produk_detail" class="form-control" rows="4">{{ old('produk_detail') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="produk_insentif">Insentif (Rp)</label>
                    <input type="text" name="produk_insentif" id="produk_insentif" class="form-control" value="{{ old('produk_insentif') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="merchandises">Merchandise</label>
                    <div>
                        @foreach ($merchandises as $merchandise)
                            <div class="form-check">
                                <input type="checkbox" name="merchandises[]" id="merchandise_{{ $merchandise->id }}" value="{{ $merchandise->id }}" class="form-check-input" {{ is_array(old('merchandises')) && in_array($merchandise->id, old('merchandises')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="merchandise_{{ $merchandise->id }}">
                                    {{ $merchandise->merch_nama }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="text-center d-flex justify-content-center gap-3 mt-3">
                    <button type="submit" class="btn custom-button">Simpan</button>
                    <button type="button" class="btn btn-danger" id="cancelButton">Batal</button>
                </div>
            </form>
        </div>
    </div>


<script>
    // Fungsi format Rupiah tetap
    const formatRupiah = (value) => {
        const numberString = value.replace(/[^,\d]/g, '').toString();
        const split = numberString.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            const separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    };

    document.getElementById('produk_harga').addEventListener('input', function(e) {
        this.value = formatRupiah(this.value);
    });

    document.getElementById('produk_diskon').addEventListener('input', function(e) {
        this.value = formatRupiah(this.value);
    });

    document.getElementById('produk_insentif').addEventListener('input', function(e) {
        this.value = formatRupiah(this.value);
    });

    function removeFormatBeforeSubmit() {
        const hargaInput = document.getElementById('produk_harga');
        const diskonInput = document.getElementById('produk_diskon');
        const insentifInput = document.getElementById('produk_insentif');

        hargaInput.value = hargaInput.value.replace(/\./g, '').replace(',', '.');
        diskonInput.value = diskonInput.value.replace(/\./g, '').replace(',', '.');
        insentifInput.value = insentifInput.value.replace(/\./g, '').replace(',', '.');

        if (diskonInput.value === '') diskonInput.value = 0;
        if (insentifInput.value === '') insentifInput.value = 0;
    }
   
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector(".custom-button").addEventListener("click", function (event) {
            event.preventDefault();

            let namaProduk = document.getElementById("produk_nama").value.trim();
            let hargaProduk = document.getElementById("produk_harga").value.trim();
            let stokProduk = document.getElementById("produk_stok").value.trim();

            if (namaProduk === "" || hargaProduk === "" || stokProduk === ""  || detailProduk ===""  || insentif ===""  || merchandise === ""  || status ==="") {
                Swal.fire({
                    title: "Oops!",
                    text: "Harap isi semua kolom sebelum menyimpan.",
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            } else {
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin menyimpan produk ini?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Simpan",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        removeFormatBeforeSubmit();
                        document.querySelector("produkform").submit();
                    }
                });
            }
        });

        document.getElementById("cancelButton").addEventListener("click", function () {
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin membatalkan?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Batalkan",
                cancelButtonText: "Kembali"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('produk.index') }}";
                }
            });
        });
    });
</script>
</x-supvis.supvislayouts> 


