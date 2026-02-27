<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/categoria/'.$categoria->id) }}" method="POST">
        @csrf
        {{ method_field('PATCH') }}
       @include('Categoria.form')       
</body>
</html>