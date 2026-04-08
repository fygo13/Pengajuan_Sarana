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
        <a href="/admin/dashboard" class="btn btn-secondary mb-3">Kembali</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $e)
                    <div>{{ $e }}</div>
                @endforeach
            </div>
        @endif

        <div class="card shadow mb-3">
            <div class="card-body">

                <form method="POST" action="/admin/kategori">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <input name="nama_kategori" class="form-control" placeholder="Nama kategori">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <table class="table table-bordered table-hover shadow">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $i => $k)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $k->nama_kategori }}</td>
                        <td>
                            <a href="/admin/kategori/delete/{{ $k->id }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>