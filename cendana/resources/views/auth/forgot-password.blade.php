<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="max-width: 500px; width: 100%;">
            @if (session('status'))
                <h3 class="card-title text-center">Cek Email Anda</h3>
                <p class="text-center text-secondary mb-4">
                    Kami telah mengirimkan tautan reset password ke email Anda. Silakan cek kotak masuk Anda.
                </p>
            @else
                <h3 class="card-title text-center">Lupa Password?</h3>
                <p class="text-center text-secondary mb-4">Masukkan email Anda untuk menerima tautan reset password.</p>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim Tautan Reset Password</button>
                </form>
            @endif
        </div>
    </div>
</body>
</html>