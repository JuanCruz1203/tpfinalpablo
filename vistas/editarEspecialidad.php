<?php
// Obtener las categorías (si las necesitas para un dropdown o similar) y los datos de la especialidad a editar
$especialidad = ControladorEspecialidades::ctrMostrarEspecialidades("id_especialidad", $pagina[1]);

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

                <div class="mb-3">
                    <label for="nombre_especialidad" class="form-label">Nombre</label>
                    <input type="text" value="<?php echo $especialidad["nombre_especialidad"]; ?>" id="nombre_especialidad" name="nombre_especialidad" class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion_especialidad" class="form-label">Descripción</label>
                    <textarea name="descrip_especialidad" id="descripcion_especialidad" class="form-control" rows="4" placeholder="Descripción" required><?php echo $especialidad["descrip_especialidad"]; ?></textarea>
                </div>

                <input type="hidden" name="id_especialidad" value="<?php echo $especialidad["id_especialidad"]; ?>">

                <!-- Llamada al controlador para editar la especialidad -->
                <?php
                $editar = new ControladorEspecialidades();
                $editar->ctrModificarEspecialidad();
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->
