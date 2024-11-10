<?php
// Obtener los detalles de la especialidad a eliminar
$especialidad = ControladorEspecialidades::ctrMostrarEspecialidades("id_especialidad", $pagina[1]);

// Si no existe la especialidad, redirigir o mostrar un mensaje de error.
if (!$especialidad) {
    echo "<script>window.location = 'especialidades.php';</script>";
    exit;
}
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Eliminar Especialidad</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <!-- Mensaje de confirmación -->
            <div class="alert alert-warning" role="alert">
                <strong>Advertencia:</strong> Estás a punto de eliminar la siguiente especialidad. Esta acción no puede deshacerse.
            </div>

            <!-- Detalles de la especialidad -->
            <div class="mb-3">
                <label for="nombre_especialidad" class="form-label">Nombre</label>
                <input type="text" value="<?php echo $especialidad["nombre_especialidad"]; ?>" id="nombre_especialidad" class="form-control" placeholder="Nombre" readonly>
            </div>

            <div class="mb-3">
                <label for="descripcion_especialidad" class="form-label">Descripción</label>
                <textarea id="descripcion_especialidad" class="form-control" rows="4" readonly><?php echo $especialidad["descrip_especialidad"]; ?></textarea>
            </div>

            <!-- Formulario para confirmar eliminación -->
            <form method="GET">

                <!-- Campo oculto para la id de la especialidad -->
                <input type="hidden" name="id_especialidad" value="<?php echo $especialidad["id_especialidad"]; ?>">

                <!-- Botón para confirmar eliminación -->
                <button class="btn btn-danger" type="submit" name="action" value="eliminar">Eliminar Especialidad</button>

                <!-- Botón para cancelar -->
                <a href="especialidades.php" class="btn btn-secondary">Cancelar</a>

            </form>
        </div><!-- end card-body -->
    </div><!-- end card -->
</div><!-- end col -->
