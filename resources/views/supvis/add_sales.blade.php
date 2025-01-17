<x-supvis.supvislayouts>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Sales</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f2f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                width: 100%;
                max-width: 450px;
                background: #ffffff;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
                animation: fadeIn 0.5s ease-in-out;
                box-sizing: border-box;
            }

            .container h2 {
                margin-bottom: 20px;
                color: #4a4a4a;
                text-align: center;
                font-size: 24px;
                font-weight: bold;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                margin-bottom: 8px;
                color: #666;
                font-weight: 600;
            }

            .form-group input, .form-group select {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
                color: #333;
                background-color: #f9f9f9;
                transition: all 0.3s ease;
                box-sizing: border-box;
            }

            .form-group input:focus, .form-group select:focus {
                border-color: #007bff;
                background-color: #fff;
                outline: none;
                box-shadow: 0 0 8px rgba(0, 123, 255, 0.4);
            }

            .btn {
                width: 100%;
                padding: 12px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                box-sizing: border-box;
            }

            .btn:hover {
                background-color: #0056b3;
            }

            .error {
                color: #ff4d4d;
                font-size: 14px;
                margin-top: 6px;
                margin-bottom: 10px;
            }

            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Tambah Sales</h2>
            <form id="addSalesForm" action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Sales:</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama sales">
                    <div class="error" id="nameError"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email">
                    <div class="error" id="emailError"></div>
                </div>
                <div class="form-group">
                    <label for="photo">Foto:</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                    <div class="error" id="photoError"></div>
                </div>
                <div class="form-group">
                    <label for="pin">PIN:</label>
                    <input type="text" id="pin" name="pin" placeholder="Masukkan PIN">
                    <div class="error" id="pinError"></div>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role">
                        <option value="">Pilih Role</option>
                        <option value="Sales">Sales</option>
                        <option value="Supervisor" disabled>Supervisor</option>
                    </select>
                    <div class="error" id="roleError"></div>
                </div>
                <button type="submit" class="btn" onclick="showAlert(event)">Tambah Sales</button>
            </form>
        </div>

        <script>

            function showAlert(event) {
                event.preventDefault();

                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const pin = document.getElementById('pin').value;
                const role = document.getElementById('role').value;

                if (!name) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Nama sales wajib diisi!',
                    });
                    return;
                }
                if (!email) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email wajib diisi!',
                    });
                    return;
                }
                if (!pin) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'PIN wajib diisi!',
                    });
                    return;
                }
                if (!role) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Role wajib dipilih!',
                    });
                    return;
                }


                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: 'Data sales berhasil disimpan!',
                }).then(() => {
                    document.getElementById('addSalesForm').submit();
                });
            }
        </script>
    </body>
    </html>
</x-supvis.supvislayouts>
