<?php
include '../Conexion_BD/Conexion.php';
  $NumControl= $_SESSION['nControl'];
  $Consulta=$conexion->query("SELECT * from `heredofamiliares` 
                            where No_Paciente= '$NumControl' ");
  if((mysqli_num_rows($Consulta) > 0))
  {
    while ($row=$Consulta->fetch_array()) 
    {
      $Cardiopatias= $row[1];
      $Trastornos_psiquiatricos= $row[2];
      $Enfermedades_respiratorias= $row[3];
      $Hepatopatias= $row[4];
      $Alergias= $row[5];
      $Enfermedades_endocrinas= $row[6];
      $Enfermedades_genéticas= $row[7];
      $Enfermedades_neurologicas= $row[8];
      $Dermatologicas= $row[9];
      $Articulaciones_Huesos= $row[10];
      $Renales= $row[11];
      $Gastrointestinales= $row[12];
      $Ginecologicos= $row[13];

    }
  }
  else
  {
      $Cardiopatias= "";
      $Trastornos_psiquiatricos= "";
      $Enfermedades_respiratorias= "";
      $Hepatopatias= "";
      $Alergias= "";
      $Enfermedades_endocrinas= "";
      $Enfermedades_genéticas= "";
      $Enfermedades_neurologicas= "";
      $Dermatologicas= "";
      $Articulaciones_Huesos= "";
      $Renales= "";
      $Gastrointestinales= "";
      $Ginecologicos= "";
  }
  include ('Logica_General.php');
?>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      <!-- DIVISION PARA MANIPULAR EL FORMULARIO-->
        <div class="containerDat">
          <form action="" method="POST" enctype="multipart/form-data">
          <div class="form first">
            <div class="details personal">
              <h1>Antecedentes heredo-familiares</h1>
              <div class="fields">

                <div class="input-field">
                  <span >Cardiopatías</span> 
                  <textarea id="textArea" name="cardio" placeholder="Ingrese las cardiopatías" cols="3" rows="10" ><?php echo $Cardiopatias; ?> </textarea>
                </div> 

                <div class="input-field">
                  <span >Trastornos psiquiátricos</span>
                  <textarea id="textArea" name="psi" placeholder="Ingrese los trastornos psiquiátricos" cols="3" rows="10"><?php echo $Trastornos_psiquiatricos; ?> </textarea>
                </div>

                <div class="input-field">
                  <span >Enfermedades respiratorias</span>
                  <textarea id="textArea" name="respi" placeholder="Ingrese las enfermedades respiratorias" cols="3" rows="10"><?php echo $Enfermedades_respiratorias; ?> </textarea>  
                </div>

                <div class="input-field">
                  <span >Hepatopatías</span>
                <textarea id="textArea" name="hepato" placeholder="Ingrese las hepatopatías" cols="3" rows="10"><?php echo $Hepatopatias; ?> </textarea>
                </div>
                
                <div class="input-field">
                  <span >Alergias</span>
                  <textarea id="textArea" name="alerg" placeholder="Ingrese las alergias" cols="3" rows="10"><?php echo $Alergias; ?> </textarea> 
                </div>
                  
                <div class="input-field" >
                  <span >Enfermedades endocrinas</span>
                  <textarea id="textArea" name="endo" placeholder="Ingrese las enfermedades endocrinas" cols="3" rows="10"><?php echo $Enfermedades_endocrinas; ?> </textarea>
                </div>
                  
                <div class="input-field">
                  <span >Enfermedades genéticas</span>
                  <textarea id="textArea" name="gen" placeholder="Ingrese las enfermedades genéticas" cols="3" rows="10"><?php echo $Enfermedades_genéticas; ?> </textarea>
                </div>
                  
                <div class="input-field">
                    <span >Enfermedades neurológicas</span>
                    <textarea id="textArea" name="neuro" placeholder="Ingrese las enfermedades neurológicas" cols="3" rows="10"><?php echo $Enfermedades_neurologicas; ?> </textarea>
                </div>

                <div class="input-field">
                    <span >Enfermedades dermatológicas</span>
                    <textarea id="textArea" name="derma" placeholder="Ingrese las enfermedades neurológicas" cols="3" rows="10"><?php echo $Dermatologicas; ?> </textarea>
                </div>

                <div class="input-field">
                    <span >Enfermedades de articulaciones o huesos</span>
                    <textarea id="textArea" name="artic" placeholder="Ingrese las enfermedades neurológicas" cols="3" rows="10"><?php echo $Articulaciones_Huesos; ?> </textarea>
                </div>

                <div class="input-field">
                    <span >Enfermedades renales</span>
                    <textarea id="textArea" name="rena" placeholder="Ingrese las enfermedades neurológicas" cols="3" rows="10"><?php echo $Renales; ?> </textarea>
                </div>

                <div class="input-field">
                    <span >Enfermedades gastrointestinales</span>
                    <textarea id="textArea" name="gastro" placeholder="Ingrese las enfermedades neurológicas" cols="3" rows="10"><?php echo $Gastrointestinales; ?> </textarea>
                </div>

                <div class="input-field">
                    <span >Enfermedades ginecológicas</span>
                    <textarea id="textArea" name="gine" placeholder="Ingrese las enfermedades neurológicas" cols="3" rows="10"><?php echo $Ginecologicos; ?> </textarea>
                </div>
              </div>
            </div>
            <button class="Btn" id="boton" type="submit" name="HF">
                  <span class="button">Guardar</span>
                  </button>

          </div>
        </div>
                

        </form>
    </body>
    </html>
  <?php
