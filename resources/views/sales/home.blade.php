<x-sales.saleslayouts>
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
        <!-- Header Section -->
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
        </div>

        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-bottom: 20px;">
            <div
                style="background: #fff; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 0.95rem; color: #333; margin-bottom: 8px;">Total Pemesanan</h3>
                <p style="font-size: 1.5rem; font-weight: bold; color:rgb(0, 0, 0); margin: 0;">6.29k</p>
                <p style="font-size: 0.75rem; color: green; margin: 5px 0;">⬆ 0.43% (1 Minggu)</p>
            </div>
            <div
                style="background: #fff; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 0.95rem; color: #333; margin-bottom: 8px;">Total Pendapatan</h3>
                <p style="font-size: 1.5rem; font-weight: bold; color:rgb(0, 0, 0); margin: 0;">Rp 800m</p>
                <p style="font-size: 0.75rem; color: red; margin: 5px 0;">⬇ 0.43% (1 Minggu)</p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
            <div
                style="background: #fff; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 0.95rem; color: #333; margin-bottom: 8px;">Statistik Pemesanan Mingguan</h3>
                <div style="position: relative; width: 80px; height: 80px; margin: 0 auto;">
                    <div
                        style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; border-radius: 50%; background: conic-gradient(#4caf50 90%, #ddd 0);">
                    </div>
                    <div
                        style="position: absolute; top: 25%; left: 25%; width: 40px; height: 40px; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; font-weight: bold;">
                        90%</div>
                </div>
                <p style="margin-top: 8px; font-size: 0.75rem; color: #555;">Total Pemesanan 6.29k</p>
            </div>
            <div
                style="background: #fff; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 0.95rem; color: #333; margin-bottom: 8px;">Statistik Pendapatan Mingguan</h3>
                <div style="position: relative; width: 80px; height: 80px; margin: 0 auto;">
                    <div
                        style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; border-radius: 50%; background: conic-gradient(#ffca28 80%, #ddd 0);">
                    </div>
                    <div
                        style="position: absolute; top: 25%; left: 25%; width: 40px; height: 40px; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; font-weight: bold;">
                        80%</div>
                </div>
                <p style="margin-top: 8px; font-size: 0.75rem; color: #555;">Total Pendapatan Rp 800m</p>
            </div>
        </div>
    </main>
</x-sales.saleslayouts>
