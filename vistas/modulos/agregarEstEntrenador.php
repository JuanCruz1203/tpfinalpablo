<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar estado de entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST" action="">

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Nombre del estado</label>
                    <input type="text" id="example-input-normal" name="estado_ent" class="form-control" placeholder="Activo/Inactivo/..." required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Descripción</label>
                    <input type="text" id="example-input-normal" name="desc_estado_ent" class="form-control" placeholder="..." required>
                </div>

                <?php
                // Llamada al controlador para agregar el estado
                $agregar = new ControladorEstadosEntrenadores();
                $agregar->ctrAgregarEstado();
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>

    </div>
</div>
