<?php

class ControladorEspecialidades
{
    // Mostrar Especialidades (Se mantiene igual)
    static public function ctrMostrarEspecialidades($item, $valor)
    {
        $tabla = "especialidades";
        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($tabla, $item, $valor);
        return $respuesta;
    }

    // Agregar Especialidad
    public function ctrAgregarEspecialidad()
    {
        // Verificar que se recibió el formulario
        if (isset($_POST["nombre_especialidad"])) {

            // Preparar los datos para la base de datos
            $tabla = "especialidades";
            $datos = array(
                "nombre" => $nombre_especialidad,
                "descripcion" => $descripcion_especialidad
            );

            // Enviar al modelo para agregar la especialidad
            $respuesta = ModeloEspecialidades::mdlAgregarEspecialidad($tabla, $datos);

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

    // Eliminar Especialidad
    public function ctrEliminarEspecialidad()
    {
        $url = PlantillaControlador::url() . "especialidades";
        // Verificar que se recibió el id para eliminar
        if (isset($_GET["id_especialidad"])) {

            // Preparar la eliminación
            $tabla = "especialidades";
            $respuesta = ModeloEspecialidades::mdlEliminarEspecialidad($tabla, $id_especialidad);
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

    // Modificar Especialidad
    public function ctrModificarEspecialidad()
    {
        // Verificar que se recibió el formulario para modificar
        if (isset($_POST["id_especialidad"])) {

            // Preparar los datos para la actualización
            $tabla = "especialidades";
            $datos = array(
                "id_especialidad" => $id_especialidad,
                "nombre" => $nombre_especialidad,
                "descripcion" => $descripcion_especialidad
            );

            // Enviar al modelo para actualizar
            $url = PlantillaControlador::url() . "especialidades";
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
}

