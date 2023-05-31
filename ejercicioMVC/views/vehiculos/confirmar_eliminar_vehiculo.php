<div class="row">
    <form class="form" action="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=eliminar"
          method="POST">
        <input type="hidden" name="placa" value="<?php echo $datosParaVista["data"]["placa"]; ?>"/>
        <div class="alert alert-warning">
            <b>¿Confirma que desea eliminar este vehículo?:</b>
            <i><?php echo $datosParaVista["data"]["placa"]; ?></i>
        </div>
        <input type="submit" value="Eliminar" class="btn btn-danger"/>
        <a class="btn btn-outline-success"
           href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=listar_vehiculos">Cancelar</a>
    </form>
</div>
