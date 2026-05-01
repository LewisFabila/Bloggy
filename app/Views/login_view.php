<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
        <?= alert_toast() ?> <!-- Alerta tipo toast para informacion breve -->
        <div class="d-flex justify-content-center mt-4">
            <div class="bg-light text-dark col-6 p-4 m-4 rounded-4">
                <h1 class="text-center text-uppercase fw-bold">Bloggy</h1>
                <p class="text-center text-uppercase mb-4">-Iniciar Sesion-</p>
                
                <form action="<?php base_url('/') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="form-label fs-5">Correo Electronico:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fs-5">Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Iniciar Sesion</button>
                    <a href="/register" class="btn btn-secondary">Crear Usuario</a>
                </form><!-- Formulario de Login -->

            </div> <!-- Contenedor que rodea al formulario de Login -->
        </div> <!-- Div que centra el contenedor del formulario de login -->
    </div> <!-- Contenedor principal -->
<?= $this->endSection() ?>