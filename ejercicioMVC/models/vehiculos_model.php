<?php

class VehiculosModel
{
    private array $vehiculos;
    private Conexion $datos;

    public function __construct()
    {
        $this->db = new Conexion();
        $this->vehiculos = array();
    }

    public function leer_vehiculos(): bool|array
    {
        $sql = "SELECT * from vehiculos";
        $consulta = $this->datos->conexion->prepare($sql);
        $consulta->execute();
        return $this->vehiculos = $consulta->fetchAll();
    }

    public function agregar_vehiculo(): void
    {
        $sql = "SELECT * from vehiculos";
        $consulta = $this->datos->conexion->prepare($sql);
        $consulta->execute();
    }
}

?>
