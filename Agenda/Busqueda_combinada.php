
<?php
include '../Conexion_BD/Conexion.php';
 
   if (isset($_POST['enviar'])) {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    echo $fechaInicio . " y ". $fechaFin;
    $consulta =$conexion->query ( "SELECT C.No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, Hora_inicio, Hora_end, DP.Sexo, Fecha, DP.CURP,DP.Carrera 
        FROM `consultas` C 
        INNER JOIN `datosgen_paciente` DP ON C.No_Paciente = DP.No_Paciente
        WHERE Fecha BETWEEN '$fechaInicio' AND '$fechaFin'");
    while ($row=$consulta->fetch_array()) {
      ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Carrera']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a=1; ?>
      </tr>
      <?php
   }
  }
  else{
    
  $consulta = $conexion->query( "select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
  Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP,DP.Carrera
    from `consultas` C 
    inner join  `datosgen_paciente` DP
    on C.No_Paciente = DP.No_Paciente; ");
  while ($row=$consulta->fetch_array()) {
    ?>
    <tr>
      <td><?php echo $row['CURP']; ?></td>
      <td><?php echo $row['No_Consulta']; ?></td>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Carrera']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td><?php echo $row['Fecha']; ?></td>
      <?php $a=1; ?>
    </tr>
    <?php
   }
  }