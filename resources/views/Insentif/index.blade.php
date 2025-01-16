<x-layouts>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Insentif</h2>
        <a href="{{ route('insentif.create') }}" class="btn btn-success mb-3">Tambah Insentif</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($insentif->isEmpty())
            <div class="alert alert-warning">
                Belum ada insentif yang tersedia.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipe Insentif</th>
                        <th>Nilai Insentif</th>
                        <th>Produk id</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insentif as $insentifs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $insentifs->tipe_insentif }}</td>
                            <td>{{ $insentifs->nilai_insentif }}</td>
                            <td>{{ $insentifs->produk_id }}</td>
                            <td>
                                <a href="{{ route('insentif.show', $insentifs->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('insentif.edit', $insentifs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('insentif.destroy', $insentifs->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus insentif ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-layouts>
