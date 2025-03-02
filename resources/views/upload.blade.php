<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
</head>
<body>
    <h2>Subir Imagen</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        <img src="{{ asset('storage/' . session('image')) }}" width="200">
    @endif

    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Subir</button>
    </form>
</body>
</html>