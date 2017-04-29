<?php
session_start();
include("ConexionMySQL.php");

$fecha_start=$_POST['FechaInicio']." ".$_POST['HoraInicio'];
$fecha_end=$_POST['FechaFinal']." ".$_POST['HoraFinal'];

$MetrosRedonda=floatval($_POST['Metros']);
$Latitud_Marker=$_POST['LatitudMarker'];
$Longitud_Marker=$_POST['LongitudMarker'];

$consulta=mysql_query("SELECT LATITUD,LONGITUD,FECHA_HORA,PESO_TOTAL FROM $_SESSION[user] where ID_VEHICULO='$_POST[Vehiculo]' AND FECHA_HORA between  '$fecha_start' and '$fecha_end' ") or die("Problemas en consulta: ".mysql_error());

$tabla=array();
$i=0;
while($reg=mysql_fetch_array($consulta)){

$Dif_Latitud=abs(floatval($Latitud_Marker)-floatval($reg['LATITUD']));
$Dif_Longitud=abs(floatval($Longitud_Marker)-floatval($reg['LONGITUD']));
$Distancia_Metros=110000*(sqrt(($Dif_Latitud*$Dif_Latitud)+($Dif_Longitud*$Dif_Longitud)));

if ($Distancia_Metros<$MetrosRedonda){

$tabla[$i]=$reg;
$i++;
}
}

echo json_encode($tabla);
mysql_free_result($consulta);
mysql_close($conexion);
?>
