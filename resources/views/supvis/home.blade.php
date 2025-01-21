<x-supvis.supvislayouts>
    <main class="content">
        <div class="container" style="text-align: center; padding: 20px;">
            <header style="margin-bottom: 20px;">
                <h1 style="font-size: 1.8rem; color:rgb(0, 0, 0);">Hello, {{ Auth::user()->name }}! 👋</h1>

                <p style="color: #555; font-size: 1rem;">Pantau budget Anda per bulan dan per tahun di bawah ini:</p>
            </header>
            
            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 120px; max-width: 180px; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Budget Bulanan</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #4caf50;">IDR 9,784,000</p>
                    <p style="font-size: 0.85rem; color: #555;">7.2% lebih tinggi dari bulan lalu</p>
                </div>

                <div style="flex: 1; min-width: 120px; max-width: 180px; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Budget Tahunan</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #f44336;">IDR 87,411,000</p>
                    <p style="font-size: 0.85rem; color: #555;">5.2% lebih rendah dari tahun lalu</p>
                </div>
            </div>

            <!-- Chart Container -->
            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-top: 30px;">
                <!-- Monthly Budget Chart -->
                <div style="flex: 1; min-width: 100%; max-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h2 style="font-size: 1.3rem; color: #333;">Per Bulan</h2>
                    <canvas id="monthlyBudgetChart" style="max-width: 100%;"></canvas>
                </div>

                <!-- Yearly Budget Chart -->
                <div style="flex: 1; min-width: 100%; max-width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-top: 20px;">
                    <h2 style="font-size: 1.3rem; color: #333;">Per Tahun</h2>
                    <canvas id="yearlyBudgetChart" style="max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthlyCtx = document.getElementById('monthlyBudgetChart').getContext('2d');
        const yearlyCtx = document.getElementById('yearlyBudgetChart').getContext('2d');

        // Monthly Budget Data
        const monthlyBudgetChart = new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Pengeluaran (IDR)',
                        data: [500000, 600000, 700000, 800000, 750000, 900000, 850000, 950000, 1000000, 1100000, 1050000, 1200000],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(201, 203, 207, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(153, 102, 255, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(201, 203, 207, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `IDR ${context.raw.toLocaleString()}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return `IDR ${value.toLocaleString()}`;
                            }
                        }
                    }
                }
            }
        });

        // Yearly Budget Data
        const yearlyBudgetChart = new Chart(yearlyCtx, {
            type: 'line',
            data: {
                labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
                datasets: [
                    {
                        label: 'Pengeluaran Tahunan (IDR)',
                        data: [8000000, 9000000, 8500000, 9500000, 10000000, 11000000],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(255, 99, 132, 1)',
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `IDR ${context.raw.toLocaleString()}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return `IDR ${value.toLocaleString()}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-supvis.supvislayouts>
