<!-- JIKA USER == SUPERVISOR -->

@if (auth()->check() && auth()->user()->hasRole('supervisor'))
    <x-supvis.supvislayouts>
        @php
        $hashedPin = Hash::make('234567');
        echo $hashedPin;
            @endphp
        @endphp

        <style>
            body {
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
                background: linear-gradient(135deg, #43e97b, #2575FC);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
                box-sizing: border-box;
            }

            .btn:hover {
                background: linear-gradient(135deg, #34c571, #1a63c7);
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
        <body>
            <div class="container">
                <h1>Edit Profil Pengguna</h1>
                <form action="{{ route('role_users.update', $roleUsers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="profile-section">
                        <div class="avatar-container">
                            <div class="avatar-preview">
                                @if ($roleUsers->photo)
                                    <img src="{{ asset('storage/' . $roleUsers->photo) }}" alt="Avatar" />
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                            </div>
                            <label for="photo" class="photo-upload-label">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" id="photo" name="photo" accept="image/*" onchange="previewImage(this)">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $roleUsers->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $roleUsers->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $roleUsers->phone) }}" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pin">PIN</label>
                        <input type="password" name="pin" class="form-control" placeholder="Masukkan PIN baru (maksimal 6 digit)" maxlength="6>
                        <small class="form-text text-muted">Masukkan PIN Anda (maksimal 6 digit).</small>
                        @error('pin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    

                    <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                </form>
            </div>
        </body>
    </x-supvis.supvislayouts>

<!-- JIKA USER == SALES -->
@elseif(auth()->check() && auth()->user()->hasRole('sales'))
    <x-sales.saleslayouts>
        @php
        $hashedPin = Hash::make('234567');
        echo $hashedPin;
            @endphp
        @endphp

        <style>
            body {
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
                background: linear-gradient(135deg, #43e97b, #2575FC);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
                box-sizing: border-box;
            }

            .btn:hover {
                background: linear-gradient(135deg, #34c571, #1a63c7);
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

        <body>
            <div class="container">
                <h1>Edit Profil Pengguna</h1>
                <form action="{{ route('role_users.update', $roleUsers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="profile-section">
                        <div class="avatar-container">
                            <div class="avatar-preview">
                                @if ($roleUsers->photo)
                                    <img src="{{ asset('storage/' . $roleUsers->photo) }}" alt="Avatar" />
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                            </div>
                            <label for="photo" class="photo-upload-label">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" id="photo" name="photo" accept="image/*" onchange="previewImage(this)">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $roleUsers->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $roleUsers->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $roleUsers->phone) }}" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pin">PIN</label>
                        <input type="password" name="pin" class="form-control" placeholder="Masukkan PIN baru (maksimal 6 digit)" maxlength="6>
                        <small class="form-text text-muted">Masukkan PIN Anda (maksimal 6 digit).</small>
                        @error('pin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                </form>
            </div>
        </body>
        
    </x-sales.saleslayouts>
@endif

<script>
    function previewImage(input) {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const avatarPreview = document.querySelector('.avatar-preview');
            avatarPreview.innerHTML = `<img src="${e.target.result}" alt="Avatar" style="width: 150px; height: 150px; border-radius: 50%; border: 3px solid #2575FC;"/>`;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    </script>
