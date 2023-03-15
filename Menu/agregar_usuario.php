<html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php

include "../Conexion_BD/Conexion.php";

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$correo = $_POST['correo'];



/* Valida usuario */

$repetido=0;
$consulta=$conexion->query("SELECT `ID_User`,`Nombre`, `Apellido1`, `Apellido2`, `Nombre_Usuario`, `Contrasena`, `Correo` FROM `usuarios`");
?>
  <?php
  while ($row=$consulta->fetch_array()) {
    if ($usuario==$row['Nombre_Usuario']){
      $repetido=$repetido+1;
      ?>
    <script>
      Swal.fire({
      icon: 'error',
      title: 'El usuario ya existe',
      text: 'Ingresa un nuevo nombre de usuario',    
})
  </script> <?php

    }
  }






  if ($repetido==0){


$insert = $conexion->query("INSERT INTO `usuarios`(`Nombre`, `Apellido1`, `Apellido2`, `Nombre_Usuario`, 
`Contrasena`, `Correo`) VALUES ('$nombre','$paterno','$materno','$usuario','$contrasena','$correo');");

if ($insert) {
?>
  <script>
     Swal.fire({
      icon: 'success',
      title: 'Usuario agregado correctamente',
      showConfirmButton: false,
      timer: 1500
    }).then((result) => {
      window.location.href = "configuracion.php";

    })

  </script> <?php

          } else {
            echo mysqli_error($conexion);
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
        }
            ?>

</html>