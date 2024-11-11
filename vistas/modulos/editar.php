<?php
$categorias = ControladorCategorias::ctrMostrarCategorias(null, null);
$clientes = ControladorClientes::ctrMostrarClientes("id_cliente",  $pagina[1]);
//echo "<pre>";
//print_r($producto);
//echo "</pre>";
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar producto</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Nombre</label>
                    <input type="text" value="<?php echo $producto["nombre"]; ?>" id="example-input-normal" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Precio</label>
                    <input type="number" value="<?php echo $producto["precio"]; ?>" id="example-input-normal" name="precio" class="form-control" placeholder="Precio" required>
                </div>
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Stock</label>
                    <input type="number" value="<?php echo $producto["stock"]; ?>" id="example-input-normal" name="stock" class="form-control" placeholder="Stock" required>
                </div>
                <div class="mb-3">
                    <label for="id_categoria" class="form-label">Categoría</label>

                    <!--<select name="id_categoria" id="id_categoria" class="form-control" required>

                    <option value="">Seleccione una opción</option>
                        <?php/*
                        foreach ($categorias as $key => $value) { ?>

                            <option 

                            <?php if( $value["id_categoria"] == $producto["id_categoria"]) { ?>
                                selected
                            <?php } ?>
                            
                            value="<?php echo $value["id_categoria"]; ?>"><?php echo $value["nombre_categoria"]; ?></option>

                        <?php  } */?>

                    </select>-->
                </div>

                <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"]; ?>">

                <?php
                $editar = new ControladorProductos();
                $editar->ctrEditarProducto();
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>

    </div>
</div>