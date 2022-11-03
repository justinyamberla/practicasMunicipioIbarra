<?php

class VehiculoController{
    function index(){
        require_once "models/vehiculos_model.php";
        $vehiculos = new VehiculosModel();
        $datos = $vehiculos->leer_vehiculos();
        require_once "./views/vehiculos/vehiculos_view.php";
        return $datos;
    }
}

?>
