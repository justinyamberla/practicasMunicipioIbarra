<?php

session_start();
session_destroy();
header('Location: login.php');
echo "<script> alert('Se ha cerrado la sesión'); </script>";

?>