<?php

class Conexion2
{
    private $servidor = "localhost";
    private $puerto = "5432";
    private $nombreBD = "pruebaModulos";
    private $usuario = "postgres";
    private $contrasenia = "12345";
    private $conexion2;

    public function __construct()
    {
        try {
            $this->conexion2 = new PDO("pgsql:host=$this->servidor; port=$this->puerto;dbname=$this->nombreBD", $this->usuario, $this->contrasenia);
            $this->conexion2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexión establecida";
        } catch (PDOException $e) {
            return "Fallo en la conexión" . $e;
        }
    }

    public function ejecutar($sql) //Insertar-Actualizar-Borrar
    {
        $this->conexion2->exec($sql);
        //return $this->conexion2->lastInsertId(); // Nos retorna el ID de inserción
    }

    public function consultar($sql) //Leer
    {
        $sentenciaSQL = $this->conexion2->prepare($sql);
        $sentenciaSQL->execute();
        return $sentenciaSQL->fetchAll();
    }
}

?>

