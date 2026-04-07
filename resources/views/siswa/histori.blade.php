<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori - Pengaduan Sarana Sekolah</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h3>Histori Aspirasi</h3>

        <a href="/siswa/form" class="btn btn-primary mb-3">Kembali</a>

        @foreach ($data as $d)
            <div class="card mb-3 p-3">
                <b>{{ $d->judul }}</b><br>
                Kategori: {{ $d->kategori->nama_kategori ?? '-' }}<br>
                Status: <span class="badge bg-info">{{ $d->status }}</span>

                @if ($d->feedback)
                <div class="alert alert-success mt-2">
                    Feedback: {{ $d->feedback->isi_feedback }}
                </div>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>