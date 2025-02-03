<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4 text-center"><strong>Daftar Produk</strong></h2>
        <a href="{{ route('produk.create') }}" class="btn btn-success mb-3">Tambah Produk</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($produks->whereNull('deleted_at')->isEmpty())
            <div class="alert alert-warning text-center">
                Belum ada produk yang tersedia.
            </div>
        @else
            <div class="row">
                @foreach ($produks->whereNull('deleted_at') as $produk)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold" style="color: black;">{{ $produk->produk_nama }}</h5>
                                <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}</p>
                                <p class="card-text"><strong>Diskon:</strong> Rp {{ number_format($produk->produk_diskon ?? 0, 0, ',', '.') }}</p>
                                <p class="card-text"><strong>Stok:</strong> {{ $produk->produk_stok }}</p>
                                <p class="card-text">
                                    <strong>Merchandise:</strong>
                                    <span>
                                        @if ($produk->merchandises->isNotEmpty())
                                            @foreach ($produk->merchandises as $merchandise)
                                                {{ $merchandise->merch_nama }}@if (!$loop->last), @endif
                                            @endforeach
                                        @else
                                            Tidak ada merchandise
                                        @endif
                                    </span>
                                </p>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">🔍 Detail</a>
                                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Display Deleted Products --}}
        @if(Auth::user() && Auth::user()->is_superuser)
            <h2 class="mb-4 text-center">Produk Dihapus</h2>
            @if ($produks->whereNotNull('deleted_at')->isEmpty())
                <div class="alert alert-warning text-center">
                    Belum ada produk yang dihapus.
                </div>
            @else
                <div class="row">
                    @foreach ($produks->whereNotNull('deleted_at') as $produk)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold" style="color: black;">{{ $produk->produk_nama }}</h5>
                                    <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($produk->produk_harga, 0, ',', '.') }}</p>
                                    <p class="card-text"><strong>Diskon:</strong> Rp {{ number_format($produk->produk_diskon ?? 0, 0, ',', '.') }}</p>
                                    <p class="card-text"><strong>Stok:</strong> {{ $produk->produk_stok }}</p>
                                    <p class="card-text">
                                        <strong>Merchandise:</strong>
                                        <span>
                                            @if ($produk->merchandises->isNotEmpty())
                                                @foreach ($produk->merchandises as $merchandise)
                                                    {{ $merchandise->merch_nama }}@if (!$loop->last), @endif
                                                @endforeach
                                            @else
                                                Tidak ada merchandise
                                            @endif
                                        </span>
                                    </p>
                                    <p class="card-text"><strong>Tanggal Dihapus:</strong> {{ $produk->deleted_at->format('d M Y H:i') }}</p>
                                    <div class="d-flex justify-content-between mt-3">
                                        <form action="{{ route('produk.restore', $produk->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                        </form>
                                        <form action="{{ route('produk.force-delete', $produk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus permanen produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</x-supvis.supvislayouts>