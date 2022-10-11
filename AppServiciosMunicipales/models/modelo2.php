<?php

/*$servidor = "localhost";
$puerto = "5432";
$nombreBD = "postgres";
$usuario = "postgres";
$contrasenia = "12345";
$contraseniaBDPasantias = "sigimi20014"

try {
    $conexion = new PDO("pgsql:host=$servidor; port=$puerto; dbname=$nombreBD", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<Conexión establecida";
} catch (PDOException $e) {
    return "Fallo en la conexión" . $e;
}*/
$conexion = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=12345");
$nombres = pg_query($conexion, "SELECT * FROM sales");

?>
