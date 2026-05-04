<div class="card mb-4 p-3 shadow bg-white position-relative">
    
    <?php if ($post['id_user'] == session('id_user')): ?>
        <div class="dropdown position-absolute top-0 end-0 m-2">
            <button class="btn" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots fs-4"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal<?= $post['id'] ?>" onclick="event.stopPropagation();">
                        Editar publicación
                    </button>
                </li>
                <li>
                    <form action="<?= base_url('/blog/delete-post') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $post['id'] ?>"> <!-- Necesitamos obtener el id de la publicacion -->
                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('¿Seguro que quieres eliminar esta publicación?')">
                            Eliminar publicación
                        </button>
                    </form>
                </li>
            </ul>
        </div> <!-- Dropdown para editar o eliminar publicacion -->
    <?php endif; ?>

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
