<?php
include("ConexionMySQL.php");

$tabla=array();
$i=0;


$consulta=mysql_query("SELECT id,nombre,mmsi,status,latitud,longitud,velocidad,curso,max(fecha) FROM datos GROUP BY mmsi") or die("Problemas en consulta: ".mysql_error());

// Select id,mmsi,status,latitud,max(fecha) From datos Group By mmsi
    while($reg=mysql_fetch_array($consulta)){

	$tabla[$i]=$reg;
	$i++;
}

echo json_encode($tabla);

mysql_free_result($consulta);
mysql_close($conexion);


?>
