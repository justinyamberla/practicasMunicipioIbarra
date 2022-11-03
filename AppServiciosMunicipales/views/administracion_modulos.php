<?php include("C:\Users\JUSTIN\PhpstormProjects\pasantias\models\conexion2.php") ?>
<?php

// Obtener los módulos iniciales al cargar la página
$objetoConexion = new Conexion2();
$sql = "SELECT * FROM modulo ORDER BY id";
$arrayModulos = $objetoConexion->consultar($sql);

// sentencia para insertar nuevo módulo:
/* $sqlInsercion = "INSERT into modulo VALUES (
                             5,
						    'Requisitos de servicios en línea',
						    'Consulte los requisitos de trámites en línea',
						    'https://info.ibarra.gob.ec/images/portfolio/linea1.png',
						    'https://info.ibarra.gob.ec/images/portfolio/linea2.png',
						  	'activo',
                            'https://google.com');"
*/
if ($_POST) {
    header("location:administracion_modulos.php");
}

if (isset($_GET['desactivar'])) {
    $id = $_GET['desactivar'];
    $sql2 = "UPDATE modulo SET estado = 'inactivo' WHERE id=" . "$id";
    $objetoConexion->ejecutar($sql2);
    header("location:administracion_modulos.php");
}
if (isset($_GET['activar'])) {
    $id = $_GET['activar'];
    $sql3 = "UPDATE modulo SET estado = 'activo' WHERE id=" . "$id";
    $objetoConexion->ejecutar($sql3);
    header("location:administracion_modulos.php");
}

function guardarInfoModulos($objetoConexion): void
{
    $id = $_POST['txtId'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDesc'];
    $logo1 = $_POST['txtUrlLogo1'];
    $logo2 = $_POST['txtUrlLogo2'];
    $sitio = $_POST['txtSitio'];
    $estado = $_POST['opciones'];
    $sql3 = "UPDATE modulo SET id = '$id', nombre = '$nombre', descripcion = '$descripcion', imagen1 = '$logo1',
              imagen2 = '$logo2', estado = '$estado', enlace = '$sitio' WHERE id= '$id' ";
    $objetoConexion->ejecutar($sql3);
}

function mostrarModulos($arrayModulos): void
{
    foreach ($arrayModulos as $modulo) {
        ?>
        <tr>
            <td><?php echo $modulo['id'] ?></td>
            <td><?php echo $modulo['nombre'] ?></td>
            <td style="text-transform: uppercase; font-weight: bold"><?php echo $modulo['estado'] ?></td>
            <td>
                <a href="?activar=<?php echo $modulo['id'] ?>" type="button" class="btn btn-success"
                   style="margin: 0 5px 0 5px">Activar</a>
                <a href="?desactivar=<?php echo $modulo['id'] ?>" type="button" class="btn btn-warning"
                   style="margin: 0 5px 0 5px">Desactivar</a>
                <a href="?editar=<?php echo $modulo['id'] ?>" type="button" class="btn btn-primary"
                   style="margin: 0 5px 0 5px">Editar</a>
                <a href="?eliminar=<?php echo $modulo['id'] ?>" type="button" class="btn btn-danger"
                   style="margin: 0 5px 0 5px">Eliminar</a>
            </td>
        </tr>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gantari&display=swap" rel="stylesheet">
    <title>Administración de modulos</title>
    <style>
    </style>
</head>
<body>
<div class="container" style="padding-top: 15px">
    <div style="text-align: center; padding-bottom: 20px">
        <h4>Panel de administración de módulos</h4>
    </div>
    <div class="row" style="text-align: center; padding-bottom: 30px">
        <div class="col-md-12">
            <table class="table table-bordeless table-hover">
                <thead>
                <tr class="table-primary" style="font-weight: bold">
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Estado</td>
                    <td>Acciones</td>
                </tr>
                </thead>
                <tbody>
                <?php mostrarModulos($arrayModulos); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="padding-bottom: 20px">
        <?php
        if (isset($_GET['editar'])) {
            $idModulo = $_GET['editar'];
            ?>
            <div class="col-md-6" style="padding: 30px 15px 20px 15px; background-color: #f2f2f2">
                <div style="text-align: center">
                    <h5 style="font-weight: bold">
                        Editar datos del módulo <?php echo $idModulo ?>
                    </h5>
                </div>
                <a onclick=""></a>
                <div>
                    <form action="administracion_modulos.php" method="POST">
                        <div class="form-group">
                            <label for="inputId">ID:</label>
                            <input type="text" class="form-control" id="inputId" name="txtId"
                                   value="<?php echo $arrayModulos[$idModulo - 1]['id'] ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="inputNombre">Nombre:</label>
                            <input type="text" class="form-control" id="inputNombre" name="txtNombre"
                                   value="<?php echo $arrayModulos[$idModulo - 1]['nombre'] ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="inputDesc">Descripción:</label>
                            <input type="text" class="form-control" id="inputDesc" name="txtDesc"
                                   value="<?php echo $arrayModulos[$idModulo - 1]['descripcion'] ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="inputLogo1">Url de logo 1:</label>
                            <input type="text" class="form-control" id="inputLogo1" name="txtUrlLogo1"
                                   value="<?php echo $arrayModulos[$idModulo - 1]['imagen1'] ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="inputLogo2">Url de logo 2:</label>
                            <input type="text" class="form-control" id="inputLogo2" name="txtUrlLogo2"
                                   value="<?php echo $arrayModulos[$idModulo - 1]['imagen2'] ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="inputSitio">Enlace de sitio:</label>
                            <input type="text" class="form-control" id="inputSitio" name="txtSitio"
                                   value="<?php echo $arrayModulos[$idModulo - 1]['enlace'] ?>">
                        </div>
                        <br>
                        <div>Estado:</div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-dark">
                                <input type="radio" name="opciones" id="optionActivo" value="activo"
                                    <?php if ($arrayModulos[$idModulo - 1]['estado'] == "activo") {
                                        echo "checked";
                                    } ?>
                                >
                                activo
                            </label>
                            <label class="btn btn-outline-dark">
                                <input type="radio" name="opciones" id="optionInactivo" value="inactivo"
                                    <?php if ($arrayModulos[$idModulo - 1]['estado'] == "inactivo") {
                                        echo "checked";
                                    } ?>
                                > inactivo
                            </label>
                        </div>
                        <br>
                        <br>
                        <div style="text-align: center">
                            <button name="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
                            <button name="btnCancelar" type="submit" class="btn btn-primary">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
        if (isset($_POST['btnGuardar'])) {
            guardarInfoModulos($objetoConexion);
        } elseif (isset($_POST['btnCancelar'])) {
            header("location:administracion_modulos.php");
        }
        ?>
    </div>
</div>
<script></script>
</body>
</html>
