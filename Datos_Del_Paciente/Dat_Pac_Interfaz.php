
<?php

include '../Conexion_BD/Conexion.php';
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');

if (isset($_POST['nControl'])) {
  $NumControl = $_POST['nControl'];
  #echo $NumControl;
  $_SESSION["nControl"] = $NumControl;
  #echo "Contro ",$NumControl;
  $id_direc="";

  $consulta = $conexion->query("SELECT * FROM datosgen_paciente WHERE No_Paciente='$NumControl'");

?>
  <head>
<!--  
    [chr(48) AL chr(57) == Numeros 0-9]
    [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
    [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
    [chr(17) == Control]  
    [chr(32) == Espacio] 
    [chr(209) == Ñ Mayuscula] 
    [chr(241) == ñ minuscula] -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="Dat_Pac_Interfaz.css">
    <div class="aside3">
      <div id="pointer"></div>
      <h2 id="TextoAgenda" id="atras1">Datos del paciente</h2>
    </div>

    <div class="aside2">
      <?php
        include '../OpcionesDeExpendientes/Opciones_Datos.php';
      ?>
      <style>
        <?php
          $css = file_get_contents('../OpcionesDeExpendientes/Opciones_Defecto.css');
          echo $css;
        ?>
      </style>
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
        <header>Información del expediente</header>
        <?php
        while ($row = $consulta->fetch_array()) {
          $id_direc=$row['ID_Direccion'];
          $foto=$row['Foto'];
          
        ?>
          <form action="" method="POST" enctype="multipart/form-data" id="scroll">
            <div class="form first">
              <div class="details personal">
                <span class="title">Datos personales</span>


                <div class="fields">
                  <div class="input-field">
                    <label>Nombre(s)</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Nombre" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese los nombres" required value="<?php echo $row['Nombre'] ?>" />
                  </div>


                  <div class="input-field">
                    <label>Apellido paterno</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Paterno" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese el apellido paterno" required value="<?php echo $row['Apellido_Paterno'] ?>" />
                  </div>


                  <div class="input-field">
                    <label>Apellido materno</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Materno" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese el apellido materno" required value="<?php echo $row['Apellido_Materno'] ?>" />
                  </div>


                  <div class="input-field">
                    <label>CURP</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Curp" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) ||  
                                                                          (event.charCode >= 48 && event.charCode <= 57))"
                    placeholder="Ingrese la CURP" required value="<?php echo $row['CURP'] ?>" />
                  </div>

                  <div class="input-field">
                    <label>Fecha de nacimiento</label>
                    
                    <input type="date" name="FNacimiento" placeholder="Ingrese la fecha de nacimiento" required value=<?php echo $row['Fecha_Nacimiento'] ?> />
                  </div>

                  <div class="input-field">
                    <label>Edad</label>
                    <input type="number" name="Edad" maxlength="3"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    placeholder="Ingrese la edad" required value="<?php echo $row['Edad'] ?>" />
                  </div>

                  <div class="input-field" placeholder="Ingrese el sexo">
                    <label>Sexo</label>
                    <select name="Genero">
                      <option>Hombre</option>
                      <option>Mujer</option>
                    </select>
                    <!--
                    <input type="text" name="Genero" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122))"
                    placeholder="Ingrese el sexo" required value="<?php #echo $row['Sexo'] ?>" />
                     -->
                  </div>

                  <div class="input-field">
                    <label>Estado civil</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Civil" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese el estado civil" required value="<?php echo $row['Estado_Civil'] ?>" />
                  </div>
                </div>
              </div>

              <div class="details ID">
                <span class="title">Detalles de expediente</span>
                <div class="fields">
                  <div class="input-field">
                    <label>Fólio</label>
                    <input type="number" name="Folio" placeholder="Ingrese el fólio" required value="<?php echo $row['Folio_Seguro'] ?>" />
                  </div>

                  <div class="input-field">
                    <label>Numero de seguro social</label>
                    <input type="number" name="NumeroSeguroSocial" placeholder="Ingrese el numero de seguro social" required value="<?php echo $row['Numero_Seguro_Social'] ?>" />
                  </div>

                  <div class="input-field">
                    <label>Numero de Control</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="NumPaciente" placeholder="Ingrese el número de paciente" required value="<?php echo $row['No_Paciente'] ?>" />
                  </div>
                  <div class="input-field">
                    <label>Fecha de alta</label>
                    <input type="date" name="FAlta" placeholder="Ingrese la fecha de alta" required value=<?php echo $row['Fecha_alta'] ?> />
                  </div>
                </div>

                <div class="details ID">
                  <span class="title">Detalles de identidad</span>

                  <div class="fields">
                    <div class="input-field">
                      <label>Ocupación</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Ocupacion" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la ocupación" required value="<?php echo $row['Ocupacion'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Carrera</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Carrera" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la carrera" required value="<?php echo $row['Carrera'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Escolaridad</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Escola" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la escolaridad" required value="<?php echo $row['Escolaridad'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Religión</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Religion" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la religión" required value="<?php echo $row['Religion'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Teléfono</label>
                      <input type="number" name="Telefono" maxlength="10"
                      oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      placeholder="Ingrese el número telefónico" required value="<?php echo $row['Telefono'] ?>" />
                    </div>
                    <div class="input-field">
                      <label>Nombre de tutor</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Tutor" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese el nombre del tutor" required value="<?php echo $row['Nombre_Tutor'] ?>" />
                    </div>
                    <div class="input-field">
                      <label>Número de emergencia</label>
                      <input type="number" name="NumEmergencia" maxlength="10"
                      oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      placeholder="Ingrese el número de emergencia" required value="<?php echo $row['No_Emergencia'] ?>" />
                    </div>
                    <?php
                }
                $consulta2 = $conexion->query("SELECT * FROM direcccionpacientes WHERE ID_Direccion='$id_direc'");
                while ($row = $consulta2->fetch_array()) {
                  #echo $row['Municipio'];
      
                  ?>

                    <div class="input-field">
                      <label>Entidad</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Entidad" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) || (event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la entidad" required value="<?php echo $row['Estado'] ?> "/>
                    </div>

                    <div class="input-field">
                      <label>Municipio</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Municipio" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) || (event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese el municipio" required value="<?php echo $row['Municipio'] ?>" />
                    </div>
                    <div class="input-field">
                      <label>Código postal</label>
                      <input type="number" name="CodPostal" maxlength="5"
                      oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      placeholder="Ingrese el código postal" required value="<?php echo $row['C_Postal'] ?>" />
                    </div>
                 
                  <div class="input-field">
                    <label>Colonia</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Colonia" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese la colonia" required value="<?php echo $row['Colonia'] ?>" />
                  </div>
                  <div class="input-field">
                    <label>Calle</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Calle" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese la calle" required value="<?php echo $row['Calle'] ?> "/>
                  </div>
                  <div class="input-field">
                    <label>Número</label>
                    <input type="number" name="Numero" placeholder="Ingrese el número" required value="<?php echo $row['Numero_exterior'] ?>" />
                  </div>
                <?php 
              }?>
              <!-- 
                  <div class="input-sel_foto">
                    <label>Subir foto</label>

                    <input type="file" name="image" required />
                  </div>

                  <div class="input-imagen">
                    <?php
                    #echo '<td>' .
                    #'<img src = "data:image/png;base64,' . base64_encode($foto) . '" width = "500px" height = "200px"/>'
                    #. '</td>';
                    ?>

                  </div>
                  </div>
                </div>
                  -->
                <button class="nextBtn" id="boton" type="submit" name="submit">
                  <span class="btnText">Guardar</span>
                  <i class="uil uil-navigator"></i>

                </button>
          </form>
      </div>
    </div>
    </body>
    </html>
  <?php
  if (isset($_POST['submit'])){
    ############################# Datos Generales #############################
    $N = $_POST['Nombre'];
    $P = $_POST['Paterno'];
    $M = $_POST['Materno'];
    $C = $_POST['Curp'];
    $FN = $_POST['FNacimiento'];
    $E = $_POST['Edad'];
    $G = $_POST['Genero'];
    $Ci = $_POST['Civil'];
    $F = $_POST['Folio'];
    $NSS = $_POST['NumeroSeguroSocial'];
    $NP = $_POST['NumPaciente'];
    $FA = $_POST['FAlta'];
    $O = $_POST['Ocupacion'];
    $Car = $_POST['Carrera'];
    $Es = $_POST['Escola'];
    $R = $_POST['Religion'];
    $T = $_POST['Telefono'];
    $Tu = $_POST['Tutor'];
    $NE = $_POST['NumEmergencia'];

    #$image = $_FILES($_FILES["image"]["tmp_name"]);
    #$imgContent = addslashes(file_get_contents($image));
    #echo $N;

     ############################# Ejecucion #############################
     $sSQL="UPDATE datosgen_paciente 
            Set Nombre ='$N',
            Apellido_Paterno ='$P',
            Apellido_Materno ='$M',
            CURP ='$C',
            Edad ='$E',
            Sexo ='$G',
            Fecha_Nacimiento ='$FN',
            Estado_Civil ='$Ci',
            Folio_Seguro ='$F',
            Numero_Seguro_Social ='$NSS',
            No_Paciente ='$NP',
            Fecha_alta ='$FA',
            Ocupacion ='$O',
            Carrera ='$Car',
            Escolaridad ='$Es',
            Religion='$R',
            Telefono='$T',
            Nombre_Tutor='$Tu',
            No_Emergencia='$NE'
            Where No_Paciente='$NumControl'";

    $consultaDatos = $conexion->query($sSQL);
    ############################# Direcciones #############################
    $En = $_POST['Entidad'];
    $Mu = $_POST['Municipio'];
    echo $Mu;
    $Cp = $_POST['CodPostal'];
    $Co = $_POST['Colonia'];
    $Ca = $_POST['Calle'];
    $Nu = $_POST['Numero'];

    ############################# Ejecucion #############################
    $sSQL2="UPDATE direcccionpacientes 
            Set Estado ='$En',
            Municipio ='$Mu',
            Colonia ='$Co',
            Calle ='$Ca',
            Numero_exterior='$Nu',
            Numero_interior='$Nu',
            C_Postal='$Cp'
            Where ID_Direccion='$id_direc'";
     $consultaDirec = $conexion->query($sSQL2);
     if ($consultaDirec){
      ?>
       <script>
         swal("Accion realizada", "Datos actualizados, presiona de nuevo en 'Datos del paciente' para ver los datos", "success");
         window.setTimeout(function(){
         $(".alert").fadeTo(2000 ,500).slideUp(500,function(){
           $(this).remove();
         });
       },2300);
   </script>
      <?php
      }
  }
} 
elseif(isset($_SESSION['nControl'])){
  #$NumControl = $_GET['nControl'];
  #echo $NumControl;
  #setcookie("nControl", $NumControl);
  #$_SESSION["nControl"] = $NumControl;
  #echo $_SESSION["nControl"];
  $id_direc="";
  $NumControl = $_SESSION["nControl"];

  $consulta = $conexion->query("SELECT * FROM datosgen_paciente WHERE No_Paciente='$NumControl'");

?>

<head>
<!--  
    [chr(48) AL chr(57) == Numeros 0-9]
    [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
    [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
    [chr(17) == Control]  
    [chr(32) == Espacio] 
    [chr(209) == Ñ Mayuscula] 
    [chr(241) == ñ minuscula] -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="Dat_Pac_Interfaz.css">
    <div class="aside3">
      <div id="pointer"></div>
      <h2 id="TextoAgenda" id="atras1">Datos del paciente</h2>
    </div>

    <div class="aside2">
      <?php
        include '../OpcionesDeExpendientes/Opciones_Datos.php';
      ?>
      <style>
        <?php
          $css = file_get_contents('../OpcionesDeExpendientes/Opciones_Defecto.css');
          echo $css;
        ?>
      </style>
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
        <header>Información del expediente</header>
        <?php
        while ($row = $consulta->fetch_array()) {
          $id_direc=$row['ID_Direccion'];
          $foto=$row['Foto'];
          
        ?>
          <form action="" method="POST" enctype="multipart/form-data" id="scroll">
            <div class="form first">
              <div class="details personal">
                <span class="title">Datos personales</span>


                <div class="fields">
                  <div class="input-field">
                    <label>Nombre(s)</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Nombre" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese los nombres" required value="<?php echo $row['Nombre'] ?>" />
                  </div>


                  <div class="input-field">
                    <label>Apellido paterno</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Paterno" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese el apellido paterno" required value="<?php echo $row['Apellido_Paterno'] ?>" />
                  </div>


                  <div class="input-field">
                    <label>Apellido materno</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Materno" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese el apellido materno" required value="<?php echo $row['Apellido_Materno'] ?>" />
                  </div>


                  <div class="input-field">
                    <label>CURP</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Curp" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) ||  
                                                                          (event.charCode >= 48 && event.charCode <= 57))"
                    placeholder="Ingrese la CURP" required value="<?php echo $row['CURP'] ?>" />
                  </div>

                  <div class="input-field">
                    <label>Fecha de nacimiento</label>
                    
                    <input type="date" name="FNacimiento" placeholder="Ingrese la fecha de nacimiento" required value=<?php echo $row['Fecha_Nacimiento'] ?> />
                  </div>

                  <div class="input-field">
                    <label>Edad</label>
                    <input type="number" name="Edad" maxlength="3"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    placeholder="Ingrese la edad" required value="<?php echo $row['Edad'] ?>" />
                  </div>

                  <div class="input-field" placeholder="Ingrese el sexo">
                    <label>Sexo</label>
                    <select name="Genero">
                      <option>Hombre</option>
                      <option>Mujer</option>
                    </select>
                    <!--
                    <input type="text" name="Genero" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122))"
                    placeholder="Ingrese el sexo" required value="<?php #echo $row['Sexo'] ?>" />
                     -->
                  </div>

                  <div class="input-field">
                    <label>Estado civil</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Civil" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese el estado civil" required value="<?php echo $row['Estado_Civil'] ?>" />
                  </div>
                </div>
              </div>

              <div class="details ID">
                <span class="title">Detalles de expediente</span>
                <div class="fields">
                  <div class="input-field">
                    <label>Fólio</label>
                    <input type="number" name="Folio" placeholder="Ingrese el fólio" required value="<?php echo $row['Folio_Seguro'] ?>" />
                  </div>

                  <div class="input-field">
                    <label>Numero de seguro social</label>
                    <input type="number" name="NumeroSeguroSocial" placeholder="Ingrese el numero de seguro social" required value="<?php echo $row['Numero_Seguro_Social'] ?>" />
                  </div>

                  <div class="input-field">
                    <label>Numero de Control</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="NumPaciente" placeholder="Ingrese el número de paciente" required value="<?php echo $row['No_Paciente'] ?>" />
                  </div>
                  <div class="input-field">
                    <label>Fecha de alta</label>
                    <input type="date" name="FAlta" placeholder="Ingrese la fecha de alta" required value=<?php echo $row['Fecha_alta'] ?> />
                  </div>
                </div>

                <div class="details ID">
                  <span class="title">Detalles de identidad</span>

                  <div class="fields">
                    <div class="input-field">
                      <label>Ocupación</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Ocupacion" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la ocupación" required value="<?php echo $row['Ocupacion'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Carrera</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Carrera" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la carrera" required value="<?php echo $row['Carrera'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Escolaridad</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Escola" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la escolaridad" required value="<?php echo $row['Escolaridad'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Religión</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Religion" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la religión" required value="<?php echo $row['Religion'] ?>" />
                    </div>

                    <div class="input-field">
                      <label>Teléfono</label>
                      <input type="number" name="Telefono" maxlength="10"
                      oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      placeholder="Ingrese el número telefónico" required value="<?php echo $row['Telefono'] ?>" />
                    </div>
                    <div class="input-field">
                      <label>Nombre de tutor</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Tutor" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese el nombre del tutor" required value="<?php echo $row['Nombre_Tutor'] ?>" />
                    </div>
                    <div class="input-field">
                      <label>Número de emergencia</label>
                      <input type="number" name="NumEmergencia" maxlength="10"
                      oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      placeholder="Ingrese el número de emergencia" required value="<?php echo $row['No_Emergencia'] ?>" />
                    </div>
                    <?php
                }
                $consulta2 = $conexion->query("SELECT * FROM direcccionpacientes WHERE ID_Direccion='$id_direc'");
                while ($row = $consulta2->fetch_array()) {
                  #echo $row['Municipio'];
      
                  ?>

                    <div class="input-field">
                      <label>Entidad</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Entidad" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) || (event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese la entidad" required value="<?php echo $row['Estado'] ?> "/>
                    </div>

                    <div class="input-field">
                      <label>Municipio</label>
                      <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                      <input type="text" name="Municipio" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) || (event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                      placeholder="Ingrese el municipio" required value="<?php echo $row['Municipio'] ?>" />
                    </div>
                    <div class="input-field">
                      <label>Código postal</label>
                      <input type="number" name="CodPostal" maxlength="5"
                      oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      placeholder="Ingrese el código postal" required value="<?php echo $row['C_Postal'] ?>" />
                    </div>
                 
                  <div class="input-field">
                    <label>Colonia</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Colonia" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese la colonia" required value="<?php echo $row['Colonia'] ?>" />
                  </div>
                  <div class="input-field">
                    <label>Calle</label>
                    <!--  
                      [chr(48) AL chr(57) == Numeros 0-9]
                      [chr(65) AL chr(90) == Letras Mayusculas A-Z (sin Ñ)]
                      [chr(97) AL chr(122) == Letras minusculas a-z (sin ñ)]
                      [chr(17) == Control]  
                      [chr(32) == Espacio] 
                      [chr(209) == Ñ Mayuscula] 
                      [chr(241) == ñ minuscula] -->
                    <input type="text" name="Calle" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                          (event.charCode >= 97 && event.charCode <= 122) || 
                                                                          (event.charCode == 32) ||(event.charCode == 209) ||
                                                                          (event.charCode == 241))"
                    placeholder="Ingrese la calle" required value="<?php echo $row['Calle'] ?> "/>
                  </div>
                  <div class="input-field">
                    <label>Número</label>
                    <input type="number" name="Numero" placeholder="Ingrese el número" required value="<?php echo $row['Numero_exterior'] ?>" />
                  </div>
                <?php 
              }?>
              <!-- 
                  <div class="input-sel_foto">
                    <label>Subir foto</label>

                    <input type="file" name="image" required />
                  </div>

                  <div class="input-imagen">
                    <?php
                    #echo '<td>' .
                    #'<img src = "data:image/png;base64,' . base64_encode($foto) . '" width = "500px" height = "200px"/>'
                    #. '</td>';
                    ?>

                  </div>
                  </div>
                </div>
                  -->
                <button class="nextBtn" id="boton" type="submit" name="submit">
                  <span class="btnText">Guardar</span>
                  <i class="uil uil-navigator"></i>

                </button>
          </form>
      </div>
    </div>
    </body>
    </html>
  <?php
  if (isset($_POST['submit'])){
    ############################# Datos Generales #############################
    $N = $_POST['Nombre'];
    $P = $_POST['Paterno'];
    $M = $_POST['Materno'];
    $C = $_POST['Curp'];
    $FN = $_POST['FNacimiento'];
    $E = $_POST['Edad'];
    $G = $_POST['Genero'];
    $Ci = $_POST['Civil'];
    $F = $_POST['Folio'];
    $NSS = $_POST['NumeroSeguroSocial'];
    $NP = $_POST['NumPaciente'];
    $FA = $_POST['FAlta'];
    $O = $_POST['Ocupacion'];
    $Car = $_POST['Carrera'];
    $Es = $_POST['Escola'];
    $R = $_POST['Religion'];
    $T = $_POST['Telefono'];
    $Tu = $_POST['Tutor'];
    $NE = $_POST['NumEmergencia'];

    #$image = $_FILES($_FILES["image"]["tmp_name"]);
    #$imgContent = addslashes(file_get_contents($image));
    #echo $N;

     ############################# Ejecucion #############################
     $sSQL="UPDATE datosgen_paciente 
            Set Nombre ='$N',
            Apellido_Paterno ='$P',
            Apellido_Materno ='$M',
            CURP ='$C',
            Edad ='$E',
            Sexo ='$G',
            Fecha_Nacimiento ='$FN',
            Estado_Civil ='$Ci',
            Folio_Seguro ='$F',
            Numero_Seguro_Social ='$NSS',
            No_Paciente ='$NP',
            Fecha_alta ='$FA',
            Ocupacion ='$O',
            Carrera ='$Car',
            Escolaridad ='$Es',
            Religion='$R',
            Telefono='$T',
            Nombre_Tutor='$Tu',
            No_Emergencia='$NE'
            Where No_Paciente='$NumControl'";
    $consultaDatos = $conexion->query($sSQL);
    ############################# Direcciones #############################
    $En = $_POST['Entidad'];
    $Mu = $_POST['Municipio'];
    echo $Mu;
    $Cp = $_POST['CodPostal'];
    $Co = $_POST['Colonia'];
    $Ca = $_POST['Calle'];
    $Nu = $_POST['Numero'];

    ############################# Ejecucion #############################
    $sSQL2="UPDATE direcccionpacientes 
            Set Estado ='$En',
            Municipio ='$Mu',
            Colonia ='$Co',
            Calle ='$Ca',
            Numero_exterior='$Nu',
            Numero_interior='$Nu',
            C_Postal='$Cp'
            Where ID_Direccion='$id_direc'";
     $consultaDirec = $conexion->query($sSQL2);
     if ($consultaDirec){
     ?>
      <script>
        swal("Accion realizada", "Datos actualizados, presiona de nuevo en 'Datos del paciente' para ver los datos", "success");
        window.setTimeout(function(){
        $(".alert").fadeTo(2000 ,500).slideUp(500,function(){
          $(this).remove();
        });
      },2300);
  </script>
     <?php
    }
   
  }
}
else {
  header("Location: ../Expediente/Expedientes.php", TRUE, 301);
}
  ?>