<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Categoría</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        .form-container {
            width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .botones {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        input[type="submit"] {
            background: #28a745;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #1e7e34;
        }

        .btn-regresar {
            text-decoration: none;
            background: #6c757d;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .btn-regresar:hover {
            background: #545b62;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>{{ isset($categoria) ? 'Editar Categoría' : 'Registrar Categoría' }}</h2>

    <label for="Nombre">Nombre de la categoría</label>
    <input type="text" name="nombre" value="{{ isset($categoria) ? $categoria->nombre : '' }}" id="nombre" placeholder="Nombre de la categoría">

    <label for="Descripcion">Descripción de la categoría</label>
    <input type="text" name="descripcion" value="{{ isset($categoria) ? $categoria->descripcion : '' }}" id="descripcion" placeholder="Descripción de la categoría">

    <div class="botones">
        <input type="submit" value="{{ isset($categoria) ? 'Actualizar' : 'Registrar' }}">
        <a href="{{ url('/categoria/') }}" class="btn-regresar">Regresar</a>
    </div>
</div>

</body>
</html>