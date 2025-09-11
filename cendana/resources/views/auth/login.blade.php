<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    {{-- Login manual --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email</label><br>
            <input id="email" type="email" name="email" required autofocus>
        </div>
        <br>

        <div>
            <label for="password">Password</label><br>
            <input id="password" type="password" name="password" required>
        </div>
        <br>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <hr>

    {{-- Login dengan Google --}}
    <div>
        <a href="{{ url('auth/google') }}">Login dengan Google</a>
    </div>

</body>
</html>
