<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .mensaje {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            text-align: center;
        }

        .btn-nuevo {
            display: inline-block;
            margin-bottom: 15px;
            background: #007bff;
            color: white;
            padding: 8px 14px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-nuevo:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        th {
            background: #343a40;
            color: white;
            padding: 10px;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .acciones {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .btn-editar {
            background: #ffc107;
            color: black;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-borrar {
            background: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .btn-borrar:hover {
            background: #a71d2a;
        }
    </style>
</head>
<body>

<h1>🛒 Listado de productoss</h1>

<a href="{{ url('/producto/create') }}" class="btn-nuevo">➕ Registrar nuevo producto</a>
<a href="{{ url('/') }}" class="btn-nuevo">Regresar al inicio</a>

@if(Session::has('mensaje'))
    <div class="mensaje">
        {{ Session::get('mensaje') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Estado</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{$producto->id}}</td>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->stock}}</td>
            <td>
                <img src="{{ asset('storage') . '/' . $producto->imagen }}" alt="" class="product-image">
            </td>
            <td>
                {{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}
            </td>
            <td>{{ $producto->categoria->nombre }}</td>
            <td>
                <div class="acciones">
                    <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn-editar">✏ Editar</a>

                    <form action="{{ url('/producto/'.$producto->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="🗑 Borrar" class="btn-borrar" onclick="return confirm('¿Quieres borrar el producto?')">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>