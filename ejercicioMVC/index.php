<?php

require_once "config/database.php";
require_once "controllers/vehiculos_controller.php";
$control = new Vehiculos_controller();
$control->index();

?>
