<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Kedai Cendana</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="row vh-100 g-0">
        <!-- Gambar -->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder"></div>
        </div>
        <!-- Gambar -->

        <!-- Form Login -->
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">

                    <!-- Logo -->
                    <a class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('images/logo_cendana.png') }}" alt="Kedai Cendana" width="80" draggable="false">
                    </a>
                    <!-- Logo -->

                    <div class="text-center mb-5">
                        <h3>Masuk</h3>
                        <p class="text-secondary">Masuk ke Akun Anda</p>
                    </div>

                    <!-- Login Google -->
                    <a href="{{ url('auth/redirect') }}" class="btn btn-lg btn-outline-custom w-100 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/google_logo.png') }}" alt="Google" width="20" class="me-2" draggable="false">
                        Login dengan Google
                    </a>

                    <!-- Login Google -->

                    <!-- Atau -->
                    <div class="position-relative">
                        <hr class="text-secondary divider">
                        <div class="divider-content-center">atau</div>
                        </hr>
                    </div>
                    <!-- Atau -->

                    <!-- Form -->
                    <form action="#">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg fs-6" placeholder="Password" required>
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Ingat Saya</small></label>
                            </div>
                            <div>
                                <small><a href="#" class="biru">Lupa Password?</a></small>
                            </div>
                        </div>
                        <button class="btn btn-cendana btn-lg w-100 mb-3">Login</button>
                    </form>
                    <!-- Form -->
                    <div class="text-center">
                        <small class="text-secondary">Belum punya akun? <a href="{{ route('register') }}" class="biru">Daftar</a></small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>