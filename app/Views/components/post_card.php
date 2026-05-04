<div class="card mb-4 p-3 shadow bg-white">
    <div class="d-flex align-items-center mb-2">
        <i class="bi bi-person-circle me-2 fs-1"></i>
        <div>
            <strong><?= esc($post['user']) ?></strong><br>
            <small class="text-muted">
                <?php if(!empty($post['created_at'])): ?>
                    <?= time_ago($post['created_at']) ?>
                <?php endif; ?>
            </small> <!-- Contador de hace cuanto tiempo se publico -->
        </div>
    </div> <!-- Encabezado del post / Informacion de la publicacion -->

    <h5 class="fw-bold"><?= esc($post['title']) ?></h5> <!-- Título del post -->
    <p><?= esc($post['content']) ?></p> <!-- Contenido (Texto) del post -->
    <?php if(!empty($post['image'])): ?> <!-- Imagen del post (En caso de tener) -->
        <img src="<?= base_url('uploads/' . $post['image']) ?>" class="img-fluid mx-auto d-block rounded-4 shadow mt-2 mb-2"  style="max-width:500px;">
    <?php endif; ?>
</div> <!-- Contenedor de cada post -->
