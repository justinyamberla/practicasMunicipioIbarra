<?php include("cabecera.php") ?>
<?php include("conexion.php") ?>
<?php

if ($_POST) {
    $nombre = $_POST['txtNombreProyecto'];
    $descripcion = $_POST['txtAreaDescripcion'];
    $imagen = $_FILES['fileProyecto']['name'];
    $objetoConexion = new Conexion();
    // Insertar datos
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
    $objetoConexion->ejecutar($sql);
    header("location:portafolio.php");
}

if ($_GET) {
    $id = $_GET['borrar'];
    $objetoConexion = new Conexion();
    // Borrar datos por ID
    $sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` =" . $id;
    $objetoConexion->ejecutar($sql);
    header("location:portafolio.php");
}

$objetoConexion = new Conexion();
$proyectos = $objetoConexion->consultar("SELECT * FROM `proyectos`");

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
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <label for="txtNombreProyecto">Nombre del proyecto: </label> <input required type="text"
                                                                                            name="txtNombreProyecto"
                                                                                            id="txtNombreProyecto"
                                                                                            class="form-control">
                        <br>
                        <label for="fileProyecto">Imagen del proyecto: </label> <input required type="file"
                                                                                       name="fileProyecto"
                                                                                       id="fileProyecto"
                                                                                       class="form-control">
                        <br>
                        <label for="txtAreaDescripcion">Descripción: </label> <textarea required class="form-control"
                                                                                        id="txtAreaDescripcion"
                                                                                        name="txtAreaDescripcion"
                                                                                        rows="3"></textarea>
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
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($proyectos as $proyecto) { ?>
                    <tr>
                        <td> <?php echo $proyecto['id']; ?> </td>
                        <td> <?php echo $proyecto['nombre']; ?> </td>
                        <td> <?php echo $proyecto['imagen']; ?> </td>
                        <td> <?php echo $proyecto['descripcion']; ?> </td>
                        <td>
                            <a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include("pie.php") ?>
