<?php
// Incluye el encabezado si lo tienes
// require_once 'path/to/header.php';
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Especialidad</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <!-- Formulario para agregar especialidad -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nombre_especialidad" class="form-label">Nombre de la Especialidad</label>
                    <input type="text" id="nombre_especialidad" name="nombre_especialidad" class="form-control" placeholder="Nombre de la especialidad" required>
                </div>

                <div class="mb-3">
                    <label for="descrip_especialidad" class="form-label">Descripción</label>
                    <textarea id="descrip_especialidad" name="descrip_especialidad" class="form-control" placeholder="Descripción de la especialidad" required></textarea>
                </div>

                <?php
                // Llamamos al controlador para agregar la especialidad al hacer submit
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $agregar = new ControladorEspecialidades();
                    $agregar->ctrAgregarEspecialidad();
                }
                ?>

                <!-- Botón para enviar el formulario -->
                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->

<?php
// Incluye el pie de página si lo tienes
// require_once 'path/to/footer.php';
?>
