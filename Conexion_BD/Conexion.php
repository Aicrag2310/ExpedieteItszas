<?php

$host = "localhost";
$user = "root";
$pass="";
$database="expediente_itszas";

$conexion=mysqli_connect($host,$user,$pass,$database);

if($conexion)
{
    //echo "CONEXION EXISTOSA!!!";

}
else
{
    //echo "No se puede establecer una conexion";
}


?>
