<?php

require 'controladores/plantilla.controlador.php';

require 'controladores/categorias.controlador.php';
require 'modelos/categorias.modelo.php';

require 'controladores/usuarios.controlador.php';
require 'modelos/usuarios.modelo.php';

require 'controladores/productos.controlador.php';
require 'modelos/productos.modelo.php';

require 'controladores/clientes.controlador.php';
require 'modelos/clientes.modelo.php';

require 'controladores/entrenadores.controlador.php';
require 'modelos/entrenadores.modelo.php';

require 'controladores/especialidades.controlador.php';
require 'modelos/especialidades.modelo.php';

require 'controladores/estEntrenadores.controlador.php';
require 'modelos/estEntrenadores.modelo.php';

$plantilla = new PlantillaControlador();
$plantilla -> verPlantilla();