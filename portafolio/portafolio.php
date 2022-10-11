<?php include("cabecera.php") ?>
<?php include("conexion.php") ?>
<?php
$objetoConexion = new Conexion();
$sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, 'Proyecto 1', 'imagen.jpg', 'Es un nuevo proyecto.');";
$objetoConexion->ejecutar($sql);
?>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post">
                        <label for="txtProyecto">Nombre del proyecto: </label> <input type="text" name="txtProyecto" id="txtProyecto" class="form-control">
                        <br>
                        <label for="fileProyecto">Imagen del proyecto: </label> <input type="file" name="fileProyecto" id="fileProyecto" class="form-control">
                        <br>
                        <input class="btn btn-success" name="submit" type="submit" value="Enviar proyecto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>App web</td>
                    <td>Imagen.jpg</td>
                </tr>
                </tbody>
            </table>
        </div>
</div>

<?php include("pie.php") ?>
