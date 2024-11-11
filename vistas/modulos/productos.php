<?php

$productos = ControladorProductos::ctrMostrarProductos(null, null);

?>
<div class="col-xl-12 mt-3">

    <a class="btn btn-dark" href="agregar"><i class="fas fa-plus"></i> Agregar</a>

    <?php
    if (count($productos) > 0) {
    ?>
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title mb-0">Productos</h1>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($productos as $key => $value) { ?>

                                <tr>

                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value["nombre"]; ?></td>
                                    <td>$ <?php echo number_format($value["precio"], 2); ?></td>
                                    <td><?php echo $value["stock"]; ?></td>
                                    <td><?php echo $value["nombre_categoria"]; ?></td>

                                    <td>
                                        <a href="editar/<?php echo $value["id_producto"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btnEliminar" id_eliminar=<?php echo $value["id_producto"]; ?>><i class="fas fa-trash"></i></button>
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

        <h3>No hay productos disponibles</h3>

    <?php
    }
    ?>

</div>

<?php
$eliminar = new ControladorProductos();
$eliminar->ctrEliminarProducto();
?>