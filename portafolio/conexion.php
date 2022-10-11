<?php

class Conexion{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $conexion;

    public function __construct(){
        try{
            $this->conexion = new PDO("mysql:host=$this->servidor; dbname=album", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            return "Fallo en la conexión" . $e;
        }
    }
    public function ejecutar($sql){
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId(); // Nos retorna el ID de inserción
    }
}

?>