<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= alert_toast() ?> <!-- Alerta tipo toast para informacion breve -->
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow-lg bg-light text-dark col-4 p-4 m-4 rounded-4">
        <h1 class="text-center text-uppercase fw-bold">Bloggy</h1>
        <p class="text-center text-uppercase mb-4">-Iniciar Sesion-</p>
        
        <form action="<?= base_url('/login') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" placeholder="Correo" value="<?= old('email') ?>" required>
                <label>Correo electrónico</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                <label>Contraseña</label>
            </div>
            
            <button class="btn btn-primary w-100 mb-3">Iniciar sesión</button>
            <div class="text-center">
                <a href="/register" class="text-decoration-none">Crear usuario</a>
            </div>
        </form><!-- Formulario de Login -->

    </div> <!-- Contenedor que rodea al formulario de Login -->
</div> <!-- Div que centra el contenedor del formulario de login -->
<?= $this->endSection() ?>