<?php
include("ConexionMySQL.php");

$tabla=array();
$i=0;


$consulta=mysql_query("SELECT mmsi FROM datos GROUP BY mmsi") or die("Problemas en consulta: ".mysql_error());
    while($reg=mysql_fetch_array($consulta)){

	$tabla[$i]=$reg['mmsi'];
	$i++;
}

echo json_encode($tabla);

mysql_free_result($consulta);
mysql_close($conexion);


?>
