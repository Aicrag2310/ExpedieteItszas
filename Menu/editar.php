
<?php
$title = "Expediente Clinico ITSZaS";

include ('../Menu/menu_cabecera.php');
include "../Conexion_BD/Conexion.php";

?>

  <head>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="estilo_editar.css">
    <div class="aside3">
  <div id="pointer"></div>
  <h2 id="TextoAgenda" id="atras1">Configuración</h2>
</div>
<div class="aside 2">
<?php

?>
</div>

<div class="container">
<script src="Datos_Del_Paciente.js"></script>
<style>
      #scroll {
        overflow-y: scroll;
        overflow-x: hidden;
      }
    </style>
<?php 
  #include 'Datos_Del_Paciente.php'
  ?>
    <!-- DIVISION PARA MANIPULAR EL FORMULARIO-->
    <div class="containerDat">
      <header>Editar usuario</header>

        <form action="" method="post" enctype="multipart/form-data" id="scroll">
        <div class="form first">
          <div class="details personal">
      
          <?php 
          
include '../Conexion_BD/Conexion.php';

$id=$_GET['id'];
$consulta=$conexion->query("SELECT `ID_User`,
                            `Nombre`, 
                            `Apellido1`, 
                            `Apellido2`, 
                            `Nombre_Usuario`, 
                            `Contrasena`, 
                            `Correo`,
                            `Cedula`,
                            `Especialidad`,
                            `EscudoUniversidad`   
                            FROM `usuarios` 
                            WHERE ID_User='$id'");

          while ($row=$consulta->fetch_array()) {
    $datos=$row[0];
    $foto=$row['EscudoUniversidad'];
    ?>

            <input type="hidden" name="numuser" value="<?php echo $row['ID_User']?>">

            <div class="fields">
              <div class="input-field">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?php echo $row['Nombre']?>"  required/>
              </div>

              <div class="input-field">
                <label>Apellido paterno</label>
                <input type="text" name="paterno" value="<?php echo $row['Apellido1']?>"  required/>
              </div>

              <div class="input-field">
                <label>Apellido materno</label>
                <input type="text" name="materno" value="<?php echo $row['Apellido2']?>"required />
              </div>

              <div class="input-field">
                <label>Cedula</label>
                <input type="text" name="cedula" value="<?php echo $row['Cedula']?>" required/>
              </div>

              <div class="input-field">
                <label>Especialidad</label>
                <input type="text" name="especialidad" value="<?php echo $row['Especialidad']?>" required/>
              </div>

              <div class="input-field">
                <label>Nombre de usuario</label>
                <input type="text" name="usuario" value="<?php echo $row['Nombre_Usuario']?>"required />
              </div>

              <div class="input-field">
                <label>Contraseña</label>
                <input type="text" name="contrasena" value="<?php echo $row['Contrasena']?> "required />
              </div>

              <div class="input-field">
                <label>Correo electrónico</label>
                <input type="text" name="correo" value="<?php echo $row['Correo']?>" required />
              </div>

              <div class="input-field">
                <label>Escudo de la universidad</label>
                <?php echo '<img src = "data:image/png;base64,' . base64_encode($foto) . '" width = "150px" height = "150px"/>'; ?>
              </div>

              <div class="input-field">
              <label>Nueva seleccion de logo</label>
                <input type="file" id="FotoUni" name="FotoUni" required accept="image/png, .jpeg, .jpg"/>
                <!--<input type="submit" name="submit" value="UPLOAD"/>-->
              </div>

          <?php 
          }
          ?>
            </div>
          </div>

          <div>

          <button class="nextBtn" id="boton" type="submit" name="boton">
            <span class="btnText">Editar</span>
            <i class="uil uil-navigator"></i>
    
          </button>

            <a href="../Menu/Configuracion.php" class="bubbly-button" id="limpiar" align="center">Regresar</a>

          </div>
          
          </form>
       
        </div>
        
 
    </div>

  </body>
  <?php
  if (isset($_POST['boton'])){
   
    $id=$_POST['numuser'];
    //echo $id;
    $nombre=$_POST['nombre'];
    //echo $nombre;
    $paterno=$_POST['paterno'];
    //echo $paterno;
    $materno=$_POST['materno'];
    //echo $materno;
    $usuario=$_POST['usuario'];
    //echo $usuario;
    $contrasena=$_POST['contrasena'];
    //echo $contrasena;
    $correo=$_POST['correo'];
    //echo $correo;
    $especialidad=$_POST['especialidad'];
    $cedula=$_POST['cedula'];

    $image = $_FILES['FotoUni']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($image));


    $ConsultaInicial =$conexion->query("SELECT * FROM `usuarios` WHERE `ID_User` = '$id'");
    while ($row=$ConsultaInicial->fetch_array()) {
      $datos=$row[0];
      $ImagenBase=$row['EscudoUniversidad'];
    }
    
      #$image = base64_encode($ImagenBase);
      $editar = $conexion->query("UPDATE `usuarios` 
                              SET `Nombre`='$nombre',
                              `Apellido1`='$paterno',
                              `Apellido2`='$materno',
                              `Nombre_Usuario`='$usuario',
                              `Contrasena`='$contrasena',
                              `Correo`='$correo', 
                              `Cedula`='$cedula', 
                              `Especialidad`='$especialidad',
                              `EscudoUniversidad` = '$imgContenido'
                              WHERE ID_User='$id';");
    
    if($editar){
        ?>
        <script>
        Swal.fire({
        icon: 'success',
        title: 'Usuario editado correctamente',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location.href = "configuracion.php";

        })
        </script>  <?php
          sleep(1);
      }
      else{
         ?>
          <script>
          Swal.fire({
          icon: 'error',
          title: 'Error al agregar usuario', 
          showConfirmButton: false,   
          timer: 1500
          })
          </script> <?php
      }
    
    
  }
    
    
    
    
  ?>
</html>
