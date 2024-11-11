<?php

require_once 'conexion.php';

class ModeloClientes
{

    /*=============================================
MOSTRAR DATOS
=============================================*/
    static public function mdlMostrarClientes($tabla, $item, $valor)
    {
        if ($item != null) {
            //pedimos un solo registro
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            // pedimos todos los registros
            try {
                $stmt = Conexion::conectar()->prepare("SELECT c.id_cliente, c.nombre_cliente, c.apellido_cliente, c.dni_cliente, c.fechaNac_cliente,
                                                            c.telefono_cliente, c.email_cliente, c.fechaIns_cliente, c.direccion_cliente, p.nombre_plan,
                                                            e.estado_memb FROM clientes as c
                                                            INNER JOIN plan as p ON p.id_plan = c.id_plan
                                                            INNER JOIN estados_membresias as e ON e.id_estado_memb = c.id_estado_memb");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    // Agregar datos

    /*=============================================
AGREGAR DATOS
=============================================*/
    static public function mdlAgregarCliente($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_cliente, apellido_cliente, dni_cliente, fechaNac_cliente, direccion_cliente, telefono_cliente, email_cliente, fechaIns_cliente, id_plan, id_estado_memb) 
                                                            VALUES (:nombre_cliente, :apellido_cliente, :dni_cliente, :fechaNac_cliente, :direccion_cliente, :telefono_cliente, :email_cliente, :fechaIns_cliente, :id_plan, :id_estado_memb)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_cliente", $datos["apellido_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_cliente", $datos["dni_cliente"], PDO::PARAM_INT); 
            $stmt->bindParam(":fechaNac_cliente", $datos["fechaNac_cliente"], PDO::PARAM_STR); 
            $stmt->bindParam(":direccion_cliente", $datos["direccion_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_cliente", $datos["telefono_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":email_cliente", $datos["email_cliente"], PDO::PARAM_STR); 
            $stmt->bindParam(":fechaIns_cliente", $datos["fechaIns_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":id_estado_memb", $datos["id_estado_memb"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    //editar datos

    static public function mdlEditarCliente($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                                                            nombre_cliente = :nombre_cliente, 
                                                            apellido_cliente = :apellido_cliente, 
                                                            dni_cliente = :dni_cliente, 
                                                            fechaNac_cliente = :fechaNac_cliente, 
                                                            direccion_cliente = :direccion_cliente, 
                                                            telefono_cliente = :telefono_cliente, 
                                                            email_cliente = :email_cliente, 
                                                            fechaIns_cliente = :fechaIns_cliente, 
                                                            id_plan = :id_plan, 
                                                            id_estado_memb = :id_estado_memb 
                                                            WHERE id_cliente = :id_cliente");
            
            $stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_cliente", $datos["apellido_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_cliente", $datos["dni_cliente"], PDO::PARAM_INT); 
            $stmt->bindParam(":fechaNac_cliente", $datos["fechaNac_cliente"], PDO::PARAM_STR); 
            $stmt->bindParam(":direccion_cliente", $datos["direccion_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_cliente", $datos["telefono_cliente"], PDO::PARAM_INT); 
            $stmt->bindParam(":email_cliente", $datos["email_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaIns_cliente", $datos["fechaIns_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":id_estado_memb", $datos["id_estado_memb"], PDO::PARAM_INT);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);

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
    static public function mdlEliminarCliente($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente");
            $stmt->bindParam(":id_cliente", $dato, PDO::PARAM_INT);
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
