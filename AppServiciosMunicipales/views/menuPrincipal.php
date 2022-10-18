<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Servicios Municipales</title>
    <style>
        #headerSection {
            border-bottom: 1px solid #fff;
            position: fixed;
            top: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            transition: all 800ms;
            z-index: 9999;
            padding: 8px 0 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)
        }
        .card:hover{
            background-color: rgb(238, 75, 61);
            color: white;
            border-color: rgb(238, 75, 61);
        }
    </style>
</head>
<body style="background-color: #f2f2f2">

<div id="headerSection" style="background-color: white">
    <div style="padding-left: 15px">
        <img src="https://info.ibarra.gob.ec/images/logo-gadi.png" alt="Logo Municipio" width="200"/>
    </div>
</div>

<div id="ourServices" style="height: 600px; padding: 80px">
    <div style="padding: 50px">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-ms-4">
                    <a href="impuestos.php" style="text-decoration: none; color: #212529">
                        <div class="card" style="margin-bottom: 25px" onmouseover="changeImgPredio1()" onmouseleave="changeImgPredio2()">
                            <div class="card-body">
                                <h5>
                                    <b>Consulta de impuestos</b>
                                    <br>
                                    <br>
                                </h5>
                                <div>
                                    <img src="https://info.ibarra.gob.ec/images/portfolio/predio1.png" alt="Imagen Predio"
                                         class="img-fluid w-20 mb-3" id="img_predio">
                                </div>
                                <div>
                                    <p>
                                        Consulte sus deudas de impuestos
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-ms-4">
                    <a href="sismert.php" style="text-decoration: none; color: #212529">
                        <div class="card" style="margin-bottom: 25px" onmouseover="changeImgMulta1()" onmouseleave="changeImgMulta2()">
                            <div class="card-body">
                                <h5>
                                    <b>Multas de estacionamiento</b>
                                    <br>
                                    <br>
                                </h5>
                                <div>
                                    <img src="https://info.ibarra.gob.ec/images/portfolio/sismert1.png" alt="Imagen multa"
                                         class="img-fluid w-20 mb-3" id="img_multa">
                                </div>
                                <div>
                                    <p>
                                        Consulte sus multas de estacionamiento SISMERT
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-ms-4">
                    <a href="estado_tramite.php" style="text-decoration: none; color: #212529">
                        <div class="card" style="margin-bottom: 25px" onmouseover="changeImgEstado1()" onmouseleave="changeImgEstado2()">
                            <div class="card-body">
                                <h5>
                                    <b>Estado de trámites</b>
                                    <br>
                                    <br>
                                </h5>
                                <div>
                                    <img src="https://info.ibarra.gob.ec/images/portfolio/estado.png" alt="Imagen estado"
                                         class="img-fluid w-20 mb-3" id="img_estado">
                                </div>
                                <div>
                                    <p>
                                        Consulte el estado de su trámite
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-ms-2">
                </div>
                <div class="col-lg-4 col-md-6 col-ms-4">
                    <a href="https://google.com" style="text-decoration: none; color: #212529">
                        <div class="card" style="margin-bottom: 25px" onmouseover="changeImgTramite1()" onmouseleave="changeImgTramite2()">
                            <div class="card-body">
                                <h5>
                                    <b>Requisitos de trámites presenciales</b>
                                    <br>
                                    <br>
                                </h5>
                                <div>
                                    <img src="https://info.ibarra.gob.ec/images/portfolio/tramite1.png" alt="Imagen trámite"
                                         class="img-fluid w-20 mb-3" id="img_tramite">
                                </div>
                                <div>
                                    <p>
                                        Consulte los requisitos de trámites municipales
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-ms-4">
                    <a href="https://google.com" style="text-decoration: none; color: #212529">
                        <div class="card" style="margin-bottom: 25px" onmouseover="changeImgLinea1()" onmouseleave="changeImgLinea2()">
                            <div class="card-body">
                                <h5>
                                    <b>Requisitos de servicios en línea</b>
                                    <br>
                                    <br>
                                </h5>
                                <div>
                                    <img src="https://info.ibarra.gob.ec/images/portfolio/linea1.png" alt="Imagen servicios en línea"
                                         class="img-fluid w-20 mb-3" id="img_linea">
                                </div>
                                <div>
                                    <p>
                                        Consulte los requisitos de trámites en línea
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-2 col-ms-2">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //------------------- Cambiar imagen predio ------------------------------
    function changeImgPredio1(){
        document.getElementById("img_predio").src = "https://info.ibarra.gob.ec/images/portfolio/predio2.png";
    }
    function changeImgPredio2(){
        document.getElementById("img_predio").src = "https://info.ibarra.gob.ec/images/portfolio/predio1.png";
    }
    //------------------- Cambiar imagen multa ------------------------------
    function changeImgMulta1(){
        document.getElementById("img_multa").src = "https://info.ibarra.gob.ec/images/portfolio/sismert2.png";
    }
    function changeImgMulta2(){
        document.getElementById("img_multa").src = "https://info.ibarra.gob.ec/images/portfolio/sismert1.png";
    }
    //------------------- Cambiar imagen estado ------------------------------
    function changeImgEstado1(){
        document.getElementById("img_estado").src = "https://info.ibarra.gob.ec/images/portfolio/estado_blanco.png";
    }
    function changeImgEstado2(){
        document.getElementById("img_estado").src = "https://info.ibarra.gob.ec/images/portfolio/estado.png";
    }
   //------------------- Cambiar imagen tramites ------------------------------
   function changeImgTramite1(){
       document.getElementById("img_tramite").src = "https://info.ibarra.gob.ec/images/portfolio/tramite2.png";
   }
   function changeImgTramite2(){
       document.getElementById("img_tramite").src = "https://info.ibarra.gob.ec/images/portfolio/tramite1.png";
   }
   //------------------- Cambiar imagen en línea ------------------------------
   function changeImgLinea1(){
       document.getElementById("img_linea").src = "https://info.ibarra.gob.ec/images/portfolio/linea2.png";
   }
   function changeImgLinea2(){
       document.getElementById("img_linea").src = "https://info.ibarra.gob.ec/images/portfolio/linea1.png";
   }
</script>
</body>
</html>
