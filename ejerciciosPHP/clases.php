<?php

// ------------------------ Clases y herencia ----------------------------
class Persona
{
    public string $nombre;
    public string $apellido;

    // Para crear el constructor:
    function __construct($nuevoNombre)
    {
        $this->nombre = $nuevoNombre;
    }

    public function asignarApellido($nuevoApellido)
    {
        $this->apellido = $nuevoApellido;
    }
}

class Estudiante extends Persona
{
    public string $carrera;

    public function presentarse()
    {
        echo "<br> Hola soy " . $this->nombre . " " . $this->apellido . " y estudio " . $this->carrera;
    }
}

$objetoPersona = new Persona("Justin");
$objetoPersona->asignarApellido("Yamberla");
echo $objetoPersona->nombre;

$objetoEstudiante = new Estudiante("Alexis");
$objetoEstudiante->asignarApellido("Yamberla");
$objetoEstudiante->carrera = "Software";
$objetoEstudiante->presentarse();

class Peda
{
    public string $hora;
    public string $lugar;
    public bool $pedaConfirmada = false;

    public function programaPeda($elJuanchoConfirma): bool
    {
        if ($elJuanchoConfirma) {
            $this->hora = "7 pm";
            $this->lugar = "Congo";
            $this->pedaConfirmada = true;
            echo "<h2> SE ARMA LA PEDA </h2>";
        } else {
            echo "<h2> SON COMO LA VERGA </h2>";
        }
        return $this->pedaConfirmada;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Ejercicio: PROGRAMAR LA PEDA</h1>
    <form method="post" action="clases.php">
        <h3> Confirma Juan: </h3>
        <input type="text" name="respuestaJuan" id=''>
        <input type="submit" value="Confirmar">

        <?php
        $respuestaJuan = $_POST['respuestaJuan'];

        if ($_POST) {
            if ($respuestaJuan == "si") {
                $peda = new Peda();
                $peda->programaPeda(true);
            } elseif ($respuestaJuan == "no") {
                $peda = new Peda();
                $peda->programaPeda(false);
            }
        }
        ?>

    </form>
</div>
</body>
</html>
