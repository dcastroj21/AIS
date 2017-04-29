<?php
include("ConexionMySQL.php");

$consulta=mysql_query("SELECT LATITUD,LONGITUD,FECHA_HORA FROM $_POST[Usuario] where ID_VEHICULO='$_POST[Vehiculo]' ORDER BY ID DESC LIMIT 1") or die("Problemas en consulta: ".mysql_error());
$tabla=array();
$i=0;
$mensaje="";
while($reg=mysql_fetch_array($consulta)){

	$mensaje=$mensaje.$reg['LATITUD'].",".$reg['LONGITUD'].",".$reg['FECHA_HORA'];
	$i++;
}

echo json_encode($mensaje);
mysql_free_result($consulta);
mysql_close($conexion);


?>
