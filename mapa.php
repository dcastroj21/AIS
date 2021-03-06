<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">

      <meta name="description" content="math.js | basic usage">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.5.3/math.min.js"></script>
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

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
    <script src="js/eye.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/layout.js?ver=1.0.2"></script>
    <script src="js/jquery.ui.core.min.js"></script>
    <script src="js/jquery.ui.timepicker.js?v=0.3.3"></script>
    <script src="js/modernizr-2.6.2.min.js"></script>


</head>

<body>
  <h3 style="font: bold 17px Arial, serif;color:black;background-color:transparent;width:350px;height:20px;" id="coordenadas"></h3>

  <input type = "button" class="Botones_Mapa" id="BotonColores" value="Colores" onclick="MostrarColores();">

<div id="colores" style="display:none" >
  <table style="border=1;border-spacing: 10px;    border-collapse: collapse;">

<tr>
  <th style="text-align:center;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Color</th>
  <th style="text-align:center;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Tipo</th> </tr>

<tr >   <td style="background-color:green;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Cargo</td></tr>
<tr>    <td style="background-color:red;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Tanker</td></tr>
<tr>    <td style="background-color:yellow;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Hsc</td></tr>
<tr>    <td style="background-color:darkblue;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Passenger</td></tr>
<tr>    <td style="background-color:cyan;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">TugAndSpecial</td></tr>
<tr>    <td style="background-color:NavajoWhite;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Fishing</td></tr>
<tr>    <td style="background-color:magenta;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Pleasure</td></tr>
<tr>    <td style="background-color:gray;border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;"></td>
        <td style="border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;">Unespecified</td></tr>
</table>
</div>



<!-- th,td,tr{    border: 1px solid red;color: black;margin-top: 10px;font-weight: bold;padding: 5px 5px 2px 3px;} -->





<style type="text/css">


#pesos{    background-color: white;    border: 1px solid white;}
.clapesos{    text-align: center;}

a {
	cursor:pointer;
}

#fondo {
	width: 100%; height: 100%; position: absolute; top: 0px; left: 0px; z-index: 990;opacity: 0.8;background:#000;
}
#flotante {
	z-index: 999; border: 8px solid #fff; margin-top: -100%; left: 40%;
  padding: 0px; position: fixed; width: auto; height:auto; background-color: #fff; border-radius: 3px;
}
</style>


 <div id="googleMap"></div>


  <script src="js/Funciones/CodigoMapa.js"></script>

</body>
</html>
