<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
include 'Conexion.php';

if(isset($_GET['enviar'])){

  $bnombre=$_GET['Nombre'];
  $bmaterno=$_GET['Materno'];
  $bpaterno=$_GET['Paterno'];
  $bsexo=$_GET['Sexo'];
  $control=$_GET['Control'];
  #echo "sexo".$bsexo;

  $a=0;

  if($bnombre!="" && $bmaterno=="" && $bpaterno=="" && $bsexo=="" && $control==""){
  $consulta=$conexion->query("SELECT * FROM datosgen_paciente WHERE nombre='$bnombre'");

  while ($row=$consulta->fetch_array()) {
    $datos=$row[0]
    ?>
    <tr>
    <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
      <?php $a=1; ?>
    </tr>
    <?php

 }
  }

  if($bnombre=="" && $bmaterno=="" && $control!="" && $bsexo==""){
  
    $consulta=$conexion->query("SELECT * FROM datosgen_paciente WHERE No_Paciente='$control'");
  
    while ($row=$consulta->fetch_array()) {
      $datos=$row[0]
      ?>
      <tr>
      <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
        <td><?php echo $row['Apellido_Materno']; ?></td>
        <td><?php echo $row['Sexo']; ?></td>
        <td>
        <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
        <?php $a=1; ?>
      </tr>
      <?php
  
   }
    }

  if($bnombre=="" && $bmaterno!="" && $bpaterno=="" && $bsexo=="" && $control=="" ){
      $consulta=$conexion->query("SELECT * FROM datosgen_paciente WHERE Apellido_Materno='$bmaterno'");

    while ($row=$consulta->fetch_array()) {
      $datos=$row[0]
      ?>
     <tr>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
      <?php $a=1; ?>
    </tr>
    <?php
   }
    }


  if($bnombre=="" && $bmaterno=="" && $bpaterno!="" && $bsexo=="" && $control==""){
    $consulta=$conexion->query("SELECT * FROM datosgen_paciente WHERE Apellido_Paterno='$bpaterno'");

    while ($row=$consulta->fetch_array()) {
      $datos=$row[0]
      ?>
      <tr>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
      <?php $a=1; ?>
    </tr>
      <?php
    }
    }


  if($bnombre=="" && $bmaterno=="" && $bpaterno=="" && $bsexo!="" && $control==""){
    $consulta=$conexion->query("SELECT * FROM datosgen_paciente WHERE Sexo='$bsexo'");

    while ($row=$consulta->fetch_array()) {
      $datos=$row[0]
      ?>
      <tr>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
      <?php $a=1; ?>
    </tr>
      <?php
    }
    }


  if($bnombre=="" && $bmaterno=="" && $bpaterno=="" && $bsexo=="" && $control==""){
    $consulta=$conexion->query("SELECT * FROM datosgen_paciente");

        while ($row=$consulta->fetch_array()) {
          $datos=$row[0]
          ?>
          <tr>
          <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
            <?php $a=1; ?>
          </tr>
          <?php
         }
}

if($bnombre!="" && $bmaterno=="" && $bpaterno!="" && $bsexo=="" && $control==""){
  $consulta=$conexion->query("SELECT * FROM `datosgen_paciente` WHERE nombre ='$bnombre' and Apellido_Paterno='$bpaterno'");

      while ($row=$consulta->fetch_array()) {
        $datos=$row[0]
        ?>
    <tr>
      <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
            <?php $a=1; ?>
          </tr>
    <?php
      }
}

  if($bnombre!="" && $bmaterno!="" && $bpaterno=="" && $bsexo=="" && $control==""){
    $consulta=$conexion->query("SELECT * FROM `datosgen_paciente` WHERE nombre ='$bnombre' and Apellido_Materno='$bmaterno'");

        while ($row=$consulta->fetch_array()) {
          $datos=$row[0]
          ?>
    <tr>
    <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
            <?php $a=1; ?>
          </tr>
    <?php
        }
}

if($bnombre!="" && $bmaterno!="" && $bpaterno!="" && $bsexo=="" && $control==""){
  $consulta=$conexion->query("SELECT * FROM `datosgen_paciente` WHERE nombre ='$bnombre' and Apellido_Materno='$bmaterno' and Apellido_Paterno='$bpaterno'");

      while ($row=$consulta->fetch_array()) {
        $datos=$row[0]
        ?>
       <tr>
       <td><?php echo $row['No_Paciente']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
				</td>
            <?php $a=1; ?>
          </tr>
        <?php
      }
}

if($bnombre=="" && $bmaterno!="" && $bpaterno!="" && $bsexo=="" && $control==""){
    $consulta=$conexion->query("SELECT * FROM `datosgen_paciente` WHERE Apellido_Materno='$bmaterno' and Apellido_Paterno='$bpaterno'");

        while ($row=$consulta->fetch_array()) {
          $datos=$row[0]
          ?>
          <tr>
          <td><?php echo $row['No_Paciente']; ?></td>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Apellido_Paterno']; ?></td>
      <td><?php echo $row['Apellido_Materno']; ?></td>
      <td><?php echo $row['Sexo']; ?></td>
      <td>
      <button type='submit' value=<?php echo $datos ?> name='nControl'>
      <img img src="https://img.icons8.com/cute-clipart/30/000000/document.png">
      </button>
          
				</td>
            <?php $a=1; ?>
          </tr>
          <?php
        }
  }

  if ($a==0){
    $datos="Nada"

    ?> 
     <script>
        swal("Sin Resultados", "No se han encontrado Resultados", "error");
          window.setTimeout(function(){
            $(".alert").fadeTo(2000 ,500).slideUp(500,function(){
              $(this).remove();
            });
          },2300);
      </script>
      </div>
      <tr>
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
</html>