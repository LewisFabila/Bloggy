<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Crear Usuario</title>
</head>

<body class="bg-dark text-light">
    <div class="d-flex justify-content-center mt-4">
        <div class="bg-light text-dark col-6 p-4 m-4 rounded-4">
            <h1 class="text-center"> Crear Nuevo Usuario </h1>
            <form action="<?php echo base_url('/login') ?>" method="POST">
                <div class="mb-4">
                    <label class="form-label">Nombre:</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Correo Electronico:</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>