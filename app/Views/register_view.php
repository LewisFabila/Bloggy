<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="d-flex justify-content-center mt-4">
        <div class="bg-light text-dark col-6 p-4 m-4 rounded-4">
            <h1 class="text-center text-uppercase mb-4 fw-bold"> Crear Nuevo Usuario </h1>
            <form action="#" method="POST">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="form-label fs-5">Nombre de Usuario:</label>
                    <input type="text" name="user" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fs-5">Correo Electronico:</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fs-5">Contraseña:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Crear Usuario</button>
                <a href="/" class="btn btn-secondary">Regresar</a>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>