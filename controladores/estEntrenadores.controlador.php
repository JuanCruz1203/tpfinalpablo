<?php

class ControladorEstadosEntrenadores
{
    static public function ctrMostrarEstados($item, $valor)
    {
        $tabla = "estados_entrenadores";
        $respuesta = ModeloEstadosEntrenadores::mdlMostrarEstados($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrAgregarEstado()
    {
        if (isset($_POST["estado_ent"])) {

            $tabla = "estados_entrenadores";    

            $datos = array(
                "estado_ent" => $_POST["estado_ent"],
                "desc_estado_ent" => $_POST["desc_estado_ent"]
            );

            $url = PlantillaControlador::url() . "estados_ent";
            $respuesta = ModeloEstadosEntrenadores::mdlAgregarEstado($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
            fncSweetAlert(
            "success",
            "El estado se agregó correctamente",
            "' . $url . '"
            );
            </script>';
            }
        }
    }

    public function ctrEditarEstado()
    {
        if (isset($_POST["id_estado_ent"])) {

            $tabla = "estados_entrenadores";

            $datos = array(
                "id_estado_ent" => $_POST["id_estado_ent"],
                "estado_ent" => $_POST["estado_ent"],
                "desc_estado_ent" => $_POST["desc_estado_ent"]
            );

            $url = PlantillaControlador::url() . "estados_ent";
            $respuesta = ModeloEstadosEntrenadores::mdlEditarEstado($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
            fncSweetAlert(
            "success",
            "El estado se actualizó correctamente",
            "' . $url . '"
            );
            </script>';
                exit();
            }
        }
    }

    static public function ctrEliminarEstado()
    {
        $url = PlantillaControlador::url() . "estEntrenadores";
        if (isset($_GET["id_estado_ent_eliminar"])) {
            $tabla = "estados_entrenadores";
            $datos = $_GET["id_estado_ent_eliminar"];
            $respuesta = ModeloEstadosEntrenadores::mdlEliminarEstado($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
                fncSweetAlert("success", "El estado se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
?>
