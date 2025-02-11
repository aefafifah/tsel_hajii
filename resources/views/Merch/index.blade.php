<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="mb-4 text-center"><strong>Daftar Merchandise</strong></h2>
        <a href="{{ route('merch.create') }}" class="btn btn-success mb-3">Tambah Merchandise</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($merchandises->isEmpty())
            <div class="alert alert-warning text-center">Belum ada merchandise yang tersedia.</div>
        @else
            <div class="row">
                @foreach ($merchandises as $merchandise)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold" style="color: black;">{{ $merchandise->merch_nama }}</h5>
                                <p class="card-text"><strong>Deskripsi:</strong> {{ $merchandise->merch_detail }}</p>
                                <p class="card-text"><strong>Stok:</strong> {{ $merchandise->merch_stok }}</p>
                                <p class="card-text"><strong>Jumlah Terambil:</strong> <span class="badge bg-primary">{{ $merchandise->merch_terambil }}</span></p>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('merch.show', $merchandise->id) }}" class="btn btn-info btn-sm">🔍 Detail</a>
                                    <a href="{{ route('merch.edit', $merchandise->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('merch.destroy', $merchandise->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus merchandise ini?');">
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
        <h3 class="mt-5 text-center"><strong>📊 Riwayat Pengambilan Merchandise</strong></h3>

        @php
            $allHistory = collect();
            foreach ($merchandises as $merchandise) {
                $history = json_decode($merchandise->merch_terambil_history, true);
                if (is_array($history)) {
                    $allHistory = $allHistory->merge($history);
                }
            }

            $groupedHistory = $allHistory->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item['tanggal'])->format('Y-m-d');
            })->map(function ($items) {
                return [
                    'tanggal' => $items->first()['tanggal'] ?? '-',
                    'total_jumlah' => $items->sum('jumlah')
                ];
            });
            $uniqueDates = $groupedHistory->keys();
        @endphp

        <!-- Filter Total Pengambilan -->
        <div class="mb-3">
            <label for="filterTanggal" class="form-label"><strong>📅 Filter Berdasarkan Tanggal:</strong></label>
            <select id="filterTanggal" class="form-select">
                <option value="all">Semua Tanggal</option>
                @foreach ($uniqueDates as $date)
                    <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('d M Y') }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tabel Total Pengambilan Per Tanggal -->
        <div class="table-responsive">
            <table class="table table-striped table-hover mt-3">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th style="width: 50%;">📅 Tanggal</th>
                        <th style="width: 50%;">📦 Total Merchandise Terambil</th>
                    </tr>
                </thead>
                <tbody id="totalPengambilanBody">
                    @foreach ($groupedHistory as $entry)
                        <tr class="text-center" data-tanggal="{{ $entry['tanggal'] }}">
                            <td><strong>{{ \Carbon\Carbon::parse($entry['tanggal'])->format('d M Y') }}</strong></td>
                            <td><span class="badge bg-success fs-6">{{ $entry['total_jumlah'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabel Detail Riwayat Pengambilan -->
        <h4 class="mt-5 text-center"><strong>📋 Detail Riwayat Pengambilan</strong></h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>📅 Tanggal & Waktu</th>
                        <th>📦 Jumlah</th>
                        <th>🎁 Merchandise</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allHistory as $entry)
                        <tr class="text-center">
                            <td>{{ \Carbon\Carbon::parse($entry['tanggal'])->format('d M Y H:i:s') }}</td>
                            <td><span class="badge bg-primary">{{ $entry['jumlah'] ?? '-' }}</span></td>
                            <td>{{ $entry['merch_nama'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('filterTanggal').addEventListener('change', function () {
            let selectedDate = this.value;
            let rows = document.querySelectorAll('#totalPengambilanBody tr');

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
