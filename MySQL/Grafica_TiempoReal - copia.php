<?php
session_start();
$fecha_hora_serv=$_SESSION['Hora_Servidor'];
include("ConexionMySQL.php");


    $data_points = array();
    $i=0;
    $consulta=mysql_query("SELECT LATITUD,LONGITUD,FECHA_HORA,PESO_TOTAL  FROM $_SESSION[user] WHERE FECHA_HORA between '$fecha_hora_serv' and '2017-05-19 23:59:59'") or die("Problemas en consulta: ".mysql_error());
    while ($row = mysql_fetch_array($consulta)) {
         $i=$i+1;
        $point = array("valorx" => $i,"valory" => $row['PESO_TOTAL']);
        array_push($data_points, $point);

    }
echo json_encode($data_points);
mysql_free_result($consulta);
mysql_close($conexion);
?>
