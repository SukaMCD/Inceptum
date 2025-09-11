<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Halo, Admin {{ Auth::user()->nama_user }}!</h1>
    <p>Ini adalah halaman khusus admin.</p>
    <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: blue; text-decoration: underline;">
                Logout
            </button>
        </form>
</body>
</html>