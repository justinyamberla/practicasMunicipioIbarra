<?php

class Conexion
{
    private $servidor = "172.16.8.75";
    private $puerto = "5432";
    private $nombreBD = "bddimi_dev";
    private $usuario = "sigimi";
    private $contrasenia = "sigimi20014";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("pgsql:host=$this->servidor; port=$this->puerto;dbname=$this->nombreBD", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexión establecida";
        } catch (PDOException $e) {
            return "Fallo en la conexión" . $e;
        }
    }

    public function ejecutar($sql) //Insertar-Actualizar-Borrar
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId(); // Nos retorna el ID de inserción
    }

    public function consultar($sql) //Leer
    {
        $sentenciaSQL = $this->conexion->prepare($sql);
        $sentenciaSQL->execute();
        return $sentenciaSQL->fetchAll();
    }
}

?>
