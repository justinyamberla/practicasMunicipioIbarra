<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion2.php") ?>
<?php

function mostrarDirecciones(): void
{
    $sql1 = "SELECT id_direccion, nombre_direccion from direcciones_tramites";
    $objetoConexion = new Conexion2();
    $arrayDirecciones = $objetoConexion->consultar($sql1);
    if (!empty($arrayDirecciones)){
        foreach ($arrayDirecciones as $direccion) {
            ?>
            <div onclick="window.location.href='tramites_p.php?idDireccion=<?php echo $direccion['id_direccion'] ?>';"
                 class="cardDireccion">
                <div style="margin: auto; padding: 10px 0 10px 0">
                    <div>
                        <h5>
                            <?php echo $direccion['nombre_direccion'] ?>
                        </h5>
                    </div>
                </div>
            </div>
            <?php
        }
    } else{
        ?>
        <h4>"No hay módulos"</h4>
        <?php
    }
}

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
    <title>Trámites presenciales</title>
    <style>
        #headerPrincipal {
            background-color: #EE4B3DFF;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .containerModulos {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .numPad {
            border-radius: 10px;
            background-color: #f2f2f2;
            color: #111;
        }

        .numPad .nums > .r div {
            width: 60px;
            height: 40px;
            margin: 8px;
            border: 1px solid #212529;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10%;
            cursor: pointer;
        }

        .numPad .nums h6 {
            margin: auto
        }

        .numPad .nums h5 {
            margin: auto;
        }
        .cardDireccion {
            margin: 10px 20px;
            padding: 10px 20px;
            width: 300px;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.175);
            border-radius: 0.375rem;
            transition: 0.1s linear;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        .cardDireccion:hover {
            background-color: rgb(238, 75, 61);
            color: white;
            border-color: rgb(238, 75, 61);
            cursor: pointer;
        }
    </style>
</head>
<body style="background-color: #f2f2f2">
<div id="headerPrincipal">
    <div style="float: left; margin-top: -6px">
        <a href="menu_v1.php">
            <button class="btn btn-light">
                <img src="https://info.ibarra.gob.ec/images/icons/home.png" alt="Botón Menú Inicio">
                MENÚ INICIO
            </button>
        </a>
    </div>
    <div>
        <h4>CONSULTE LOS REQUISITOS DE TRÁMITES MUNICIPALES</h4>
    </div>
</div>
<div class="container" style="padding-top: 20px">
    <h5>Elija su forma de búsqueda: </h5>
</div>
<div id="seccionBusqueda" class="containerModulos">
    <a href="?buscarPorPalabra" style="margin: 2px 5px 2px 5px; font-size: large; border-color: #212529" type="button"
       class="btn btn-light">Buscar por palabra clave
        <img style="width: 60px; height: 45px" src="https://info.ibarra.gob.ec/images/icons/buscar3.png" alt="">
    </a>
    <a href="?buscarPorDireccion" style="margin: 2px 5px 2px 5px; font-size: large; border-color: #212529" type="button"
       class="btn btn-light">Buscar por dirección
        <img style="width: 60px; height: 45px" src="https://info.ibarra.gob.ec/images/icons/buscar3.png" alt="">
    </a>
</div>
<div class="container">
    <?php
    if (isset($_GET['buscarPorPalabra'])){
        ?>
        <div style="text-align: center" id="seccionIngresoDatos" class="col-md-12">
            <br>
            <div class="card" style="background-color: #f2f2f2">
                <div class="card-body">
                    <div class="container">
                        <form id="formTramite" action="tramites_p.php" method="get">
                            <div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Ingrese palabra o frase de búsqueda:</span>
                                    <input type="text" class="form-control" required name="txtPalabra" id="inputPalabra">
                                </div>
                            </div>
                            <div class="row" style="display: inline-flex">
                                <div class="col">
                                    <div id="seccionTeclado" class="numPad">
                                        <div class="nums">
                                            <div class="flex r r1">
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('A')"><h5>A</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('B')"><h5>B</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('C')"><h5>C</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('D')"><h5>D</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('E')"><h5>E</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('F')"><h5>F</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('G')"><h5>G</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('H')"><h5>H</h5>
                                                </div>
                                            </div>
                                            <div class="flex r r2">
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('I')"><h5>I</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('J')"><h5>J</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('K')"><h5>K</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('L')"><h5>L</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('M')"><h5>M</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('N')"><h5>N</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('O')"><h5>O</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('P')"><h5>P</h5>
                                                </div>
                                            </div>
                                            <div class="flex r r3">
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('Q')"><h5>Q</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('R')"><h5>R</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('S')"><h5>S</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('T')"><h5>T</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('U')"><h5>U</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('V')"><h5>V</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('W')"><h5>W</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('X')"><h5>X</h5>
                                                </div>
                                            </div>
                                            <div class="flex r r4">
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('Y')"><h5>Y</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor('Z')"><h5>Z</h5>
                                                </div>
                                                <div style="width: 200px" onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(' ')">
                                                    <h6>Espacio</h6></div>
                                                <div onmouseover="cambiarColorOver(this)"
                                                     onmouseleave="cambiarColorLeave(this)"
                                                     onclick="borrarValor()">
                                                    <h6>Borrar</h6></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="seccionBotonesAccion" class="container" style="padding-top: 30px">
                                <button type="submit" class="btn btn-dark" name="btnConsultar">
                                    <img src="https://info.ibarra.gob.ec/images/portfolio/find1.png"
                                         alt="BotónBuscar">
                                    BUSCAR TRÁMITES
                                </button>
                                <a href="tramites_presenciales.php">
                                    <button type="button" class="btn btn-dark">
                                        <img src="https://info.ibarra.gob.ec/images/icons/nueva_busqueda.png"
                                             alt="BotónNuevaBusqueda"
                                             style="filter: brightness(3.3)">
                                        NUEVA BÚSQUEDA
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if(isset($_GET['buscarPorDireccion'])){
        ?>
        <div style="padding-top: 30px" class="containerModulos"><?php mostrarDirecciones();  ?></div>
        <?php
    }
    ?>
</div>
<script>
    function agregarValor(caracter) {
        let txt = document.getElementById("inputPlaca")
        let valorTxt = txt.value
        let numeroCaracteres = valorTxt.length
        if (numeroCaracteres < 8) {
            valorTxt = valorTxt + caracter
            txt.value = valorTxt
        }
    }

    function borrarValor() {
        let txt = document.getElementById("inputPlaca")
        let valorTxt = txt.value
        let cont = valorTxt.length - 1
        valorTxt = valorTxt.substring(0, cont)
        txt.value = valorTxt
    }

    function cambiarColorOver(celda) {
        celda.style.backgroundColor = "#212529"
        celda.style.color = "#fff"
    }

    function cambiarColorLeave(celda) {
        celda.style.backgroundColor = "#f2f2f2"
        celda.style.color = "#212529"
    }
</script>
</body>
</html>
