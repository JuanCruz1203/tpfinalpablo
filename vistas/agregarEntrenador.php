<?php
// Supongo que tienes los datos de los estados y especialidades en variables, aquí los obtendremos usando los controladores respectivos.
$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null); // Obtener todas las especialidades

// Obtenemos los estados usando el controlador correspondiente
$estados = ControladorEntrenadores::ctrMostrarEstados(); // Obtener todos los estados

// Si se tiene un controlador de entrenadores:
$agregar = new ControladorEntrenadores();
$agregar->ctrAgregarEntrenador(); // Llamamos al controlador para agregar el entrenador al guardar el formulario
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label for="nombre_entrenador" class="form-label">Nombre</label>
                    <input type="text" id="nombre_entrenador" name="nombre_entrenador" class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido_entrenador" class="form-label">Apellido</label>
                    <input type="text" id="apellido_entrenador" name="apellido_entrenador" class="form-control" placeholder="Apellido" required>
                </div>

                <div class="mb-3">
                    <label for="dni_entrenador" class="form-label">DNI</label>
                    <input type="text" id="dni_entrenador" name="dni_entrenador" class="form-control" placeholder="DNI" required>
                </div>

                <div class="mb-3">
                    <label for="fechaContr_entrenador" class="form-label">Fecha de Contratación</label>
                    <input type="date" id="fechaContr_entrenador" name="fechaContr_entrenador" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email_entrenador" class="form-label">Correo Electrónico</label>
                    <input type="email" id="email_entrenador" name="email_entrenador" class="form-control" placeholder="Correo Electrónico" required>
                </div>

                <div class="mb-3">
                    <label for="telefono_entrenador" class="form-label">Teléfono</label>
                    <input type="text" id="telefono_entrenador" name="telefono_entrenador" class="form-control" placeholder="Teléfono" required>
                </div>

                <!-- Campo de selección para los estados -->
                <div class="mb-3">
                    <label for="id_estado" class="form-label">Estado</label>
                    <select name="id_estado" id="id_estado" class="form-control" required>
                        <option value="">Seleccione un estado</option>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?php echo $estado["id_estado_ent"]; ?>"><?php echo $estado["estado_ent"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Campo de selección para las especialidades -->
                <div class="mb-3">
                    <label for="id_especialidad" class="form-label">Especialidad</label>
                    <select name="id_especialidad" id="id_especialidad" class="form-control" required>
                        <option value="">Seleccione una especialidad</option>
                        <?php foreach ($especialidades as $especialidad): ?>
                            <option value="<?php echo $especialidad["id_especialidad"]; ?>"><?php echo $especialidad["nombre_especialidad"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Botón para enviar el formulario -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div><!-- end card-body -->

    </div><!-- end card -->
</div><!-- end col -->
