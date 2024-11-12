
<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar Método de Pago</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">
                <!-- Campo de Nombre del Método de Pago -->
                <div class="mb-3">
                    <label for="nombre_metodoPago" class="form-label">Nombre</label>
                    <input type="text" id="nombre_metodoPago" name="nombre_metodoPago" class="form-control" placeholder="Nombre del método de pago"  required>
                </div>

                <!-- Campo de Descripción del Método de Pago -->
                <div class="mb-3">
                    <label for="descrip_metodoPago" class="form-label">Descripción</label>
                    <textarea id="descrip_metodoPago" name="descrip_metodoPago" class="form-control" placeholder="Descripción del método de pago" required></textarea>
                </div>

                <!-- Campo oculto para la ID del Método de Pago -->
                <input type="hidden" name="id_metodoPago" value="<?php echo $metodoPago["id_metodoPago"]; ?>">

                <!-- Enviar los datos al controlador -->
                <?php
                // Proceso de actualización del método de pago
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $editar = new ControladorMetodosPago();
                    $editar->ctrModificarMetodoPago();
                }
                ?>

                <!-- Botón para guardar los cambios -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->
