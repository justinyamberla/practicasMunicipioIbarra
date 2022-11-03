<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion2.php") ?>
<?php
//obtiene el listado de categorías de servicios:
function mostrarDirecciones(): void
{
    $sql1 = "SELECT id_direccion, nombre_direccion from direcciones_tramites";
    $objetoConexion = new Conexion2();
    $arrayDirecciones = $objetoConexion->consultar($sql1);
    if (!empty($arrayDirecciones)){
        foreach ($arrayDirecciones as $direccion) {
            ?>
            <div onclick="window.location.href='tramites_l.php?idDireccion=<?php echo $direccion['id_direccion'] ?>';"
                 class="card">
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
    <title>Trámites en línea</title>
    <style>
        #headerPrincipal {
            background-color: #EE4B3DFF;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            padding-top: 30px;
        }

        .card {
            margin: 10px 20px;
            padding: 10px 20px;
            width: 300px;

            transition: 0.1s linear;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card:hover {
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
        <a href="menuDinamic.php">
            <button class="btn btn-light">
                <img src="https://info.ibarra.gob.ec/images/icons/home.png" alt="Botón Menú Inicio">
                MENÚ INICIO
            </button>
        </a>
    </div>
    <div>
        <h4>CONSULTE LOS REQUISITOS DE SERVICIOS EN LÍNEA</h4>
    </div>
</div>
<div id="seccionCategorias" class="container">
    <?php mostrarDirecciones(); ?>
</div>
</body>
</html>