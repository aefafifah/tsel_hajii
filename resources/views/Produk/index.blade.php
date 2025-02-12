<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4 text-center"><strong>Daftar Produk</strong></h2>
        <a href="{{ route('produk.create') }}" class="btn btn-success mb-3">Tambah Produk</a>

        @if ($produks->whereNull('deleted_at')->isEmpty())
            <div class="alert alert-warning text-center">Belum ada produk yang tersedia.</div>
        @else
            <div class="row">
                @foreach ($produks->whereNull('deleted_at') as $produk)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold" style="color: black;">{{ $produk->produk_nama }}
                                </h5>
                                <p class="card-text"><strong>Harga:</strong> Rp
                                    {{ number_format($produk->produk_harga, 0, ',', '.') }}</p>
                                <p class="card-text"><strong>Diskon:</strong> Rp
                                    {{ number_format($produk->produk_diskon ?? 0, 0, ',', '.') }}</p>
                                <p class="card-text"><strong>Insentif:</strong> Rp
                                    {{ number_format($produk->produk_insentif, 0, ',', '.') }}</p>
                                <p class="card-text"><strong>Harga Final:</strong> Rp
                                    {{ number_format($produk->produk_harga_akhir, 0, ',', '.') }}</p>
                                <p class="card-text"><strong>Stok:</strong> {{ $produk->produk_stok }}</p>
                                <p class="card-text"><strong>Jumlah Terjual:</strong> <span
                                        class="badge bg-primary">{{ $produk->produk_terjual }}</span></p>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">🔍
                                        Detail</a>
                                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">✏️
                                        Edit</a>
                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
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
        @if (Auth::user() && Auth::user()->is_superuser)
        <h2 class="mb-4 text-center"><strong>Produk Dihapus</strong></h2>

            @if ($produks->whereNotNull('deleted_at')->isEmpty())
                <div class="alert alert-warning text-center">Belum ada produk yang terhapus.</div>
            @else
                <div class="row">
                    @foreach ($produks->whereNotNull('deleted_at') as $produk)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold" style="color: black;">{{ $produk->produk_nama }}
                                    </h5>
                                    <p class="card-text"><strong>Harga:</strong> Rp
                                        {{ number_format($produk->produk_harga, 0, ',', '.') }}</p>
                                    <p class="card-text"><strong>Diskon:</strong> Rp
                                        {{ number_format($produk->produk_diskon ?? 0, 0, ',', '.') }}</p>
                                    <p class="card-text"><strong>Insentif:</strong> Rp
                                        {{ number_format($produk->produk_insentif, 0, ',', '.') }}</p>
                                    <p class="card-text"><strong>Harga Final:</strong> Rp
                                        {{ number_format($produk->produk_harga_akhir, 0, ',', '.') }}</p>
                                    <p class="card-text"><strong>Stok:</strong> {{ $produk->produk_stok }}</p>
                                    <p class="card-text"><strong>Jumlah Terjual:</strong> <span
                                            class="badge bg-primary">{{ $produk->produk_terjual }}</span></p>
                                    <p class="card-text"><strong>Tanggal Dihapus:</strong> <span
                                    class="badge bg-primary">{{ $produk->deleted_at->format('d M Y H:i') }}</span></p>
                                    <div class="d-flex justify-content-between mt-3">

                                        <form action="{{ route('produk.restore', $produk->id) }}" method="POST"
                                        class="d-inline">
                                        
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
    
                                        </form>

                                        <!-- Gk usah pake Hapus Permanen karena butuh ambil harga untuk Riwayat Transaksi - billy
                                         
                                        <form action="{{ route('produk.force-delete', $produk->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus permanen produk ini?');">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>

                                        </form> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif 
        
    </div>

    <!-- Tabel Riwayat Penjualan -->
    <h3 class="mt-5 text-center"><strong>📊 Riwayat Penjualan</strong></h3>

    @php
        $allHistory = collect();
        foreach ($produks as $produk) {
            $history = json_decode($produk->produk_terjual_history, true);
            if (is_array($history)) {
                $allHistory = $allHistory->merge($history);
            }
        }

        $groupedHistory = $allHistory
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item['tanggal'])->format('Y-m-d');
            })
            ->map(function ($items) {
                return [
                    'tanggal' => $items->first()['tanggal'] ?? '-',
                    'total_jumlah' => $items->sum('jumlah'),
                ];
            });

        $uniqueDates = $groupedHistory->keys();
    @endphp

    <!-- Filter Total Penjualan -->
    <div class="mb-3">
        <label for="filterTanggal" class="form-label"><strong>📅 Filter Berdasarkan Tanggal:</strong></label>
        <select id="filterTanggal" class="form-select">
            <option value="all">Semua Tanggal</option>
            @foreach ($uniqueDates as $date)
                <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('d M Y') }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tabel Total Penjualan Per Tanggal -->
    <div class="table-responsive">
        <table class="table table-striped table-hover mt-3">
            <thead class="table-dark">
                <tr class="text-center">
                    <th style="width: 50%;">📅 Tanggal</th>
                    <th style="width: 50%;">📦 Total Jumlah Terjual</th>
                </tr>
            </thead>
            <tbody id="totalPenjualanBody">
                @foreach ($groupedHistory as $entry)
                    <tr class="text-center" data-tanggal="{{ $entry['tanggal'] }}">
                        <td><strong>{{ \Carbon\Carbon::parse($entry['tanggal'])->format('d M Y') }}</strong></td>
                        <td><span class="badge bg-success fs-6">{{ $entry['total_jumlah'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Detail Riwayat Penjualan -->
    <h4 class="mt-5 text-center"><strong>📋 Detail Riwayat Penjualan</strong></h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>📅 Tanggal & Waktu</th>
                    <th>📦 Jumlah</th>
                    <th>🛍️ Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allHistory as $entry)
                    <tr class="text-center">
                        <td>{{ \Carbon\Carbon::parse($entry['tanggal'])->format('d M Y H:i:s') }}</td>
                        <td><span class="badge bg-primary">{{ $entry['jumlah'] ?? '-' }}</span></td>
                        <td>{{ $entry['produk_nama'] ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>

    <script>
        document.getElementById('filterTanggal').addEventListener('change', function() {
            let selectedDate = this.value;
            let rows = document.querySelectorAll('#totalPenjualanBody tr');

            rows.forEach(row => {
                let rowDate = row.getAttribute('data-tanggal');
                if (selectedDate === "all" || rowDate === selectedDate) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</x-supvis.supvislayouts>
