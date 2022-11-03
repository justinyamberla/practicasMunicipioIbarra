<?php
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gantari&display=swap" rel="stylesheet">
    <title>MVC</title>
    <style>
        body {
            font-family: Roboto, sans, sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>MVC</h2>
    <br>
    <div>
        <a role="button" class="btn btn-primary" href="">Agregar vehículo</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Color</th>
        </tr>
        </thead>
        <tbody>
        <?php /*foreach ($datos as $vehiculo) {
            echo "<tr>";
            echo "<td>".$vehiculo['placa']."</td>";
            echo "<td>".$vehiculo['marca']."</td>";
            echo "<td>".$vehiculo['modelo']."</td>";
            echo "<td>".$vehiculo['año']."</td>";
            echo "<td>".$vehiculo['color']."</td>";
            echo "</tr>";
        } */?>
        </tbody>
    </table>
</div>
</body>
</html>
