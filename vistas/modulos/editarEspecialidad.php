<?php
// Obtener los datos de la especialidad a editar
$especialidad = ControladorEspecialidades::ctrMostrarEspecialidades("id_especialidad", $_GET["id"]);

// Si no existe la especialidad, redirigir o mostrar un mensaje de error
if (!$especialidad) {
    echo "<script>window.location = 'especialidades.php';</script>";
    exit;
}
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar Especialidad</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">

                <!-- Campo de Nombre de la Especialidad -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Nombre</label>
                    <input type="text" id="example-input-normal" name="nombre_especialidad" class="form-control" placeholder="Nombre de la especialidad" required>
                </div>

                <!-- Campo de Descripción de la Especialidad -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Descripción</label>
                    <input name="text" id="example-input-normal"  class="form.control" name="descrip_cliente" placeholder="Descripción de la especialidad" required>
                </div>

                <!-- Campo oculto para la ID de la especialidad -->
                <input type="hidden" name="id_especialidad" value="<?php echo $especialidad["id_especialidad"]; ?>">

                <!-- Llamada al controlador para editar la especialidad -->
                <?php
                $editar = new ControladorEspecialidades();
                $editar->ctrModificarEspecialidad();
                ?>

                <!-- Botón para guardar los cambios -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->
