<?php

class ControladorEntrenadores
{
    // Método para mostrar entrenadores
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $tabla = "entrenadores"; // nombre de la tabla
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($tabla, $item, $valor);

        // Si la respuesta no es un array (puede ser un mensaje de error), devolvemos un array vacío
        if (!is_array($respuesta)) {
            return [];
        }
        return $respuesta;
    }

    // Método para agregar un entrenador
    public function ctrAgregarEntrenador()
    {
        if (isset($_POST["nombre_entrenador"])) {

            $tabla = "entrenadores"; // nombre de la tabla            

            $datos = array(
                "nombre_entrenador" => $_POST["nombre_entrenador"],
                "apellido_entrenador" => $_POST["apellido_entrenador"],
                "dni_entrenador" => $_POST["dni_entrenador"],
                "fechaContr_entrenador" => $_POST["fechaContr_entrenador"],
                "email_entrenador" => $_POST["email_entrenador"],
                "telefono_entrenador" => $_POST["telefono_entrenador"],
                "id_estado_ent" => $_POST["id_estado_ent"],
                "id_especialidad" => $_POST["id_especialidad"]
            );

            $url = PlantillaControlador::url() . "entrenadores";
            $respuesta = ModeloEntrenadores::mdlAgregarEntrenador($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El entrenador se agregó correctamente",
                    "' . $url . '"
                    );
                </script>';
            }
        }
    }

    // Método para editar un entrenador
    public function ctrEditarEntrenador()
    {
        if (isset($_POST["id_entrenador"])) {

            $tabla = "entrenadores"; // nombre de la tabla

            $datos = array(
                "id_entrenador" => $_POST["id_entrenador"],
                "nombre_entrenador" => $_POST["nombre_entrenador"],
                "apellido_entrenador" => $_POST["apellido_entrenador"],
                "dni_entrenador" => $_POST["dni_entrenador"],
                "fechaContr_entrenador" => $_POST["fechaContr_entrenador"],
                "email_entrenador" => $_POST["email_entrenador"],
                "telefono_entrenador" => $_POST["telefono_entrenador"],
                "id_estado_ent" => $_POST["id_estado_ent"],
                "id_especialidad" => $_POST["id_especialidad"]
            );

            $url = PlantillaControlador::url() . "entrenadores";
            $respuesta = ModeloEntrenadores::mdlEditarEntrenador($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El entrenador se actualizó correctamente",
                    "' . $url . '"
                    );
                </script>';
            }
        }
    }

    // Método para eliminar un entrenador
    static public function ctrEliminarEntrenador()
    {
        $url = PlantillaControlador::url() . "entrenadores";
        if (isset($_GET["id_entrenador_eliminar"])) {
            $tabla = "entrenadores";
            $datos = $_GET["id_entrenador_eliminar"];
            $respuesta = ModeloEntrenadores::mdlEliminarEntrenador($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El entrenador se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
?>

