<?php

include("ConexionMySQL.php");

date_default_timezone_set('America/Bogota');
$fecha_servidor = date('Y-m-d H:i:s');
$suma=0;
$muestras=10;
if ($_POST['Cargo']=="admin"){
	$consulta=mysql_query("SELECT PESO_TOTAL FROM $_POST[Usuario] WHERE ID_VEHICULO='$_POST[Vehiculo]' ORDER BY ID DESC LIMIT $muestras ") or die("Problemas en consulta: ".mysql_error());
	while($reg=mysql_fetch_array($consulta)){	$suma=$suma+$reg['PESO_TOTAL'];		}
	mysql_free_result($consulta);
}else{
	$consulta1=mysql_query("SELECT empresa FROM admin WHERE user='$_POST[Usuario]'") or die("Problemas en consulta: ".mysql_error());
	$reg=mysql_fetch_array($consulta1);
	$empresa = $reg['empresa'];
	$consulta2=mysql_query("SELECT user FROM admin WHERE empresa='$empresa' AND cargo='admin'") or die("Problemas en consulta: ".mysql_error());
	$reg=mysql_fetch_array($consulta2);
	$user = $reg['user'];
	$consulta3=mysql_query("SELECT PESO_TOTAL FROM $user WHERE ID_VEHICULO='$_POST[Vehiculo]' ORDER BY ID DESC LIMIT $muestras") or die("Problemas en consulta: ".mysql_error());
	while($reg=mysql_fetch_array($consulta3)){ $suma=$suma+$reg['PESO_TOTAL'];}

	mysql_free_result($consulta1);
	mysql_free_result($consulta2);
	mysql_free_result($consulta3);
}
$prom=$suma/$muestras;
echo $prom;
mysql_close($conexion);

?>
