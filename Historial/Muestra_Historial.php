<?php

include '../Conexion_BD/Conexion.php';


$consulta=$conexion->query("SELECT 
                          `No_Consulta`, 
                          `No_Paciente`, 
                          `Hora_inicio`, 
                          `Hora_end`, 
                          `Fecha` 
                          FROM `consultas` 
                          WHERE `No_Paciente`='$id_paciente'");
?>
  <?php




  while ($row=$consulta->fetch_array()) {
    $datos=$row[0]
    ?>
     
    <tr>
    <td><?php echo $row['No_Consulta']; ?>
   
    <td><?php echo $row['Hora_inicio']; ?>
    
    <td><?php echo $row['Hora_end']; ?>
    
    <td><?php echo $row['Fecha']; ?>
 
    
    <td>
    <button type='submit' name='archivo' value=<?php echo $row['No_Consulta'] ?>>
    <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
    </button></td> 
    </tr>
   
    
    <?php

 }




?>