<x-supvis.supvislayouts>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Input Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Input Produk Baru</h2>
            <form action="{{ route('produk.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="produk_nama" class="form-label">Nama Produk</label>
                    <input type="text" name="produk_nama" id="produk_nama" class="form-control" placeholder="Masukkan nama produk" required>
                </div>

                <div class="mb-3">
                    <label for="produk_harga" class="form-label">Harga Produk</label>
                    <input type="number" name="produk_harga" id="produk_harga" class="form-control" placeholder="Masukkan harga produk" required>
                </div>

                <div class="mb-3">
                    <label for="produk_diskon" class="form-label">Diskon Produk (%)</label>
                    <input type="number" name="produk_diskon" id="produk_diskon" class="form-control" placeholder="Masukkan diskon produk" min="0" max="100">
                </div>

                <div class="mb-3">
                    <label for="produk_detail" class="form-label">Detail Produk</label>
                    <textarea name="produk_detail" id="produk_detail" class="form-control" placeholder="Masukkan detail produk" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="produk_stok" class="form-label">Stok Produk</label>
                    <input type="number" name="produk_stok" id="produk_stok" class="form-control" placeholder="Masukkan stok produk" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Produk</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

</x-supvis.supvislayouts>
