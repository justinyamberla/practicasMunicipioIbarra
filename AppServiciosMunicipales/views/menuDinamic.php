<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion2.php") ?>
<?php

// Obtener los módulos iniciales de la BD al cargar la página
$objetoConexion = new Conexion2();
$sql = "SELECT * FROM modulo ORDER BY id";
$arrayModulos = $objetoConexion->consultar($sql);

function mostrarModulos($arrayModulos): void
{
    foreach ($arrayModulos as $modulo) {
        if ($modulo['estado'] == "activo") {
            ?>
            <div onclick="window.location.href='<?php echo $modulo['enlace'] ?>';"
                 class="card"
                 onmouseover="changeImgOver(<?php echo $modulo['id'] ?>, '<?php echo $modulo['imagen2'] ?>')"
                 onmouseleave="changeImgLeave(<?php echo $modulo['id'] ?>, '<?php echo $modulo['imagen1'] ?>')">
                <div style="margin: auto; padding: 10px 0 10px 0">
                    <div>
                        <h5>
                            <b><?php echo $modulo['nombre'] ?></b>
                        </h5>
                    </div>
                    <div style="padding: 20px 0 20px 0">
                        <img src="<?php echo $modulo['imagen1'] ?>" alt=""
                             id="img<?php echo $modulo['id'] ?>">
                    </div>
                    <div>
                        <p style="margin: auto">
                            <?php echo $modulo['descripcion'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
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
    <title>Menú dinámico</title>
    <style>
        #headerPrincipal {
            background-color: white;
            border-bottom: 1px solid #fff;
            position: fixed;
            top: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            transition: all 800ms;
            z-index: 9999;
            padding: 8px 0 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)
        }

        .container {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
        }

        .card {
            margin: 10px 20px;
            padding: 10px 20px;
            width: 320px;
            transition: 0.1s linear;
            text-align: center;
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
<div>
    <div id="headerPrincipal">
        <div style="padding-left: 15px">
            <img src="https://info.ibarra.gob.ec/images/logo-gadi.png" alt="logo municipio" width="200"/>
        </div>
    </div>
    <section id="seccionModulos" class="container" style="padding-top: 120px">
        <?php mostrarModulos($arrayModulos); ?>
    </section>
</div>
<script>
    // Funciones para intercambiar cambiar logo de los módulos entre blanco y negro:
    function changeImgOver(id, img2) {
        document.getElementById("img" + id).src = img2;
    }

    function changeImgLeave(id, img1) {
        document.getElementById("img" + id).src = img1;
    }

</script>
</body>
</html>
