<x-supvis.supvislayouts>
    <main class="content">
        <div class="container" style="text-align: center; padding: 20px;">
            <!-- Notification Box -->
            <div style="display: flex; flex-direction: row; align-items: center; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 12px; padding: 40px; margin-bottom: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div style="text-align: left; flex: 1;">
                    <h1 style="font-size: 1.8rem; color:rgb(0, 0, 0); margin: 0;">Selamat, {{ Auth::user()->name }}! 🎉</h1>
                    <p style="color: #555; font-size: 1rem; margin: 15px 0;">Anda telah mencapai peningkatan penjualan sebesar 72% hari ini.</p>
                </div>
                <div>
                    <img src="{{ asset('admin_asset/img/photos/icon_spv.png') }}" alt="Illustration" style="max-width: 150px; border-radius: 12px;">
                </div>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 10px; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Keuntungan</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #4caf50;">IDR 12,628</p>
                    <p style="font-size: 0.85rem; color: #555;">72.8% lebih tinggi dari bulan lalu</p>
                </div>

                <div style="flex: 1; min-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Penjualan</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #4caf50;">IDR 4,679</p>
                    <p style="font-size: 0.85rem; color: #555;">28.42% lebih tinggi dari bulan lalu</p>
                </div>

                <div style="flex: 1; min-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Pembayaran</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #f44336;">IDR 2,468</p>
                    <p style="font-size: 0.85rem; color: #555;">14.82% lebih rendah dari bulan lalu</p>
                </div>

                <div style="flex: 1; min-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Transaksi</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #4caf50;">IDR 14,857</p>
                    <p style="font-size: 0.85rem; color: #555;">28.14% lebih tinggi dari bulan lalu</p>
                </div>
            </div>

            <!-- Chart Container -->
            <div style="display: flex; flex-direction: column; gap: 10px; flex-wrap: wrap; margin-top: 30px;">
                <!-- Monthly Revenue Chart -->
                <div style="flex: 1; min-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h2 style="font-size: 1.3rem; color: #333;">Total Pendapatan (2023 vs 2022)</h2>
                    <canvas id="monthlyRevenueChart" style="max-width: 100%;"></canvas>
                </div>

                <!-- Growth Chart -->
                <div style="flex: 1; min-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-top: 20px;">
                    <h2 style="font-size: 1.3rem; color: #333;">Pertumbuhan</h2>
                    <canvas id="growthChart" style="max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthlyCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
        const growthCtx = document.getElementById('growthChart').getContext('2d');

        // Monthly Revenue Data
        const monthlyRevenueChart = new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
                    {
                        label: '2023',
                        data: [10, 15, 20, 25, 30, 28, 35, 40, 38, 45, 50, 55],
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2022',
                        data: [8, 12, 18, 22, 25, 24, 30, 35, 33, 38, 43, 48],
                        backgroundColor: 'rgba(153, 102, 255, 0.7)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Growth Chart
        const growthChart = new Chart(growthCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pertumbuhan Perusahaan', 'Sisa'],
                datasets: [
                    {
                        data: [78, 22],
                        backgroundColor: ['rgba(54, 162, 235, 0.7)', 'rgba(201, 203, 207, 0.7)'],
                        borderColor: ['rgba(54, 162, 235, 1)', 'rgba(201, 203, 207, 1)'],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
</x-supvis.supvislayouts>