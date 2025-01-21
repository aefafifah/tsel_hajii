<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="produk_nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="produk_nama" name="produk_nama" value="{{ old('produk_nama', $produk->produk_nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="produk_harga" class="form-label">Harga Produk</label>
                <input type="text" class="form-control" id="produk_harga" name="produk_harga" value="{{ old('produk_harga', $produk->produk_harga) }}" required>
            </div>

            <div class="mb-3">
                <label for="produk_diskon" class="form-label">Diskon (%)</label>
                <input type="number" class="form-control" id="produk_diskon" name="produk_diskon" value="{{ old('produk_diskon', $produk->produk_diskon) }}">
            </div>

            <div class="mb-3">
                <label for="produk_stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="produk_stok" name="produk_stok" value="{{ old('produk_stok', $produk->produk_stok) }}" required>
            </div>

            <div class="mb-3">
                <label for="produk_detail" class="form-label">Detail Produk</label>
                <textarea class="form-control" id="produk_detail" name="produk_detail" rows="4" required>{{ old('produk_detail', $produk->produk_detail) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="merchandises" class="form-label">Merchandise</label>
                <div>
                    @foreach ($merchandises as $merchandise)
                        <div class="form-check">
                            <input type="checkbox" name="merchandises[]" id="merchandise_{{ $merchandise->id }}"
                                   value="{{ $merchandise->id }}"
                                   class="form-check-input"
                                   {{ is_array(old('merchandises', $produk->merchandises->pluck('id')->toArray())) && in_array($merchandise->id, old('merchandises', $produk->merchandises->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label" for="merchandise_{{ $merchandise->id }}">
                                {{ $merchandise->merch_nama }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Status</label>
                <select class="form-control" id="is_active" name="is_active">
                    <option value="1" {{ old('is_active', $produk->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active', $produk->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
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
    </script>
</x-supvis.supvislayouts>
