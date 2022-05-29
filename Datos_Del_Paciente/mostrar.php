<?php

$NumControl = $_POST['nControl'];

include 'Conexion.php';

$consulta=$conexion->query("SELECT * FROM datosgen_paciente WHERE No_Paciente='$NumControl'");
while ($row=$consulta->fetch_array()) {
    ?>
    <tr>
        
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['ID_Direccion']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
    </tr>
    <?php
}
?>