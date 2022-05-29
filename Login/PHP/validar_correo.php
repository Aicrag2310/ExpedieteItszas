<?php
include_once '../Conexion/conexion_bd.php';
Conexion::connectar();
include_once "../Conexion/Usuarios.php";
include_once 'enviar_correo_con_contrasena.php';

$obj = new correo_clase();



$datos = array(
    $_POST['correo']
);

if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $datos[0])){
    echo $obj->validar_correo($datos);
}
else{
    echo "Correo Mal escrito";
}

