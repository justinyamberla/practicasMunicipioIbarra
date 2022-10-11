<?php

// Comprobamos la sesión
session_start();
if (isset($_SESSION['usuario'])){
    echo "Usuario: " . $_SESSION['usuario'] . "<br> Estatus: " . $_SESSION['estatus'];
}else{
    echo "No se ha iniciado ninguna sesión";
}
?>
