<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Pengaduan Sarana Sekolah</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h3>Kategori</h3>

        <form action="/kategori" method="POST">
            @csrf
            <input name="nama_kategori" class="form-control mb-2">
            <button class="btn btn-primary">Tambah</button>
            <a href="/admin/dashboard" class="btn btn-success">Kembali</a>
        </form>

        <hr>

        @foreach($data as $k)
            <div>
                {{ $k->nama_kategori }}
                <a href="/kategori/delete/{{ $k->id }}" class="btn btn-danger btn-sm">Hapus</a>
            </div>
        @endforeach
    </div>
</body>
</html>