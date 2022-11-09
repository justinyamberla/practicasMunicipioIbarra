<?php

class VehiculosModel
{
    private string $tabla = 'vehiculos';
    private $conexion;

    public function getConexion(): void
    {
        $databaseObj = new Database();
        $this->conexion = $databaseObj->conexion;
    }

    // Obtener todos los vehículos
    public function getVehiculos()
    {
        $this->getConexion();
        $sql = "SELECT * FROM " . $this->tabla;
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Obtener vehículo por placa
    public function getVehiculoByPlaca($placa)
    {
        if (is_null($placa)) return false;
        $this->getConexion();
        $sql = "SELECT * FROM $this->tabla WHERE placa = '$placa'";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function actualizarVehiculo($params)
    {
        $this->getConexion();

        $placa = $params['txtPlaca'];
        $marca = $params["txtMarca"];
        $modelo = $params["txtModelo"];
        $color = $params["txtColor"];
        $anio = $params["txtAnio"];

        $sql = "UPDATE vehiculos SET placa='$placa', marca='$marca', modelo='$modelo', color='$color', año='$anio' WHERE placa='$placa';";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $placa;
    }

    public function crearVehiculo($params)
    {
        $this->getConexion();

        $placa = $params['txtPlaca'];
        $marca = $params["txtMarca"];
        $modelo = $params["txtModelo"];
        $color = $params["txtColor"];
        $anio = $params["txtAnio"];

        $sql = "INSERT INTO vehiculos (placa, marca, modelo, color, año) VALUES ('$placa','$marca','$modelo','$color','$anio')";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $placa;
    }

    // Borrar vehículo por placa
    public function eliminarVehiculoPorPlaca($placa)
    {
        $this->getConexion();
        $sql = "DELETE FROM " . $this->tabla . " WHERE placa = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$placa]);
    }

}

