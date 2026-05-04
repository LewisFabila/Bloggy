<?php $validation = session('validation'); ?> <!-- Validacion de Errores (usuario muy corto, correo existente, contraseña muy corta) -->
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= alert_toast() ?> <!-- Alerta tipo toast para informacion breve -->
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow-lg bg-light text-dark col-4 p-4 m-4 rounded-4">
        <h1 class="text-center text-uppercase mb-4 fw-bold"> Crear Usuario </h1>

        <form action="<?= base_url('/register/create') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-floating mb-3">
                <input type="text" name="user" class="form-control" placeholder="Nombre de usuario" value="<?= old('user') ?>" required>
                <label>Nombre de usuario</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" placeholder="Correo" value="<?= old('email') ?>" required>
                <label>Correo electrónico</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                <label>Contraseña</label>
            </div>

            <button class="btn btn-success w-100 mb-3">Crear Usuario</button>
            <div class="text-center">
                <a href="/" class="text-decoration-none">Regresar</a>
            </div>
        </form> <!-- Formulario de Registro -->

    </div> <!-- Contenedor que rodea al formulario de Registro -->
</div> <!-- Div que centra el contenedor del formulario de login -->
<?= $this->endSection() ?>