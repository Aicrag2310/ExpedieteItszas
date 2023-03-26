<?php

include '../Conexion_BD/Conexion.php';


$consulta=$conexion->query("SELECT * FROM `archivos_expediente` WHERE `No_Paciente`='$id_paciente'");
?>
  <?php



  while ($row=$consulta->fetch_array()) {
    $datos=$row[0];
    $foto=$row['Imagen'];
    ?>
    <tr>

    <div class="input-imagen">
                    <?php
                    echo '<td>' .
                    '<img src = "data:image/png;base64,' . base64_encode($foto) . '" width = "150px" height = "150px"/>'
                    . '</td>';
                    ?>
    <td>
    <button type='submit' name='eliminaimagen' value=<?php echo $row['Id_Imagen'] ?>>
    <img src="https://img.icons8.com/color/30/000000/remove-image.png"/>
    </button></td> 
  
    </tr>
    <?php





 }




?>