<?php
// Incluye el encabezado si lo tienes
// require_once 'path/to/header.php';
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Método de Pago</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <!-- Formulario para agregar método de pago -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nombre_metodoPago" class="form-label">Nombre del Método de Pago</label>
                    <input type="text" id="nombre_metodoPago" name="nombre_metodoPago" class="form-control" placeholder="Nombre del método de pago" required>
                </div>

                <div class="mb-3">
                    <label for="descrip_metodoPago" class="form-label">Descripción</label>
                    <textarea id="descrip_metodoPago" name="descrip_metodoPago" class="form-control" placeholder="Descripción del método de pago" required></textarea>
                </div>

                <?php
                // Llamamos al controlador para agregar el método de pago al hacer submit
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $agregar = new ControladorMetodosPago();
                    $agregar->ctrAgregarMetodoPago();
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
