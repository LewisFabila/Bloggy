<div class="modal fade" id="editModal<?= $post['id'] ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form action="<?= base_url('/blog/update-post') ?>" method="POST" enctype="multipart/form-data" class="modal-content">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <div class="modal-header">
                <h5 class="modal-title">Editar publicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div> <!-- Encabezado/Titulo -->
            <div class="modal-body">
                <input type="text" name="title" class="form-control mb-3" value="<?= esc($post['title']) ?>" required>
                <textarea name="content" class="form-control mb-3" required><?= esc($post['content']) ?></textarea>
                <?php if (!empty($post['image'])): ?>
                    <img src="<?= base_url('uploads/' . $post['image']) ?>" class="img-fluid mx-auto d-block rounded-4 shadow mt-2 mb-2"  style="max-width:400px;">
                    <div class="form-check my-3">
                        <input type="checkbox" name="remove_image" value="1" class="form-check-input">
                        <label class="form-check-label"><i class="bi bi-trash3"></i> Eliminar imagen</label> <!-- Eliminar imagen -->
                    </div>
                <?php endif; ?>
                <input type="file" accept="image/*" name="image" class="form-control">
            </div> <!-- Inputs del formulario con autorrellenado -->
                    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100">Guardar cambios</button>
            </div>
        </form>
    </div> <!-- Contenedor del modal -->
</div>