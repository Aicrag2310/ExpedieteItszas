<html>
<?php
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');
include '../Conexion_BD/Conexion.php';
if (isset($_SESSION['nControl'])) {
  #$NumControl = $_GET['nControl'];
  #echo $NumControl;
  #setcookie("nControl", $NumControl);
  #$_SESSION["nControl"] = $NumControl;
  #  echo $_SESSION["nControl"];

  $Dia = date("d");
  $Mes = date("m");
  $Ano = date("Y");
  #$Dia2 = $Dia-1;
  #$fecha = date("d") . " del " . date("m") . " de " . date("Y");
  $fecha = $Ano . "-" . $Mes . "-" . $Dia;
  $NumeroDePaciente = $_SESSION['nControl'];

  $consulta1 = $conexion->query("Select Nombre, Apellido_Paterno, Apellido_Materno
                            from `datosgen_paciente`
                            where No_Paciente = '$NumeroDePaciente';");
  while ($row = $consulta1->fetch_array()) {
    $Nombres = $row[0] . " " . $row[1] . " " . $row[2];
  }
  $NomPaciente = $Nombres;
  #echo $Paciente;
  #echo $NumeroDePaciente;
?>

  <?php

  ?>
  <meta name='viewport' content='user-scalable=0'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--DATATABLES-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="../Agenda/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../Agenda/jquery.dataTables.min.css" />

  <link rel="stylesheet" href="estilo_agenda_modificada2.css">
  <link rel="stylesheet" href="Estilo_Evo.css">

  <style>
    #scroll2 {
      overflow-y: scroll;
      overflow-x: hidden;
    }

    .textArea {
      position: absolute;
      left: 0%;
      top: 10%;
      height: 76.7%;
      width: 85%;
      resize: none;
    }
  </style>

  <div class="aside3">
    <div id="pointer"></div>
    <h2 id="TextoAgenda" id="atras1">Tratamiento</h2>
    <div id="TextoNomPas">Paciente: <?php echo $NomPaciente ?></div>
  </div>

  <div class="aside2">
    <?php
    include '../OpcionesDeExpendientes/Opciones_Tratamientos.php';
    ?>
    <style>
      <?php
      $css = file_get_contents('../OpcionesDeExpendientes/Opciones_Defecto.css');
      echo $css;
      ?>
    </style>
  </div>

  </form>
  </div>

  <div class="container1">
    <form action="Tratamiento_Visualizar.php" id="scroll2" method="post">
      <table id="rwd_auto">
        <thead>
          <tr>
            <th>Título</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $consulta = $conexion->query("Select * from `tratamientos` T
        where No_Paciente = '$NumeroDePaciente'");

          #include  'Busqueda_Inteligente.php';
          while ($ver = mysqli_fetch_row($consulta)) {
          ?>
            <tr>
              <td><?php echo $ver[2]; ?></td>
              <td><?php echo $ver[4]; ?></td>
              <td>
                <button type='submit' class="bubbly-button2" value=<?php echo $ver[0] ?> name='DatosAqui'>
                  Abrir...
                  <button type='submit' class="bubbly-button2" value=<?php echo $ver[0] ?> name='CopiarAqui'>
                    Copiar
                  </button>

              </td>
            </tr>
          <?php
          }
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
        <h2 id="TextoAgenda2" id="atras1">Nuevo tratamiento</h2>
      </div>
      <form action="#" id="form" method="post">
        <div class="fields">
          <input class="CajasText" id="nomb" type="text" name="NombreNOTAS" placeholder="Ingresa nombre del tratamiento" required >
        </div>
        <div class="fields">
          <input class="CajasText" id="date" type="date" name="CalendariNOTAS" onkeydown="return false" value='<?php echo $fecha ?>' 
          placeholder="Escribe el tratamiento" required >
        </div>

        <textarea class="textArea" required name="AreaText2"></textarea>
        <button id="entrar" class="bubbly-button" name="GuardarNota">Guardar</button>
        <button id="limpiar" class="bubbly-button" name="LimpiarNota">Limpiar</button>
      </form>
    </div>
    <label for="btn-modal" class="cerrar-modal"></label>
  </div>


</html>

<script>
  $(document).ready(function() {
    $("#rwd_auto").DataTable({
      language: {
        processing: "Tratamiento en curso...",
        search: "Buscar&nbsp;:",
        lengthMenu: "Agrupar de _MENU_ items",
        info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
        infoEmpty: "No existen datos.",
        infoFiltered: "(filtrado de _MAX_ elementos en total)",
        infoPostFix: "",
        loadingRecords: "Cargando...",
        zeroRecords: "No se encontraron datos con tu busqueda",
        emptyTable: "No hay datos disponibles en la tabla.",
        paginate: {
          first: "Primero",
          previous: "Anterior",
          next: "Siguiente",
          last: "Ultimo",
        },
        aria: {
          sortAscending: ": active para ordenar la columna en orden ascendente",
          sortDescending: ": active para ordenar la columna en orden descendente",
        },
      },
      scrollY: 400,
      lengthMenu: [
        [5, 10, 25, -1],
        [5, 10, 25, "All"],
      ],
    });
  });
</script>
<?php
  if (isset($_POST['GuardarNota'])) {
    if (strlen($_POST['AreaText2']) >= 1) {
      $contenido = trim($_POST['AreaText2']);
      $nombre_nota = $_POST['NombreNOTAS'];

      // Seleccionando el ultimo numero de registro de la mascota
      $sqlSelectRegistro = $conexion->query("SELECT MAX(No_Trata) 
                            FROM tratamientos
                            where No_Paciente = '$NumeroDePaciente'");

      while($row=$sqlSelectRegistro->fetch_array()) {
        $NumNota = $row[0];
      }
      $NumNota = (int) $NumNota;
      //Convirtiendo el registro de la mascota en entero
      $NumNota = $NumNota + 1;


      $consulta2 = "INSERT into tratamientos (No_Trata,No_Paciente,Nombre,Contenido,Fecha) 
                    values ('$NumNota','$NumeroDePaciente','$nombre_nota','$contenido', '$fecha')";
      $consulta3 = $conexion->query($consulta2);
      if ($consulta3) {
      ?>
      <script>
          Swal.fire({
          icon: 'success',
          title: 'Tratamiento agregado',
          showConfirmButton: false,
          timer: 1500
        }).then((result) => {
          window.location.href = "../Tratamiento/Tratamiento_Interfaz.php";
        })
      </script>
    <?php

      } else {
    ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Ocurrio un Error', 
          showConfirmButton: false,   
          timer: 1500
          })
  </script>
    <?php
      }
    } else {


    ?>
    <script>
      Swal.fire({
          icon: 'error',
          title: 'Llena todos los campos', 
          showConfirmButton: false,   
          timer: 1500
          })
</script>
<?php
    }
  }
} else {
  header("Location: ../Expediente/Expedientes.php", TRUE, 301);
}
?>