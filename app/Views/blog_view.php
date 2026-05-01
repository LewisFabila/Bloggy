<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="container p-4">
        <?= alert_toast() ?> <!-- Alerta tipo toast para informacion breve -->
        <h1 class="text-center text-uppercase mb-4">Entradas</h1>
        <div class="bg-light text-dark rounded-3 p-4">
        
            <!-- Contenido -->
        
        </div>
    </div> <!-- Contenedor principal -->
<?= $this->endSection() ?>