<?php

// Llamar al controlador de entrenadores para obtener la lista de entrenadores
$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);
?>

<div class="col-xl-12 mt-3">

    <!-- Botón para agregar nuevo entrenador -->
    <a class="btn btn-dark" href="agregarEntrenador"><i class="fas fa-plus"></i> Agregar</a>

    <?php
    // Verificar si hay entrenadores disponibles
    if (count($entrenadores) > 0) {
    ?>
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title mb-0">Entrenadores</h1>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Fecha de Contratación</th>
                                <th scope="col">Correo Electrónico</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Especialidad</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($entrenadores as $key => $value) { ?>

                                <tr>

                                    <!-- Mostrar la información de cada entrenador -->
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value["nombre_entrenador"]; ?></td>
                                    <td><?php echo $value["apellido_entrenador"]; ?></td>
                                    <td><?php echo $value["dni_entrenador"]; ?></td>
                                    <td><?php echo $value["fechaContr_entrenador"]; ?></td>
                                    <td><?php echo $value["email_entrenador"]; ?></td>
                                    <td><?php echo $value["telefono_entrenador"]; ?></td>
                                    <td><?php echo $value["id_estado_ent"]; ?></td>
                                    <td><?php echo $value["id_especialidad"]; ?></td>

                                    <!-- Acciones de editar y eliminar -->
                                    <td>
                                        <a href="editarEntrenador/<?php echo $value["id_entrenador"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btnEliminarEntrenador" id_entrenador_eliminar=<?php echo $value["id_entrenador"]; ?>><i class="fas fa-trash"></i></button>
                                        <?php ControladorEntrenadores::ctrEliminarEntrenador(); ?>
                                    </td>
                                </tr>

                            <?php } ?>

                            <input type="hidden" id="url" value="<?php echo $url; ?>">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php
    } else {
    ?>

        <!-- Mensaje si no hay entrenadores -->
        <h3>No hay entrenadores disponibles</h3>

    <?php
    }
    ?>

</div>

<?php
// Se incluye el controlador para eliminar el entrenador si se ha hecho una acción de eliminación
$eliminar = new ControladorEntrenadores();
$eliminar->ctrEliminarEntrenador();
?>
