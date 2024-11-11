<?php 
    // Cargamos las especialidades y estados de los entrenadores
    $especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);
    $estados_entrenadores = ControladorEstadosEntrenadores::ctrMostrarEstados(null, null);
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST" action="">

                <!-- Campo para el nombre del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Nombre</label>
                    <input type="text" id="example-input-normal" name="nombre_entrenador" class="form-control" placeholder="Nombre" required>
                </div>

                <!-- Campo para el apellido del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Apellido</label>
                    <input type="text" id="example-input-normal" name="apellido_entrenador" class="form-control" placeholder="Apellido" required>
                </div>

                <!-- Campo para el DNI del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">DNI</label>
                    <input type="text" id="example-input-normal" name="dni_entrenador" class="form-control" placeholder="DNI" required>
                </div>

                <!-- Campo para la fecha de contratación del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Fecha de Contratación</label>
                    <input type="date" id="example-input-normal" name="fechaContr_entrenador" class="form-control" required>
                </div>

                <!-- Campo para el correo electrónico del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Correo Electrónico</label>
                    <input type="email" id="example-input-normal" name="email_entrenador" class="form-control" placeholder="Correo Electrónico" required>
                </div>

                <!-- Campo para el teléfono del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Teléfono</label>
                    <input type="text" id="example-input-normal" name="telefono_entrenador" class="form-control" placeholder="Teléfono" required>
                </div>

                <!-- Campo para el estado del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Estado</label>
                    <select name="id_estado_ent" id="id_estado_ent" class="form-control" required>
                        <option value="">Seleccione una opción</option>
                        <?php
                            foreach ($estados_entrenadores as $key => $value) { ?>
                                <option value="<?php echo $value["id_estado_ent"]; ?>"><?php echo $value["estado_ent"]; ?></option>
                            <?php } ?>
                    </select>
                </div>

                <!-- Campo para la especialidad del entrenador -->
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Especialidad</label>
                    <select name="id_especialidad" id="id_especialidad" class="form-control" required>
                        <option value="">Seleccione una especialidad</option>
                        <?php
                            foreach ($especialidades as $key => $value) { ?>
                                <option value="<?php echo $value["id_especialidad"]; ?>"><?php echo $value["nombre_especialidad"]; ?></option>
                            <?php } ?>
                    </select>
                </div>

                <?php
                    // Aquí se maneja el envío del formulario
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $agregar = new ControladorEntrenadores();
                        $agregar->ctrAgregarEntrenador();
                    }
                ?>
                
                <!-- Botón para enviar el formulario -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div><!-- end card body -->

    </div><!-- end card -->

</div><!-- end col -->


