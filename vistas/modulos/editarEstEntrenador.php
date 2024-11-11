<?php
$estado_entrenador = ControladorEstadosEntrenadores::ctrMostrarEstados("id_estado_ent", $_GET["id"]);
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar estado de entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Nombre del estado</label>
                    <input type="text" id="example-input-normal" name="estado_ent" class="form-control" placeholder="Activo/Inactivo/..." value="<?php echo $estado_entrenador["estado_ent"]; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Descripción</label>
                    <input type="text" id="example-input-normal" name="desc_estado_ent" class="form-control" placeholder="..." value="<?php echo $estado_entrenador["desc_estado_ent"]; ?>" required>
                </div>

                <input type="hidden" name="id_estado_ent" value="<?php echo $estado_entrenador["id_estado_ent"]; ?>">

                <?php
                // Llamada al controlador para editar el estado
                $editar = new ControladorEstadosEntrenadores();
                $editar->ctrEditarEstado();
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>

    </div>
</div>
