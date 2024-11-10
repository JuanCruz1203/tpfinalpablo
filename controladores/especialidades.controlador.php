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
            
            // Sanitizar los datos de entrada
            $nombre_especialidad = filter_var($_POST["nombre_especialidad"], FILTER_SANITIZE_STRING);
            $descripcion_especialidad = filter_var($_POST["descrip_especialidad"], FILTER_SANITIZE_STRING);

            // Validar los datos (por ejemplo, que no estén vacíos)
            if (empty($nombre_especialidad) || empty($descripcion_especialidad)) {
                echo '<script>
                    fncSweetAlert("error", "Por favor complete todos los campos", "' . PlantillaControlador::url() . 'especialidades");
                </script>';
                return;
            }

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
        // Verificar que se recibió el id para eliminar
        if (isset($_GET["id_especialidad"])) {

            // Sanitizar el id para evitar inyecciones
            $id_especialidad = filter_var($_GET["id_especialidad"], FILTER_SANITIZE_NUMBER_INT);

            // Validar si el ID es correcto
            if (empty($id_especialidad)) {
                echo '<script>
                    fncSweetAlert("error", "ID de especialidad inválido", "' . PlantillaControlador::url() . 'especialidades");
                </script>';
                return;
            }

            // Preparar la eliminación
            $tabla = "especialidades";
            $respuesta = ModeloEspecialidades::mdlEliminarEspecialidad($tabla, $id_especialidad);

            $url = PlantillaControlador::url() . "especialidades";
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

            // Sanitizar los datos de entrada
            $id_especialidad = filter_var($_POST["id_especialidad"], FILTER_SANITIZE_NUMBER_INT);
            $nombre_especialidad = filter_var($_POST["nombre_especialidad"], FILTER_SANITIZE_STRING);
            $descripcion_especialidad = filter_var($_POST["descrip_especialidad"], FILTER_SANITIZE_STRING);

            // Validar que los campos no estén vacíos
            if (empty($id_especialidad) || empty($nombre_especialidad) || empty($descripcion_especialidad)) {
                echo '<script>
                    fncSweetAlert("error", "Por favor complete todos los campos", "' . PlantillaControlador::url() . 'especialidades");
                </script>';
                return;
            }

            // Preparar los datos para la actualización
            $tabla = "especialidades";
            $datos = array(
                "id_especialidad" => $id_especialidad,
                "nombre" => $nombre_especialidad,
                "descripcion" => $descripcion_especialidad
            );

            // Enviar al modelo para actualizar
            $respuesta = ModeloEspecialidades::mdlModificarEspecialidad($tabla, $datos);

            $url = PlantillaControlador::url() . "especialidades";
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

