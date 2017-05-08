<?php
	$conexion = @mysql_connect("localhost","root","steven1509") or die("No se encontró el servidor");
	mysql_select_db("ais",$conexion)or die("No se encontró la base de datos");
?>
