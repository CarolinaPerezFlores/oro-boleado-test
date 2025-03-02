<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Contraseña:</label>
        <input type="password" name="password">
        @error('password') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Ingresar</button>
    </form>

</body>
</html>
