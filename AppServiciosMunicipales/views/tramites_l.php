<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion2.php") ?>
<?php

$nombre_direccion = "";
$sql_por_dir = "";
if($_GET){
    $id_direccion = intval($_GET['idDireccion']);
    $sql_dir = "SELECT * FROM public.direcciones_tramites where id_direccion = '$id_direccion';";
    $objetoConexion = new Conexion2();
    $direccion = $objetoConexion->consultar($sql_dir);
    $nombre_direccion = $direccion[0][1];

    $sql_por_dir = "SELECT * FROM public.tramites where id_direccion = '$id_direccion'
                    AND tipo = 'En línea' ORDER BY id_tramite ASC ";
}


function cargarTramites($sql): void
{
    //cargar tramites
    $objetoConexion = new Conexion2();
    $arrayTramites = $objetoConexion->consultar($sql);
    if (!empty($arrayTramites)) {
        foreach ($arrayTramites as $tramite) {
            ?>
            <a onclick="moverHaciaRequisitos()"
               class="list-group-item list-group-item-dark list-group-item-action"
               id="list-<?php echo $tramite['id_tramite'] ?>-list" data-bs-toggle="list"
               href="#list-<?php echo $tramite['id_tramite'] ?>"> <?php echo $tramite['nombre'] ?>
            </a>
            <?php
        }
    } else {
        echo "No hay trámites";
    }
}

function cargarSeccionesRequisitos($sql): void
{
    //cargar tramites
    $objetoConexion = new Conexion2();
    $arrayTramites = $objetoConexion->consultar($sql);
    if (!empty($arrayTramites)) {
        foreach ($arrayTramites as $tramite) {
            ?>
            <div class="tab-pane fade <?php echo (isset($_GET['list'])) ? 'active' : ''; ?>"
                 id="list-<?php echo $tramite['id_tramite'] ?>">
                <div class="card">
                    <div class="card-header"
                         style="font-weight:bold; text-align:center"><?php echo $tramite['nombre'] ?></div>
                    <div class="card-body">
                        <div style="font-weight:bold">Requisitos:</div>
                        <p><?php echo $tramite['requisitos'] ?></p>
                        <div style="text-align: center">
                            <a id="btnImp<?php echo $tramite['id_tramite'] ?>" onclick="imprimirArea(this)" href=""
                               class="btn btn-light"
                               style="border-color: #212529">
                                <img src="https://info.ibarra.gob.ec/images/icons/impresora.png" alt="">
                                Imprimir requisitos
                            </a>
                        </div>
                        <div id="areaImprimir<?php echo $tramite['id_tramite'] ?>" style="display:none">
                            <div><img src="https://info.ibarra.gob.ec/images/logo1.png" alt="" width="150px">
                            </div>
                            <br>
                            <div style="font-weight:bold">REQUISITOS DE TRÁMITES
                                PRESENCIALES: <?php echo $tramite['nombre'] ?></div>
                            <br>
                            <div>
                                <p><?php echo $tramite['requisitos'] ?></p>
                            </div>
                            <div style="font-weight:bold">Fecha y hora de
                                consulta: <?php echo date("d/m/Y") . " " . date("h:i:s") ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }
    } else {
        echo "No hay requisitos";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>En línea</title>
    <style>
        #headerPrincipal {
            background-color: #EE4B3DFF;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        div.scroll {
            height: 500px;
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body style="background-color: #f2f2f2;">
<div id="headerPrincipal">
    <div style="float: left; margin-top: -6px">
        <a href="menuDinamic.php">
            <button class="btn btn-light">
                <img src="https://info.ibarra.gob.ec/images/icons/home.png" alt="Botón Menú Inicio">
                MENÚ INICIO
            </button>
        </a>
        <a href="tramites_en_linea.php">
            <button class="btn btn-light">
                <img src="https://info.ibarra.gob.ec/images/icons/tramite.png" alt="Botón Menú Categorías">
                REGRESAR
            </button>
        </a>
    </div>
    <div>
        <h4>REQUISITOS DE SERVICIOS EN LÍNEA: <?php echo $nombre_direccion ?></h4>
    </div>
</div>
<div class="container" style="padding-top: 20px; padding-bottom:20px">
    <div>
        <h5>Trámites: </h5>
    </div>
    <div id="seccionInfoRequisitos" class="row">
        <div class="col-6">
            <div class="scroll">
                <div class="list-group" id="list-tab" role="tablist">
                    <?php cargarTramites($sql_por_dir); ?>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="tab-content" id="nav-tabContent">
                <?php cargarSeccionesRequisitos($sql_por_dir); ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
</script>
<script>
    function moverHaciaRequisitos() {
        document.getElementById('seccionInfoRequisitos').scrollIntoView({behavior: 'smooth'});
    }

    function imprimirArea(btn){
        let idAreaImprimir = "areaImprimir" + btn.id.substr(6);
        let printContents = document.getElementById(idAreaImprimir).innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

</script>
</body>
</html>
