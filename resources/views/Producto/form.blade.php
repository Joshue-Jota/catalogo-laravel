<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        .form-container {
            width: 450px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .product-image {
            display: block;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .botones {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        input[type="submit"] {
            background: #28a745;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #1e7e34;
        }

        .btn-regresar {
            background: #6c757d;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-regresar:hover {
            background: #545b62;
        }

        .image-preview {
            width: 150px;
            height: 150px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .preview-text {
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>{{ isset($producto) ? 'Editar Producto' : 'Registrar Producto' }}</h2>

    <label for="Nombre">Nombre del producto</label>
    <input type="text" name="nombre" value="{{ isset($producto) ? $producto->nombre : '' }}" id="nombre" placeholder="nombre del producto">

    <label for="Descripcion">Descripción del producto</label>
    <input type="text" name="descripcion" value="{{ isset($producto) ? $producto->descripcion : '' }}" id="descripcion" placeholder="descripcion del producto">

    <label for="Precio">Precio del producto</label>
    <input type="number" name="precio" value="{{ isset($producto) ? $producto->precio : '' }}" id="precio" placeholder="precio del producto">

    <label for="stock">Stock del producto</label>
    <input type="number" name="stock" value="{{ isset($producto) ? $producto->stock : '' }}" id="stock" placeholder="stock del producto">

    <label for="imagen">Imagen del producto</label>
    <input type="file" name="imagen" value="{{ isset($producto) ? $producto->imagen : '' }}" id="imagen">

    @if(isset($producto) && $producto->imagen)
        <img src="{{ asset('storage') . '/' . $producto->imagen }}" width="200" alt="" class="product-image">
    @endif

    <label>Estado</label>
    <select name="estado">
        <option value="">-- Seleccione un estado --</option>
        <option value="1" {{ (isset($producto) && $producto->estado == 1) ? 'selected' : '' }}>Activo</option>
        <option value="0" {{ (isset($producto) && $producto->estado == 0) ? 'selected' : '' }}>Inactivo</option>
    </select>

    <label>Categoría</label>
    <select name="categoria_id">
        <option value="">-- Seleccione una categoría --</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ (isset($producto) && $producto->categoria_id == $categoria->id) ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <div class="botones">
        <input type="submit" value="{{ isset($producto) ? 'Actualizar' : 'Registrar' }}">
        <a href="{{ url('/producto/') }}" class="btn-regresar">Regresar</a>
    </div>
</div>

</body>
</html>