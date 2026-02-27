<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f0f4ff, #ffffff);
        }
        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .15);
        }
        footer {
            background: #f8f9fa;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">📦 JOTAPHONE</a>
        <div class="ms-auto">
            @auth
                <a href="{{ route('producto.index') }}" class="btn btn-light btn-sm">Panel</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-5">

    <!-- HERO -->
    <div class="hero p-5 text-center mb-5">
        <h1 class="display-5 fw-bold">Gestión de Categorías y Productos</h1>
        <p class="lead">Administra tu catálogo de forma rápida y sencilla</p>
        <a href="{{ route('producto.index') }}" class="btn btn-light btn-lg mt-3">
            <i class="bi bi-box-seam"></i> Ver Productos
        </a>
    </div>

    <!-- SECCIONES -->
    <div class="row g-4">

        <!-- CATEGORIAS -->
        <div class="col-md-6">
            <div class="card card-hover border-0 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-tags-fill fs-1 text-primary"></i>
                    <h3 class="mt-3">Categorías</h3>
                    <p>Organiza tus productos por categorías.</p>
                    <a href="{{ route('categoria.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-right-circle"></i> Ir a Categorías
                    </a>
                </div>
            </div>
        </div>

        <!-- PRODUCTOS -->
        <div class="col-md-6">
            <div class="card card-hover border-0 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-bag-fill fs-1 text-success"></i>
                    <h3 class="mt-3">Productos</h3>
                    <p>Administra precios, imágenes y stock.</p>
                    <a href="{{ route('producto.index') }}" class="btn btn-success">
                        <i class="bi bi-arrow-right-circle"></i> Ir a Productos
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

<footer class="text-center mt-5 py-4 text-muted">
    © {{ date('Y') }} Sistema de Productos - Laravel
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    console.log("Sistema listo 🚀");
</script>

</body>
</html>