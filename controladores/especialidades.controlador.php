<?php

class ControladorEspecialidades
{
    // Mostrar Especialidades
    static public function ctrMostrarEspecialidades($item, $valor)
    {
        $tabla = "especialidades"; // nombre de la tabla
        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($tabla, $item, $valor);
        return $respuesta;
    }

    // Método para agregar una nueva especialidad
    public function ctrAgregarEspecialidad()
    {
        if (isset($_POST["nombre_especialidad"])) {

            // Preparar los datos para la base de datos
            $tabla = "especialidades"; // nombre de la tabla
            $datos = array(
                "nombre_especialidad" => $_POST["nombre_especialidad"],
                "descrip_especialidad" => $_POST["descrip_especialidad"]
            );

            // Llamar al modelo para agregar la especialidad
            $respuesta = ModeloEspecialidades::mdlAgregarEspecialidad($tabla, $datos);

            // Redirigir según el resultado
            $url = PlantillaControlador::url() . "especialidades";
            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "La especialidad se agregó correctamente", "' . $url . '");
                </script>';
            } else {
                echo '<script>
                    fncSweetAlert("error", "Hubo un error al agregar la especialidad", "' . $url . '");
                </script>';
            }
        }
    }

    // Método para modificar una especialidad
    public function ctrModificarEspecialidad()
    {
        if (isset($_POST["id_especialidad"])) {

            // Preparar los datos para la actualización
            $tabla = "especialidades"; // nombre de la tabla
            $datos = array(
                "id_especialidad" => $_POST["id_especialidad"],
                "nombre_especialidad" => $_POST["nombre_especialidad"],
                "descrip_especialidad" => $_POST["descrip_especialidad"]
            );

            // Redirigir según el resultado
            $url = PlantillaControlador::url() . "especialidades";

            // Llamar al modelo para modificar la especialidad
            $respuesta = ModeloEspecialidades::mdlModificarEspecialidad($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "La especialidad se modificó correctamente", "' . $url . '");
                </script>';
            } else {
                echo '<script>
                    fncSweetAlert("error", "Hubo un error al modificar la especialidad", "' . $url . '");
                </script>';
            }
        }
    }

    // Método para eliminar una especialidad
    public function ctrEliminarEspecialidad()
    {
        $url = PlantillaControlador::url() . "especialidades";
        if (isset($_GET["id_especialidad"])) {

            // Preparar la eliminación
            $tabla = "especialidades";
            $datos = $_GET["id_especialidad"]; // Recibimos el ID de la especialidad a eliminar

            // Llamar al modelo para eliminar la especialidad
            $respuesta = ModeloEspecialidades::mdlEliminarEspecialidad($tabla, $datos);

            // Redirigir según el resultado
            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "La especialidad se eliminó correctamente", "' . $url . '");
                </script>';
            } else {
                echo '<script>
                    fncSweetAlert("error", "Hubo un error al eliminar la especialidad", "' . $url . '");
                </script>';
            }
        }
    }
}
?>

