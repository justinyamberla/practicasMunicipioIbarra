<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion.php") ?>

<?php

if (isset($_POST)) {
    $cedula = $_POST['txtCedula'] ?? "";

    $objetoConexion = new Conexion();
    $sentenciaSQLInfoDeudas = "SELECT * FROM web_datos_ingreso WHERE codcliente_ingreso = '$cedula';";
    $sentenciaSQLInfoCiudadano = "SELECT DISTINCT ced_ident_ciudadano, apellidos_ciudadano, nombres_ciudadano FROM web_predios WHERE ced_ident_ciudadano like '$cedula'";
    $informacionDeudas = $objetoConexion->consultar($sentenciaSQLInfoDeudas);
    $informacionPersonal = $objetoConexion->consultar($sentenciaSQLInfoCiudadano);

    if (empty($informacionPersonal[0]['ced_ident_ciudadano'])) {
        $informacionPersonal[0]['ced_ident_ciudadano'] = "";
    }
    if (empty($informacionPersonal[0]['nombres_ciudadano'])) {
        $informacionPersonal[0]['nombres_ciudadano'] = "";
    }
    if (empty($informacionPersonal[0]['apellidos_ciudadano'])) {
        $informacionPersonal[0]['apellidos_ciudadano'] = "";
    }

    $txtInfoPersonal = $informacionPersonal[0]['ced_ident_ciudadano'] . " - " . $informacionPersonal[0]['nombres_ciudadano'] . " " . $informacionPersonal[0]['apellidos_ciudadano'];
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
    <title>Impuestos</title>
    <style>
        table{
            border: 1px solid #212529;
        }
        thead{
            border: 1px solid #212529;
        }
        th{
            padding: 3px;
            border: 1px solid #212529;
            justify-items: center;
        }
        tr{
            border: 1px solid #212529;
        }
        td{
            padding: 3px;
            border: 1px solid #212529;
        }
        #headerPrincipal{
            background-color: #EE4B3DFF;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
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
            width: 80px;
            height: 60px;
            margin: 10px;
            border: 1px solid #212529;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10%;
            cursor: pointer;
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
            <h4>CONSULTE SUS DEUDAS</h4>
        </div>
    </div>

    <div class="container" id="seccionPrincipal" style="text-align: center; justify-content: center">

            <div class="row">
                <div class="col-md-6">
                    <br>
                    <div class="card" style="background-color: #f2f2f2">
                        <div class="card-body">
                            <div id="seccionIngresoDatos" class="container">
                                <form id="formCedula" action="impuestos.php" method="post">
                                    <div>
                                        <p>
                                            <label for="inputCedula">
                                                Ingrese su cédula o RUC sin guion:
                                            </label>
                                            <input required name="txtCedula" id="inputCedula" type="text"
                                                   placeholder="Ejemplo: 1002961412">
                                        </p>
                                    </div>
                                    <div id="seccionTeclado" class="numPad">
                                        <div class="nums">
                                            <div class="flex r r1">
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(1)"><h5>1</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(2)"><h5>2</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(3)"><h5>3</h5>
                                                </div>
                                            </div>
                                            <div class="flex r r2">
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(4)"><h5>4</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(5)"><h5>5</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(6)"><h5>6</h5>
                                                </div>
                                            </div>
                                            <div class="flex r r3">
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(7)"><h5>7</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(8)"><h5>8</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(9)"><h5>9</h5>
                                                </div>
                                            </div>
                                            <div class="flex r r4">
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="agregarValor(0)"><h5>0</h5>
                                                </div>
                                                <div onmouseover="cambiarColorOver(this)" onmouseleave="cambiarColorLeave(this)"
                                                     onclick="borrarValor()">
                                                    <h5>Borrar</h5></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="seccionBotonesAccion" class="container" style="padding-top: 30px">
                                        <button type="submit" class="btn btn-dark" name="btnConsultar">
                                            <img src="https://info.ibarra.gob.ec/images/portfolio/find1.png" alt="BotónBuscar">
                                            CONSULTAR DEUDAS
                                        </button>
                                        <a href="impuestos.php">
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
                <div class="col-md-6">
                    <div id="seccionInstruccionesPagos" class="container" style="padding-top: 30px;">
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

        <div id="seccionTablaInformación" class="container" style="padding-top: 30px">
            <?php if (isset($_POST['btnConsultar'])) { ?>
                <div style="text-align: left"><h5>Información: </h5></div>
                <div class="row" style="padding-top: 10px; padding-bottom: 20px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-hover" style="font-size: 16px">
                            <thead>
                            <tr>
                                <td class="table-secondary" style="border-color: #212529" colspan="1">
                                    <b>CIUDADANO:</b>
                                </td>
                                <td colspan="4" style="text-align: center">
                                    <?php if(isset($txtInfoPersonal)) { echo $txtInfoPersonal; } ?>
                                </td>
                            </tr>
                            <tr class="table-secondary">
                                <th style="width: 20%">DIRECCION</th>
                                <th style="width: 15%">FECHA DE INGRESO</th>
                                <th style="width: 15%">FECHA DE VENCIMIENTO
                                </th>
                                <th style="width: 40%">COMENTARIO</th>
                                <th style="width: 10%">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($informacionDeudas)) {  foreach ($informacionDeudas as $item) { ?>
                                <tr>
                                    <td>
                                        <div> <?php echo $item['direccion'] ?> </div>
                                    </td>
                                    <td>
                                        <div> <?php echo $item['fecha_ingreso'] ?> </div>
                                    </td>
                                    <td>
                                        <div> <?php echo $item['fecha_vencimiento'] ?> </div>
                                    </td>
                                    <td>
                                        <div> <?php echo $item['comentario'] ?> </div>
                                    </td>
                                    <td>
                                        <div> <?php echo $item['subtotal'] ?> </div>
                                    </td>
                                </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="5" style="text-align: center; font-size: 16px; color: #cb0000; font-weight: bold;">
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
</div>
<script>
    function agregarValor(numero) {
        let txt = document.getElementById("inputCedula")
        let valorTxt = txt.value
        let numeroCaracteres = valorTxt.length
        if (numeroCaracteres < 13) {
            valorTxt = valorTxt + numero
            txt.value = valorTxt
        }
    }

    function borrarValor() {
        let txt = document.getElementById("inputCedula")
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