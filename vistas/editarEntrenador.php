<?php
// Supongo que tienes controladores para los estados y especialidades, obteniendo sus valores de la base de datos
$estados = ControladorEstados::ctrMostrarEstados(null, null); // Obtener todos los estados
$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null); // Obtener todas las especialidades

// Obtener los detalles del entrenador a editar
$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores("id_entrenador", $pagina[1]);

//echo "<pre>";
//print_r($entrenador);
//echo "</pre>";
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar Entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre_entrenador" class="form-label">Nombre</label>
                    <input type="text" value="<?php echo $entrenador["nombre_entrenador"]; ?>" id="nombre_entrenador" name="nombre_entrenador" class="form-control" placeholder="Nombre" required>
                </div>

                <!-- Apellido -->
                <div class="mb-3">
                    <label for="apellido_entrenador" class="form-label">Apellido</label>
                    <input type="text" value="<?php echo $entrenador["apellido_entrenador"]; ?>" id="apellido_entrenador" name="apellido_entrenador" class="form-control" placeholder="Apellido" required>
                </div>

                <!-- DNI -->
                <div class="mb-3">
                    <label for="dni_entrenador" class="form-label">DNI</label>
                    <input type="text" value="<?php echo $entrenador["dni_entrenador"]; ?>" id="dni_entrenador" name="dni_entrenador" class="form-control" placeholder="DNI" required>
                </div>

                <!-- Fecha de Contratación -->
                <div class="mb-3">
                    <label for="fechaContr_entrenador" class="form-label">Fecha de Contratación</label>
                    <input type="date" value="<?php echo $entrenador["fechaContr_entrenador"]; ?>" id="fechaContr_entrenador" name="fechaContr_entrenador" class="form-control" required>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-3">
                    <label for="email_entrenador" class="form-label">Correo Electrónico</label>
                    <input type="email" value="<?php echo $entrenador["email_entrenador"]; ?>" id="email_entrenador" name="email_entrenador" class="form-control" placeholder="Correo Electrónico" required>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono_entrenador" class="form-label">Teléfono</label>
                    <input type="text" value="<?php echo $entrenador["telefono_entrenador"]; ?>" id="telefono_entrenador" name="telefono_entrenador" class="form-control" placeholder="Teléfono" required>
                </div>

                <!-- Estado -->
                <div class="mb-3">
                    <label for="id_estado" class="form-label">Estado</label>
                    <select name="id_estado" id="id_estado" class="form-control" required>
                        <option value="">Seleccione un estado</option>
                        <?php foreach ($estados as $estado): ?>
                            <option 
                            <?php if ($estado["id_estado"] == $entrenador["id_estado"]) { ?>
                                selected
                            <?php } ?>
                            value="<?php echo $estado["id_estado"]; ?>"><?php echo $estado["nombre_estado"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Especialidad -->
                <div class="mb-3">
                    <label for="id_especialidad" class="form-label">Especialidad</label>
                    <select name="id_especialidad" id="id_especialidad" class="form-control" required>
                        <option value="">Seleccione una especialidad</option>
                        <?php foreach ($especialidades as $especialidad): ?>
                            <option 
                            <?php if ($especialidad["id_especialidad"] == $entrenador["id_especialidad"]) { ?>
                                selected
                            <?php } ?>
                            value="<?php echo $especialidad["id_especialidad"]; ?>"><?php echo $especialidad["nombre_especialidad"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Campo oculto para la id del entrenador -->
                <input type="hidden" name="id_entrenador" value="<?php echo $entrenador["id_entrenador"]; ?>">

                <!-- Controlador para editar el entrenador -->
                <?php
                $editar = new ControladorEntrenadores();
                $editar->ctrModificarEntrenador();
                ?>

                <!-- Botón para guardar los cambios -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->
