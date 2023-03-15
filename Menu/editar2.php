

<html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<?php

include "../Conexion_BD/Conexion.php";

     
$id=$_POST['numuser'];
//echo $id;
$nombre=$_POST['nombre'];
//echo $nombre;
$paterno=$_POST['paterno'];
//echo $paterno;
$materno=$_POST['materno'];
//echo $materno;
$usuario=$_POST['usuario'];
//echo $usuario;
$contrasena=$_POST['contrasena'];
//echo $contrasena;
$correo=$_POST['correo'];
//echo $correo;



$editar = $conexion->query("UPDATE `usuarios` SET `Nombre`='$nombre',`Apellido1`='$paterno',
`Apellido2`='$materno',`Nombre_Usuario`='$usuario',`Contrasena`='$contrasena',`Correo`='$correo' WHERE ID_User='$id';");



if($editar){
    ?>
    <script>
    Swal.fire({
    icon: 'success',
    title: 'Usuario eliminado correctamente',
    showConfirmButton: false,
    timer: 1500
    })
    </script>  <?php
      sleep(1);
      header("Location:configuracion.php");
     

   
  }
  else{
     ?>
      <script>
      Swal.fire({
      icon: 'error',
      title: 'Error al agregar usuario', 
      showConfirmButton: false,   
      timer: 1500
      })
      </script> <?php
  }


?>

</html>

