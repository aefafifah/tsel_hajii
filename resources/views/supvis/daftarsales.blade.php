<x-supvis.supvislayouts>
    <div class="container">
        <h2 class="mb-4">Kelola Bertugas - Role Sales</h2>

        <form action="{{ route('role-users.mass-update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Bertugas</label>
                <select name="bertugas" class="form-control" required>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Tempat Tugas</label>
                <input type="text" name="tempat_tugas" class="form-control" required>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Bertugas</th>
                        <th>Tempat Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><input type="checkbox" name="user_ids[]" value="{{ $user->id }}"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->bertugas ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $user->tempat_tugas ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Update Bertugas Massal</button>
        </form>
    </div>

    {{-- Script untuk Select All --}}
    <script>
        document.getElementById('select-all').onclick = function() {
            const checkboxes = document.querySelectorAll('input[name="user_ids[]"]');
            checkboxes.forEach(cb => cb.checked = this.checked);
        }
    </script>
</x-supvis.supvislayouts>
