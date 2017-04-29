<?php
session_start();
if(!isset($_SESSION['user'])) {   echo '<script> window.location="INICIAR_SESION/inicio_sesion.php"; </script>';   }

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">

      <meta name="description" content="math.js | basic usage">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.5.3/math.min.js"></script>
    <title>Ticoll</title>
    <link rel="shortcut icon" href="images/taxi6.ico">

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


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
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

table{    border-spacing: 10px;    border-collapse: collapse;}
th,td,tr{    border: 1px solid red;    color: black;    margin-top: 10px;    font-weight: bold;    padding: 5px 5px 2px 3px;}
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

 <input type = "button" class="Botones_Mapa" id="Marcar_Recorrido" value="Marcar Recorrido" onclick="flotante(1)">
 <input type = "button" class="Botones_Mapa" id="Reporte_Recorrido" value="Reporte Recorrido" onclick="flotante(6)">
 <input type = "button" class="Botones_Mapa" id="Boton_Rutas" value = "Cargar Recorrido" onclick="flotante(4);"/>
 <input type = "button" class="Botones_Mapa" id="Boton_Real24" value="Tiempo Real" onclick="flotante(3);">
 <input type ="button"  class="Botones_Mapa" id="Boton_grafica" value = 'Grafica tiempo real' onclick="promptForTwo(); return false;"/>

 <input type ="button" class="Botones_Zero" id="Boton_Zero" value = 'ZERO' onclick="Zero();"/>

 <input type = "button" class="Botones_Mapa" id="btHist" value="Historico" onclick="flotante(5)">
 <input type = "button" class="Botones_Mapa" id="Cerrar_Sesion" value="Cerrar Sesion" onclick="CerrarSesion();">

 <select id="seleccion" onChange="Centrar()"><option>Centrar Mapa</option></select>
 <p class="auto"><input type="text" id="autoc"/></p>

<div id="ListaPesos"> </div>

<div id="ListaPesos3">  <div id="ListaPesos2"></div>   </div>

<!--<h1>Ventana flotante animada con javascript y jquery</h1>
<h3><a onClick="flotante(1)">Abrir ventana</a></h3>-->

<div id="contenedor2" style="display:none">

  <div id="flotante"><h3>Seleccione el vehiculo</h3>
      <div id="ListaCheckBoxes"></div>
      <h5 style="margin-left:48%;margin-top:-14.5%;position:absolute;"><a onClick="flotante(2)">X</a></h5>
   </div>
  <div id="fondo" onClick="flotante(2);"></div>
</div>

 <h3 style="font: italic bold 12px/15px Georgia, serif;color:red;background-color:white;display:none;width:90px;height:20px;" id="fila_latitud">00.00000</h3>
 <h3 style="font: italic bold 12px/15px Georgia, serif;color:red;background-color:white;display:none;width:90px;height:20px;" id="fila_longitud">-00.00000</h3>
 <h3 style="font: italic bold 12px/15px Georgia, serif;color:red;background-color:white;display:none;width:90px;height:20px;" id="fila_fecha">0000-00-00</h3>
 <h3 style="font: italic bold 12px/15px Georgia, serif;color:red;background-color:white;display:none;width:90px;height:20px;" id="fila_hora"> 00:00:00</h3>
 <h3 style="font: italic bold 12px/15px Georgia, serif;color:red;background-color:white;display:none;width:90px;height:20px;" id="peso">0kg</h3>

 <div id="divmenu" class="AnimacionDerecha">

    <input type="button" id="Cerrar" value="X" onclick="OcultarHistoricos()">

    <div style="display:inline-block;margin: 10px 0px 5px 0px;"> <h4 id="Pulsalo2">Consultar por Tiempo</h4>    </div>

     <div style="display:block;margin: 10px 0px 0px 0px;">
        <h5 class="TextoHistorico">FECHA INICIAL :</h5>
        <h5 id="Fecha_Inicio2" onmouseover="Mostrar_Calendario1();" class="TextoHistorico">0000-00-00</h5>
        <div style="margin:2px" id="Fecha_Inicio" onmouseleave="Ocultar_Calendario1();" ></div>
        <input type="text"  id="Tiempo_Hora1" value="12 AM" class="TextoHistorico"><h5 style="color:white;margin-left:3px;">:</h5>
        <input type="text"  id="Tiempo_Minuto1" value="00" class="TextoHistorico">
     </div>

     <div style="display:block;margin: 10px 0px 0px 0px;">
       <h5 class="TextoHistorico">FECHA FINAL :</h5>
       <h5 id="Fecha_Final2" onmouseover="Mostrar_Calendario2();" class="TextoHistorico">0000-00-00</h5>
       <div  id="Fecha_Final" onmouseleave="Ocultar_Calendario2();"></div>
        <input type="text"  id="Tiempo_Hora2" value="12 AM" class="TextoHistorico"><h5 style="color:white;margin-left:3px;">:</h5>
        <input type="text"  id="Tiempo_Minuto2" value="00" class="TextoHistorico" >
     </div>

     <div style="display:block;margin: 10px 0px 0px 0px;">
        <input id="Boton_Real23" type="button" value="CONSULTAR" onclick="Consulta_Hora_Marker(),OcultarHistoricos()"/>
     </div>

  <!--   <div style="display:block;margin: 10px 0px 0px 0px;">
         <input type="text" id="Saltos" placeholder="Digite salto" style="font-size:13px;">
     </div> -->

     <div style="display:inline-block;margin: 10px 0px 5px 0px;"> <h4 id="Pulsalo2">Consultar por Ubicación</h4>    </div>

     <div style="display:block;margin: 10px 0px 0px -10px;">
        <input type="text" id="Metros" placeholder="Digite metros a la redonda" style="font-size:13px;">
        <!--<input type="checkbox" id="markerfecha2"  onclick="Snap=!Snap;"><h3 id="Pulsalo">Snap</h3> -->
     </div>

     <div style="display:block;margin: 10px 0px 0px 0px;">
       <input type="button" id="Ubicar" value="UBICAR MARKER" onclick="Consulta_Marker_Hora(),OcultarHistoricos()">
     </div>

     <div style="display:inline-block;margin: 10px 0px 10px 0px;">
        <h4 id="Pulsalo2">Combinar Consultas</h4>
        <input type="checkbox" id="markerfecha" onclick="Combinar=!Combinar;">
     </div>

    <!-- <div style="display:block;margin: 10px 0px 5px 0px;">
       <input type="button" id="Distancia_Recorrida" value="Distancia Recorrida" onclick="MostrarDistancia(),OcultarHistoricos()">
     </div> -->

    </div>


 <img id="Imagen" src="images/ajax-loader.gif">

<div id="MenuDistancia">
    <input type="button" id="Cerrar_Distancia" value="X" onclick="OcultarDistancia()">
    <div id="divGraph" style="margin:20px 20px;"></div>

    </div>

 <script type="text/javascript">
 var Usuario = "<?php echo $_SESSION['user']; ?>";
 var Cargo = "<?php echo $_SESSION['cargo']; ?>";
 var Empresa = "<?php echo $_SESSION['empresa']; ?>";
 </script>
 <script src="js/Funciones/CodigoMapa.js"></script>

</body>
</html>
