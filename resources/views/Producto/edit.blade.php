<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/producto/'.$producto->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        {{ method_field('PATCH') }}
       @include('Producto.form')  
</body>
</html>