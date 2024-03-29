<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion2.php") ?>
<?php

$idTramite = "";
if (isset($_POST)) {
    $num_tramite = isset($_POST['txtNumTramite']) ? $_POST['txtNumTramite'] : "";
    $anio_tramite = $_POST['opcionAnio'] ?? "";

    //si los trámites consultados son mayor o igual al 2021, los trámites inician con TR , caso contrario inician con RE
    if ($anio_tramite >= "2021") {
        $idTramite = 'TR-' . $anio_tramite . '-' . $num_tramite;
    } else {
        $idTramite = 'RE-' . $anio_tramite . '-' . $num_tramite;
    }
}

function mostrarTablaInfo($idTramite): void
{
    //consulta de info de trámite
    $sqlInfoTramite = "SELECT * FROM public.estado_tramite WHERE id_tramite = '$idTramite';";
    //consulta de historial
    $sqlHistorial = "SELECT * FROM public.estado_tramite_historial WHERE id_tramite = '$idTramite' ORDER BY fecha";
    $objetoConexion = new Conexion2();
    $infoTramite = $objetoConexion->consultar($sqlInfoTramite);
    $infoHistorial = $objetoConexion->consultar($sqlHistorial);

    ?>
        <table id="tablaDatos" class="table table-bordeless table-hover table-sm">
        <thead>
        <tr class="table-secondary">
            <td colspan="7" style="text-align: center">
                <div>Información</div>
            </td>
        </thead>
        <tbody>
    <?php

    if (!empty($infoTramite)) {
        foreach ($infoTramite as $tramite) {
            ?>
                <tr>
                    <th scope="row">Número de trámite:</th>
                    <td><?php echo $tramite['id_tramite'] ?></td>

                    <th scope="row">Usuario Actual:</th>
                    <td><?php echo $tramite['usuario_actual'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Asunto:</th>
                    <td><?php echo $tramite['asunto'] ?></td>

                    <th scope="row">Dependencia actual:</th>
                    <td><?php echo $tramite['dependencia_actual'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Fecha del registro:</th>
                    <td><?php echo $tramite['fecha_registro'] . " " . $tramite['hora_registro'] ?></td>

                    <th scope="row">Estado:</th>
                    <td style="color: #cb0000; font-weight: bold"><?php echo $tramite['estado'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Solicitante:</th>
                    <td><?php echo $tramite['solicitante'] ?></td>
                </tr>
                </tbody>
            <?php
        }
    } else {
        ?>
        <tr>
        <td colspan="7" style="text-align: center; font-size: 16px; color: #cb0000; font-weight: bold;">
        <div>No hay registros</div>
        </td>
		</tr>
		<?php
    }

    ?>
    </table>
    <table id="tablaHistorial" class="table table-bordered border-secondary table-hover">
        <thead>
        <tr class="table-secondary border-secondary" style="text-align: center">
            <td colspan="7">Historial del Trámite</td>
        </tr>
        <tr class="table-secondary border-secondary">
            <th style="width: 10%">FECHA</th>
            <th style="width: 19%">DEPENDENCIA ORIGEN</th>
            <th style="width: 13%">USUARIO ORIGEN</th>
            <th style="width: 10%">ACCIÓN</th>
            <th style="width: 19%">DEPENDENCIA DESTINO</th>
            <th style="width: 13%">USUARIO DESTINO</th>
            <th style="width: 16%">OBSERVACIÓN</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($infoHistorial)) {
            foreach ($infoHistorial as $item)
            {
                ?>
        <tr>
            <td><?php echo $item['fecha'] . " " . $item['hora'] ?></td>
            <td><?php echo $item['dependencia_origen'] ?></td>
            <td><?php echo $item['usuario_origen'] ?></td>
            <td><?php echo $item['accion'] ?></td>
            <td><?php echo $item['dependencia_destino'] ?></td>
            <td><?php echo $item['usuario_destino'] ?></td>
            <td><?php echo $item['observacion'] ?></td>
        </tr>
        <?php
            }
        } else { ?>
        <tr>
            <td colspan="7"
                style="text-align: center; font-size: 16px; color: #cb0000; font-weight: bold;">
                <div>No hay registros</div>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php

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
<body onload="moverHaciaInfo()" style="background-color: #f2f2f2">
<div id="contenidoPrincipal">
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
            <h4>CONSULTE EL ESTADO DE SU TRÁMITE</h4>
        </div>
    </div>

    <div id="seccionPrincipal" class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div id="seccionIngresoDatos" class="col-md-6">
                <br>
                <div class="card" style="background-color: #f2f2f2">
                    <div class="card-header" style="text-align: center">
                        <h5 class="card-title">Ingresar datos</h5>
                    </div>
                    <div class="card-body">
                        <form id="formTramite" action="estado_tramite.php" method="post">
                            <label for="selectorAnio">Seleccione el año: <span
                                        style="opacity: 68%">(Ejemplo: 2016)</span></label>
                            <select required name="opcionAnio" id="selectorAnio" class="form-select"
                                    aria-label="Default select example">
                                <option selected value="">Abra para seleccionar...</option>
                                <script>
                                    let selectorAnio = document.getElementById('selectorAnio');
                                    let anioActual = new Date().getFullYear();
                                    let anioInicial = 2010;
                                    while (anioActual >= 2010) {
                                        let anio = document.createElement('option');
                                        anio.text = anioActual;
                                        anio.value = anioActual;
                                        selectorAnio.add(anio);
                                        anioActual -= 1;
                                    }
                                </script>
                            </select>
                            <br>
                            <label for="numTramite">Ingrese el número de trámite:</label> <input required type="text"
                                                                                                 name="txtNumTramite"
                                                                                                 id="numTramite"
                                                                                                 class="form-control"
                                                                                                 placeholder="Ejemplo: 710"
                                                                                                 value="<?php echo $num_tramite ?>">
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
                                    BUSCAR TRÁMITE
                                </button>
                                <a href="estado_tramite.php">
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
            <div class="col-md-3"></div>
        </div>
        <div id="seccionTablaInformacion" style="padding-top: 20px">
            <?php if (isset($_POST['btnConsultar'])) { ?>
            <div class="row">
            <?php mostrarTablaInfo($idTramite); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function agregarValor(numero) {
        let txt = document.getElementById("numTramite")
        let valorTxt = txt.value
        let numeroCaracteres = valorTxt.length
        if (numeroCaracteres < 13) {
            valorTxt = valorTxt + numero
            txt.value = valorTxt
        }
    }

    function borrarValor() {
        let txt = document.getElementById("numTramite")
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

    function moverHaciaInfo() {
        document.getElementById('seccionTablaInformacion').scrollIntoView({behavior: 'smooth'});
    }
</script>
</body>
</html>
