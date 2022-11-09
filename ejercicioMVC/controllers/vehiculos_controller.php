<?php

require_once 'models/vehiculos_model.php';

class VehiculoController
{
    public string $titulo_pagina;
    public string $vista;
    public VehiculosModel $modelo;

    public function __construct()
    {
        $this->titulo_pagina = '';
        $this->vista = 'listar_vehiculos';
        $this->modelo = new VehiculosModel();
    }

    //Lista todos los vehículos
    public function listar_vehiculos()
    {
        $this->titulo_pagina = 'Lista de vehículos';
        $this->vista = 'listar_vehiculos';
        return $this->modelo->getVehiculos();
    }

    public function agregar_vehiculo()
    {
        $this->titulo_pagina = 'Agregar vehículo';
        $this->vista = 'agregar_vehiculo';
    }

    //carga un vehículo para editarlo
    public function editar_vehiculo($placa = null)
    {
        $this->titulo_pagina = 'Editar vehículo';
        $this->vista = 'editar_vehiculo';
        /* Id can from get param or method param */
        if (isset($_GET["placa"])) {
            $placa = $_GET["placa"];
        }
        return $this->modelo->getVehiculoByPlaca($placa);
    }

    public function guardar_nuevo()
    {
        $this->titulo_pagina = 'Agregar vehiculo';
        $this->vista = 'agregar_vehiculo';
        $placa = $this->modelo->crearVehiculo($_POST);
        $resultado = $this->modelo->getVehiculoByPlaca($placa);
        $_GET['respuesta'] = true;
        return $resultado;
    }

    //actualiza un vehículo
    public function actualizar()
    {
        $this->titulo_pagina = 'Editar vehículo';
        $this->vista = 'editar_vehiculo';
        $placa = $this->modelo->actualizarVehiculo($_POST);
        $resultado = $this->modelo->getVehiculoByPlaca($placa);
        $_GET['respuesta'] = true;
        return $resultado;
    }

    //confirmar al borrar un vehículo
    public function confirmar_eliminar()
    {
        $this->titulo_pagina = 'Eliminar vehículo';
        $this->vista = 'confirmar_eliminar_vehiculo';
        return $this->modelo->getVehiculoByPlaca($_GET["placa"]);
    }

    //eliminar vehículo
    public function eliminar()
    {
        $this->titulo_pagina = 'Listado de vehículos';
        $this->vista = 'borrar_vehiculo';
        return $this->modelo->eliminarVehiculoPorPlaca($_POST["placa"]);
    }
}

