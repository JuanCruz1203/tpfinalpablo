<?php

// Obtener los métodos de pago
$metodosPago = ControladorMetodosPago::ctrMostrarMetodosPago(null, null);

?>

<div class="col-xl-12 mt-3">

    <a class="btn btn-dark" href="agregarMetPago"><i class="fas fa-plus"></i> Agregar</a>

    <?php
    if (count($metodosPago) > 0) {
    ?>
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title mb-0">Métodos de Pago</h1>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($metodosPago as $key => $value) { ?>

                                <tr>

                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value["nombre_metodoPago"]; ?></td>
                                    <td><?php echo $value["descrip_metodoPago"]; ?></td>

                                    <td>
                                        <a href="editarMetPago/<?php echo $value["id_metodoPago"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btnEliminarMetodoPago" id_metodoPago="<?php echo $value["id_metodoPago"]; ?>"><i class="fas fa-trash"></i></button>
                                        <?php ControladorMetodosPago::ctrEliminarMetodoPago(); ?>
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

        <h3>No hay métodos de pago disponibles</h3>

    <?php
    }
    ?>

</div>

<?php
// Llamamos al controlador para manejar la eliminación de los métodos de pago
$eliminar = new ControladorMetodosPago();
$eliminar->ctrEliminarMetodoPago();
?>
