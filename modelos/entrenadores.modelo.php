<?php

require_once 'conexion.php';

class ModeloEntrenadores
{
    /*=============================================
    MOSTRAR ESTADOS
    =============================================*/
    static public function mdlMostrarEstados($tabla)
    {
        try {
            // Seleccionamos el id y nombre del estado
            $stmt = Conexion::conectar()->prepare("SELECT id_estado_ent, estado_ent FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los estados (id + nombre)
        } catch (Exception $e) {
            return [];
        }
    }

    /*=============================================
    MOSTRAR DATOS DE LOS ENTRENADORES
    =============================================*/
    static public function mdlMostrarEntrenadores($tabla, $item, $valor)
    {
        if ($item != null) {
            // Obtenemos un solo registro con JOIN
            try {
                $stmt = Conexion::conectar()->prepare("
                    SELECT e.*, s.estado_ent, esp.nombre_especialidad
                    FROM $tabla e
                    INNER JOIN estados_entrenadores s ON e.id_estado = s.id_estado_ent
                    INNER JOIN especialidad esp ON e.id_especialidad = esp.id_especialidad
                    WHERE $item = :$item
                ");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return [];
            }
        } else {
            // Obtenemos todos los registros con JOIN
            try {
                $stmt = Conexion::conectar()->prepare("
                    SELECT e.*, s.estado_ent, esp.nombre_especialidad
                    FROM $tabla e
                    INNER JOIN estados_entrenadores s ON e.id_estado = s.id_estado_ent
                    INNER JOIN especialidad esp ON e.id_especialidad = esp.id_especialidad
                ");
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado ? $resultado : [];
            } catch (Exception $e) {
                return [];
            }
        }
    }

    /*=============================================
    AGREGAR ENTRENADOR
    =============================================*/
    static public function mdlAgregarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("
                INSERT INTO $tabla (nombre_entrenador, apellido_entrenador, dni_entrenador, fechaContr_entrenador, email_entrenador, telefono_entrenador, id_estado, id_especialidad)
                VALUES (:nombre, :apellido, :dni, :fechaContr, :email, :telefono, :estado, :especialidad)
            ");

            // Enlace de parámetros
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaContr", $datos["fechaContr"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
            $stmt->bindParam(":estado", $datos["id_estado"], PDO::PARAM_INT);
            $stmt->bindParam(":especialidad", $datos["id_especialidad"], PDO::PARAM_INT);

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
    ELIMINAR ENTRENADOR
    =============================================*/
    static public function mdlEliminarEntrenador($tabla, $id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_entrenador = :id_entrenador");
            $stmt->bindParam(":id_entrenador", $id, PDO::PARAM_INT);
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
    MODIFICAR ENTRENADOR
    =============================================*/
    static public function mdlModificarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("
                UPDATE $tabla SET
                    nombre_entrenador = :nombre,
                    apellido_entrenador = :apellido,
                    dni_entrenador = :dni,
                    fechaContr_entrenador = :fechaContr,
                    email_entrenador = :email,
                    telefono_entrenador = :telefono,
                    id_estado = :estado,
                    id_especialidad = :especialidad
                WHERE id_entrenador = :id
            ");

            // Enlace de parámetros
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaContr", $datos["fechaContr"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
            $stmt->bindParam(":estado", $datos["id_estado"], PDO::PARAM_INT);
            $stmt->bindParam(":especialidad", $datos["id_especialidad"], PDO::PARAM_INT);
            $stmt->bindParam(":id", $datos["id_entrenador"], PDO::PARAM_INT);

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
