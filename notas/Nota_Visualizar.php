<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="../Login/js/jquery-3.6.0.min.js"></script>
<?php
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');
include '../Conexion_BD/Conexion.php';

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

    $consulta1 = $conexion->query("Select * from `notas_evolucion`
                            where No_Paciente = '$NumeroDePaciente' and No_Nota = '$NumTrata';");
    while ($row = $consulta1->fetch_array()) {
      $NombresTrata = $row[2];
      $ContenidoTrata = $row[3];
      $diagnostico = $row[5];
      $FechaTrata = $row[4];
    }
    #$NomPaciente = $Nombres;
    #echo $Paciente;
    #echo $NumeroDePaciente;


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

      .textAreaVer {
        position: relative;
        left: 0%;
        top: 100px;
        height: 25%;
        width: 85%;
        resize: none;
      }
      .contenido2{
        position: absolute;
    left: 30%;
    top: 20%;
 
    resize: none;
      }
      .diagnóstico2{
        position: absolute;
    left: 30%;
    top:70%;
 
    resize: none;
      }
    </style>

    <div class="aside3">
      <div id="pointer"></div>
      <h2 id="TextoAgenda" id="atras1">Visualizar nota</h2>
    </div>

    <div class="aside">
      <div class="fields">
        <input class="CajasText" id="nomb" type="text" name="NombreNOTAS" placeholder="Ingresa nombre de la nota" Value="<?php echo $NombresTrata ?>" disabled>
      </div>
      <div class="fields">
        <input class="CajasText" id="date" type="date" name="CalendariNOTAS" onkeydown="return false" value='<?php echo $FechaTrata ?>' placeholder="Escribe la nota" disabled>
      </div>
      <h3 class="contenido2">Contenido</h3>
      <br>
      <textarea class="textAreaVer" name="AreaText2" disabled> <?php echo $ContenidoTrata ?></textarea>
      <br>
      <br>
      <h3 class="diagnóstico2">Diagnóstico</h3>
      <br>
      <br>
      <textarea class="textAreaVer" name="AreaText3" disabled> <?php echo $diagnostico ?></textarea>

      <a href="EliminarNot.php?id=<?php echo $NumTrata; ?>" class="bubbly-button" id="entrar" align="center">Eliminar</a>
      <br>
      <br>
      <br>
      <br>
      <a href="../Notas/Nota_Interfaz.php" class="bubbly-button" id="limpiar" align="center">Regresar</a>

    </div>
    </div>

    <script>
      $('#entrar').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        swal({
            title: "¿Estás seguro?",
            text: "¿Estás seguro de eliminar esta nota?",
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
  } else {
    header("Location: ../Expediente/Expedientes.php", TRUE, 301);
  }
}


## METODO PARA COPIAR 
if (isset($_POST['CopiarAqui'])) {
  if (isset($_SESSION['nControl'])) {
    $NumTrata = $_POST["CopiarAqui"];
    $NumeroDePaciente = $_SESSION['nControl'];
    $_SESSION['nControl'] = $NumeroDePaciente;


    $copiar = $conexion->query("SELECT * FROM `notas_evolucion` WHERE No_Paciente='$NumeroDePaciente' and No_Nota='$NumTrata'");
    while ($row = $copiar->fetch_array()) {
      $NombresTrata = $row[2];
      $ContenidoTrata = $row[3];
      $contenidodiagnostico = $row[5];
    }
    $Dia = date("d");
    $Mes = date("m");
    $Ano = date("Y");
    $FechaTrata = $Ano . "-" . $Mes . "-" . $Dia;
    $NombresTrata_copia = $NombresTrata;
    $NombresTrata_copia = $NombresTrata_copia . " copia"." 1" ;
    $buscar = $conexion->query("SELECT * FROM `notas_evolucion`");
    
    while ($row = $buscar->fetch_array()) {
      $NombresTrata2 = $row[2];
      if ($NombresTrata2 == $NombresTrata_copia) {
        $longitud= strlen($NombresTrata2);
        $contador = $NombresTrata2[$longitud-1];
        $NombresTrata_copia[$longitud-1]=$contador+1;
        
        
        
      }
    }


    $consulta2 = "insert into notas_evolucion (No_Paciente,Nombre,Contenido,Fecha,Diagnostico) values ('$NumeroDePaciente','$NombresTrata_copia','$ContenidoTrata', '$FechaTrata','$contenidodiagnostico')";
    $consulta3 = $conexion->query($consulta2);
    if ($consulta3) {
?>
  <script type="Text/javascript">
    let timerInterval
Swal.fire({
  title: 'Ejecutando',
  html: 'Copiando nota de evolución',
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
    window.location.href = "../Notas/Nota_Interfaz.php";
  }
})

    </script>

<?php
    }
  }
}
?>