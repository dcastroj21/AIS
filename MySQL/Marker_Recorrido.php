<?php

include("ConexionMySQL.php");

date_default_timezone_set('America/Bogota');
$fecha_servidor = date('Y-m-d H:i:s');

if ($_POST['Cargo']=="admin"){
	$consulta=mysql_query("SELECT LATITUD,LONGITUD,FECHA_HORA,PESO_TOTAL,VEL FROM $_POST[Usuario] WHERE ID_VEHICULO='$_POST[Vehiculo]' ORDER BY ID DESC LIMIT 1 ") or die("Problemas en consulta: ".mysql_error());
	while($reg=mysql_fetch_array($consulta)){		$tabla=$reg;		}
	mysql_free_result($consulta);

}else{
	$consulta1=mysql_query("SELECT empresa FROM admin WHERE user='$_POST[Usuario]'") or die("Problemas en consulta: ".mysql_error());
	$reg=mysql_fetch_array($consulta1);
	$empresa = $reg['empresa'];
	$consulta2=mysql_query("SELECT user FROM admin WHERE empresa='$empresa' AND cargo='admin'") or die("Problemas en consulta: ".mysql_error());
	$reg=mysql_fetch_array($consulta2);
	$user = $reg['user'];
	$consulta3=mysql_query("SELECT LATITUD,LONGITUD,FECHA_HORA,PESO_TOTAL,VEL FROM $user WHERE ID_VEHICULO='$_POST[Vehiculo]' ORDER BY ID DESC LIMIT 1 ") or die("Problemas en consulta: ".mysql_error());
	$reg=mysql_fetch_array($consulta3);
	$tabla=$reg;
	mysql_free_result($consulta1);
	mysql_free_result($consulta2);
	mysql_free_result($consulta3);
}

echo json_encode($tabla);

mysql_close($conexion);

?>
