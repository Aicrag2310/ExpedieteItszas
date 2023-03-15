<html>
<?php
include '../Conexion_BD/Conexion.php';
if (isset($_SESSION['nControl'])) {
  $NumControl = $_SESSION['nControl'];
  #$id_paciente = $_SESSION["nControl"];

  $Consulta=$conexion->query("SELECT * FROM `personales_patologicos` 
                            WHERE `No_Paciente`= '$NumControl'");
if((mysqli_num_rows($Consulta) > 0))
{
  while ($row = $Consulta->fetch_array()) 
  {
    $Uno=$row[0];
    $Dos=$row['Enf_Infancia'];
    $Tres=$row['Secuelas'];
    $Cuatro=$row['Hospitalizaciones'];
    $Cinco=$row['Quirurgicos'];
    $Seis=$row['Transfucionoes'];
    $Siete=$row['Fracturas'];
    $Ocho=$row['Traumatismo'];
    $Nueve=$row['Otra_enfermedad'];
  }
  }
  else
  {
    $Uno="";
    $Dos="";
    $Tres="";
    $Cuatro="";
    $Cinco="";
    $Seis="";
    $Siete="";
    $Ocho="";
    $Nueve="";
  }
include ('Logica_General.php');     
#include ('Boton_Ayuda.php');                    
  
?>

    <div class="containerDat">

      <form action="" method="POST" enctype="multipart/form-data"> 
        <div class="form first">
          <div class="details personal">
            <h1>Antecedentes personales patológicos</h1>
                  <div class="fields">
                  <!--
                  <div class="input-field">
                    <label>Numero de paciente</label>
                    <input type="text" name="id_paciente" placeholder="Ingrese" value="<?php echo  $Uno; ?>" />
                  </div>
                </div>
                -->
                <div class="input-field">
                  <span>Enfermedades de la infancia</span>
                  <input type="text" name="infancia" placeholder="Ingrese las enfermedades de la infancia" value="<?php echo $Dos; ?>" />
                </div>
                <div class="input-field">
                  <span>Secuelas</span>
                  <input type="text" name="secuelas" placeholder="Ingrese las secuelas" value="<?php echo $Tres; ?>"  />
                </div>
                <div class="input-field">
                  <span>Hospitalizaciones previas</span>
                  <input type="text" name="hospitalizaciones" placeholder="Ingrese las hospitalizaciones" value="<?php echo $Cuatro; ?>" />
                </div>

                <div class="input-field">
                  <span>Quirúrgicos</span>
                  <input type="text" name="quirurgicos" placeholder="Ingrese los quirúrgicos" value="<?php echo $Cinco; ?>"  />
                </div>
                <div class="input-field">
                  <span>Transfuciones previas</span>
                  <input type="text" name="transfuciones" placeholder="Ingrese las transfuciones previas" value="<?php echo $Seis; ?>"  />

                </div>
                <div class="input-field">
                  <span>Fracturas</span>
                  <input type="text" name="fracturas" placeholder="Ingrese las fracturas" value="<?php echo $Siete; ?>"  />
                </div>

                <div class="input-field">
                  <span>Traumatismo</span>
                  <input type="text" name="traumatismo" placeholder="Ingrese el traumatismo"value="<?php echo $Ocho; ?>"  />
                  
                </div>
                <div class="input-field">
                  <span>Otra enfermedad</span>
                  <input type="text" name="otraenfe" placeholder="Ingrese otra enfermedad"value="<?php echo $Nueve; ?>"  />
                  
                </div>

              
          </div>
      </div>
      <button class="Btn" id="boton" type="submit" name="PP">
                    <span id="agregar">Guardar</span>
                  </button>

<?php 
}
?>