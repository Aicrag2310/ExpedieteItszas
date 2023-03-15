
<?php
include '../Conexion_BD/Conexion.php';
if (isset($_GET['enviar'])) {
   
  $bnombre = $_GET['Nombre'];
  $bmaterno = $_GET['Materno'];
  $bpaterno = $_GET['Paterno'];
  $bsexo = $_GET['Sexo'];
  $Fecha = $_GET['Calendari'];

  $a = 0;

  if ($bnombre == "" && $bmaterno == "" && $bpaterno == "" && $bsexo == "" && $Fecha != "") {

    $consulta = $conexion->query(" call `Busqueda_Calendario` ('$Fecha')");
    echo ("1 ");
    while ($row = $consulta->fetch_array()) {
?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php

    }
  }

  if($bnombre=="" && $bmaterno=="" && $bpaterno=="" && $bsexo=="" && $Fecha == ""){
    $consulta=$conexion->query(" select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
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
            <td><?php echo $row['Hora_inicio']; ?></td>
            <td><?php echo $row['Hora_end']; ?></td>
            <td><?php echo $row['Sexo']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
            <?php $a=1; ?>
          </tr>
          <?php
         }
}

  if ($bnombre != "" && $bmaterno == "" && $bpaterno == "" && $bsexo == "") {
    #echo ("2 ");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
      Hora_inicio, Hora_end, DP.Sexo,Fecha, DP.CURP 
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
       where DP.Nombre='$bnombre' and  C.Fecha = '$Fecha';");
    } else {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
      Hora_inicio, Hora_end, DP.Sexo, Fecha, DP.CURP 
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Nombre='$bnombre';");
    }
    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php

    }
  }

  if ($bnombre == "" && $bmaterno != "" && $bpaterno == "" && $bsexo == "") {
    #echo ("3 ");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
      Hora_inicio, Hora_end, DP.Sexo,Fecha, DP.CURP 
        from `consultas` C 
        inner join  `datosgen_paciente` DP
        on C.No_Paciente = DP.No_Paciente
          where DP.Apellido_Materno='$bmaterno' and C.Fecha= '$Fecha';");
    } else {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP 
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Apellido_Materno='$bmaterno';");
    }


    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }


  if ($bnombre == "" && $bmaterno == "" && $bpaterno != "" && $bsexo == "") {
    #echo ("4 ");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
      Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
        from `consultas` C 
        inner join  `datosgen_paciente` DP
        on C.No_Paciente = DP.No_Paciente
          where DP.Apellido_Paterno='$bpaterno' and C.Fecha= '$Fecha';");
    } else {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
      Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
        from `consultas` C 
        inner join  `datosgen_paciente` DP
        on C.No_Paciente = DP.No_Paciente
          where DP.Apellido_Paterno='$bpaterno';");
    }

    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>  
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }


  if ($bnombre == "" && $bmaterno == "" && $bpaterno == "" && $bsexo != "") {
    #echo ("5 ".$bsexo);
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
      Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
        from `consultas` C 
        inner join  `datosgen_paciente` DP
        on C.No_Paciente = DP.No_Paciente
          where DP.Sexo ='$bsexo' and C.Fecha= '$Fecha' ;");
    } else {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
      Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
        from `consultas` C 
        inner join  `datosgen_paciente` DP
        on C.No_Paciente = DP.No_Paciente
          where DP.Sexo ='$bsexo';");
    }

    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td> 
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }

  if ($bnombre != "" && $bmaterno == "" && $bpaterno != "" && $bsexo == "") {
    #echo ("7 ");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
    from `consultas` C 
    inner join  `datosgen_paciente` DP
    on C.No_Paciente = DP.No_Paciente
      where DP.Nombre ='$bnombre' and  DP.Apellido_Paterno='$bpaterno' and C.Fecha='$Fecha';");
    } else {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
  Hora_inicio, Hora_end, DP.Sexo,Fecha, DP.CURP 
    from `consultas` C 
    inner join  `datosgen_paciente` DP
    on C.No_Paciente = DP.No_Paciente
      where DP.Nombre ='$bnombre' and  DP.Apellido_Paterno='$bpaterno';");
    }

    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td> 
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }

  if ($bnombre != "" && $bmaterno != "" && $bpaterno == "" && $bsexo == "") {
    #echo ("8 ");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP 
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Nombre ='$bnombre' and DP.Apellido_Materno='$bmaterno' and C.Fecha='$Fecha';");
    } else {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP 
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Nombre ='$bnombre' and DP.Apellido_Materno='$bmaterno';");
    }

    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td> 
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }

  if ($bnombre != "" && $bmaterno != "" && $bpaterno != "" && $bsexo == "") {
    #echo ("9");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Nombre ='$bnombre' and DP.Apellido_Materno='$bmaterno' and DP.Apellido_Paterno='$bpaterno' and C.Fecha='$Fecha';");
    } else {
    $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
  Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
    from `consultas` C 
    inner join  `datosgen_paciente` DP
    on C.No_Paciente = DP.No_Paciente
    where DP.Nombre ='$bnombre' and DP.Apellido_Materno='$bmaterno' and DP.Apellido_Paterno='$bpaterno'");
    }
    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }

  if ($bnombre == "" && $bmaterno != "" && $bpaterno != "" && $bsexo == "") {
    #echo ("10 ");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Apellido_Materno='$bmaterno' and DP.Apellido_Paterno='$bpaterno' and C.Fecha='$Fecha';");
    } else {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Apellido_Materno='$bmaterno' and DP.Apellido_Paterno='$bpaterno';");
    }


    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }

  if ($bnombre != "" && $bmaterno != "" && $bpaterno != "" && $bsexo != "" && $Fecha!="") {
    #echo ("11");
    if ($Fecha != "") {
      $consulta = $conexion->query("select No_Consulta, DP.No_Paciente, DP.Nombre, DP.Apellido_Paterno, DP.Apellido_Materno, 
    Hora_inicio, Hora_end, DP.Sexo ,Fecha, DP.CURP
      from `consultas` C 
      inner join  `datosgen_paciente` DP
      on C.No_Paciente = DP.No_Paciente
        where DP.Nombre ='$bnombre' and DP.Apellido_Materno='$bmaterno' and DP.Apellido_Paterno='$bpaterno' and C.Fecha='$Fecha' and DP.Sexo='$bsexo';");
    } 
    while ($row = $consulta->fetch_array()) {
    ?>
      <tr>
        <td><?php echo $row['CURP']; ?></td>
        <td><?php echo $row['No_Consulta']; ?></td>
        <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Hora_inicio']; ?></td>
        <td><?php echo $row['Hora_end']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td><?php echo $row['Fecha']; ?></td>
        <?php $a = 1; ?>
      </tr>
    <?php
    }
  }

  if ($a == 0) {

    ?>
        <script>
        swal("Error", "Sin resultados", "error");
        window.setTimeout(function(){
        $(".alert").fadeTo(2000 ,500).slideUp(500,function(){
          $(this).remove();
        });
      },2300);
  </script>
  <tr>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <td><?php echo '...'; ?></td>
      <?php $a=1; ?>
    </tr>
  <?php
            }
          }

              ?>