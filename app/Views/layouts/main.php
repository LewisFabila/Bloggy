<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Bloggy' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light text-light">

    <?php if (session()->get('isLoggedIn')): ?> <!-- Corrobora la sesion, y si esta iniciada activa el nav bar -->
        <?= view('layouts/navbar'); ?>
    <?php endif; ?>

    <main> <!-- Contenedor del contenido general -->
        <?= $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body><!-- Contenedor Principal -->
</html>