<?php

include("ConexionMySQL.php");

date_default_timezone_set('America/Bogota');

if ($_POST['Modo']=="Guardar"){

$fecha_servidor = '2016-11-09 22:59:43';

$consulta1=mysql_query("SELECT empresa FROM admin WHERE user='$_POST[Placa]'") or die("Problemas en consulta: ".mysql_error());
$reg=mysql_fetch_array($consulta1);
$empresa = $reg['empresa'];
$consulta2=mysql_query("SELECT user FROM admin WHERE empresa='$empresa' AND cargo='admin'") or die("Problemas en consulta: ".mysql_error());
$reg=mysql_fetch_array($consulta2);
$user = $reg['user'];

$conss = mysql_query("INSERT INTO Recorridos_Terminados (EMPRESA,ADMIN,PLACA,FECHA_INICIO,FECHA_FIN,DIRECCIONES,PESOS,LLEGADA,SALIDA,CAMINO) VALUES('$_POST[Empresa]','$user','$_POST[Placa]','$_POST[Fecha_Inicio]','$fecha_servidor','$_POST[Direcciones]','$_POST[Pesos]','$_POST[Llegada]','$_POST[Salida]','$_POST[Camino]')");

mysql_free_result($consulta2);
}else{
  $consulta1=mysql_query("SELECT * FROM Recorridos_Terminados WHERE id='$_POST[ID]'") or die("Problemas en consulta: ".mysql_error());
  $reg=mysql_fetch_array($consulta1);
  echo json_encode($reg);
}
mysql_free_result($consulta1);
mysql_close($conexion);

?>
