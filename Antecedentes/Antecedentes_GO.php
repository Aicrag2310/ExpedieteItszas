<html>
<?php 
include '../Conexion_BD/Conexion.php';
  $NumControl = $_SESSION['nControl'];
  $Consulta = $conexion->query("SELECT * from `ginecobstetrico`
                            where No_Paciente = '$NumControl'");
  if((mysqli_num_rows($Consulta) > 0))
  {
  while ($row = $Consulta->fetch_array()) 
  {
    $FUm = $row[1];
    $CIC = $row[2];
    $MEN = $row[3];
    $IVSA = $row[4];
    $NP = $row[5];
    $MENO = $row[6];
    $EMB = $row[7];
    $PAR = $row[8];
    $CES = $row[9];
    $AB = $row[10];
    $FUp = $row[11];
  }
}
else
{
  $FUm = "";
  $CIC = "";
  $MEN = "";
  $IVSA = "";
  $NP = "";
  $MENO = "";
  $EMB = "";
  $PAR = "";
  $CES = "";
  $AB = "";
  $FUp = "";
}
include ('Logica_General.php');
?>
<div class="containerDat">
  <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="form first">
            <div class="details personal">
              <h1>Antecedentes gineco-obstétricos</h1>
                <div class="fields">

                      <div class="input-field">
                        <span>Fecha última menstruación</span>
                        <input type="date" name="FUM" placeholder="Ingrese la FUM"  Value = "<?php echo $FUm ?>"/>
                      </div>

                      <div class="input-field">
                        <span>Ciclo</span>
                        <input type="text"  name="Ciclo" placeholder="Ingrese el ciclo menstrual" Value = "<?php echo $CIC ?>" />
                      </div>

                      <div class="input-field">
                        <span>Edad inicio menstruación </span>
                        <input type="number" name="Menarca"  placeholder="Ingrese la menarca"  Value = "<?php echo $MEN ?>"/>
                      </div>

                      <div class="input-field">
                        <span>Edad inicio vida sexual activa</span>
                        <input type="number" name="IVSA"  placeholder="Ingrese la IVSA"  Value = "<?php echo $IVSA ?>"/>
                      </div>
              
                      <div class="input-field">
                        <span>Número de parejas</span>
                        <input type="number" name="Nparejas"  placeholder="Ingrese la cantidad de parejas"  Value = "<?php echo $NP ?>"/>
                      </div>

                      <div class="input-field">
                        <span>Climaterio/menopausia</span>
                        <input type="text" name="Menopausia" placeholder="Ingrese climaterio o menopausia"  Value = "<?php echo $MENO ?>" />
                      </div>

                      <div class="input-field">
                        <span>Embarazos</span>
                        <input type="text" name="Embarazos" placeholder="Ingrese los embarazos"   Value = "<?php echo $EMB ?>"/>
                      </div>

                      <div class="input-field">
                        <span>Partos</span>
                        <input type="text" name="Partos"  placeholder="Ingrese los partos"  Value = "<?php echo $PAR ?>" />
                      </div>

                      <div class="input-field">
                        <span>Cesáreas</span>
                        <input type="text" name="Cesareas" placeholder="Ingrese las cesáreas"  Value = "<?php echo $CES ?>"/>
                      </div>         

                      <div class="input-field">
                        <span>Abortos</span>
                        <input type="text" name="Abortos" placeholder="Ingrese los abortos"  Value = "<?php echo $AB ?>"/>
                      </div>  

                      <div class="input-field">
                        <span>Fecha último parto</span>
                        <input type="date" name="FUparto"  placeholder="Ingrese la FUP"  Value = "<?php echo $FUp ?>"/>
                      </div> 
                </div> 
            </div> 
                  <button class="Btn" id="boton" type="submit" name="GO">
                  <span>Guardar</span>
                </button>

            </div>  
</div>     
  </form>
