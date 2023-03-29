<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../Login/js/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');
include '../Conexion_BD/Conexion.php';
if (isset($_POST['imprimir'])) {
  $usu = $_SESSION['usuario'];
  $NumeroDePaciente = $_SESSION['nControl'];
  header("Location: ../Imprimir/index.php?id=$usu&paciente=$NumeroDePaciente");
  exit;
}
if (isset($_POST['DatosAqui'])) {
  $NumTrata = $_POST["DatosAqui"];
  #echo $DatosTrata;
  if (isset($_SESSION['nControl'])) {

    $Dia = date("d");
    $Mes = date("m");
    $Ano = date("Y");
    $fecha = $Ano . "-" . $Mes . "-" . $Dia;
    $NumeroDePaciente = $_SESSION['nControl'];
    $_SESSION['nControl'] = $NumeroDePaciente;

    $consulta1 = $conexion->query("Select * from `tratamientos`
                            where No_Paciente = '$NumeroDePaciente' and No_Trata = '$NumTrata';");
    while ($row = $consulta1->fetch_array()) {
      $NombresTrata = $row[2];
      $ContenidoTrata = $row[3];
      $FechaTrata = $row[4];
    }
    #$NomPaciente = $Nombres;
    #echo $Paciente;
    #echo $NumeroDePaciente;


?>
    <meta name='viewport' content='user-scalable=0'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="estilo_agenda_modificada2.css">
    <link rel="stylesheet" href="Estilo_Evo.css">

    <style>
      #scroll2 {
        overflow-x: scroll;
        overflow-y: hidden;
      }

      .textAreaVer {
        position: relative;
        left: 0%;
        top: 100px;
        height: 80%;
        width: 85%;
        resize: none;
      }
    </style>

    <div class="aside3">
      <div id="pointer"></div>
      <h2 id="TextoAgenda" id="atras1">Visualizar tratamiento</h2>
    </div>

    <div class="aside">
      <div class="fields">
        <input class="CajasText" id="nomb" type="text" name="NombreNOTAS" placeholder="Ingresa nombre del tratamiento" Value="<?php echo $NombresTrata ?>" disabled>
      </div>
      <div class="fields">
        <input class="CajasText" id="date" type="date" name="CalendariNOTAS" onkeydown="return false" value='<?php echo $FechaTrata ?>' placeholder="Escribe el tratamiento" disabled>
      </div>
      <textarea class="textAreaVer" name="AreaText2" disabled> <?php echo $ContenidoTrata ?></textarea>

      <a href="EliminarTrata.php?id=<?php echo $NumTrata; ?>" class="bubbly-button" id="entrar" align="center">Eliminar</a>


      <a href="../Tratamiento/Tratamiento_Interfaz.php" class="bubbly-button" id="limpiar" align="center">Regresar</a>

    </div>
    </div>

    <script>
      $('#entrar').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        swal({
            title: "¿Estás seguro?",
            text: "¿Estás seguro de eliminar este tratamiento?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              document.location.href = href;
            } else {
              swal("¡Tratamiento no eliminado!");
            }
          });
      })
    </script>

</html>
<?php
  }

 

else {
  header("Location: ../Expediente/Expedientes.php", TRUE, 301);
} 
}
if (isset($_POST['CopiarAqui'])) {
  if (isset($_SESSION['nControl'])) {
    $NumTrata = $_POST["CopiarAqui"];
    $NumeroDePaciente = $_SESSION['nControl'];
    $_SESSION['nControl'] = $NumeroDePaciente;


    $copiar = $conexion->query("SELECT * FROM `tratamientos` WHERE No_Paciente='$NumeroDePaciente' and No_Trata='$NumTrata'");
    while ($row = $copiar->fetch_array()) {
      $NombresTrata = $row[2];
      $ContenidoTrata = $row[3];
    }
    $Dia = date("d");
    $Mes = date("m");
    $Ano = date("Y");
    $FechaTrata = $Ano . "-" . $Mes . "-" . $Dia;
    $NombresTrata_copia = $NombresTrata;
    $NombresTrata_copia = $NombresTrata_copia . " copia"." 1" ;
    $buscar = $conexion->query("SELECT * FROM `tratamientos`");
    
    while ($row = $buscar->fetch_array()) {
      $NombresTrata2 = $row[2];
      if ($NombresTrata2 == $NombresTrata_copia) {
        $longitud= strlen($NombresTrata2);
        $contador = $NombresTrata2[$longitud-1];
        $NombresTrata_copia[$longitud-1]=$contador+1;
        
        
        
      }
    }

    $consulta2 = "insert into tratamientos (No_Paciente,Nombre,Contenido,Fecha) values ('$NumeroDePaciente','$NombresTrata_copia','$ContenidoTrata', '$FechaTrata')";
    $consulta3 = $conexion->query($consulta2);
    if ($consulta3) {
?>
  <script type="Text/javascript">
    let timerInterval
Swal.fire({
title: 'Ejecutando',
html: 'Copiando tratamiento',
timer: 2000,
timerProgressBar: true,
didOpen: () => {
  Swal.showLoading()
  const b = Swal.getHtmlContainer().querySelector('b')
  timerInterval = setInterval(() => {
    b.textContent = Swal.getTimerLeft()
  }, 1000)
},
willClose: () => {
  clearInterval(timerInterval)
}
}).then((result) => {
/* Read more about handling dismissals below */
if (result.dismiss === Swal.DismissReason.timer) {
  window.location.href = "../Tratamiento/Tratamiento_Interfaz.php";
}
})

  </script>

<?php
    }
  }
} 
?>