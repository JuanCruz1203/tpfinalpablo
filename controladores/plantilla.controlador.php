<?php

class PlantillaControlador{

    public function verPlantilla(){

        include 'vistas/plantilla.php';
    }

    static public function url(){

        return "http://localhost/proyecto_final_pablo/";
    }
}
