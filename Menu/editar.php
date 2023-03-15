
<?php
$title = "Expediente Clinico ITSZaS";

include ('../Menu/menu_cabecera.php');



?>

  <head>
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

        <form action="editar2.php" method="post" enctype="multipart/form-data" id="scroll">
        <div class="form first">
          <div class="details personal">
      
          <?php 
          
include '../Conexion_BD/Conexion.php';

$id=$_GET['id'];
$consulta=$conexion->query("SELECT `ID_User`,`Nombre`, `Apellido1`, `Apellido2`, `Nombre_Usuario`, `Contrasena`, `Correo` FROM `usuarios` WHERE ID_User=$id");
          while ($row=$consulta->fetch_array()) {
    $datos=$row[0]
    ?>

            <input type="hidden" name="numuser" value="<?php echo $row['ID_User']  ?>">

            <div class="fields">
              <div class="input-field">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?php echo $row['Nombre']?>"  />
              </div>

              
              <div class="input-field">
                <label>Apellido paterno</label>
                <input type="text" name="paterno" value="<?php echo $row['Apellido1']?>"  />
              </div>


              <div class="input-field">
                <label>Apellido materno</label>
                <input type="text" name="materno" value="<?php echo $row['Apellido2']?>" />
              </div>


              <div class="input-field">
                <label>Nombre de usuario</label>
                <input type="text" name="usuario" value="<?php echo $row['Nombre_Usuario']?>" />
              </div>

              <div class="input-field">
                <label>Contraseña</label>
                <input type="text" name="contrasena" value="<?php echo $row['Contrasena']?>" />
              </div>


              <div class="input-field">
                <label>Correo electrónico</label>
                <input type="text" name="correo" value="<?php echo $row['Correo']?>"  />
              </div>

              
             
          <?php }
    ?>


            </div>
          </div>

         
          
          <button class="nextBtn" id="boton" type="submit" name="submit">
            <span class="btnText">Editar</span>
            <i class="uil uil-navigator"></i>
    
          </button>
          </form>
       
        
        </div>
        
 
    </div>

  </body>
</html>
