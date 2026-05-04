<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="container col-5">
        <?= alert_toast() ?> <!-- Alerta tipo toast para informacion breve -->
        <div class="text-dark rounded-3 p-4">
            <div class="card p-3 mb-4 shadow bg-white">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-circle me-2 fs-1"></i>
                    <button class="form-control text-start" data-bs-toggle="modal" data-bs-target="#postModal">
                        ¿Qué estás pensando?
                    </button>
                </div>
            </div> <!-- Barra de Post -->
            <?= view('components/post_form') ?>  <!-- Modal del formulario de crear publicacion -->

            <?php if(empty($posts)): ?> <!-- Si el usuario no tiene ningun post al filtrar por "Mis Publicaciones", le muestra un mensaje -->
                <div class="card p-3 bg-white shadow text-center text-muted">
                    <h4>Opss... parece que no has publicado nada aún.</h5>
                    <i class="bi bi-emoji-frown fs-3"></i>
                </div>
            <?php else: ?> <!-- Si el usuario tiene posts, le muestra todos sus posts -->
                <?php foreach($posts as $post): ?>
                    <?= view('components/post_card', ['post' => $post]) ?>
                    <?= view('components/update_form', ['post' => $post]) ?> <!-- Modal del formulario de editar publicacion -->
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div> <!-- Contenedor principal -->
<?= $this->endSection() ?>