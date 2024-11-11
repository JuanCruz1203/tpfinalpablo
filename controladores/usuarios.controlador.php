<?php

class ControladorUsuarios
{
    /*=============================================
INGRESO DE USUARIO
=============================================*/
    static public function ctrIngresoUsuario()
    {
        if (isset($_POST["email"])) {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["email"])) {

                $encriptar = crypt(
                    $_POST["password"],
                    '$5$rounds=5000$tsegfysefuisehfuisehiusehf$'
                );
                echo "Contraseña encriptada: " . $encriptar;
                $tabla = "usuarios";
                $item = "email_usuario";
                $valor = $_POST["email"];
                $respuesta = ModeloUsuarios::mdlMostrarUsuarios(
                    $tabla,
                    $item,
                    $valor
                );
             
                if (is_array($respuesta) && ($respuesta["email_usuario"] ==
                    $_POST["email"] && $respuesta["password_usuario"] == $encriptar)) {

                    echo '<script>
                        fncSweetAlert("loading", "Ingresando..", "")
                        </script>';

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                    $_SESSION["nombre"] = $respuesta["nombre_usuario"];

                    echo '<script>
                        window.location = "inicio";
                        </script>';
                }else{
                    echo "<div class='alert alert-danger mt-2' role='alert'>
                    El usuario no existe
                    </div>";
                }
            } else {
                echo '<script>
            fncSweetAlert("error", "Error al intentar acceder, pruebe nuevamente", "' . PlantillaControlador::url() . '")
            </script>';
                    }
                }
            }
}
