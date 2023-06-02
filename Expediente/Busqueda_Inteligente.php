
<?php
include '../Conexion_BD/Conexion.php';
$consulta = $conexion->query("SELECT * FROM datosgen_paciente ");

    while ($row = $consulta->fetch_array()) {
      $datos = $row[0]
?>
      <tr>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td>
          <button type='submit' value=<?php echo $datos ?> name='nControl'>
            <img img class="img-container" src="https://img.icons8.com/cute-clipart/30/000000/document.png">
          </button>
        </td>
        <?php $a = 1; ?>
      </tr>
    <?php

    }