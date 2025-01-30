<x-supvis.supvislayouts>
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4 bg-light">
            <div class="card-header text-center rounded-top-4" style="background: linear-gradient(135deg, rgb(33, 226, 62), #2575FC);">
                <h2 class="text-white mb-0">Detail Merchandise</h2>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="text-center" style="background-color: #f8f9fa;">
                            <tr>
                                <th class="text-dark">Informasi</th>
                                <th class="text-dark">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-dark fw-bold">Nama Merch</td>
                                <td class="fs-5 text-dark">{{ $merchandise->merch_nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-dark fw-bold">Detail</td>
                                <td class="fs-5 text-dark">{{ $merchandise->merch_detail }}</td>
                            </tr>
                            <tr>
                                <td class="text-dark fw-bold">Stok</td>
                                <td class="fs-5 text-dark">{{ $merchandise->merch_stok }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('merch.index') }}" class="btn rounded-pill px-5 py-2 shadow-sm" style="background: linear-gradient(135deg, rgb(33, 226, 62), #2575FC); color: white; border: none;">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-supvis.supvislayouts>