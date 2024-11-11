<?php

class ControladorProductos
{
    static public function ctrMostrarProductos($item, $valor)
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrAgregarProducto()
    {
        if (isset($_POST["nombre"])) {

            $tabla = "productos"; //nombre de la tabla            

            $datos = array(
                "nombre" => $_POST["nombre"],
                "precio" => $_POST["precio"],
                "stock" => $_POST["stock"],
                "id_categoria" => $_POST["id_categoria"],
            );
            //podemos volver a la página de datos
            //print_r($datos);
            //return;

            $url = PlantillaControlador::url() . "productos";
            $respuesta = ModeloProductos::mdlAgregarProductos($tabla, $datos);

            //print_r($respuesta);
            //return;

            if ($respuesta == "ok") {
                echo '<script>
            fncSweetAlert(
            "success",
            "El producto se agregó correctamente",
            "' . $url . '"
            );
            </script>';
            }
        }
    }

    //editar datos
    public function ctrEditarProducto()
    {
        if (isset($_POST["id_producto"])) {

            $tabla = "productos"; //nombre de la tabla

            $datos = array(
                "nombre" => $_POST["nombre"],
                "precio" => $_POST["precio"],
                "stock" => $_POST["stock"],
                "id_categoria" => $_POST["id_categoria"],
                "id_producto" => $_POST["id_producto"]
            );
            //podemos volver a la página de datos
            //print_r($datos);
            //return;

            $url = PlantillaControlador::url() . "productos";
            $respuesta = ModeloProductos::mdlEditarProductos($tabla, $datos);

            //print_r($respuesta);
            //return;

            if ($respuesta == "ok") {
                echo '<script>
            fncSweetAlert(
            "success",
            "El producto se actualizó correctamente",
            "' . $url . '"
            );
            </script>';
            }
        }
    }

    /*=============================================
ELIMINAR
=============================================*/
    static public function ctrEliminarProducto()
    {
        $url = PlantillaControlador::url() . "productos";
        if (isset($_GET["id_eliminar"])) {
            $tabla = "productos";
            $datos = $_GET["id_eliminar"];
            $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
                fncSweetAlert("success", "El producto se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
