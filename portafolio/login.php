<?php
session_start();
if($_POST){
    if(($_POST['usuario'] == "Justin") && ($_POST['contraseña'] == "12345")){
        $_SESSION['usuario'] = "Justin";
        header("Location: index.php"); //permite redireccionar
    }else{
        echo "<script> alert('Usuario o contraseña incorrecto'); </script>";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Iniciar sesión</h3>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <label for="txtUsuario">Usuario:</label> <input type="text" name="usuario" id="txtUsuario"
                                                                        class="form-control">
                        <br>
                        <label for="txtContraseña">Contraseña:</label> <input type="password" name="contraseña"
                                                                              id="txtContraseña"
                                                                              class="form-control">
                        <br>
                        <button type="submit" class="btn btn-success">Entrar al portafolio</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>
</html>