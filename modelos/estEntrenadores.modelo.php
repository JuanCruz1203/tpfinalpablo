<?php

require_once 'conexion.php';

class ModeloEstadosEntrenadores
{

    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    static public function mdlMostrarEstados($tabla, $item, $valor)
    {
        if ($item != null) {
            // pedimos un solo registro
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                // enlace de parámetros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            // pedimos todos los registros
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM estados_entrenadores");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    /*=============================================
    AGREGAR DATOS
    =============================================*/
    static public function mdlAgregarEstado($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(estado_ent, desc_estado_ent) VALUES (:estado_ent, :desc_estado_ent)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":estado_ent", $datos["estado_ent"], PDO::PARAM_STR);
            $stmt->bindParam(":desc_estado_ent", $datos["desc_estado_ent"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    EDITAR DATOS
    =============================================*/
    static public function mdlEditarEstado($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado_ent = :estado_ent,
                                                                             desc_estado_ent = :desc_estado_ent
                                                            WHERE id_estado_ent = :id_estado_ent");

            $stmt->bindParam(":estado_ent", $datos["estado_ent"], PDO::PARAM_STR);
            $stmt->bindParam(":desc_estado_ent", $datos["desc_estado_ent"], PDO::PARAM_STR);
            $stmt->bindParam(":id_estado_ent", $datos["id_estado_ent"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    ELIMINAR DATO
    =============================================*/
    static public function mdlEliminarEstado($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_estado_ent = :id_estado_ent");
            $stmt->bindParam(":id_estado_ent", $dato, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
