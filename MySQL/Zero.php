<?php

include("ConexionMySQL.php");
$consulta=mysql_query("SELECT PESO_1,PESO_2 FROM $_POST[Usuario] WHERE ID_VEHICULO='$_POST[Vehiculo]' ORDER BY ID DESC LIMIT 1 ") or die("Problemas en consulta: ".mysql_error());
$tabla = mysql_fetch_array($consulta);
$p1 = $tabla['PESO_1'];
$p2   = $tabla['PESO_2'];
$pes_total = $p1+$p2;
$consulta1=mysql_query("SELECT ZERO FROM Formulas") or die("Problemas en consulta: ".mysql_error());
$tabla = mysql_fetch_array($consulta1);
$zero = $tabla['ZERO'];
echo $zero;
$diff = $pes_total-$zero;
echo $diff;
mysql_query("UPDATE `Formulas` SET `DIFERENCIA` = $diff WHERE `Formulas`.`ID` = 1");
mysql_free_result($consulta);
mysql_free_result($consulta1);
mysql_close($conexion);


?>
