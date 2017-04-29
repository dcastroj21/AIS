<?php
	$conexion = @mysql_connect("localhost","root","ticoll") or die("No se encontró el servidor");
	mysql_select_db("diseno",$conexion)or die("No se encontró la base de datos");
?>
