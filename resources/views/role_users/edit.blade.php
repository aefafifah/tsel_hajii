@if (auth()->check() && auth()->user()->hasRole('supervisor'))
    <x-supvis.supvislayouts>
@php
$hashedPin = Hash::make('234567');
echo $hashedPin;
    @endphp
@endphp

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
</style>
<div class="container">
    <h1>Edit Profil Pengguna</h1>
    <form action="{{ route('role_users.update', $roleUsers->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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

        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
    </form>
</div>
</x-supvis.supvislayouts>
@elseif(auth()->check() && auth()->user()->hasRole('sales'))
<x-sales.saleslayouts>
@php
$hashedPin = Hash::make('234567');
echo $hashedPin;
    @endphp
@endphp

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
</style>
<div class="container">
    <h1>Edit Profil Pengguna</h1>
    <form action="{{ route('role_users.update', $roleUsers->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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

        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
    </form>
</div>
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
