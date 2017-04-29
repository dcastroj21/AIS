<?php

include("ConexionMySQL.php");

if ($_POST['Modo']=="subida"){

    $consulta1=mysql_query("SELECT subida FROM calibracion") or die("Problemas en consulta: ".mysql_error());
    $reg=mysql_fetch_array($consulta1);
    $coef=$reg['subida'];
    echo $coef;
    mysql_free_result($consulta1);
    $consulta3=mysql_query("UPDATE formulas SET coeficientes='$coef'") or die("Problemas en consulta: ".mysql_error());

}else{

    $consulta2=mysql_query("SELECT bajada FROM calibracion") or die("Problemas en consulta: ".mysql_error());
    $reg=mysql_fetch_array($consulta2);
    mysql_free_result($consulta2);
    $coef=$reg['bajada'];
    $consulta4=mysql_query("UPDATE formulas SET coeficientes='$coef'") or die("Problemas en consulta: ".mysql_error());

}
mysql_close($conexion);

?>
