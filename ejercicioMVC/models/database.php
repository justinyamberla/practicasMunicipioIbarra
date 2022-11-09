<?php

require_once 'config/config.php';

class Database
{
    private $host;
    private $db;
    private $user;
    private $pass;
    public $conexion;

    public function __construct()
    {

        $this->host = constant('DB_HOST');
        $this->db = constant('DB');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');

        try {
            $this->conexion = new PDO('pgsql:host=' . $this->host . '; dbname=' . $this->db, $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexión exitosa";
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

    }

}
