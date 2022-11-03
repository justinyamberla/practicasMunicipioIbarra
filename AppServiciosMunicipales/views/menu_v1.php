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
        #headerPrincipal {
            background-color: white;
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

        .card {
            margin: 10px 20px;
            padding: 10px 20px;
            width: 320px;
            transition: 0.1s linear;
            text-align: center;
        }

        .card:hover {
            background-color: rgb(238, 75, 61);
            color: white;
            border-color: rgb(238, 75, 61);
            cursor: pointer;
        }
        .card p{
            margin: auto;
        }
        .cuerpoTarjeta{
            margin: auto; padding: 10px 0 10px 0
        }
        .imgTarjeta{
            padding: 20px 0 20px 0
        }
        .container {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #f2f2f2">

<div id="contenidoPrincipal">
    <div id="headerPrincipal">
        <div style="padding-left: 15px">
            <img src="https://info.ibarra.gob.ec/images/logo-gadi.png" alt="logo municipio" width="200"/>
        </div>
    </div>
    <div id="seccionModulos" style="padding-top: 120px" class="container">
        <div onclick="window.location.href='impuestos.php';" class="card" onmouseover="changeImgPredio1()"
             onmouseleave="changeImgPredio2()">
            <div class="cuerpoTarjeta">
                <div>
                    <h5>
                        <b>Consulta de impuestos</b>
                    </h5>
                </div>
                <div class="imgTarjeta">
                    <img src="https://info.ibarra.gob.ec/images/portfolio/predio1.png" alt="Imagen Predio"
                         id="img_predio">
                </div>
                <div>
                    <p>
                        Consulte sus deudas de impuestos
                    </p>
                </div>
            </div>
        </div>
        <div onclick="window.location.href='sismert.php';" class="card" onmouseover="changeImgMulta1()"
             onmouseleave="changeImgMulta2()">
            <div class="cuerpoTarjeta">
                <div>
                    <h5>
                        <b>Multas de estacionamiento</b>
                    </h5>
                </div>
                <div class="imgTarjeta">
                    <img src="https://info.ibarra.gob.ec/images/portfolio/sismert1.png" alt="Imagen multa"
                         id="img_multa">
                </div>
                <div>
                    <p>
                        Consulte sus multas de estacionamiento SISMERT
                    </p>
                </div>
            </div>
        </div>
        <div onclick="window.location.href='estado_tramite.php';" class="card" onmouseover="changeImgEstado1()"
             onmouseleave="changeImgEstado2()">
            <div class="cuerpoTarjeta">
                <div>
                    <h5>
                        <b>Estado de trámites</b>
                    </h5>
                </div>
                <div class="imgTarjeta">
                    <img src="https://info.ibarra.gob.ec/images/portfolio/estado.png" alt="Imagen estado"
                         id="img_estado">
                </div>
                <div>
                    <p>
                        Consulte el estado de su trámite
                    </p>
                </div>
            </div>
        </div>
        <div onclick="window.location.href='tramites_presenciales.php';" class="card" onmouseover="changeImgTramite1()"
             onmouseleave="changeImgTramite2()">
            <div class="cuerpoTarjeta">
                <div>
                    <h5>
                        <b>Requisitos de trámites presenciales</b>
                    </h5>
                </div>
                <div class="imgTarjeta">
                    <img src="https://info.ibarra.gob.ec/images/portfolio/tramite1.png" alt="Imagen trámite"
                         id="img_tramite">
                </div>
                <div>
                    <p>
                        Consulte los requisitos de trámites municipales
                    </p>
                </div>
            </div>
        </div>
        <div onclick="window.location.href='tramites_en_linea.php';" class="card" onmouseover="changeImgLinea1()"
             onmouseleave="changeImgLinea2()">
            <div class="cuerpoTarjeta">
                <div>
                    <h5>
                        <b>Requisitos de servicios en línea</b>
                    </h5>
                </div>
                <div class="imgTarjeta">
                    <img src="https://info.ibarra.gob.ec/images/portfolio/linea1.png"
                         alt="Imagen servicios en línea"
                         id="img_linea">
                </div>
                <div>
                    <p>
                        Consulte los requisitos de trámites en línea
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //------------------- Cambiar imagen predio ------------------------------
    function changeImgPredio1() {
        document.getElementById("img_predio").src = "https://info.ibarra.gob.ec/images/portfolio/predio2.png";
    }

    function changeImgPredio2() {
        document.getElementById("img_predio").src = "https://info.ibarra.gob.ec/images/portfolio/predio1.png";
    }

    //------------------- Cambiar imagen multa ------------------------------
    function changeImgMulta1() {
        document.getElementById("img_multa").src = "https://info.ibarra.gob.ec/images/portfolio/sismert2.png";
    }

    function changeImgMulta2() {
        document.getElementById("img_multa").src = "https://info.ibarra.gob.ec/images/portfolio/sismert1.png";
    }

    //------------------- Cambiar imagen estado ------------------------------
    function changeImgEstado1() {
        document.getElementById("img_estado").src = "https://info.ibarra.gob.ec/images/portfolio/estado_blanco.png";
    }

    function changeImgEstado2() {
        document.getElementById("img_estado").src = "https://info.ibarra.gob.ec/images/portfolio/estado.png";
    }

    //------------------- Cambiar imagen trámites ------------------------------
    function changeImgTramite1() {
        document.getElementById("img_tramite").src = "https://info.ibarra.gob.ec/images/portfolio/tramite2.png";
    }

    function changeImgTramite2() {
        document.getElementById("img_tramite").src = "https://info.ibarra.gob.ec/images/portfolio/tramite1.png";
    }

    //------------------- Cambiar imagen trámites en línea ------------------------------
    function changeImgLinea1() {
        document.getElementById("img_linea").src = "https://info.ibarra.gob.ec/images/portfolio/linea2.png";
    }

    function changeImgLinea2() {
        document.getElementById("img_linea").src = "https://info.ibarra.gob.ec/images/portfolio/linea1.png";
    }
</script>
</body>
</html>
