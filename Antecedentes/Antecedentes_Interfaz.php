<html>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="../Login/js/funciones.js"></script>
<script src="../Login/js/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');
include('../Conexion_BD/Conexion.php');
if (isset($_SESSION['nControl'])) {
  $NumControl = $_SESSION['nControl'];
  $_SESSION["nControl"] = $NumControl;
  #echo $NumControl, "uno";
  #echo $_SESSION["nControl"], "DOs";
  

    $Dia = date("d");
    $Mes = date("m");
    $Ano = date("Y");
    #$Dia2 = $Dia-1;
    #$fecha = date("d") . " del " . date("m") . " de " . date("Y");
    $fecha = $Ano."-".$Mes."-".$Dia;
    $NumeroDePaciente = $_SESSION['nControl'];

    $consulta1=$conexion->query("Select Nombre, Apellido_Paterno, Apellido_Materno
                              from `datosgen_paciente`
                              where No_Paciente = '$NumeroDePaciente';");
    while ($row=$consulta1->fetch_array()) {
      $Nombres = $row[0]. " " .$row[1]. " " .$row[2];
    }                          
    $NomPaciente = $Nombres;
    #echo $Paciente;
    #echo $NumeroDePaciente;
?>
  <meta name='viewport' content='user-scalable=0'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="css/Antecedentes_Interfaz.css">


  <style>
    #scroll {
      overflow-y: scroll;
      overflow-x: hidden;
    }
  </style>
  <div class="aside3">
    <div id="pointer"></div>
    <h2 id="TextoAgenda" id="atras1">Antecedentes</h2>
    <div id="TextoNomPas" >Paciente: <?php echo $NomPaciente ?></div>
  </div>

  <div class="aside2">
      <?php
        include '../OpcionesDeExpendientes/Opciones_Antecedentes.php';
      ?>
      <style>
        <?php
          $css = file_get_contents('../OpcionesDeExpendientes/Opciones_Defecto.css');
          echo $css;
        ?>
      </style>
    </div>

  <div class="container">
      <div>
        <?php
        include ('Antecedentes_NP.php');
        ?>
      </div>
    <div class="container_Jump"></div>
      <div>
        <?php
        include('Antecedentes_GO.php');
        ?>
      </div>
    <div class="container_Jump"></div>
      <div>
        <?php 
        include('Antecedentes_HF.php'); 
        ?>
      </div>
    <div class="container_Jump"></div>
      <div>
        <?php 
        include('Antecedentes_PP.php'); 
        ?>
      </div>
  </div>

<?php
} else {

  header("Location: ../Expediente/Expedientes.php", TRUE, 301);
}
?>
