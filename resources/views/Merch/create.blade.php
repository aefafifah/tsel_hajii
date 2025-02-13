<x-supvis.supvislayouts>
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #333;">Tambah Merchandise Baru</h2>

        {{-- Load SweetAlert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <form id="merchForm" action="{{ route('merch.store') }}" method="POST" class="shadow p-4 rounded" style="background-color: #f8f9fa;">
            @csrf
            <div class="mb-3">
                <label for="merch_nama" class="form-label" style="font-weight: bold;">Nama Merchandise</label>
                <input type="text" name="merch_nama" id="merch_nama" class="form-control" placeholder="Masukkan nama merchandise" required>
            </div>

            <div class="mb-3">
                <label for="merch_detail" class="form-label" style="font-weight: bold;">Detail Merchandise</label>
                <textarea name="merch_detail" id="merch_detail" class="form-control" placeholder="Masukkan detail merchandise" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="merch_stok" class="form-label" style="font-weight: bold;">Stok Merchandise</label>
                <input type="number" name="merch_stok" id="merch_stok" class="form-control" placeholder="Masukkan stok merchandise" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" id="simpanBtn" class="btn btn-primary" style="flex: 1; margin-right: 10px;">Simpan Merch</button>
                <button type="button" id="batalBtn" class="btn btn-secondary" style="flex: 1; margin-left: 10px;">Batal</button>
            </div>
        </form>
    </div>

    {{-- Script untuk SweetAlert --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Event untuk tombol Simpan
            document.getElementById("simpanBtn").addEventListener("click", function () {
                let nama = document.getElementById("merch_nama").value.trim();
                let detail = document.getElementById("merch_detail").value.trim();
                let stok = document.getElementById("merch_stok").value.trim();

                if (nama !== "" && detail !== "" && stok !== "") {
                    Swal.fire({
                        title: "Konfirmasi",
                        text: "Apakah Anda yakin ingin menyimpan merchandise ini?",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Simpan",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("merchForm").submit();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Oops!",
                        text: "Harap isi semua kolom sebelum menyimpan.",
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                }
            });

            // Event untuk tombol Batal
            document.getElementById("batalBtn").addEventListener("click", function () {
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin membatalkan?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Batalkan",
                    cancelButtonText: "Kembali"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('merch.index') }}";
                    }
                });
            });
        });
    </script>
</x-supvis.supvislayouts>
