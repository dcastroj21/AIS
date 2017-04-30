<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en" class="no-js">
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">

    <title>AIS project</title>
    <link rel="shortcut icon" href="images/logo.ico">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">

    <link rel="stylesheet" media="screen" type="text/css" href="css/datepicker.css" />
    <link rel="stylesheet" media="screen" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" href="css/jquery-ui-1.10.0.custom.min.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="styleSheet" href="css/encabezado.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDULHVVSQ-vjy1ScgiJU0hPuKb-IRt6bmw&libraries=geometry,drawing,places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>

    <script src="js/graphs.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/jquery-countTo.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/eye.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/layout.js?ver=1.0.2"></script>
    <script src="js/jquery.ui.core.min.js"></script>
    <script src="js/jquery.ui.timepicker.js?v=0.3.3"></script>
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="js/markerwithlabel.js"></script>


    <!--<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>-->

</head>

<body>

<style type="text/css">

table{

    border-spacing: 10px;
    border-collapse: collapse;
}

th,td,tr{

    border: 1px solid red;
    color: black;
    margin-top: 10px;
    font-weight: bold;
    padding: 5px 5px 2px 3px;
}

#pesos{

    background-color: white;
    border: 1px solid white;
}


.clapesos{

    text-align: center;
}


#fondo {
  width: 100%; height: 100%; position: absolute; top: 0px; left: 0px; z-index: 990;opacity: 0.8;background:#000;
}
#flotante {
  z-index: 90; border: 8px solid #fff; margin-top: -100%; left: 40%;
  padding: 0px; position: fixed; width: auto; height:auto; background-color: #fff; border-radius: 3px;
}


</style>


<header id="navigation" class="navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <!-- responsive nav button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->
                <!-- logo -->
                <h1 class="navbar-brand">
                    <a href="#body">
                        <img src="images/logo.png" alt="Kasper Logo">
                    </a>
                </h1>
                <!-- /logo -->
            </div>
                <!-- main nav -->
                <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li class="current"><a href="#home">HOME</a></li>
                        <li><a href="javascript:void(0);" onclick="INICIAR_SESION();return false;">Mapa</a></li>



                    </ul>
                </nav>
                <!-- /main nav -->
        </div>
</header>

<section id="home">





  <div id="home-carousel" class="carousel slide" data-interval="false">
         <ol class="carousel-indicators">
         <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
         <li data-target="#home-carousel" data-slide-to="1"></li>
         <li data-target="#home-carousel" data-slide-to="2"></li>
         </ol>

   <div class="carousel-inner">

        <div class="item active"  style="background-image: url('images/barco1.jpg')" >
        <div class="carousel-caption">
        <div class="animated bounceInRight">
        <h2>Sistema de Identificación Automática (AIS) en un Celular</h2>

        </div>
        </div>
        </div>

        <div class="item" style="background-image: url('images/barco3.jpg')">
        <div class="carousel-caption">
        <div class="animated bounceInDown">
        <h2>Integra una solución que permita visualizar el sistema AIS en un celular</h2>

        </div>
        </div>
        </div>

        <div class="item" style="background-image: url('images/barco2.jpg')">
        <div class="carousel-caption">
        <div class="animated bounceInUp">
        <h2>Centralizar los datos en un entorno Web</h2>
        </div>
        </div>
        </div>

    </div>


        <!--/.carousel-inner-->
        <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
        <a class="sl-prev hidden-xs" href="#home-carousel" data-slide="prev">
        <i class="fa fa-angle-left fa-3x"></i>
        </a>
        <a class="sl-next" href="#home-carousel" data-slide="next">
        <i class="fa fa-angle-right fa-3x"></i>
        </a>
        </nav>

    </div>

</section>




<script src="js/Funciones/CodigoMapa.js"></script>

<script>



function INICIAR_SESION() {

  var a = document.createElement("a");
  //a.target = "_blank";
  a.href = "http://aisproject.ddns.net/mapa.php";
  //a.href = "http://localhost/AWS-master/INICIAR_SESION/inicio_sesion.php";
  // a.href = "http://localhost/AWS/INICIAR_SESION/inicio_sesion.php";

  a.click();
}


// function REGISTRAR() {
//
//   var a = document.createElement("a");
//   a.target = "_blank";
//   a.href = "http://ticollcloud.ddns.net/AWS/INICIAR_SESION/popup.htm";
//   a.click();
// }

</script>
</body>
</html>
