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
                    <label for="nombre_especialidad" class="form-label">Nombre</label>
                    <input type="text" id="nombre_especialidad" name="nombre_especialidad" class="form-control" placeholder="Nombre de la especialidad" required>
                </div>

                <!-- Campo de Descripción de la Especialidad -->
                <div class="mb-3">
                    <label for="descripcion_especialidad" class="form-label">Descripción</label>
                    <input type="text" id="descripcion_especialidad" name="descrip_especialidad" class="form-control" placeholder="Descripción de la especialidad" required>
                </div>

                <!-- Campo oculto para la ID de la especialidad -->
                <input type="hidden" name="id_especialidad" value="<?php echo $especialidad["id_especialidad"]; ?>">

                <!-- Enviar los datos al controlador -->
                <?php
                // Proceso de actualización de la especialidad
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $editar = new ControladorEspecialidades();
                    $editar->ctrModificarEspecialidad();
                }
                ?>

                <!-- Botón para guardar los cambios -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->
