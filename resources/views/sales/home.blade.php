<x-sales.saleslayouts>
    <main class="content">
        <div class="container" style="text-align: center; padding: 20px;">
            <header style="margin-bottom: 20px;">
                <h1 style="font-size: 1.8rem; color:rgb(0, 0, 0);">Hello, {{ Auth::user()->name }}! 👋</h1>

                <p style="color: #555; font-size: 1rem;">Pantau pencapaian sales Anda di bawah ini:</p>
            </header>
            
            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 100px; max-width: 150px; border: 1px solid #ddd; border-radius: 8px; padding: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Pencapaian Bulanan</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #4caf50;">IDR 15,000,000</p>
                    <p style="font-size: 0.85rem; color: #555;">10% lebih tinggi dari bulan lalu</p>
                </div>

                <div style="flex: 1; min-width: 100px; max-width: 150px; border: 1px solid #ddd; border-radius: 8px; padding: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 1rem; color: #333;">Pencapaian Tahunan</h3>
                    <p style="font-size: 1.3rem; font-weight: bold; color: #f44336;">IDR 120,000,000</p>
                    <p style="font-size: 0.85rem; color: #555;">5% lebih rendah dari tahun lalu</p>
                </div>
            </div>

            <!-- Setoran Status -->
            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-top: 20px;">
                <div style="flex: 1; min-width: 180px; max-width: 300px; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); background-color: #e3f2fd;">
                    <h3 style="font-size: 1rem; color: #333;">Status Setoran</h3>
                    <p style="font-size: 1.2rem; font-weight: bold; color: #007bff;">Sudah Setor</p>
                    <p style="font-size: 0.85rem; color: #555;">Terakhir setor: 3 hari yang lalu</p>
                </div>

                <div style="flex: 1; min-width: 180px; max-width: 300px; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); background-color: #ffebee;">
                    <h3 style="font-size: 1rem; color: #333;">Status Setoran</h3>
                    <p style="font-size: 1.2rem; font-weight: bold; color: #f44336;">Belum Setor</p>
                    <p style="font-size: 0.85rem; color: #555;">Jadwal setor: Besok</p>
                </div>
            </div>
        </div>
    </main>
</x-sales.saleslayouts>