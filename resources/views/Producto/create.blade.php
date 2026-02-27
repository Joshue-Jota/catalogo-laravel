<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear productos</h1>
    <form action="{{ url('/producto')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @include('Producto.form')
</body>
</html>