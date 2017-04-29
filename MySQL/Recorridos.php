<?php

include("ConexionMySQL.php");

date_default_timezone_set('America/Bogota');
$fecha_servidor = date('Y-m-d H:i:s');

if ($_POST['Modo']=="Guardar"){
mysql_query("INSERT INTO Recorridos (USUARIO,VEHICULO,RECORRIDO,FECHA) VALUES('$_POST[Usuario]','$_POST[Vehiculo]','$_POST[Recorrido]','$fecha_servidor')");
}else{

	$consulta=mysql_query("SELECT USUARIO,VEHICULO,RECORRIDO,FECHA FROM Recorridos WHERE VEHICULO='$_POST[Vehiculo]' ORDER BY ID DESC LIMIT 1 ") or die("Problemas en consulta: ".mysql_error());

	while($reg=mysql_fetch_array($consulta)){		$tabla=$reg;		}

	echo json_encode($tabla);
	mysql_free_result($consulta);
}
mysql_close($conexion);


?>
