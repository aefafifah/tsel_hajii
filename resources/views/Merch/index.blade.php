<x-layouts>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Merchandise</h2>
        <a href="{{ route('merch.create') }}" class="btn btn-success mb-3">Tambah Merchandise</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($merchandises->isEmpty())
            <div class="alert alert-warning">
                Belum ada merchandise yang tersedia.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Detail</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchandises as $merchandise)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $merchandise->merch_nama }}</td>
                            <td>{{ $merchandise->merch_detail }}</td>
                            <td>{{ $merchandise->merch_stok }}</td>
                            <td>
                                <a href="{{ route('merch.show', $merchandise->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('merch.edit', $merchandise->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('merch.destroy', $merchandise->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus merchandise ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layouts>
