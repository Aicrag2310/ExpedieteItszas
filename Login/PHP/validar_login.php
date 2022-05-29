<?php
include_once '../Conexion/conexion_bd.php';
Conexion :: connectar(); 
include_once "../Conexion/Usuarios.php";

$obj= new usuarios();

$datos=array(
    $_POST['username'],
    $_POST['password']
);



echo $obj->loginUser($datos);

?>