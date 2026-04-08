<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Aspirasi - Pengaduan Sarana Sekolah</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h3>Input Aspirasi</h3>
    
            <div>
                <a href="/siswa/histori" class="btn btn-secondary mb-3">Histori</a>
                <a href="/logout" class="btn btn-danger mb-3">Logout</a>
            </div>
        </div>

        <form action="/siswa/kirim" method="POST">
            @csrf
            <input type="text" name="judul" class="form-control mb-2" placeholder="Judul">

            <select name="kategori_id" class="form-control mb-2">
                @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>

            <textarea name="isi" class="form-control mb-2" placeholder="Isi Aspirasi"></textarea>

            <input type="text" name="lokasi" class="form-control mb-2" placeholder="Lokasi">

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</body>
</html>