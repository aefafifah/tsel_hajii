<x-Sales.SalesLayouts>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('alert'))
        <script>
            Swal.fire({
                title: 'Akses Ditolak!',
                text: "{{ session('alert') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <main class="content" style="padding: 20px; font-family: Arial, sans-serif; background-color: #f4f6f8;">
        <div
            style="background-color: #e3f2fd; padding: 20px; border-radius: 12px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div>
                <h1 style="font-size: 1.5rem; color: #333; margin: 0;">Hai, {{ Auth::user()->name }} 👋</h1>
                <p style="color: #666; font-size: 0.95rem; margin: 8px 0;">Selamat datang dan beraktivitas kembali!</p>
            </div>
            <div>
                <img src="{{ asset('admin_asset/img/photos/icon_sales.png') }}" alt="illustration"
                    style="border-radius: 10px; width: 145px; height: auto;">
            </div>
    </main>
</x-Sales.SalesLayouts>
