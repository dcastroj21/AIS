<?php
session_start();
include("ConexionMySQL.php");

$fecha_start=$_POST['FechaInicio']." ".$_POST['HoraInicio'];
$fecha_end=$_POST['FechaFinal']." ".$_POST['HoraFinal'];

$consulta=mysql_query("SELECT LATITUD,LONGITUD,FECHA_HORA FROM $_SESSION[user]
						where ID_VEHICULO='$_POST[Vehiculo]' AND FECHA_HORA between  '$fecha_start' and '$fecha_end'
 						order by  ID asc") or die("Problemas en consulta: ".mysql_error());
$tabla=array();
$i=0;
while($reg=mysql_fetch_array($consulta)){

	$tabla[$i]=$reg;
	$i++;
}

echo json_encode($tabla);
mysql_free_result($consulta);
mysql_close($conexion);


?>
