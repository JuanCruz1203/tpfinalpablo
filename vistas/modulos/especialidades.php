<?php

$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);

?>
<div class="col-xl-12 mt-3">

    <a class="btn btn-dark" href="agregarEspecialidad"><i class="fas fa-plus"></i> Agregar</a>

    <?php
    if (count($especialidades) > 0) {
    ?>
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title mb-0">Especialidades</h1>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($especialidades as $key => $value) { ?>

                                <tr>

                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value["nombre_especialidad"]; ?></td>
                                    <td><?php echo $value["descrip_especialidad"]; ?></td>

                                    <td>
                                        <a href="editarEspecialidad/<?php echo $value["id_especialidad"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btnEliminarEspecialidad" id_especialidad="<?php echo $value["id_especialidad"]; ?>"><i class="fas fa-trash"></i></button>
                                        
            
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

        <h3>No hay especialidades disponibles</h3>

    <?php
    }
    ?>

</div>

<?php
$eliminar = new ControladorEspecialidades();
$eliminar->ctrEliminarEspecialidad();
?>
