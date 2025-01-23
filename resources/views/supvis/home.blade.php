<x-supvis.supvislayouts>
    <main class="content">

            @if (Auth::user()->is_superuser)
            <li class="list-group-item">
                <a href="a">Menu tambahan khusus Superuser</a>
            </li>
            @endif

        <div class="container" style="text-align: center; padding: 20px; font-family: 'Poppins', sans-serif;">

            <div style="display: flex; flex-direction: column; align-items: center; background-color: #f3f4f6; border-radius: 12px; padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 800px;">
                <div style="text-align: center; margin-bottom: 15px;">
                    <h1 style="font-size: 1.8rem; color: #333; margin: 0;">Selamat, {{ Auth::user()->name }}! 🎉</h1>
                    <p style="color: #555; font-size: 1rem; margin: 10px 0;">Anda telah mencapai peningkatan penjualan sebesar 72% hari ini.</p>
                </div>
                <div>
                    <img src="{{ asset('admin_asset/img/photos/icon_spv.png') }}" alt="Illustration" style="max-width: 100%; border-radius: 12px;">
                </div>
            </div>

            <div class="dashboard-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                <div class="info-box" style="border-radius: 12px; padding: 15px; text-align: center; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Keuntungan</h3>
                    <p style="font-size: 1.5rem; font-weight: bold; color: #4caf50;">IDR 12,628</p>
                    <p style="font-size: 0.8rem; color: #555;">72.8% lebih tinggi dari bulan lalu</p>
                </div>

                <div class="info-box" style="border-radius: 12px; padding: 15px; text-align: center; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Penjualan</h3>
                    <p style="font-size: 1.5rem; font-weight: bold; color: #4caf50;">IDR 4,679</p>
                    <p style="font-size: 0.8rem; color: #555;">28.42% lebih tinggi dari bulan lalu</p>
                </div>

                <div class="info-box" style="border-radius: 12px; padding: 15px; text-align: center; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Pembayaran</h3>
                    <p style="font-size: 1.5rem; font-weight: bold; color: #f44336;">IDR 2,468</p>
                    <p style="font-size: 0.8rem; color: #555;">14.82% lebih rendah dari bulan lalu</p>
                </div>

                <div class="info-box" style="border-radius: 12px; padding: 15px; text-align: center; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Transaksi</h3>
                    <p style="font-size: 1.5rem; font-weight: bold; color: #4caf50;">IDR 14,857</p>
                    <p style="font-size: 0.8rem; color: #555;">28.14% lebih tinggi dari bulan lalu</p>
                </div>
            </div>

            <div style="margin-top: 30px;">
                <div style="background-color: #ffffff; border-radius: 12px; padding: 15px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); margin-bottom: 15px;">
                    <h2 style="font-size: 1.2rem; color: #333;">Total Pendapatan (2023 vs 2022)</h2>
                    <canvas id="monthlyRevenueChart" style="max-width: 100%; height: 200px;"></canvas>
                </div>
            </div>
        </div>
    </main>

    <style>
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            .info-box {
                padding: 10px;
            }

            .info-box h3 {
                font-size: 0.9rem;
            }

            .info-box p {
                font-size: 1.2rem;
            }

            .container > div:first-child {
                flex-direction: column;
                text-align: center;
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.2rem;
            }

            .info-box {
                padding: 8px;
            }

            .info-box h3 {
                font-size: 0.8rem;
            }

            .info-box p {
                font-size: 1rem;
            }

            .dashboard-container {
                grid-template-columns: 1fr;
            }

            canvas {
                height: 150px !important;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthlyCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
        const growthCtx = document.getElementById('growthChart').getContext('2d');

        new Chart(monthlyCtx, {
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
    </script>
</x-supvis.supvislayouts>