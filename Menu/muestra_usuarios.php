<html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="eliminar.js"></script>
<?php
include '../Conexion_BD/Conexion.php';

$consulta=$conexion->query("SELECT `ID_User`,
`Nombre_Usuario`,
`Nombre`, 
`Apellido1`, 
`Apellido2`, 
`Nombre_Usuario`,
`Cedula`, 
`Especialidad`,  
`Contrasena`, 
`Correo`,
`EscudoUniversidad` 
FROM `usuarios`");
?>
  <?php

  while ($row=$consulta->fetch_array()) {
    $datos=$row[0];
    $foto=$row['EscudoUniversidad'];
    ?>
    <tr>
    <td><?php echo $row['Nombre_Usuario']; ?></td>
    <td><?php echo $row['Nombre']; ?></td>
    <td><?php echo $row['Apellido1']; ?></td>
    <td><?php echo $row['Apellido2']; ?></td>
    <td><?php echo $row['Cedula']; ?></td>
    <td><?php echo $row['Especialidad']; ?></td>
    <td><?php echo $row['Correo']; ?></td>
    <td><?php echo $row['Contrasena']; ?></td>
    <td><?php echo '<img src = "data:image/png;base64,' . base64_encode($foto) . '" width = "100px" height = "100px"/>'; ?></td>
    <td><a href="editar.php?id=<?php echo $row['ID_User'] ?>" class="editar" id="editar">Editar</a>
    <a onclick="Alertaeliminacion('<?php echo $row['ID_User'] ?>')"  class="eliminar" id="eliminar">Eliminar</a></td>
    </tr>
    <?php
 }




?>