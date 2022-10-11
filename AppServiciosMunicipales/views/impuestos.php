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
    <title>Impuestos</title>
    <style>
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
    <div id="headerPrincipal"
         style="background-color: #EE4B3DFF; color: white; padding: 20px; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
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
    <div id="seccionPrincipal" style="text-align: center; justify-content: center">
        <div id="seccionIngresoDatos" class="container" style="padding-top: 30px">
            <form id="formCedula" action="" method="post">
                <div>
                    <p>
                        <label for="inputCedula">
                            Ingrese su cédula o RUC sin guión:
                        </label>
                        <input id="inputCedula" type="text" placeholder="Ejemplo: 1002961412">
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
                    <button type="submit" class="btn btn-outline-dark" name="btnConsultar">
                        <img src="https://info.ibarra.gob.ec/images/portfolio/find1.png" alt="BotónBuscar">
                        CONSULTAR DEUDAS
                    </button>
                    <a href="impuestos.php">
                        <button type="button" class="btn btn-outline-dark">
                            <img src="https://info.ibarra.gob.ec/images/icons/nueva_busqueda.png" alt="BotónNuevaBusqueda"
                                 style="filter: brightness(3.3)">
                            NUEVA BUSQUEDA
                        </button>
                    </a>
                </div>
            </form>
        </div>
        <div id="seccionTablaInformación" class="container" style="padding-top: 30px">
            <?php if(isset($_POST['btnConsultar'])){ ?>
                <div style="text-align: left"><h5>Información: </h5></div>
                <div class="row" style="padding-top: 10px; padding-bottom: 20px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="tabla" style="font-size: 16px; border: 1px solid #212529">
                            <thead style="border: 1px solid #212529">
                            <tr style="border: 1px solid #212529">
                                <td colspan="1" style="padding: 3px; border: 1px solid #212529">
                                    <b>CIUDADANO:</b>
                                </td>
                                <td colspan="4" style="padding: 3px">
                                    1004438956 - YAMBERLA MARCILLO JUSTIN ALEXIS
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 3px; width: 20%; border: 1px solid #212529">DIRECCION</th>
                                <th style="padding: 3px; width: 15%; border: 1px solid #212529">FECHA DE INGRESO</th>
                                <th style="padding: 3px; width: 15%; border: 1px solid #212529">FECHA DE VENCIMIENTO</th>
                                <th style="padding: 3px; width: 40%; border: 1px solid #212529">COMENTARIO</th>
                                <th style="padding: 3px; width: 10%; border: 1px solid #212529">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="5" style="padding: 3px">
                                    No tiene valores
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>
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
                <li>Botón de pagos en Línea del Portal Ciudadano Municipal (https://portalciudadano.ibarra.gob.ec):
                    Tarjetas de crédito Diners, Discover, Visa, Mastercard Pichincha.
                </li>
            </ul>
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