<x-Sales.SalesLayouts>
    
    <style>
        body {
            background: linear-gradient(135deg, #2575FC, #43e97b);
            margin: 0;
            padding: 0;
        }

        .dashboard {
            padding: 20px;
        }

        .filter-box {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-select,
        .search-input {
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin: 5px;
            width: 200px;
        }

        .search-container {
            position: relative;
        }

        .search-container i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
        }

        .search-input {
            padding-right: 30px;
        }

        .table-container {
            overflow-x: auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: rgb(44, 54, 77);
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: rgb(44, 54, 77);
        }

        .total-row {
            background: rgb(44, 54, 77);
            font-weight: bold;
            color: white;
        }

        .no-results {
            text-align: center;
            padding: 20px;
            color: #999;
            display: none;
        }

        @media (max-width: 768px) {
            .filter-box {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-select,
            .search-input {
                width: 100%;
                margin: 10px 0;
            }

            .table-container {
                margin-top: 20px;
            }

            table {
                min-width: 300px;
            }

            th,
            td {
                padding: 10px;
                font-size: 12px;
            }

            .search-input {
                font-size: 16px;
            }

            .no-results {
                padding: 10px;
                font-size: 14px;
            }

            .total-row {
                font-size: 14px;
                padding: 10px;
            }
        }

        .voided td {
            text-decoration: line-through;
            color: #999;
        }
    </style>

    <div class="container mt-5">
        <div class="filter-box">
            <label for="filter-transaksi">Filter Transaksi: </label>
            <select id="filter-transaksi" class="filter-select">
                <option value="all">Semua Transaksi</option>
                <option value="1">Hari Ini</option>
                <option value="7">7 Hari Terakhir</option>
                <option value="30">1 Bulan Terakhir</option>
                <option value="365">1 Tahun Terakhir</option>
            </select>
            <div class="search-container">
                <input type="text" id="search-input" class="search-input" placeholder="Search">
                <i class="fas fa-search"></i>
            </div>
        </div>
        <div class="table-container">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Void</th>
                        <th>Tanggal Transaksi</th>
                        <th>ID Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>No Injeksi</th>
                        <th>Jenis Paket</th>
                        <th>Merchandise</th>
                        <th>Nama Sales</th>
                        <th>Nomor Sales</th>
                        <th>Metode Pembayaran</th>
                        <th>Harga</th>
                        <th>Insentif</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($groupedTransaksi->isEmpty())
                        <tr>
                            <td colspan="12">Tidak ada transaksi yang ditemukan.</td>
                        </tr>
                    @else
                        @foreach ($groupedTransaksi as $tanggal => $items)
                            @php
                                $firstItem = $items->first(); // Ambil ID transaksi pertama untuk mewakili grup
                            @endphp
                            <tr>
                                <th colspan="12">
                                    <input type="checkbox" class="setoran-checkbox" data-date="{{ $tanggal }}"
                                        data-id="{{ $firstItem->id_transaksi }}">
                                    Tanggal: {{ \Carbon\Carbon::parse($tanggal)->format('d M Y') }}
                                </th>
                            </tr>
                            @foreach ($items as $item)
                                <tr class="transaksi-row {{ $item->trashed() ? 'voided' : '' }}"
                                    data-date="{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('Y-m-d') }}"
                                    data-id="{{ $item->id_transaksi }}">
                                    <td>
                                        <input type="checkbox" class="void-checkbox" data-id="{{ $item->id_transaksi }}"
                                            {{ $item->trashed() ? 'checked' : '' }}>
                                    </td>
                                    <td class="tanggal">
                                        {{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</td>
                                    <td class="id-transaksi">{{ $item->id_transaksi }}</td>
                                    <td class="nama-pelanggan">{{ $item->nama_pelanggan }}</td>
                                    <td class="nomor-injeksi">{{ $item->nomor_injeksi }}</td>
                                    <td class="jenis-paket">{{ $item->jenis_paket }}</td>
                                    <td class="merchandise">{{ $item->merchandise }}</td>
                                    <td class="nama-sales">{{ $item->nama_sales }}</td>
                                    <td class="nomor-telepon">{{ $item->nomor_telepon }}</td>
                                    <td class="metode-pembayaran">{{ $item->metode_pembayaran }}</td>
                                    <td class="harga">{{ $item->produk ? $item->produk->produk_harga_akhir : 0 }}</td>
                                    <td class="insentif">{{ $item->produk ? $item->produk->produk_insentif : 0 }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr class="total-row" id="total-row">
                        <td colspan="10">Total Keseluruhan:</td>
                        <td id="total-penjualan">{{ $totalPenjualan }}</td>
                        <td id="total-insentif">{{ $totalInsentif }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <button id="get-setoran-button" type="submit" class="btn btn-primary mt-3">Ambil Setoran</button>

        <h3 class="mt-3">Transaksi yang Sudah Disetor</h3>
        <div class="table-container">
            <table id="setoranTable">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>ID Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>No Injeksi</th>
                        <th>Jenis Paket</th>
                        <th>Merchandise</th>
                        <th>Nama Sales</th>
                        <th>Nomor Sales</th>
                        <th>Metode Pembayaran</th>
                        <th>Harga</th>
                        <th>Insentif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setoranTransaksi as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</td>
                            <td>{{ $item->id_transaksi }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->nomor_injeksi }}</td>
                            <td>{{ $item->jenis_paket }}</td>
                            <td>{{ $item->merchandise }}</td>
                            <td>{{ $item->nama_sales }}</td>
                            <td>{{ $item->nomor_telepon }}</td>
                            <td>{{ $item->metode_pembayaran }}</td>
                            <td>{{ $item->produk ? $item->produk->produk_harga_akhir : 0 }}</td>
                            <td>{{ $item->produk ? $item->produk->produk_insentif : 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".void-checkbox").forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    let row = this.closest(".transaksi-row");
                    let transaksiId = this.getAttribute("data-id");

                    if (this.checked) {
                        row.classList.add("voided");
                    } else {
                        row.classList.remove("voided");
                    }

                    fetch(`/transaksi/${transaksiId}/toggle-void`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            is_void: this.checked
                        })
                    });
                });

                if (checkbox.checked) {
                    checkbox.closest(".transaksi-row").classList.add("voided");
                }
            });

            document.querySelectorAll('.setoran-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    Swal.fire({
                        title: "Pilih Aksi",
                        text: "Apakah Anda ingin menyetor atau menghapus transaksi ini?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Setor",
                        cancelButtonText: "Hapus",
                        reverseButtons: true
                    }).then((result) => {
                        const isSetor = result.isConfirmed;
                        toggleVoidOrSetor(this, isSetor);
                    });
                });
            });

            function toggleVoidOrSetor(checkbox, isSetor) {
                const date = checkbox.getAttribute('data-date');
                const transaksiCheckboxes = document.querySelectorAll(
                    `.transaksi-row[data-date="${date}"] .void-checkbox`
                );

                transaksiCheckboxes.forEach(cb => {
                    cb.checked = !isSetor;
                    cb.dispatchEvent(new Event('change'));
                    cb.closest('.transaksi-row').classList.toggle('voided', isSetor);
                });

                fetch('/supvis/setoran', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            date: date,
                            is_void: !isSetor
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire("Berhasil!", `Transaksi telah ${isSetor ? 'disetorkan' : 'dihapus'}.`,
                            "success");
                    })
                    .catch(error => console.error('Gagal memperbarui transaksi:', error));
            }

            function calculateTotals() {
                let totalPenjualan = 0;
                let totalInsentif = 0;

                document.querySelectorAll('#dataTable tbody tr:visible').forEach(row => {
                    const harga = parseFloat(row.querySelector('.harga')?.textContent || 0);
                    const insentif = parseFloat(row.querySelector('.insentif')?.textContent || 0);
                    totalPenjualan += harga;
                    totalInsentif += insentif;
                });

                document.getElementById('total-penjualan').textContent =
                    `Rp ${totalPenjualan.toLocaleString('id-ID')}`;
                document.getElementById('total-insentif').textContent =
                    `Rp ${totalInsentif.toLocaleString('id-ID')}`;
            }

            document.getElementById('search-input').addEventListener('keyup', function() {
                const value = this.value.toLowerCase();
                let hasResults = false;

                document.querySelectorAll('#dataTable tbody tr').forEach(row => {
                    const isVisible = row.textContent.toLowerCase().includes(value);
                    row.style.display = isVisible ? '' : 'none';
                    if (isVisible) hasResults = true;
                });

                document.querySelector('.no-results').style.display = hasResults ? 'none' : '';
                document.getElementById('total-row').style.display = hasResults ? '' : 'none';

                calculateTotals();
            });

            calculateTotals();

            document.getElementById('get-setoran-button').addEventListener('click', function() {
                const selectedData = Array.from(document.querySelectorAll('.setoran-checkbox:checked'))
                    .map(checkbox => ({
                        id: checkbox.getAttribute('data-id'),
                        date: checkbox.getAttribute('data-date')
                    }));

                if (selectedData.length === 0) {
                    alert('Silakan pilih tanggal transaksi yang ingin diambil.');
                    return;
                }

                fetch('/supvis/setoran', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            data: selectedData
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            alert('Setoran berhasil diambil.');
                            console.log('Transaksi:', data.transaksis);
                            console.log('Total Harga:', data.total_harga);
                            console.log('Total Insentif:', data.total_insentif);
                        }
                    })
                    .catch(error => console.error('Terjadi kesalahan:', error));
            });
        });

        function calculateTotals() {
            let totalPenjualan = 0;
            let totalInsentif = 0;

            document.querySelectorAll('#dataTable tbody tr:visible').forEach(row => {
                const hargaText = row.querySelector('.harga')?.textContent.trim() || "0";
                const insentifText = row.querySelector('.insentif')?.textContent.trim() || "0";

                console.log(`Harga: ${hargaText}, Insentif: ${insentifText}`); // Debugging

                const harga = parseFloat(hargaText.replace(/[^\d.-]/g, '')) || 0;
                const insentif = parseFloat(insentifText.replace(/[^\d.-]/g, '')) || 0;

                totalPenjualan += harga;
                totalInsentif += insentif;
            });

            document.getElementById('total-penjualan').textContent = `Rp ${totalPenjualan.toLocaleString('id-ID')}`;
            document.getElementById('total-insentif').textContent = `Rp ${totalInsentif.toLocaleString('id-ID')}`;
        }
    </script>

</x-Sales.SalesLayouts>