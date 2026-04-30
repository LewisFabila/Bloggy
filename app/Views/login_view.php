<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Inicio de Sesion</title>
</head>

<body class="bg-dark text-light">
    <div class="d-flex justify-content-center mt-4">
        <div class="bg-light text-dark col-6 p-4 m-4 rounded-4">
            <h1 class="text-center"> Iniciar Sesion </h1>
            <form action="<?php base_url('/') ?>" method="POST">
                <div class="mb-4">
                    <label class="form-label">Usuario:</label>
                    <input type="text" name="user" id="user" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button class="btn btn-primary">Iniciar Sesion</button>
                <a href="/register" class="btn btn-secondary">Crear Nuevo Usuario</a>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>