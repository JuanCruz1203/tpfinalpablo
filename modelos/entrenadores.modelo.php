<?php

require_once 'conexion.php';

class ModeloEntrenadores
{
    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    static public function mdlMostrarEntrenadores($tabla, $item, $valor)
    {
        if ($item != null) {
            // Pedimos un solo registro
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);  // Devuelve un solo registro
            } catch (Exception $e) {
                return [];  // Devuelve un array vacío si ocurre un error
            }
        } else {
            // Pedimos todos los registros, incluyendo detalles de estado y especialidad
            try {
                $stmt = Conexion::conectar()->prepare(
                    "SELECT e.id_entrenador, e.nombre_entrenador, e.apellido_entrenador, e.dni_entrenador, e.fechaContr_entrenador,
                            e.email_entrenador, e.telefono_entrenador, 
                            es.estado_ent AS estado_ent, 
                            es.desc_estado_ent AS desc_estado_ent, 
                            sp.nombre_especialidad 
                     FROM entrenadores AS e
                     INNER JOIN estados_entrenadores AS es ON es.id_estado_ent = e.id_estado_ent
                     INNER JOIN especialidades AS sp ON sp.id_especialidad = e.id_especialidad"
                );
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Devuelve todos los registros
            } catch (Exception $e) {
                return [];  // Devuelve un array vacío si ocurre un error
            }
        }
    }

    /*=============================================
    AGREGAR DATOS
    =============================================*/
    static public function mdlAgregarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (nombre_entrenador, apellido_entrenador, dni_entrenador, fechaContr_entrenador, 
                                     email_entrenador, telefono_entrenador, id_estado_ent, id_especialidad)
                VALUES (:nombre_entrenador, :apellido_entrenador, :dni_entrenador, :fechaContr_entrenador, 
                        :email_entrenador, :telefono_entrenador, :id_estado_ent, :id_especialidad)"
            );

            // Enlace de cada dato
            $stmt->bindParam(":nombre_entrenador", $datos["nombre_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_entrenador", $datos["apellido_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_entrenador", $datos["dni_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaContr_entrenador", $datos["fechaContr_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":email_entrenador", $datos["email_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_entrenador", $datos["telefono_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":id_estado_ent", $datos["id_estado_ent"], PDO::PARAM_INT);
            $stmt->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);

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
    static public function mdlEditarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE $tabla SET 
                    nombre_entrenador = :nombre_entrenador, 
                    apellido_entrenador = :apellido_entrenador, 
                    dni_entrenador = :dni_entrenador, 
                    fechaContr_entrenador = :fechaContr_entrenador, 
                    email_entrenador = :email_entrenador, 
                    telefono_entrenador = :telefono_entrenador, 
                    id_estado_ent = :id_estado_ent, 
                    id_especialidad = :id_especialidad
                 WHERE id_entrenador = :id_entrenador"
            );

            // Enlace de cada dato
            $stmt->bindParam(":nombre_entrenador", $datos["nombre_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_entrenador", $datos["apellido_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_entrenador", $datos["dni_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaContr_entrenador", $datos["fechaContr_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":email_entrenador", $datos["email_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_entrenador", $datos["telefono_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":id_estado_ent", $datos["id_estado_ent"], PDO::PARAM_INT);
            $stmt->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);
            $stmt->bindParam(":id_entrenador", $datos["id_entrenador"], PDO::PARAM_INT);

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
    ELIMINAR DATOS
    =============================================*/
    static public function mdlEliminarEntrenador($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_entrenador = :id_entrenador");
            $stmt->bindParam(":id_entrenador", $dato, PDO::PARAM_INT);

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





