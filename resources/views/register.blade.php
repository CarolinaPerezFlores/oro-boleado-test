<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registro de Usuario</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Contraseña:</label>
        <input type="password" name="password">
        @error('password') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
