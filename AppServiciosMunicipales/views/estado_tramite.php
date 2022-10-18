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
    <title>Estado de trámites</title>
    <style>
        #headerPrincipal {
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
            <h4>CONSULTE EL ESTADO DE SU TRÁMITE</h4>
        </div>
    </div>

    <div id="seccionPrincipal" class="container">
        <div class="row">
            <div id="seccionIngresoDatos" class="col-md-6">
                <br>
                <div class="card" style="background-color: #f2f2f2">
                    <div class="card-header" style="text-align: center">
                        <h5 class="card-title">Ingresar Datos</h5>
                    </div>
                    <div class="card-body">
                        <form action="estado_tramite.php" method="post">
                            <label for="selectorAnio">Seleccione el año: <span style="opacity: 68%">(Ejemplo: 2016)</span></label>
                            <select required id="selectorAnio" class="form-select" aria-label="Default select example">
                                <option selected>Abra para seleccionar...</option>
                                <option value="1">2022</option>
                                <option value="2">2021</option>
                                <option value="3">2019</option>
                            </select>
                            <br>
                            <label for="txtNumTramite">Ingrese el número de trámite:</label> <input required type="text"
                                                                                                    name="numTramite"
                                                                                                    id="txtNumTramite"
                                                                                                    class="form-control"
                                                                                                    placeholder="Ejemplo: 710">
                            <br>
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
                                            <h6>Borrar</h6></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="botonesAcciones" style="justify-items: center; text-align: center">
                                <button type="submit" class="btn btn-dark" name="btnConsultar">
                                    <img src="https://info.ibarra.gob.ec/images/portfolio/find1.png" alt="BotónBuscar">
                                    BUSCAR TRAMITE
                                </button>
                                <a href="estado_tramite.php">
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
                <!-- <form id="formTramite" action="estado_tramite.php" method="get">
                </form> -->
            </div>
            <div id="seccionInstruccionesPagos" class="col-md-6">
                <br>
                <div class="card" style="background-color: #f2f2f2">
                    <div class="card-body">
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
            </div>
        </div>
    </div>
</div>
<script>
    function agregarValor(numero) {
        let txt = document.getElementById("txtNumTramite")
        let valorTxt = txt.value
        let numeroCaracteres = valorTxt.length
        if (numeroCaracteres < 13) {
            valorTxt = valorTxt + numero
            txt.value = valorTxt
        }
    }

    function borrarValor() {
        let txt = document.getElementById("txtNumTramite")
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
