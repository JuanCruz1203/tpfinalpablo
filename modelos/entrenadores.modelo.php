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
            // Pedimos un solo registro con INNER JOIN para obtener el estado y especialidad
            try {
                $stmt = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre_entrenador, e.apellido_entrenador, e.dni_entrenador, e.fechaContr_entrenador,
                                                            e.email_entrenador, e.telefono_entrenador, 
                                                            s.estado_ent, esp.nombre_especialidad
                                                            FROM $tabla e
                                                            INNER JOIN estados_entrenadores s ON e.id_estado = s.id_estado_ent
                                                            INNER JOIN especialidades esp ON e.id_especialidad = esp.id_especialidad
                                                            WHERE e.$item = :$item");

                // Enlace de parámetros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            // Pedimos todos los registros con INNER JOIN para obtener el estado y especialidad de todos los entrenadores
            try {
                $stmt = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre_entrenador, e.apellido_entrenador, e.dni_entrenador, e.fechaContr_entrenador,
                                                            e.email_entrenador, e.telefono_entrenador, 
                                                            s.estado_ent, esp.nombre_especialidad
                                                            FROM $tabla e
                                                            INNER JOIN estados_entrenadores s ON e.id_estado = s.id_estado_ent
                                                            INNER JOIN especialidades esp ON e.id_especialidad = esp.id_especialidad");

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    /*=============================================
    AGREGAR ENTRENADOR
    =============================================*/
    static public function mdlAgregarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_entrenador, apellido_entrenador, dni_entrenador, fechaContr_entrenador, email_entrenador, telefono_entrenador, id_estado, id_especialidad)
                                                    VALUES (:nombre_entrenador, :apellido_entrenador, :dni_entrenador, :fechaContr_entrenador, :email_entrenador, :telefono_entrenador, :id_estado, :id_especialidad)");

            // Enlace de parámetros
            $stmt->bindParam(":nombre_entrenador", $datos["nombre_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_entrenador", $datos["apellido_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_entrenador", $datos["dni_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaContr_entrenador", $datos["fechaContr_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":email_entrenador", $datos["email_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_entrenador", $datos["telefono_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":id_estado", $datos["id_estado"], PDO::PARAM_INT);
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
    EDITAR ENTRENADOR
    =============================================*/
    static public function mdlEditarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                                                    nombre_entrenador = :nombre_entrenador,
                                                    apellido_entrenador = :apellido_entrenador,
                                                    dni_entrenador = :dni_entrenador,
                                                    fechaContr_entrenador = :fechaContr_entrenador,
                                                    email_entrenador = :email_entrenador,
                                                    telefono_entrenador = :telefono_entrenador,
                                                    id_estado = :id_estado,
                                                    id_especialidad = :id_especialidad
                                                    WHERE id_entrenador = :id_entrenador");

            // Enlace de parámetros
            $stmt->bindParam(":nombre_entrenador", $datos["nombre_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_entrenador", $datos["apellido_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_entrenador", $datos["dni_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaContr_entrenador", $datos["fechaContr_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":email_entrenador", $datos["email_entrenador"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_entrenador", $datos["telefono_entrenador"], PDO::PARAM_INT);
            $stmt->bindParam(":id_estado", $datos["id_estado"], PDO::PARAM_INT);
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
    ELIMINAR ENTRENADOR
    =============================================*/
    static public function mdlEliminarEntrenador($tabla, $id_entrenador)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_entrenador = :id_entrenador");
            $stmt->bindParam(":id_entrenador", $id_entrenador, PDO::PARAM_INT);
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


