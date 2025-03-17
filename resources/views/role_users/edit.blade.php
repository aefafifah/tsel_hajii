<!-- JIKA USER == SUPERVISOR -->

@if (auth()->check() && auth()->user()->hasRole('supervisor'))
    <x-Supvis.SupvisLayouts>

        <style>
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
                <h1 class="text-center mb-5 mt-5"><strong>Edit Profil</strong></h1>
                <x-form-card>
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
                    
                    <x-form-group 
                        label="Nama" 
                        name="name" 
                        placeholder="Masukkan nama" 
                        value="{{ old('name', $roleUsers->name) }}"
                        required="true" 
                    />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-form-group 
                        label="Email" 
                        name="email" 
                        type="email"
                        placeholder="Masukkan email" 
                        value="{{ old('email', $roleUsers->email) }}"
                        required="true" 
                    />
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-form-group 
                        label="Telepon" 
                        name="phone" 
                        placeholder="Masukkan nomor telepon" 
                        value="{{ old('phone', $roleUsers->phone) }}"
                    />
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-form-group 
                        label="PIN" 
                        name="pin" 
                        type="password"
                        placeholder="Masukkan PIN baru (maksimal 6 digit)" 
                    />
                    @error('pin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-form-button type="submit">Perbarui Profil</x-form-button>
                </form>
            </x-form-card>
            </div>
        </body>
    </x-Supvis.SupvisLayouts>

<!-- JIKA USER == SALES -->
@elseif(auth()->check() && auth()->user()->hasRole('sales'))
    <x-sales.saleslayouts>

        <style>

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
                <h1 class="text-center mb-5 mt-5"><strong>Edit Profil</strong></h1>
                <x-form-card>
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
                    
                    <x-form-group 
                        label="Nama" 
                        name="name" 
                        placeholder="Masukkan nama" 
                        value="{{ old('name', $roleUsers->name) }}"
                        required="true" 
                    />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-form-group 
                        label="Email" 
                        name="email" 
                        type="email"
                        placeholder="Masukkan email" 
                        value="{{ old('email', $roleUsers->email) }}"
                        required="true" 
                    />
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-form-group 
                        label="Telepon" 
                        name="phone" 
                        placeholder="Masukkan nomor telepon" 
                        value="{{ old('phone', $roleUsers->phone) }}"
                    />
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-form-group 
                        label="PIN" 
                        name="pin" 
                        type="password"
                        placeholder="Masukkan PIN baru (maksimal 6 digit)" 
                    />
                    @error('pin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                </form>
                </x-form-card>
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