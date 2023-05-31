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
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="card-title"><?php echo $vehiculo['placa']; ?></h5>
                        </div>
                        <hr class="mt-1"/>
                        <div class="card-text"><strong>Marca:</strong> <?php echo $vehiculo['marca']; ?></div>
                        <div class="card-text"><strong>Modelo:</strong> <?php echo $vehiculo['modelo']; ?></div>
                        <div class="card-text"><strong>Color:</strong> <?php echo $vehiculo['color']; ?></div>
                        <div class="card-text"><strong>Año:</strong> <?php echo $vehiculo['año']; ?></div>
                        <hr class="mt-1"/>
                        <div class="card-buttons">
                            <a href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=editar_vehiculo&placa=<?php echo $vehiculo['placa']; ?>"
                               class="btn btn-primary" style="margin: 2px;">Editar</a>
                            <a href="http://localhost:63342/ejercicioMVC/index.php?controller=vehiculo&action=confirmar_eliminar&placa=<?php echo $vehiculo['placa']; ?>"
                               class="btn btn-danger" style="margin: 2px">Eliminar</a>
                        </div>
                    </div>
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