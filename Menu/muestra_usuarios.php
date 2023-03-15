<html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="eliminar.js"></script>

<?php

include '../Conexion_BD/Conexion.php';


$consulta=$conexion->query("SELECT `ID_User`,`Nombre`, `Apellido1`, `Apellido2`, `Nombre_Usuario`, `Contrasena`, `Correo` FROM `usuarios`");
?>
  <?php

  while ($row=$consulta->fetch_array()) {
    $datos=$row[0]
    ?>
    <tr>
    <td><?php echo $row['Nombre']; ?>
   
    <td><?php echo $row['Apellido1']; ?>
    
    <td><?php echo $row['Apellido2']; ?>
    
    <td><?php echo $row['Correo']; ?>
    
    <th><a href="editar.php?id=<?php echo $row['ID_User'] ?>" class="editar" id="editar">Editar</a></th>
    <th><a onclick="Alertaeliminacion('<?php echo $row['ID_User'] ?>')"  class="eliminar" id="eliminar">Eliminar</a></th></td> 
    </tr>
    <?php
 }




?>