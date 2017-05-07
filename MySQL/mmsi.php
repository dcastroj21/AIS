<?php
include("ConexionMySQL.php");

$tabla=array();
$i=0;


// $consulta=mysql_query("SELECT id,nombre,mmsi,status,latitud,longitud,velocidad,curso,max(fecha) FROM datos GROUP BY mmsi") or die("Problemas en consulta: ".mysql_error());
$consulta=mysql_query("Select T1.* From datos As T1 Inner Join (Select mmsi, Max(fecha) As Max_Fecha From datos Group By mmsi order by mmsi) As T2 On T1.mmsi = T2.mmsi And T1.fecha = T2.Max_Fecha") or die("Problemas en consulta: ".mysql_error());



// Select id,mmsi,status,latitud,max(fecha) From datos Group By mmsi
    while($reg=mysql_fetch_array($consulta)){

	$tabla[$i]=$reg;
	$i++;
}

echo json_encode($tabla);

mysql_free_result($consulta);
mysql_close($conexion);


?>
