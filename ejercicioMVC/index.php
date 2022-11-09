<?php

require_once 'config/config.php';
require_once 'models/database.php';

$vista = "";
// Verificamos si se llama a alguna vista
$vista = $_GET['action'] ?? constant("DEFAULT_ACTION");

require_once 'controllers/vehiculos_controller.php';
$controlador = new VehiculoController();

// Verificamos si existe el método correspondiente a la vista para cargar los datos
$datosParaVista["data"] = array();
if(method_exists($controlador, $vista)){
    $datosParaVista["data"] = $controlador->{$vista}();
}

// Cargamos las vistas
require_once 'views/template/header.php';
require_once 'views/vehiculos/'.$controlador->vista.'.php';
require_once 'views/template/footer.php';


