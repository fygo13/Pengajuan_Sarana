<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Pengaduan Sarana Sekolah</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="container mt-4">
        <h3>Dashboard Admin</h3>

        <a href="/admin/user" class="btn btn-primary">User</a>
        <a href="/admin/kategori" class="btn btn-secondary">Kategori</a>
        <a href="/logout" class="btn btn-danger">Logout</a>

        <hr>

        <form class="mb-3">
            <select name="kategori" class="form-control w-25 d-inline">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
            <button class="btn btn-success">Filter</button>
        </form>

        @foreach ($data as $d)
            <div class="card p-3 mb-3">
                <b>{{ $d->judul }}</b><br>
                Siswa: {{ $d->user->username ?? '-' }}<br>
                Kategori: {{ $d->kategori->nama_kategori ?? '-' }}<br>
                Tanggal: {{ $d->tanggal }}<br>
                Status: <span class="badge bg-info">{{ $d->status }}</span>

                <form action="/admin/feedback/{{ $d->id }}" method="POST" class="mt-2">
                    @csrf
                    <input type="text" name="isi_feedback" class="form-control mb-2" placeholder="Isi Feedback" required>

                    <select name="status" class="form-control mb-2" required>
                        <option value="Menunggu" {{ $d->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Proses" {{ $d->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $d->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="/admin/aspirasi/delete/{{ $d->id }}" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                    </a>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>