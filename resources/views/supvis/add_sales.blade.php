<x-supvis.supvislayouts>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #43e97b, #2575FC);
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .container {
            width: 100%;
            max-width: 1090px;
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

        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
        }

        .avatar-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #2575FC;
            overflow: hidden;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-preview i {
            font-size: 80px;
            color: #ccc;
        }

        .photo-upload-label {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: #2575FC;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .photo-upload-label:hover {
            background: #1e66d9;
        }

        .photo-upload-label i {
            color: white;
            font-size: 18px;
        }

        #photo {
            display: none;
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

        .form-group input,
        .form-group select {
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

        .form-group input:focus,
        .form-group select:focus {
            border-color: #2575FC;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.4);
        } 


        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #43e97b, #2575FC);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        .btn:hover {
            background: linear-gradient(45deg, #36c271, #1e66d9);
        }

        .error {
            color: #ff4d4d;
            font-size: 14px;
            margin-top: 6px;
            margin-bottom: 10px;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>
    
<body>
    <div class="container">
        <h2>Tambah Sales</h2>
        <form id="addSalesForm" action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile-section">
                <div class="avatar-container">
                    <div class="avatar-preview">
                        <i class="fas fa-user"></i>
                    </div>
                    <label for="photo" class="photo-upload-label">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" id="photo" name="photo" accept="image/*" onchange="previewImage(this)">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Nama Sales:</label>
                <input type="text" id="name" name="name" oninput="validateName(this)"
                    placeholder="Masukkan nama sales">
                <div class="error" id="nameError"></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email">
                <div class="error" id="emailError"></div>
            </div>
            <div class="form-group">
                <label for="phone">Telepon:</label>
                <input type="tel" id="phone" name="phone" oninput="validatePhone(this)"
                    placeholder="Masukkan nomor telepon" pattern="[0-9]*" maxlength="15">
                <div class="error" id="phoneError"></div>
            </div>

            <div class="form-group">
                <label for="pin">PIN:</label>
                <input type="text" id="pin" name="pin" oninput="validatePin(this)" value=123456>
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
        function previewImage(input) {
            const preview = document.querySelector('.avatar-preview');
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Profile Preview">`;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '<i class="fas fa-user"></i>';
            }
        }

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

        function validatePhone(input) {
            input.value = input.value.replace(/\D/g, '');
            const phoneError = document.getElementById('phoneError');
            if (input.value.length > 15) {
                phoneError.textContent = 'Nomor telepon tidak boleh lebih dari 15 digit.';
            } else {
                phoneError.textContent = '';
            }
        }

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
</x-supvis.supvislayouts>
