<html>
<?php 
$title = "Expediente Clinico ITSZaS";

include ('../Menu/menu_cabecera.php');
if(isset($_SESSION['nControl']))
{
  #$NumControl = $_GET['nControl'];
  #echo $NumControl;
  #setcookie("nControl", $NumControl);
  #$_SESSION["nControl"] = $NumControl;
#  echo $_SESSION["nControl"];

  $Dia = date("d");
  $Mes = date("m");
  $Ano = date("Y");
  $Dia2 = $Dia-1;
  #$fecha = date("d") . " del " . date("m") . " de " . date("Y");
  $fecha = $Ano."-".$Mes."-".$Dia2;
  $Paciente = "PACIENTE RANDOM"
?>

<?php



?>
<meta name='viewport' content='user-scalable=0'> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="estilo_agenda_modificada2.css">
<link rel="stylesheet" href="Estilo_Evo.css">

<style>
  #scroll2 {
    overflow-x: scroll;
    overflow-y: hidden;
  }
  .textArea{
    position: absolute;
    left: o%;
    top: 10%;
    height: 75.5%;
    width: 85%;
    resize: none;
}
</style>

<div class="aside3">
  <div id="pointer"></div>
  <h2 id="TextoAgenda" id="atras1">Tratamiento</h2>
</div>

<div class="aside2">
  <?php
  include '../Datos_Del_Paciente/Opciones_Defecto.php'
  ?>
</div>

</form>
</div>

<div class="container1">
  <form action="#" id="scroll2">
    <table class="rwd_auto">
      <thead>
        <tr>
          <th>Titulo</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include  'Busqueda_Inteligente.php';
        ?>
      </tbody>
    </table>
  </form>
</div>

<div class="boton-modal">
        <label for="btn-modal">
            Nuevo
        </label>
    </div>
    <!--Fin de Boton-->
    <!--Ventana Modal-->
    <input type="checkbox" id="btn-modal">
    <div class="containerMOD">
        <div class="content-modal">
      <pre>
      </pre>
      <div class="aside3">
                <div id="pointer2"></div>
                <h2 id="TextoAgenda2" id="atras1">Nuevo Tratamiento</h2>
            </div>
            <form action="#" id="form">
              <div class="fields">
                <input class="CajasText" id="nomb" type="text" name="NombreNOTAS" value='<?php echo $Paciente?>'>
              </div>
              <div class="fields">
                <input class="CajasText" id="date" type="date" name="CalendariNOTAS" onkeydown="return false" value='<?php echo $fecha?>'>  
              </div>
                  
                <textarea class="textArea" name="AreaText"></textarea>
                  <button id="entrar" class="bubbly-button">Guardar</button>
                  <button id="limpiar" class="bubbly-button">Limpiar</button> 
            </form>
        </div>
        <label for="btn-modal" class="cerrar-modal"></label>
      </div>
</html>
<?php
}
else{

  header("Location: ../Expediente/Expedientes.php",TRUE,301);
}
?>