<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Pengaduan Sarana Sekolah</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h3>Data User</h3>

        <form action="/admin/user" method="POST">
            @csrf
            <input name="username" class="form-control mb-2" placeholder="Username">
            <input name="nis" class="form-control mb-2" placeholder="NIS">
            <input name="kelas" class="form-control mb-2" placeholder="Kelas">
            <input name="password" class="form-control mb-2" placeholder="Password">

            <select name="role" class="form-control mb-2">
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="siswa">Siswa</option>
            </select>

            <button class="btn btn-primary">Tambah User</button>
            <a href="/admin/dashboard" class="btn btn-success">Kembali</a>
        </form>

        <hr>

        @foreach($data as $u)
            <div>
                {{ $u->username }} - {{ $u->role }}
                <a href="/admin/user/delete/{{ $u->id }}" class="btn btn-danger btn-sm">Hapus</a>
            </div>
        @endforeach
    </div>
</body>
</html>