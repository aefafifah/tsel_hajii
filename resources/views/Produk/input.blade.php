<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="produk_nama">Nama Produk</label>
                <input type="text" name="produk_nama" id="produk_nama" class="form-control"
                    value="{{ old('produk_nama') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="produk_harga">Harga Produk</label>
                <input type="text" name="produk_harga" id="produk_harga" class="form-control"
                    value="{{ old('produk_harga') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="produk_diskon">Diskon (Rp)</label>
                <input type="text" name="produk_diskon" id="produk_diskon" class="form-control"
                    value="{{ old('produk_diskon') }}">
            </div>

            <div class="form-group mb-3">
                <label for="produk_stok">Stok Produk</label>
                <input type="number" name="produk_stok" id="produk_stok" class="form-control"
                    value="{{ old('produk_stok') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="produk_detail">Detail Produk</label>
                <textarea name="produk_detail" id="produk_detail" class="form-control" rows="4">{{ old('produk_detail') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="produk_insentif">Insentif</label>
                <input type="text" name="produk_insentif" id="produk_insentif" class="form-control"
                    value="{{ old('produk_insentif') }}">
            </div>

            <div class="form-group mb-3">
                <label for="merchandises">Merchandise</label>
                <div>
                    @foreach ($merchandises as $merchandise)
                        <div class="form-check">
                            <input type="checkbox" name="merchandises[]" id="merchandise_{{ $merchandise->id }}"
                                value="{{ $merchandise->id }}" class="form-check-input"
                                {{ is_array(old('merchandises')) && in_array($merchandise->id, old('merchandises')) ? 'checked' : '' }}>
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

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
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
    </script>
</x-supvis.supvislayouts>
