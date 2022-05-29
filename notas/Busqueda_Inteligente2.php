<?php
include 'Conexion.php';

if(isset($_GET['enviar'])){

  $bnombre=$_GET['Nombre'];
  $bmaterno=$_GET['Materno'];
  $bpaterno=$_GET['Paterno'];
  $bsexo=$_GET['Sexo'];

  if($bnombre!="" && $bmaterno=="" && $bpaterno=="" && $bsexo==""){
  $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
  Hora_inicio, Hora_end, DP.Sexo , Fecha
    from `Consultas` C 
    inner join  `DatosGen_Paciente` DP
    on C.No_Paciente = DP.No_Paciente
      where DP.Nombre='$bnombre';");

  while ($row=$consulta->fetch_array()) {
    ?>
    <tr>
      <td><?php echo $row['No_Consulta']; ?></td>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Hora_inicio']; ?></td>
      <td><?php echo $row['Hora_end']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td><?php echo $row['Fecha']; ?></td>
    </tr>
    <?php

 }
  }

  if($bnombre=="" && $bmaterno!="" && $bpaterno=="" && $bsexo==""){
    $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo , Fecha
      from `Consultas` C 
      inner join  `DatosGen_Paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Apellido_Materno='$bmaterno';");

    while ($row=$consulta->fetch_array()) {
      ?>
     <tr>
      <td><?php echo $row['No_Consulta']; ?></td>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Hora_inicio']; ?></td>
      <td><?php echo $row['Hora_end']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td><?php echo $row['Fecha']; ?></td>
    </tr>
    <?php
   }
    }
  if($bnombre=="" && $bmaterno=="" && $bpaterno!="" && $bsexo==""){
    $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo , Fecha
      from `Consultas` C 
      inner join  `DatosGen_Paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Apellido_Paterno='$bpaterno';");

    while ($row=$consulta->fetch_array()) {
      ?>
      <tr>
      <td><?php echo $row['No_Consulta']; ?></td>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Hora_inicio']; ?></td>
      <td><?php echo $row['Hora_end']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td><?php echo $row['Fecha']; ?></td>
    </tr>
      <?php
    }
    }


  if($bnombre=="" && $bmaterno=="" && $bpaterno=="" && $bsexo!=""){
    $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo , Fecha
      from `Consultas` C 
      inner join  `DatosGen_Paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Sexo ='$bsexo';");

    while ($row=$consulta->fetch_array()) {
      ?>
      <tr>
      <td><?php echo $row['No_Consulta']; ?></td>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Hora_inicio']; ?></td>
      <td><?php echo $row['Hora_end']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td><?php echo $row['Fecha']; ?></td>
    </tr>
      <?php
    }
    }


  if($bnombre=="" && $bmaterno=="" && $bpaterno=="" && $bsexo==""){
    $consulta=$conexion->query(" select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo , Fecha
      from `Consultas` C 
      inner join  `DatosGen_Paciente` DP
      on C.No_Paciente = DP.No_Paciente; ");

        while ($row=$consulta->fetch_array()) {
          ?>
          <tr>
            <td><?php echo $row['No_Consulta']; ?></td>
            <td><?php echo $row['No_Paciente']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido_Paterno']; ?></td>
            <td><?php echo $row['Apellido_Materno']; ?></td>
            <td><?php echo $row['Hora_inicio']; ?></td>
            <td><?php echo $row['Hora_end']; ?></td>
            <td><?php echo $row['Sexo']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
          </tr>
          <?php
         }
}

if($bnombre!="" && $bmaterno=="" && $bpaterno!="" && $bsexo==""){
  $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
  Hora_inicio, Hora_end, DP.Sexo, Fecha
    from `Consultas` C 
    inner join  `DatosGen_Paciente` DP
    on C.No_Paciente = DP.No_Paciente
      where DP.Nombre ='$bnombre' and  DP.Apellido_Paterno='$bpaterno';");

      while ($row=$consulta->fetch_array()) {
        ?>
    <tr>
            <td><?php echo $row['No_Consulta']; ?></td>
            <td><?php echo $row['No_Paciente']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido_Paterno']; ?></td>
            <td><?php echo $row['Apellido_Materno']; ?></td>
            <td><?php echo $row['Hora_inicio']; ?></td>
            <td><?php echo $row['Hora_end']; ?></td>
            <td><?php echo $row['Sexo']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
          </tr>
    <?php
      }
}

  if($bnombre!="" && $bmaterno!="" && $bpaterno=="" && $bsexo==""){
    $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo , Fecha
      from `Consultas` C 
      inner join  `DatosGen_Paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Nombre ='$bnombre' and DP.Apellido_Materno='$bmaterno';");

        while ($row=$consulta->fetch_array()) {
          ?>
    <tr>
            <td><?php echo $row['No_Consulta']; ?></td>
            <td><?php echo $row['No_Paciente']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido_Paterno']; ?></td>
            <td><?php echo $row['Apellido_Materno']; ?></td>
            <td><?php echo $row['Hora_inicio']; ?></td>
            <td><?php echo $row['Hora_end']; ?></td>
            <td><?php echo $row['Sexo']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
          </tr>
    <?php
        }
}

if($bnombre!="" && $bmaterno!="" && $bpaterno!="" && $bsexo==""){
  $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
  Hora_inicio, Hora_end, DP.Sexo , Fecha
    from `Consultas` C 
    inner join  `DatosGen_Paciente` DP
    on C.No_Paciente = DP.No_Paciente
      where DP.Nombre ='$bnombre' and DP.Apellido_Materno='$bmaterno' and DP.Apellido_Paterno='$bpaterno';");

      while ($row=$consulta->fetch_array()) {
        ?>
       <tr>
            <td><?php echo $row['No_Consulta']; ?></td>
            <td><?php echo $row['No_Paciente']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido_Paterno']; ?></td>
            <td><?php echo $row['Apellido_Materno']; ?></td>
            <td><?php echo $row['Hora_inicio']; ?></td>
            <td><?php echo $row['Hora_end']; ?></td>
            <td><?php echo $row['Sexo']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
          </tr>
        <?php
      }
}

if($bnombre=="" && $bmaterno!="" && $bpaterno!="" && $bsexo==""){
    $consulta=$conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo, Fecha
      from `Consultas` C 
      inner join  `DatosGen_Paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Apellido_Materno='$bmaterno' and DP.Apellido_Paterno='$bpaterno';");

        while ($row=$consulta->fetch_array()) {
          ?>
          <tr>
            <td><?php echo $row['No_Consulta']; ?></td>
            <td><?php echo $row['No_Paciente']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido_Paterno']; ?></td>
            <td><?php echo $row['Apellido_Materno']; ?></td>
            <td><?php echo $row['Hora_inicio']; ?></td>
            <td><?php echo $row['Hora_end']; ?></td>
            <td><?php echo $row['Sexo']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
          </tr>
          <?php
        }
  }

}

?>
