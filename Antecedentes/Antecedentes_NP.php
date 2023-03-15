<html>
<?php
include '../Conexion_BD/Conexion.php';
  $NumControl = $_SESSION['nControl'];
  $Consulta=$conexion->query("SELECT * from `apnp` 
                              where No_Paciente = '$NumControl'");
          if((mysqli_num_rows($Consulta) > 0))
          {
              while ($row = $Consulta->fetch_array()) 
              {
                #$ID_APNP = $row[0];
                $No_Paciente = $row[0];
                $nacimiento = $row[1];
                $Duchas_semana = $row[2];
                $Lugar_Residencia  = $row[3];
                $Viajes_extranjero = $row[4];
                $Trabajo = $row[5];
                $Deportes = $row[6];
                $Observaciones = $row[7];
                $Vivienda_Rural = $row[8];  
              }
              
              $nacimiento2="";
              for ($i=0; $i<(strlen($nacimiento));$i++){
                $nacimiento2 = $nacimiento2 . $nacimiento[$i];
              }
          }
          else
          {
                $No_Paciente = "";
                $nacimiento = "";
                $Duchas_semana = "";
                $Lugar_Residencia  = "";
                $Viajes_extranjero = "";
                $Trabajo = "";
                $Deportes = "";
                $Observaciones = "";
                $Vivienda_Rural = ""; 
                $nacimiento2="";
          }
          include ('Logica_General.php');
              
              ?>
            <div class="containerDat">
              <form action="" method="POST" enctype="multipart/form-data"> 
              <div class="form first">
                <div class="details personal">
                  <h1>Antecedentes no patológicos</h1>
                  <div class="fields">
                    <div class="input-field">
                      <span>Lugar de nacimiento</span>
                      <input type="text" name="nacimiento" placeholder="Ingrese el lugar de nacimiento" value="<?php echo $nacimiento2  ; ?>" />
                    </div>
                    <div class="input-field">
                      <span>Lugar de residencia</span>
                      <input type="text" name="residencia" placeholder="Ingrese el lugar de residencia" value="<?php echo $Lugar_Residencia; ?>">
                    </div>
                    <div class="input-field">
                      <span>Trabajo</span>
                      <input type="text" name="trabajo" placeholder="Ingrese el trabajo" value="<?php echo $Trabajo; ?>" />
                    </div>
                    <div class="input-field">
                      <span>Baños a la semana</span>
                      <input type="number" name="baños" placeholder="Ingrese los baños a la semana" value="<?php echo $Duchas_semana; ?>" />
                    </div>
                    <div class="input-field">
                      <span>Viajes al extranjero</span>
                      <input type="text" name="viajes" placeholder="Ingrese los viajes al extranjero" value="<?php echo $Viajes_extranjero; ?> "/>
                    </div>
                    <div class="input-field">
                      <span>Deportes</span>
                      <input type="text" name="deportes" placeholder="Ingrese los deportes" value="<?php echo $Deportes; ?> "/>
                    </div>
                    <div class="input-field">
                      <span>Vivienda rural</span>
                      <textarea name="vivienda" id="textArea" placeholder="Ingrese la vivienda rural" cols="3" rows="10"><?php echo $Vivienda_Rural; ?></textarea>
                    </div>
                    <div class="input-field">
                      <span>Observaciones</span>
                      <textarea name="observaciones" placeholder="Ingrese las observaciones" id="textArea" cols="3" rows="10"><?php echo $Observaciones; ?></textarea>
                    </div>
            
                  </div>
                  <button class="Btn" id="boton" type="submit" name="NP">
                    <span>Guardar</span>
                  </button>
                </div>
                
              </div>
            </form>
          <?php
