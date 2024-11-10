<?php
// Obtener los detalles del entrenador a eliminar
$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores("id_entrenador", $pagina[1]);

//echo "<pre>";
//print_r($entrenador);
//echo "</pre>";
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Eliminar Entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <!-- Mensaje de confirmación -->
            <div class="alert alert-warning" role="alert">
                <strong>Advertencia:</strong> Estás a punto de eliminar al siguiente entrenador. Esta acción no puede deshacerse.
            </div>

            <!-- Detalles del entrenador -->
            <div class="mb-3">
                <label for="nombre_entrenador" class="form-label">Nombre</label>
                <input type="text" value="<?php echo $entrenador["nombre_entrenador"]; ?>" id="nombre_entrenador" class="form-control" placeholder="Nombre" readonly>
            </div>

            <div class="mb-3">
                <label for="apellido_entrenador" class="form-label">Apellido</label>
                <input type="text" value="<?php echo $entrenador["apellido_entrenador"]; ?>" id="apellido_entrenador" class="form-control" placeholder="Apellido" readonly>
            </div>

            <div class="mb-3">
                <label for="dni_entrenador" class="form-label">DNI</label>
                <input type="text" value="<?php echo $entrenador["dni_entrenador"]; ?>" id="dni_entrenador" class="form-control" placeholder="DNI" readonly>
            </div>

            <div class="mb-3">
                <label for="fechaContr_entrenador" class="form-label">Fecha de Contratación</label>
                <input type="text" value="<?php echo $entrenador["fechaContr_entrenador"]; ?>" id="fechaContr_entrenador" class="form-control" placeholder="Fecha de Contratación" readonly>
            </div>

            <div class="mb-3">
                <label for="email_entrenador" class="form-label">Correo Electrónico</label>
                <input type="text" value="<?php echo $entrenador["email_entrenador"]; ?>" id="email_entrenador" class="form-control" placeholder="Correo Electrónico" readonly>
            </div>

            <div class="mb-3">
                <label for="telefono_entrenador" class="form-label">Teléfono</label>
                <input type="text" value="<?php echo $entrenador["telefono_entrenador"]; ?>" id="telefono_entrenador" class="form-control" placeholder="Teléfono" readonly>
            </div>

            <!-- Formulario para confirmar eliminación -->
            <form method="GET">

                <!-- Campo oculto para la id del entrenador -->
                <input type="hidden" name="id_entrenador" value="<?php echo $entrenador["id_entrenador"]; ?>">

                <!-- Botón para confirmar eliminación -->
                <button class="btn btn-danger" type="submit" name="action" value="eliminar">Eliminar Entrenador</button>

                <!-- Botón para cancelar -->
                <a href="entrenadores.php" class="btn btn-secondary">Cancelar</a>

            </form>
        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->
