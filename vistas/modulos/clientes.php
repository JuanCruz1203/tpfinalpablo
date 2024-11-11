<?php

$clientes = ControladorClientes::ctrMostrarClientes(null, null);

?>
<div class="col-xl-12 mt-3">

    <a class="btn btn-dark" href="agregar_cliente"><i class="fas fa-plus"></i> Agregar</a>

    <?php
    if (count($clientes) > 0) {
    ?>
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title mb-0">Clientes</h1>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo Electrónico</th>
                                <th scope="col">Fecha de Inscripción</th>
                                <th scope="col">Plan de Entrenamiento</th>
                                <th scope="col">Estado de Membresía</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($clientes as $key => $value) { ?>

                                <tr>

                                    <td><?php echo $value["id_cliente"]; ?></td>
                                    <td><?php echo $value["nombre_cliente"]; ?></td>
                                    <td><?php echo $value["apellido_cliente"]; ?></td>
                                    <td><?php echo $value["dni_cliente"]; ?></td>
                                    <td><?php echo $value["fechaNac_cliente"]; ?></td>
                                    <td><?php echo $value["direccion_cliente"]; ?></td>
                                    <td><?php echo $value["telefono_cliente"]; ?></td>
                                    <td><?php echo $value["email_cliente"]; ?></td>
                                    <td><?php echo $value["fechaIns_cliente"]; ?></td>
                                    <td><?php echo $value["nombre_plan"]; ?></td>
                                    <td><?php echo $value["estado_memb"]; ?></td>

                                    <td>
                                        <a href="editar_cliente/<?php echo $value["id_cliente"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btnEliminarCliente" id_cliente_eliminar="<?php echo $value["id_cliente"]; ?>"><i class="fas fa-trash"></i></button>
                                        <?php ControladorClientes::ctrEliminarCliente();?>
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

        <h3>No hay clientes disponibles</h3>

    <?php
    }
    ?>

</div>
