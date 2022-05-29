<?php
include 'Conexion.php';
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');

if (isset($_POST['nControl'])) {
  $NumControl = $_POST['nControl'];
  #echo $NumControl;
  $_SESSION["nControl"] = $NumControl;
  $id_direc="";

  $consulta = $conexion->query("SELECT * FROM datosgen_paciente WHERE No_Paciente='$NumControl'");

?>

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="Dat_Pac_Interfaz.css">
    <div class="aside3">
      <div id="pointer"></div>
      <h2 id="TextoAgenda" id="atras1">Datos del Paciente</h2>
    </div>
    <div class="aside 2">
      <?php
      include 'Opciones_Defecto.php'
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
        <header>Registro de nuevo paciente</header>
        <?php
        while ($row = $consulta->fetch_array()) {
          $id_direc=$row['ID_Direccion'];
          $foto=$row['Foto'];
          
        ?>
          <form action="" method="post" enctype="multipart/form-data" id="scroll">
            <div class="form first">
              <div class="details personal">
                <span class="title">Datos personales</span>


                <div class="fields">
                  <div class="input-field">
                    <label>Nombre completo</label>
                    <input type="text" name="Nombre" placeholder="Ingresa tu nombre" required value=<?php echo $row['Nombre'] ?> />
                  </div>


                  <div class="input-field">
                    <label>Apellido Paterno</label>
                    <input type="text" name="Paterno" placeholder="Ingresa tu apellido paterno" required value=<?php echo $row['Apellido_Paterno'] ?> />
                  </div>


                  <div class="input-field">
                    <label>Apellido Materno</label>
                    <input type="text" name="Materno" placeholder="Ingresa tu apellido materno" required value=<?php echo $row['Apellido_Materno'] ?> />
                  </div>


                  <div class="input-field">
                    <label>Curp</label>
                    <input type="text" name="Curp" placeholder="Ingresa tu curp" required value=<?php echo $row['CURP'] ?> />
                  </div>

                  <div class="input-field">
                    <label>Fecha de nacimiento</label>
                    <input type="text" name="FNacimiento" placeholder="Ingresa tu fecha de nacimiento" required value=<?php echo $row['Fecha_Nacimiento'] ?> />
                  </div>
                  <div class="input-field">
                    <label>Edad</label>
                    <input type="number" name="Edad" placeholder="Ingresa tu edad" required value=<?php echo $row['Edad'] ?> />
                  </div>

                  <div class="input-field">
                    <label>Genero</label>
                    <input type="text" name="Edad" placeholder="Ingresa tu genero" required value=<?php echo $row['Sexo'] ?> />
                  </div>

                  <div class="input-field">
                    <label>Estado Civil</label>
                    <input type="text" name="Edad" placeholder="Ingresa tu estado civil" required value=<?php echo $row['Estado_Civil'] ?> />
                  </div>
                </div>
              </div>

              <div class="details ID">
                <span class="title">Detalles de expediente</span>
                <div class="fields">
                  <div class="input-field">
                    <label>Fólio</label>
                    <input type="number" name="Folio" placeholder="Ingese su Fólio" required value=<?php echo $row['Folio_Seguro'] ?> />
                  </div>
                  <div class="input-field">
                    <label>Numero de paciente</label>
                    <input type="number" name="NumPaciente" placeholder="Ingese su Numero de paciente" required value=<?php echo $row['No_Paciente'] ?> />
                  </div>
                  <div class="input-field">
                    <label>Fecha de alta</label>
                    <input type="date" name="FAlta" placeholder="Ingresa tu fecha de alta" required value=<?php echo $row['Fecha_alta'] ?> />
                  </div>
                </div>



                <div class="details ID">
                  <span class="title">Detalles de identidad</span>

                  <div class="fields">
                    <div class="input-field">
                      <label>Ocupación</label>
                      <input type="text" name="Ocupacion" placeholder="Ingese su ocupación" required value=<?php echo $row['Ocupacion'] ?> />
                    </div>
                    <div class="input-field">
                      <label>Escolaridad</label>
                      <input type="text" name="Ocupacion" placeholder="Ingese su escolaridad" required value=<?php echo $row['Escolaridad'] ?> />
                    </div>



                    <div class="input-field">
                      <label>Religión</label>
                      <input type="text" name="Religion" placeholder="Ingresa tu Religión" required value=<?php echo $row['Religion'] ?> />
                    </div>

                    <div class="input-field">
                      <label>Telefono</label>
                      <input type="number" name="Telefono" placeholder="Ingresa numero" required value=<?php echo $row['Telefono'] ?> />
                    </div>
                    <div class="input-field">
                      <label>Nombre de tutor</label>
                      <input type="text" name="Tutor" placeholder="Ingresa nombre del tutor" required value=<?php echo $row['Nombre_Tutor'] ?> />
                    </div>
                    <div class="input-field">
                      <label>Numero de emergencia</label>
                      <input type="number" name="NumEmergencia" placeholder="Ingresa tu numero emergencia" required value=<?php echo $row['No_Emergencia'] ?> />
                    </div>
                    <?php
                }
                $consulta2 = $conexion->query("SELECT * FROM direcccionpacientes WHERE ID_Direccion='$id_direc'");
                while ($row = $consulta2->fetch_array()) {
      
                  ?>

                    <div class="input-field">
                      <label>Entidad</label>
                      <input type="text" name="Municipio" placeholder="Ingresa tu entidad" required value=<?php echo $row['Estado'] ?> />
                    </div>



                    <div class="input-field">
                      <label>Municipio</label>
                      <input type="text" name="Municipio" placeholder="Ingresa tu municipio" required value=<?php echo $row['Municipio'] ?> />
                    </div>
                    <div class="input-field">
                      <label>Código Postal</label>
                      <input type="text" name="CodPostal" placeholder="Ingresa tu Código Postal" required value=<?php echo $row['C_Postal'] ?> />
                    </div>
                 
                  <div class="input-field">
                    <label>Colonia</label>
                    <input type="text" name="Colonia" placeholder="Ingresa tu colonia" required value=<?php echo $row['Colonia'] ?> />
                  </div>
                  <div class="input-field">
                    <label>Calle</label>
                    <input type="text" name="Calle" placeholder="Ingresa tu calle" required value=<?php echo $row['Calle'] ?> />
                  </div>
                  <div class="input-field">
                    <label>Numero</label>
                    <input type="number" name="Numero" placeholder="Ingresa tu numero" required value=<?php echo $row['Numero_exterior'] ?> />
                  </div>
                <?php 
              }?>



                  <div class="input-sel_foto">
                    <label>Subir foto</label>

                    <input type="file" name="image" required />
                  </div>

                  <div class="input-imagen">
                    <?php
                    echo '<td>' .
                    '<img src = "data:image/png;base64,' . base64_encode($foto) . '" width = "500px" height = "200px"/>'
                    . '</td>';
                    ?>

                  </div>
                  </div>
                </div>



                <button class="nextBtn" id="boton" type="submit" name="submit">
                  <span class="btnText">Siguiente</span>
                  <i class="uil uil-navigator"></i>

                </button>
          </form>







      </div>


    </div>

    </body>

    </html>
  <?php
} else {
  header("Location: ../Expediente/Expedientes.php", TRUE, 301);
}
  ?>