<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengajuan Sarana Sekolah</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="bg-light d-flex align-items-center" style="height:90vh;">
    
    <div class="container">
        <div class="card p-4 mx-auto shadow" style="max-width:400px;">
            <h4 class="text-center mb-3">Login</h4>

            @if (Session('error'))
                <div class="alert alert-danger">
                    {{ Session('error') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                <input type="text" name="username" class="form-control mb-3" placeholder="Username / NIS">
                <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>