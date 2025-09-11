<!DOCTYPE html>
<html>
<head>
    <title>Kedai Cendana</title>
</head>
<body>
    <h1>Selamat Datang di Kedai Cendana</h1>
    <p>Makan makanan favoritmu dengan mudah.</p>

    {{-- Logika Kondisional --}}
    @auth
        {{-- Tampilan untuk pengguna yang sudah login --}}
        <p>Halo, {{ Auth::user()->nama_user }}!</p>

        {{-- Form untuk Logout (Cara Aman) --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: blue; text-decoration: underline;">
                Logout
            </button>
        </form>

    @endauth

    @guest
        {{-- Tampilan untuk pengguna yang belum login --}}
        <a href="{{ route('login') }}">Login</a>
    @endguest

</body>
</html>