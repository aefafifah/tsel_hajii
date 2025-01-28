<x-layouts>
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
        <form id="addSalesForm">
            <div class="form-group">
                <label for="name">Nama Sales:</label>
                <input type="text" id="name" placeholder="Masukkan nama sales" oninput="validateName(this)">
                <div class="error" id="nameError"></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Masukkan email">
                <div class="error" id="emailError"></div>
            </div>
            <div class="form-group">
                <label for="photo">Foto:</label>
                <input type="file" id="photo" accept="image/*">
                <div class="error" id="photoError"></div>
            </div>
            <div class="form-group">
                <label for="pin">PIN:</label>
                <input type="text" id="pin" placeholder="Masukkan PIN" oninput="validatePin(this)">
                <div class="error" id="pinError"></div>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role">
                    <option value="">Pilih Role</option>
                    <option value="Sales">Sales</option>
                    <option value="Supervisor" disabled> Supervisor</option>
                </select>
                <div class="error" id="roleError"></div>
            </div>
            <button type="button" class="btn" onclick="addSales()">Tambah Sales</button>
        </form>
    </div>

    <script>
        function validateName(input) {
            const regex = /^[a-zA-Z\s]*$/;
            const nameError = document.getElementById('nameError');
            if (!regex.test(input.value)) {
                input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
                nameError.textContent = '*Nama hanya boleh mengandung huruf dan spasi.';
            } else {
                nameError.textContent = '';
            }
        }

        function validatePin(input) {
            const regex = /^[0-9]*$/;
            const pinError = document.getElementById('pinError');
            if (!regex.test(input.value)) {
                input.value = input.value.replace(/[^0-9]/g, '');
                pinError.textContent = '*PIN hanya boleh mengandung angka.';
            } else {
                pinError.textContent = ''; 
            }
        }

        function addSales() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const photo = document.getElementById('photo').files[0];
            const pin = document.getElementById('pin').value.trim();
            const role = document.getElementById('role').value.trim();

            const nameError = document.getElementById('nameError');
            const emailError = document.getElementById('emailError');
            const pinError = document.getElementById('pinError');
            const roleError = document.getElementById('roleError');

            nameError.textContent = '';
            emailError.textContent = '';
            pinError.textContent = '';
            roleError.textContent = '';

            let isValid = true;
            if (!name) {
                nameError.textContent = 'Nama harus diisi.';
                isValid = false;
            }
            if (!email) {
                emailError.textContent = 'Email harus diisi.';
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailError.textContent = 'Format email tidak valid.';
                isValid = false;
            }
            if (!pin) {
                pinError.textContent = 'PIN harus diisi.';
                isValid = false;
            } else if (!/^[0-9]{4,6}$/.test(pin)) {
                pinError.textContent = 'PIN harus berupa 4-6 digit angka.';
                isValid = false;
            }
            if (!role) {
                roleError.textContent = 'Role harus dipilih.';
                isValid = false;
            }

            if (!photo) {
                pinError.textContent = 'Foto harus diupload.';
                isValid = false;
            }

            // Use SweetAlert for feedback
            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Silahkan isi semua form dengan lengkap.'
                });
                return;
            }

            if (isValid) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data sales berhasil ditambahkan'
                });
                document.getElementById('addSalesForm').reset();
            }
        }
    </script>
    </x-layouts>
