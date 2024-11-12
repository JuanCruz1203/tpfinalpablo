<?php

class ControladorMetodosPago
{
    // Mostrar Métodos de Pago
    static public function ctrMostrarMetodosPago($item, $valor)
    {
        $tabla = "metodopago"; // nombre de la tabla
        $respuesta = ModeloMetodosPago::mdlMostrarMetodosPago($tabla, $item, $valor);
        return $respuesta;
    }

    // Método para agregar un nuevo método de pago
    public function ctrAgregarMetodoPago()
    {
        if (isset($_POST["nombre_metodoPago"])) {

            // Preparar los datos para la base de datos
            $tabla = "metodopago"; // nombre de la tabla
            $datos = array(
                "nombre_metodoPago" => $_POST["nombre_metodoPago"],
                "descrip_metodoPago" => $_POST["descrip_metodoPago"]
            );

            // Llamar al modelo para agregar el método de pago
            $respuesta = ModeloMetodosPago::mdlAgregarMetodoPago($tabla, $datos);

            // Redirigir según el resultado
            $url = PlantillaControlador::url() . "metodosPago";
            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El método de pago se agregó correctamente", "' . $url . '");
                </script>';
            } else {
                echo '<script>
                    fncSweetAlert("error", "Hubo un error al agregar el método de pago", "' . $url . '");
                </script>';
            }
        }
    }

    // Método para modificar un método de pago
    public function ctrModificarMetodoPago()
    {
        if (isset($_POST["id_metodoPago"])) {

            // Preparar los datos para la actualización
            $tabla = "metodopago"; // nombre de la tabla
            $datos = array(
                "id_metodoPago" => $_POST["id_metodoPago"],
                "nombre_metodoPago" => $_POST["nombre_metodoPago"],
                "descrip_metodoPago" => $_POST["descrip_metodoPago"]
            );

            $url = PlantillaControlador::url() . "metodosPago";
            $respuesta = ModeloMetodosPago::mdlModificarMetodoPago($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El método de pago se modificó correctamente", "' . $url . '");
                </script>';
            } else {
                echo '<script>
                    fncSweetAlert("error", "Hubo un error al modificar el método de pago", "' . $url . '");
                </script>';
            }
        }
    }

    // Método para eliminar un método de pago
    static public function ctrEliminarMetodoPago()
    {
        $url = PlantillaControlador::url() . "metodosPago";
        if (isset($_GET["id_metodoPago"])) {

            // Preparar la eliminación
            $tabla = "metodopago";
            $datos = $_GET["id_metodoPago"]; // Recibimos el ID del método de pago a eliminar

            // Llamar al modelo para eliminar el método de pago
            $respuesta = ModeloMetodosPago::mdlEliminarMetodoPago($tabla, $datos);

            // Redirigir según el resultado
            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El método de pago se eliminó correctamente", "' . $url . '");
                </script>';
            } else {
                echo '<script>
                    fncSweetAlert("error", "Hubo un error al eliminar el método de pago", "' . $url . '");
                </script>';
            }
        }
    }
}
?>
