<x-supvis.supvislayouts>
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4 bg-white">
            <div class="card-header text-white text-center rounded-top-4">
                <h2 class="mb-0">Detail Merchandise</h2>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="text-center" style="background-color: white; color: black;">
                        </thead>
                        <tbody>
                            <tr>
                                <th class="bg-white text-dark text-center align-middle">Nama Merch</th>
                                <td class="fs-5 text-dark bg-white">{{ $merchandise->merch_nama }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-dark text-center align-middle">Detail</th>
                                <td class="fs-5 text-dark bg-white">{{ $merchandise->merch_detail }}</td>
                            </tr>
                            <tr>
                                <th class="bg-white text-dark text-center align-middle">Stok</th>
                                <td class="fs-5 text-dark bg-white">{{ $merchandise->merch_stok }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('merch.index') }}" class="btn rounded-pill px-5 py-2 shadow-sm text-white" style="background-color: #2575FC; border: none;">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-supvis.supvislayouts>
