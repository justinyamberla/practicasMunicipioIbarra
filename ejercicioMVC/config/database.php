<?php

class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $database = "mvc";
    public $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor; dbname=$this->database", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexión exitosa";
        } catch (PDOException $e) {
            return "Fallo en la conexión" . $e;
        }
    }

}

?>
