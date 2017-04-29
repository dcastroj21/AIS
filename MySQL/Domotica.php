<?php
session_start();
include("ConexionMySQL.php");

$consulta=mysql_query("INSERT INTO  Formulas (COEFICIENTES) VALUES (3)");

mysql_free_result($consulta);
mysql_close($conexion);


?>
