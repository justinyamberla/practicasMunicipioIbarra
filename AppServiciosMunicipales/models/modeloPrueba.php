<?php

$servidor = "172.16.8.75";
$puerto = "5432";
$nombreBD = "bddimi_dev";
$usuario = "sigimi";
$contrasenia = "sigimi20014";
// contraseniaBDPasantias = "sigimi20014"

try {
    $conexion = new PDO("pgsql:host=$servidor; port=$puerto; dbname=$nombreBD", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión establecida <br>";

    $sql = "SELECT DISTINCT apellidos_ciudadano, nombres_ciudadano FROM web_predios WHERE ced_ident_ciudadano like '1002182556';";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    foreach ($resultado as $item) {
        print_r($item);
        echo "<br>";
    }

} catch (PDOException $e) {
    return "Fallo en la conexión" . $e;
}

/*$conexion = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=12345");
$nombres = pg_query($conexion, "SELECT * FROM sales");*/

?>
