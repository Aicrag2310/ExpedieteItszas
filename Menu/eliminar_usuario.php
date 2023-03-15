<html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php

include "../Conexion_BD/Conexion.php";

$elimina=$_POST['id'];
    //echo $elimina;
    

$eliminar = $conexion->query("DELETE FROM `usuarios` WHERE ID_User='$elimina';");


if($eliminar){
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



 
  ?>

</html>