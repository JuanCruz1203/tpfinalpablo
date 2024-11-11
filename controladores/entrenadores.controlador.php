<?php

class ControladorEntrenadores
{
    /*=============================================
    MOSTRAR ENTRENADORES
    =============================================*/
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $tabla = "entrenadores";
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($tabla, $item, $valor);
        return $respuesta;
    }

    /*=============================================
    MOSTRAR ESTADOS
    =============================================*/
    static public function ctrMostrarEstados()
    {
        $tabla = "estados_entrenadores"; // Nombre de la tabla de estados
        $respuesta = ModeloEntrenadores::mdlMostrarEstados($tabla);
        return $respuesta;
    }

    /*=============================================
    AGREGAR ENTRENADOR
    =============================================*/
    public function ctrAgregarEntrenador()
    {
        if (isset($_POST["nombre_entrenador"])) {
            $tabla = "entrenadores";
            $datos = array(
                "nombre" => $_POST["nombre_entrenador"],
                "apellido" => $_POST["apellido_entrenador"],
                "dni" => $_POST["dni_entrenador"],
                "fechaContr" => $_POST["fechaContr_entrenador"],
                "email" => $_POST["email_entrenador"],
                "telefono" => $_POST["telefono_entrenador"],
                "id_estado" => $_POST["id_estado"],
                "id_especialidad" => $_POST["id_especialidad"]
            );

            $respuesta = ModeloEntrenadores::mdlAgregarEntrenador($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>window.location = "entrenadores";</script>';
            }
        }
    }

    /*=============================================
    ELIMINAR ENTRENADOR
    =============================================*/
    static public function ctrEliminarEntrenador()
    {
        $url = PlantillaControlador::url() . "entrenadores";
        if (isset($_GET["id_entrenador"])) {
            $tabla = "entrenadores";
            $id = $_GET["id_entrenador"];
            $respuesta = ModeloEntrenadores::mdlEliminarEntrenador($tabla, $id);
            if ($respuesta == "ok") {
                echo '<script>window.location = "entrenadores";</script>';
            }
        }
    }

    /*=============================================
    MODIFICAR ENTRENADOR
    =============================================*/
    public function ctrModificarEntrenador()
    {
        if (isset($_POST["id_entrenador"])) {
            $tabla = "entrenadores";
            $datos = array(
                "id_entrenador" => $_POST["id_entrenador"],
                "nombre" => $_POST["nombre_entrenador"],
                "apellido" => $_POST["apellido_entrenador"],
                "dni" => $_POST["dni_entrenador"],
                "fechaContr" => $_POST["fechaContr_entrenador"],
                "email" => $_POST["email_entrenador"],
                "telefono" => $_POST["telefono_entrenador"],
                "id_estado" => $_POST["id_estado"],
                "id_especialidad" => $_POST["id_especialidad"]
            );

            $url = PlantillaControlador::url() . "entrenadores";
            $respuesta = ModeloEntrenadores::mdlModificarEntrenador($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>window.location = "entrenadores";</script>';
            }
        }
    }
}
?>
