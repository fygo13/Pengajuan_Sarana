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
        <h3 class="mb-3">User</h3>
        <a href="/admin/dashboard" class="btn btn-secondary mb-3">Kembali</a>

        <!-- NOTIF -->
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

        <!-- FORM -->
        <div class="card shadow mb-3">
            <div class="card-body">
                <form method="POST" action="/admin/user">
                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <input name="username" class="form-control" placeholder="Username">
                        </div>

                        <div class="col-md-2">
                            <input name="nis" class="form-control" placeholder="NIS">
                        </div>

                        <div class="col-md-2">
                            <input name="kelas" class="form-control" placeholder="Kelas">
                        </div>

                        <div class="col-md-2">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="col-md-2">
                            <select name="role" class="form-control">
                                <option value="">Role</option>
                                <option>admin</option>
                                <option>siswa</option>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-primary w-100" onclick="this.disabled=true; this.form.submit();">+</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <!-- TABEL -->
        <table class="table table-bordered table-hover shadow">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $i => $u)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->nis ?? '-' }}</td>
                        <td>{{ $u->kelas ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $u->role=='admin' ? 'danger' : 'success' }}">
                                {{ $u->role }}
                            </span>
                        </td>
                        <td>
                            @if($u->role != 'admin')
                                <a href="/admin/user/delete/{{ $u->id }}" class="btn btn-danger btn-sm">Hapus</a>
                                @else
                                <span class="badge bg-secondary">Terkunci</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>