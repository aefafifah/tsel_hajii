<x-supvis.supvislayouts>
    
<div class="container mt-5">
    <h2 class="text-center mb-4"><strong>Tambah Merchandise Baru</strong></h2>
        
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-card title="Tambah Merchandise Baru">
        <form id="merchForm" action="{{ route('merch.store') }}" method="POST">
            @csrf
            <x-form-group label="Nama Merchandise" name="merch_nama" type="text" placeholder="Masukkan nama merchandise" required />
            <x-form-group label="Detail Merchandise" name="merch_detail" type="textarea" placeholder="Masukkan detail merchandise" rows="4" required />
            <x-form-group label="Stok Merchandise" name="merch_stok" type="number" placeholder="Masukkan stok merchandise" required />
            
            <div class="d-flex justify-content-between">
                <x-button type="button" id="simpanBtn" class="btn btn-primary" style="flex: 1; margin-right: 10px;">Simpan Merch</x-button>
                <x-button type="button" id="batalBtn" class="btn btn-secondary" style="flex: 1; margin-left: 10px;">Batal</x-button>
            </div>
        </form>
    </x-card>

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
</div>

</x-supvis.supvislayouts>
