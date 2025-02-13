<x-supvis.supvislayouts>
    <style>
body {
    background: linear-gradient(to right, #2575FC, #20BF55);
    font-family: 'Arial', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

..container {
    width: 100%;
    max-width: 100%;
    height: 90vh;
    background: #ffffff;
    padding: 20px;
    border-radius: 0;
    box-shadow: none;
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

h2 {
    color: #2575FC;
    font-weight: bold;
    text-align: center;
}

label {
    font-weight: bold;
    color: #444;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
    width: 100%;
}

.form-control:focus {
    border-color: #2575FC;
    box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
}

.btn-primary {
    background: linear-gradient(to right, #2575FC, #20BF55);
    border: none;
    color: white;
    padding: 10px;
    border-radius: 8px;
    transition: 0.3s;
    font-weight: bold;
    width: 100%;
}

.btn-primary:hover {
    background: linear-gradient(to right, #20BF55, #2575FC);
}

.btn-secondary {
    background: #6c757d;
    border: none;
    color: white;
    padding: 10px;
    border-radius: 8px;
    transition: 0.3s;
    font-weight: bold;
    width: 100%;
}

.btn-secondary:hover {
    background: #5a6268;
}

.d-flex {
    display: flex;
    gap: 10px;
}


</style>
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
