<x-supvis.supvislayouts>
    <style>
        #budget-table th{
            background-color: #23a0b0;
        }
        /* Ubah warna tombol pagination */
.dataTables_wrapper .dataTables_paginate .page-item .page-link {
    background-color: #23a0b0 !important;
    color: white !important;
    border: none !important;
    border-radius: 5px !important;
    padding: 5px 10px !important;
    margin: 2px !important;
}

/* Hover pada tombol pagination */
.dataTables_wrapper .dataTables_paginate .page-item .page-link:hover {
    background-color: #1b8190 !important;
    color: white !important;
}

/* Warna tombol aktif */
.dataTables_wrapper .dataTables_paginate .page-item.active .page-link {
    background-color: #23a0b0 !important;
    color: white !important;
    font-weight: bold !important;
    box-shadow: none !important;
}

/* Warna tombol disabled */
.dataTables_wrapper .dataTables_paginate .page-item.disabled .page-link {
    background-color: #b0b0b0 !important;
    color: #ffffff !important;
    opacity: 0.6;
    cursor: not-allowed;
}

    </style>
    <div class="container">
        <h2 class="text-center mt-5 mb-5"><b>Riwayat Perubahan Budget</b></h2>

        <div class="row my-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Budget</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($totalBudget, 2) }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">Total Insentif Digunakan</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($totalInsentif, 2) }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Sisa Budget</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($sisaBudget, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <table id="budget-table" class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Perubahan Budget</th>
                    <th>Budget Sebelum</th>
                    <th>Budget Sesudah</th>
                    <th>Aksi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $currentTotalBudget = $totalBudget;
                @endphp
                @foreach ($budgetHistories as $history)
                    <tr class="text-center">
                        <td>{{ $history->id }}</td>
                        <td class="{{ $history->change_amount > 0 ? 'text-success' : 'text-danger' }}">
                            {{ number_format($history->change_amount, 2) }}
                        </td>
                        <td>{{ number_format($history->previous_budget, 2) }}</td>
                        <td>{{ number_format($currentTotalBudget, 2) }}</td>
                        <td>
                            <span class="badge {{ $history->action === 'add' ? 'bg-success' : 'bg-warning' }}">
                                {{ $history->action === 'add' ? 'Penambahan' : 'Perubahan' }}
                            </span>
                        </td>
                        <td>{{ $history->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>

    {{-- Script DataTables --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#budget-table').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 10,
                language: {
                    paginate: {
                        previous: "« Sebelumnya",
                        next: "Berikutnya »"
                    },
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    zeroRecords: "Tidak ada data yang ditemukan",
                }
            });
        });
    </script>
</x-supvis.supvislayouts>
