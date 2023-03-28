<html>
<meta name='viewport' content='user-scalable=0'> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="estilo_agenda_modificada2.css">
<link rel="stylesheet" href="Estilo_Evo.css">  
</html>
<?php
$title = "Expediente Clinico ITSZaS";
include ('../Menu/menu_cabecera.php');
include '../Conexion_BD/Conexion.php';

    $NumTrata = $_GET["id"];
    if(isset($_SESSION['nControl'])){
    $NumeroDePaciente = $_SESSION['nControl'];
    $consulta1=$conexion->query("DELETE from `tratamientos` where No_Paciente = '$NumeroDePaciente' and No_Trata = '$NumTrata';");
    
    if ($consulta1){
        #$consulta3=$conexion->query($consulta1);
        #echo "aqui es consulta";
      ?>
      <script>
        swal("Accion Realizada", "El tratamiento se ha elimnado con exito", "success");
        window.setTimeout(function(){
        $(".alert").fadeTo(2000 ,500).slideUp(500,function(){
          $(this).remove();
        });
      },2300);

  </script>
     <?php
      header("Location:Tratamiento_Interfaz.php",TRUE,301);
    }
    else{
      
      ?>
          <script>
          swal("Error", "Ocurrio un error", "error");
          window.setTimeout(function(){
          $(".alert").fadeTo(2000 ,500).slideUp(500,function(){
            $(this).remove();
          });
        },2300);
    </script>
    <?php
    }
  }

?>