<?php
session_start();
// $fecha_hora_serv=$_SESSION['Hora_Servidor'];
$fecha_hora_serv='2016-11-09 52:40:00';

// $fecha_hora_serv='2016-09-12 12:57:42';
include("ConexionMySQL.php");


    $data_points = array();
    $i=0;
    $suma=0;
    $prom=0;
    $consulta=mysql_query("SELECT ID,LATITUD,LONGITUD,FECHA_HORA FROM JamesLlerena WHERE FECHA_HORA between '$fecha_hora_serv' and '2017-05-19 23:59:59'") or die("Problemas en consulta: ".mysql_error());

    while ($row = mysql_fetch_array($consulta)) {
         $i=$i+1;
         $suma=0;
         $resta=$row['ID'];
        $consulta1=mysql_query("SELECT PESO_TOTAL FROM JamesLlerena WHERE ID=$resta ") or die("Problemas en consulta: ".mysql_error());

    while ($row1 = mysql_fetch_array($consulta1)) {
            $suma=$suma+$row1['PESO_TOTAL'];
          }
          $prom=$suma/1;
        $point = array("valorx" => $i,"valory" => $prom);
        array_push($data_points, $point);

    }

    echo json_encode($data_points);
mysql_free_result($consulta);
mysql_close($conexion);
?>
