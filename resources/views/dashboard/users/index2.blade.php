<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    {{-- <link href="./output.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="h-full bg-gray-100">
    <div class="min-h-full">

@section('content')
    <h1>Daftar Berita</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Enckey</th>
                <th>Tanggal</th>
                <th>Kode Asosiasi</th>
                <th>Kode Provinsi</th>
                <th>Nomor Kategori</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File Foto</th>
                <th>Status</th>
                <th>Aktif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $data)
                <tr>
                    <td>{{ $data->nomor }}</td>
                    <td>{{ $data->enckey }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->kode_asosiasi }}</td>
                    <td>{{ $data->kode_provinsi }}</td>
                    <td>{{ $data->nomor_kategori }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->deskripsi }}</td>
                    <td>@if ($data->file_foto)<img src="{{ asset('storage/berita/' . $data->file_foto) }}" width="50" height="30"> @endif</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->aktif }}</td>
                    <td>
                        <a href="{{ route('berita.edit', $data->nomor) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('berita.destroy', $data->nomor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
