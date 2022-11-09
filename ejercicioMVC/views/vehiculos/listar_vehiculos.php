<div class="row">
    <div class="col-md-12 text-right">
        <a href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=agregar_vehiculo"
           class="btn btn-outline-primary">
            Crear vehículo
        </a>
        <hr/>
    </div>
    <?php
    if (count($datosParaVista["data"]) > 0) {
        foreach ($datosParaVista["data"] as $vehiculo) {
            ?>
            <div class="col-md-3">
                <div class="card-body border border-secondary rounded">
                    <h5 class="card-title"><?php echo $vehiculo['placa']; ?></h5>
                    <div class="card-text"><?php echo $vehiculo['marca']; ?></div>
                    <div class="card-text"><?php echo $vehiculo['modelo']; ?></div>
                    <div class="card-text"><?php echo $vehiculo['color']; ?></div>
                    <div class="card-text"><?php echo $vehiculo['año']; ?></div>
                    <hr class="mt-1"/>
                    <a href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=editar_vehiculo&placa=<?php echo $vehiculo['placa']; ?>"
                       class="btn btn-primary">Editar</a>
                    <a href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=confirmar_eliminar&placa=<?php echo $vehiculo['placa']; ?>"
                       class="btn btn-danger">Eliminar</a>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-info">
            Actualmente no existen vehículos.
        </div>
        <?php
    }
    ?>
</div>