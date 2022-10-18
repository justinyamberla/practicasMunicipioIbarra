<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion.php") ?>
<?php
//placa con multa = IAK0898 - PTZ0272 - IBR0131 - IBB9180
function calcularMultaTotal ($informacionMultas): void
{
    $multaTotal = 0;
    foreach ($informacionMultas as $item) {
        $multaTotal += $item['valor'];
    }
    printf ("\$%.2f ", $multaTotal);
}

if (isset($_POST)) {
    $placa = $_POST['txtPlaca'] ?? "";


    $objetoConexion = new Conexion();
    //$sentenciaSQLInfoMultas = "SELECT * FROM sismert.ert_notificacion_multa WHERE numero_placa = '$placa'";
    $sqlPrueba = "SELECT numero_placa,  c.nombre || ' Y ' || c2.nombre AS calles, fecha, hora, valor+ valor_tiempo AS valor 
    FROM sismert.v_ert_notificacion_multa_rentas, ert_calle c, ert_calle c2 where  calle_principal = c.codigo AND
    calle_transversal = c2.codigo and numero_placa ='$placa' 
    and estado = 'N' and estado_rentas IN ('NP','NR') order by fecha desc";
    $informacionMultas = $objetoConexion->consultar($sqlPrueba);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gantari&display=swap" rel="stylesheet">
    <title>SISMERT</title>
    <style>
        /*body{
            font-family: 'Gantari', sans-serif;
        }*/
        table {
            border: 1px solid #212529;
        }

        thead {
            border: 1px solid #212529;
        }

        th {
            padding: 3px;
            border: 1px solid #212529;
            justify-items: center;
        }

        tr {
            border: 1px solid #212529;
        }

        td {
            padding: 3px;
            border: 1px solid #212529;
        }

        #headerPrincipal {
            background-color: #EE4B3DFF;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        #seccionPrincipal {
            text-align: center;
            justify-content: center;
            padding-bottom: 15px;
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
            margin: auto
        }
    </style>
