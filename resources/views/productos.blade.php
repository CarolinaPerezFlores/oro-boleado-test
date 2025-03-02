<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>DASHBOARD</title>
</head>
<body>
    <h2 class="mb-5">PRODUCTOS</h2>
    
    @foreach ($productos as $producto)
    <p>{{ $producto->nombre }}</p>
    @endforeach

    <div class="flex mt-5">
        {{ $productos->links() }}
    </div>
</body>
</html>