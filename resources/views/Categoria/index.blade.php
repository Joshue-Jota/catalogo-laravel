<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .mensaje {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .btn-nuevo {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 8px 14px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 15px;
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
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .acciones {
            display: flex;
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

    <h1>📂 Categorías</h1>

    @if(Session::has('mensaje'))
        <div class="mensaje">
            {{ Session::get('mensaje') }}
        </div>
    @endif

    <a href="{{ url('/categoria/create') }}" class="btn-nuevo">➕ Registrar nueva categoría</a>
    <a href="{{ url('/') }}" class="btn-nuevo">Regresar al inicio</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->descripcion}}</td>
                <td>
                    <div class="acciones">
                        <a href="{{ url('/categoria/'.$categoria->id.'/edit') }}" class="btn-editar">✏ Editar</a>

                        <form action="{{ url('/categoria/'.$categoria->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" value="🗑 Borrar" class="btn-borrar" onclick="return confirm('¿Quieres borrar?')">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>