</head>
<body style="background-color: #f2f2f2">
<div id="contenidoPrincipal">
    <div id="headerPrincipal">
        <div style="float: left; margin-top: -6px">
            <a href="menuPrincipal.php">
                <button class="btn btn-light">
                    <img src="https://info.ibarra.gob.ec/images/icons/home.png" alt="Botón Menú Inicio">
                    MENU INICIO
                </button>
            </a>
        </div>
        <div>
            <h4>CONSULTE SUS MULTAS DE ESTACIONAMIENTO (SISMERT)</h4>
        </div>
    </div>

    <div class="container" id="seccionPrincipal">
            <div class="row">
                <div id="seccionIngresoDatos" class="col-md-12">
                    <br>
                    <div class="card" style="background-color: #f2f2f2">
                        <div class="card-body">
                            <div class="container">
                                <form id="formPlaca" action="sismert.php" method="post">
                                    <div>
                                        <p>
                                            <label for="inputPlaca">
                                                Ingrese la PLACA:
                                            </label>
                                            <input required name="txtPlaca" id="inputPlaca" type="text"
                                                   placeholder="Ejemplo: ABC0123">
                                        </p>
                                        <ul style="text-align: left; display: inline-block">
                                            <li>Número de PLACA de 7 caracteres</li>
                                            <li>Vehículos: 3 letras y 4 dígitos</li>
                                            <li>Motocicletas: 1 letra y 6 dígitos</li>
                                            <li>Reemplazar el guion por 0</li>
                                        </ul>
                                    </div>
                                    <div class="row" style="display: inline-flex">
                                        <div class="col">
                                            <div id="seccionTeclado" class="numPad">
                                                <div class="nums">
                                                    <div class="flex r r1">
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(1)"><h5>1</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(2)"><h5>2</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(3)"><h5>3</h5>
                                                        </div>
                                                    </div>
                                                    <div class="flex r r2">
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(4)"><h5>4</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(5)"><h5>5</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(6)"><h5>6</h5>
                                                        </div>
                                                    </div>
                                                    <div class="flex r r3">
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(7)"><h5>7</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(8)"><h5>8</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(9)"><h5>9</h5>
                                                        </div>
                                                    </div>
                                                    <div class="flex r r4">
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor(0)"><h5>0</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                    </div>
                                                    <div class="flex r r2">
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor('H')"><h5>H</h5>
                                                        </div>
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
                                                    </div>
                                                    <div class="flex r r3">
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor('O')"><h5>O</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor('P')"><h5>P</h5>
                                                        </div>
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
                                                    </div>
                                                    <div class="flex r r4">
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
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor('Y')"><h5>Y</h5>
                                                        </div>
                                                        <div onmouseover="cambiarColorOver(this)"
                                                             onmouseleave="cambiarColorLeave(this)"
                                                             onclick="agregarValor('Z')"><h5>Z</h5>
                                                        </div>
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
                                            <img src="https://info.ibarra.gob.ec/images/portfolio/find1.png" alt="BotónBuscar">
                                            CONSULTAR MULTAS
                                        </button>
                                        <a href="sismert.php">
                                            <button type="button" class="btn btn-dark">
                                                <img src="https://info.ibarra.gob.ec/images/icons/nueva_busqueda.png"
                                                     alt="BotónNuevaBusqueda"
                                                     style="filter: brightness(3.3)">
                                                NUEVA BUSQUEDA
                                            </button>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="seccionInstruccionesPagos" class="col-md-12">
                    <div class="container" style="padding-top: 30px;">
                        <p style="text-align: left">
                            Puede realizar el pago de sus deudas en los siguientes canales de atención:
                        </p>
                        <ul style="display: inline-block; text-align: left">
                            <li>Ventanillas de recaudación del Edificio Municipal</li>
                            <li>Banco del Pacífico</li>
                            <li>Cooperativa de Ahorro y Crédito Mujeres Unidas</li>
                            <li>Cooperativa de Ahorro y Crédito Artesanos Ltda.</li>
                            <li>Cooperativa de Ahorro y Crédito 29 de Octubre Ltda.</li>
                            <li>Asociación Mutualista de Ahorro y Crédito para la Vivienda Imbabura</li>
                            <li>Cooperativa de Ahorro y Crédito San Antonio Ltda. - Imbabura</li>
                            <li>Botón de pagos en Línea del Portal Ciudadano Municipal
                                (https://portalciudadano.ibarra.gob.ec):
                                Tarjetas de crédito Diners, Discover, Visa, Mastercard Pichincha.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if (isset($_POST['btnConsultar'])) { ?>
                <div id="seccionTablaInformacion" class="row" style="padding-top: 10px; padding-bottom: 20px">
                    <div class="col-md-12">
                        <table class="table table-hover" style="font-size: 16px">
                            <thead>
                            <tr class="table-secondary" style="text-align: center;">
                                <td colspan="4">
                                    DATOS DE LA MULTAS
                                </td>
                            </tr>
                            <tr>
                                <td class="table-secondary" style="border-color: #212529" colspan="1">
                                    <b>PLACA:</b>
                                </td>
                                <td colspan="3" style="text-align: center">
                                    <?php if(isset($placa)) { echo $placa; } ?>
                                </td>
                            </tr>
                            <tr class="table-secondary">
                                <th style="width: 40%">CALLES</th>
                                <th style="width: 20%">FECHA</th>
                                <th style="width: 20%">HORA</th>
                                <th style="width: 20%">VALOR</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($informacionMultas)) { foreach ($informacionMultas as $item) { ?>
                                    <tr>
                                        <td>
                                            <div> <?php echo $item['calles'] ?> </div>
                                        </td>
                                        <td>
                                            <div> <?php echo $item['fecha'] ?> </div>
                                        </td>
                                        <td>
                                            <div> <?php echo $item['hora'] ?> </div>
                                        </td>
                                        <td>
                                            <div> <?php echo "$" .  $item['valor'] ?> </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <th class="table-secondary" colspan="3" style="width: 50%; border-color: #212529">
                                            TOTAL:
                                        </th>
                                        <th colspan="1" style="width: 50%; color: #cb0000">
                                            <?php calcularMultaTotal($informacionMultas); ?>
                                        </th>
                                    </tr>
                                <?php } else { ?>
                                <tr>
                                    <td colspan="4"
                                        style="text-align: center; font-size: 16px; color: #cb0000; font-weight: bold;">
                                        <div>No hay registros</div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
    </div>
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
