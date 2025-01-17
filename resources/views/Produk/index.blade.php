<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Produk</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-success mb-3">Tambah Produk</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $produk->produk_nama }}</td>
                        <td>Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}</td>
                        <td>{{ $produk->produk_diskon ?? 0 }}%</td>
                        <td>{{ $produk->produk_stok }}</td>
                        <td>
                            <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-supvis.supvislayouts>
