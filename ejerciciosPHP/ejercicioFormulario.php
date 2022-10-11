<?php

$txtNombre = "";
$rdgLenguaje = "";
if ($_POST) {
    // if ternario: Evalúa si hay algo en la variable. Si hay algo se guarda el valor de la variable;
    // caso contrario no se guarda nada
    $txtNombre = ($_POST["txtNombre"] ?? '');
    $rdgLenguaje = ($_POST["opcionLenguaje"] ?? '');
    $chkCSharp = (isset($_POST["opcionCSharp"]) == "Si") ? "checked" : "";
    $chkCPlus = (isset($_POST["opcionCPlus"]) == "Si") ? "checked" : "";

    echo "<i> Información que se está pasando en POST: </i>";
    print_r($_POST);
}

?>

<!doctype html>
<html lang="}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Formulario</title>
</head>
<body>
<div class="container" style="padding-top: 10px;">
    <form action="ejercicioFormulario.php" method="post">
        <label for="txtNombre">
            Ingrese su nombre: <input type="text" name="txtNombre" id="" value="<?php echo $txtNombre ?>">
        </label>
        <br>
        <div>
            ¿En qué lenguaje te gusta programar?:
            <br>
            <label for="opcionJavascript">Javascript </label>
            <input type="radio" name="opcionLenguaje" id="opcionJavascript" value="Javascript" <?php echo ($rdgLenguaje == "Javascript") ? "checked": ""; ?>><br>
            <label for="opcionKotlin">Kotlin </label>
            <input type="radio" name="opcionLenguaje" id="opcionKotlin" value="Kotlin" <?php echo ($rdgLenguaje == "Kotlin") ? "checked": ""; ?>><br>
            <label for="opcionPHP">PHP </label>
            <input type="radio" name="opcionLenguaje" id="opcionPHP" value="PHP" <?php echo ($rdgLenguaje == "PHP") ? "checked": ""; ?>><br>
            ¿Qué lenguajes quieres aprender?:
            <br>
            <label for="opcionCSharp">C#</label> <input type="checkbox" name="opcionCSharp" id="opcionCSharp" value="Si"><br>
            <label for="opcionCPlus">C++</label> <input type="checkbox" name="opcionCPlus" id="opcionCPlus" value="Si"><br>
        <!-- Esto es un cometario en HTML dejado al azar -->
        <input type="submit" value="Enviar información">
        <?php if ($_POST) { ?>
            <p>
                <br>
                Hola: <?php echo "Señor " . $txtNombre . ", a usted le gusta " . $rdgLenguaje . ", y le gustaría aprender: <br>"?>
                <?php echo ($chkCSharp == "checked") ? "- C# <br>" : "<br>"?>
                <?php echo ($chkCPlus == "checked") ? "- C++ <br>" : "<br>"?>
            </p>
        <?php } ?>
    </form>
</div>
</body>
</html>
