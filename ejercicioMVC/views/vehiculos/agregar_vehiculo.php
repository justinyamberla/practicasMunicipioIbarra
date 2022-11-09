<?php

$placa = $marca = $modelo = $color = $anio = "";

if (isset($datosParaVista["data"]["placa"])) $placa = $datosParaVista["data"]["placa"];
if (isset($datosParaVista["data"]["marca"])) $marca = $datosParaVista["data"]["marca"];
if (isset($datosParaVista["data"]["modelo"])) $modelo = $datosParaVista["data"]["modelo"];
if (isset($datosParaVista["data"]["color"])) $color = $datosParaVista["data"]["color"];
if (isset($datosParaVista["data"]["año"])) $anio = $datosParaVista["data"]["año"];
?>

<div class="row" style="padding-bottom: 30px">
    <?php
    if (isset($_GET['respuesta']) and $_GET['respuesta'] === true) {
        ?>
        <div class="alert alert-success">
            Operación realizada correctamente.
            <a href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=listar_vehiculos">Volver
                al listado</a>
        </div>
        <?php
    }
    ?>
    <form class="form" action="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=guardar_nuevo"
          method="POST">
        <div class="form-group">
            <label for="inputPlaca">Placa:</label>
            <input class="form-control" type="text" name="txtPlaca" id="inputPlaca" value="<?php echo $placa ?>"/>
        </div>
        <div class="form-group mb-2">
            <label for="inputMarca">Marca:</label>
            <input class="form-control" type="text" name="txtMarca" id="inputMarca" value="<?php echo $marca ?>"/>
        </div>
        <div class="form-group mb-2">
            <label for="inputModelo">Modelo:</label>
            <input class="form-control" type="text" name="txtModelo" id="inputModelo" value="<?php echo $modelo ?>"/>
        </div>
        <div class="form-group mb-2">
            <label for="inputColor">Color:</label>
            <input class="form-control" type="text" name="txtColor" id="inputColor" value="<?php echo $color ?>"/>
        </div>
        <div class="form-group mb-2">
            <label for="inputAnio">Año:</label>
            <input class="form-control" type="text" name="txtAnio" id="inputAnio" value="<?php echo $anio ?>"/>
        </div>
        <input type="submit" value="Guardar" class="btn btn-primary"/>
        <a class="btn btn-outline-danger"
           href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=listar_vehiculos">Cancelar</a>
    </form>
</div>