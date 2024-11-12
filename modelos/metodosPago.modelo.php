<?php

require_once 'conexion.php';

class ModeloMetodosPago
{
    // Método para mostrar los métodos de pago
    static public function mdlMostrarMetodosPago($tabla, $item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    // Método para agregar un nuevo método de pago
    static public function mdlAgregarMetodoPago($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_metodoPago, descrip_metodoPago) 
            VALUES (:nombre_metodoPago, :descrip_metodoPago)");

            $stmt->bindParam(":nombre_metodoPago", $datos["nombre_metodoPago"], PDO::PARAM_STR);
            $stmt->bindParam(":descrip_metodoPago", $datos["descrip_metodoPago"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Método para eliminar un método de pago
    static public function mdlEliminarMetodoPago($tabla, $id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_metodoPago = :id_metodoPago");
            $stmt->bindParam(":id_metodoPago", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Método para modificar un método de pago
    static public function mdlModificarMetodoPago($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                nombre_metodoPago = :nombre_metodoPago, 
                descrip_metodoPago = :descrip_metodoPago
                WHERE id_metodoPago = :id_metodoPago");

            $stmt->bindParam(":nombre_metodoPago", $datos["nombre_metodoPago"], PDO::PARAM_STR);
            $stmt->bindParam(":descrip_metodoPago", $datos["descrip_metodoPago"], PDO::PARAM_STR);
            $stmt->bindParam(":id_metodoPago", $datos["id_metodoPago"], PDO::PARAM_INT);

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
