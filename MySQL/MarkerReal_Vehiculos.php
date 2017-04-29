<?php
session_start();
include("ConexionMySQL.php");

$Usuarios=$_POST['Users'];
$Marcados=$_POST['Marcas'];
$query=" ";
$union=" UNION ALL ";
$toco=false;
$tabla=array();

for ($i=0;$i<count($Usuarios);$i++){

if($Marcados[$i]=="true"){

   if($toco){       $query.=$union;       }

   $query.="(	SELECT LATITUD  FROM $_SESSION[user]    WHERE ID_VEHICULO='".$Usuarios[$i][0]."'	ORDER BY ID DESC LIMIT 1) ";
   $query.=$union;
   $query.="(	SELECT LONGITUD  FROM $_SESSION[user]    WHERE ID_VEHICULO='".$Usuarios[$i][0]."'	ORDER BY ID DESC LIMIT 1) ";
   $query.=$union;
   $query.="(	SELECT FECHA_HORA  FROM $_SESSION[user]    WHERE ID_VEHICULO='".$Usuarios[$i][0]."'	ORDER BY ID DESC LIMIT 1) ";
   //$query.=$union;
   //$query.="(	SELECT PESO_TOTAL  FROM $_SESSION[user]    WHERE ID_VEHICULO='".$Usuarios[$i][0]."'	ORDER BY ID DESC LIMIT 1) ";
   $toco=true;

   }

}

$consulta=mysql_query($query) or die("Empty");
$i=0;
while($reg=mysql_fetch_array($consulta)){

	$tabla[$i]=$reg;
	$i++;
}

echo json_encode($tabla);
mysql_free_result($consulta);
mysql_close($conexion);



?>
