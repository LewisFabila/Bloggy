<div class="modal fade" id="postModal">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?= base_url('/blog/post') ?>" method="POST" enctype="multipart/form-data" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title">Crear publicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div> <!-- Encabezado/Titulo -->
            
            <div class="modal-body">
                <input type="text" name="title" class="form-control mb-3" placeholder="Título" required>
                <textarea name="content" class="form-control mb-3" placeholder="¿Qué estás pensando?" style="height: 150px" required></textarea>
                <input type="file" accept="image/*" name="image" class="form-control">
            </div> <!-- Inputs del formulario -->
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100">Publicar</button>
            </div>
        </form>
    </div> <!-- Contenedor del modal -->
</div>