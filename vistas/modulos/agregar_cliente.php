

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar cliente</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST" action="">

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Nombre</label>
                    <input type="text" id="example-input-normal" name="nombre_cliente" class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Apellido</label>
                    <input type="text" id="example-input-normal" name="apellido_cliente" class="form-control" placeholder="Apellido" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">DNI</label>
                    <input type="text" id="example-input-normal" name="dni_cliente" class="form-control" placeholder="DNI" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" id="example-input-normal" name="fechaNac_cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Dirección</label>
                    <input type="text" id="example-input-normal" name="direccion_cliente" class="form-control" placeholder="Dirección" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Teléfono</label>
                    <input type="text" id="example-input-normal" name="telefono_cliente" class="form-control" placeholder="Teléfono" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Correo Electrónico</label>
                    <input type="email" id="example-input-normal" name="email_cliente" class="form-control" placeholder="Correo Electrónico" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Fecha de Inscripción</label>
                    <input type="date" id="example-input-normal" name="fechaIns_cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Plan de Entrenamiento</label>
                    <input type="text" id="example-input-normal" name="id_plan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Estado de Membresía</label>
                    <input type="text" id="example-input-normal" name="id_estado_memb" class="form-control" required>
                </div>
                    <!--<div class="mb-3">
                        <label for="id_categoria" class="form-label">Categoría</label>

                        <select name="id_categoria" id="id_categoria" class="form-control" required>

                        <option value="">Seleccione una opción</option>
                            <?php
                            /*foreach ($categorias as $key => $value) { ?>

                                <option value="<?php echo $value["id_categoria"]; ?>"><?php echo $value["nombre_categoria"]; ?></option>

                            <?php  } */?>

                        </select>
                    </div>-->

                    <?php
                    $agregar = new ControladorClientes();
                    $agregar->ctrAgregarCliente();
                    ?>

                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>

    </div>
</div>