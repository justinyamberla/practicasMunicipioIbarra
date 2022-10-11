<?php
// Ejercicio: Funciones
/*function imprimirNombre($nombre, $apellido)
{
    echo "Hola " . $nombre . " " . $apellido . "<br>";
}

imprimirNombre("Justin", "Yamberla");*/

$numeroAleatorio = rand(1, 100);
echo "Número aleatorio: " . $numeroAleatorio . "<br>";

// ----------------------- ARRAYS -------------------------------------
$frutas = array("fresa", "pera", "manzana");
print_r($frutas);

// Se puede cambiar los indices en los arrays:
$autos = array("b" => "BMW", "c" => "Chevrolet", "m" => "Mazda");
print_r($frutas);
echo "<br>" . $autos["b"];
echo "<br>" . $frutas[0];

//Uso de Foreach
echo "<h3> Uso de Foreach </h3>";
foreach ($frutas as $fruta) {
    echo "Fruta: " . $fruta . "<br>";
}

// Operadores con arrays
echo "<h3> Uso de Push </h3>";
array_push($frutas, "banana");
print_r($frutas);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1> </h1>
</div>
</body>
</html>
