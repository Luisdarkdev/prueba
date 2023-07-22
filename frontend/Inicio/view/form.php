<div class="modal fade" id="listas-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Libro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="text" class="form-control" name="codi" id="codi" hidden>
                    <input type="text" class="form-control" name="user" id="user" hidden value="<?= $_SESSION['user_cod'] ?>">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary add-lista-new">Guardar</button>
            </div>
        </div>
    </div>
</div>