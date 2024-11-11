<?php

$estados_entrenadores = ControladorEstadosEntrenadores::ctrMostrarEstados(null, null);

?>
<div class="col-xl-12 mt-3">

    <a class="btn btn-dark" href="agregarEstEntrenador"><i class="fas fa-plus"></i> Agregar</a>

    <?php
    if (count($estados_entrenadores) > 0) {
    ?>
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title mb-0">Estados de Entrenadores</h1>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($estados_entrenadores as $key => $value) { ?>

                                <tr>

                                    <td><?php echo $value["id_estado_ent"]; ?></td>
                                    <td><?php echo $value["estado_ent"]; ?></td>
                                    <td><?php echo $value["desc_estado_ent"]; ?></td>
                                    <td>
                                        <a href="editarEstEntrenador/<?php echo $value["id_estado_ent"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btnEliminarEstadoEnt" id_estado_ent_eliminar="<?php echo $value["id_estado_ent"]; ?>"><i class="fas fa-trash"></i></button>
                                        <?php ControladorEstadosEntrenadores::ctrEliminarEstado(); ?>
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

        <h3>No hay estados de entrenadores disponibles</h3>

    <?php
    }
    ?>

</div>
