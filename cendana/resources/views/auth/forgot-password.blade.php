<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="row vh-100 g-0">
        <!-- Gambar -->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder"></div>
        </div>
        <!-- Gambar -->

        <!-- Form Lupa Password -->
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">

                    <!-- Logo -->
                    <a class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('images/logo_cendana.png') }}" alt="Kedai Cendana" width="80" draggable="false">
                    </a>
                    <!-- Logo -->

                    @if (session('status'))
                        <!-- Tampilan ini akan muncul jika email berhasil dikirim -->
                        <h3 class="card-title text-center">Cek Email Anda</h3>
                        <p class="text-center text-secondary mb-4">
                            Kami telah mengirimkan tautan reset password ke email Anda. Silakan cek kotak masuk Anda.
                        </p>
                    @else
                        <!-- Tampilan default (form) akan muncul jika email belum dikirim -->
                        <h3 class="card-title text-center">Lupa Password?</h3>
                        <p class="text-center text-secondary mb-4">Masukkan email Anda untuk menerima tautan reset password.</p>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control form-control-lg fs-6 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-cendana btn-lg w-100">Kirim Tautan Reset Password</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>
