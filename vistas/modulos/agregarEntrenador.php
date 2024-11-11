<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">

                <!-- Nombre del entrenador -->
                <div class="mb-3">
                    <label for="nombreEntrenador" class="form-label">Nombre</label>
                    <input type="text" id="nombreEntrenador" name="nombre_entrenador" class="form-control" placeholder="Nombre" required>
                </div>

                <!-- Apellido del entrenador -->
                <div class="mb-3">
                    <label for="apellidoEntrenador" class="form-label">Apellido</label>
                    <input type="text" id="apellidoEntrenador" name="apellido_entrenador" class="form-control" placeholder="Apellido" required>
                </div>

                <!-- DNI del entrenador -->
                <div class="mb-3">
                    <label for="dniEntrenador" class="form-label">DNI</label>
                    <input type="text" id="dniEntrenador" name="dni_entrenador" class="form-control" placeholder="DNI" required>
                </div>

                <!-- Fecha de contratación -->
                <div class="mb-3">
                    <label for="fechaContrEntrenador" class="form-label">Fecha de Contratación</label>
                    <input type="date" id="fechaContrEntrenador" name="fechaContr_entrenador" class="form-control" required>
                </div>

                <!-- Correo electrónico -->
                <div class="mb-3">
                    <label for="emailEntrenador" class="form-label">Correo Electrónico</label>
                    <input type="email" id="emailEntrenador" name="email_entrenador" class="form-control" placeholder="Correo Electrónico" required>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefonoEntrenador" class="form-label">Teléfono</label>
                    <input type="text" id="telefonoEntrenador" name="telefono_entrenador" class="form-control" placeholder="Teléfono" required>
                </div>

                <!-- Selección de estado -->
                <div class="mb-3">
                    <label for="idEstado" class="form-label">Estado</label>
                    <select name="id_estado" id="idEstado" class="form-control" required>
                        <option value="">Seleccione un estado</option>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?php echo $estado["id_estado_ent"]; ?>"><?php echo $estado["estado_ent"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Selección de especialidad -->
                <div class="mb-3">
                    <label for="idEspecialidad" class="form-label">Especialidad</label>
                    <select name="id_especialidad" id="idEspecialidad" class="form-control" required>
                        <option value="">Seleccione una especialidad</option>
                        <?php foreach ($especialidades as $especialidad): ?>
                            <option value="<?php echo $especialidad["id_especialidad"]; ?>"><?php echo $especialidad["nombre_especialidad"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Botón para guardar -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>

        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->

<?php
// Controlador para agregar el entrenador
$agregar = new ControladorEntrenadores();
$agregar->ctrAgregarEntrenador(); 
?>
