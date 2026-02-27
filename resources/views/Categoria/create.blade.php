<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>crear categoria</h1>
    <form action="{{ url('/categoria')}}" method="POST">
        @csrf
       @include('Categoria.form')
    </form>
</body>
</html>