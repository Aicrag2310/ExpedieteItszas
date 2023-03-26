<html>
<?php
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');
include('../Conexion_BD/Conexion.php');
if (isset($_SESSION['nControl'])) {
  $id_paciente = $_SESSION["nControl"];

  $NumControl = $_SESSION['nControl'];
  $_SESSION["nControl"] = $NumControl;

  $id_paciente = $_SESSION["nControl"];


  $Dia = date("d");
  $Mes = date("m");
  $Ano = date("Y");
  $fecha = $Ano . "-" . $Mes . "-" . $Dia;
  $NumeroDePaciente = $_SESSION['nControl'];

  $consulta1 = $conexion->query("SELECT Nombre, Apellido_Paterno, Apellido_Materno
                              from `datosgen_paciente`
                              where No_Paciente = '$NumeroDePaciente';");
  while ($row = $consulta1->fetch_array()) {
    $Nombres = $row[0] . " " . $row[1] . " " . $row[2];
  }
  $NomPaciente = $Nombres;
?>
  <meta name='viewport' content='user-scalable=0'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="Estilo_Historial.css">
  <!--DATATABLES-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="../Agenda/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../Agenda/jquery.dataTables.min.css" />


  <style>
    #Scroll {
      overflow-y: scroll;
      overflow-x: hidden;
    }
  </style>
  <div class="aside3">
    <div id="pointer"></div>
    <h2 id="TextoAgenda" id="atras1">Historial</h2>
    <div id="TextoNomPas">Paciente: <?php echo $NomPaciente ?></div>
  </div>

  <div class="aside2">
    <?php
    include '../OpcionesDeExpendientes/Opciones_Historial.php';
    ?>
    <style>
      <?php
      $css = file_get_contents('../OpcionesDeExpendientes/Opciones_Defecto.css');
      echo $css;
      ?>
    </style>
  </div>

  <div class="asideContenidos">
    <div id="pointer2">
      <h1 id="Texto1" id="atras1">Consultas</h1>
    </div>
    <div>
      <form action="consultas.php" method="post">
        <button id="buton" id="todas" class="bubbly-button" value=<?php echo $id_paciente ?> name="todas">Descargar consultas </button>
      </form>
    </div>

    <div id="pointer3">
      <h1 id="Texto2" id="atras1">Archivos paciente</h1>
    </div>


    <div>

      <form name="MiForm" id="MiForm" method="post" action="agregar_archivos.php" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-8">
            <div class="boton-modal">
              <div class="input-sel_foto">
                <input type="file" id="image" name="image" multiple="" accept="image/png, .jpeg, .jpg">
                <label for="image">Subir foto</label>
              </div>
            </div>
            <div class="boton-modal2">
              <button name="submit" class="bubbly-button2" value=<?php echo $id_paciente ?>>
                <span class="btnText">Agregar</span>
                <i class="uil uil-navigator"></i>
              </button>
            </div>

          </div>
        </div>
      </form>
    </div>
  </div>


  <div class="TablasEnLinea">
    <div class="container1">
      <form action="Archivo_pdf.php"  method="post">
        <table id="rwd_auto">
          <thead>
            <tr>
              <th>Consulta</th>
              <th>Hora inicio</th>
              <th>Hora fin</th>
              <th>Fecha</th>
              <th>...</th>
            </tr>


          </thead>
          <tbody>
            <?php include('Muestra_Historial.php'); ?>
          </tbody>
        </table>
      </form>
    </div>

    <div class="container2">
      <form action="elimina_archivos.php"  method="post">
        <table id="rwd_auto2">
          <thead>
            <tr>
              <th>Archivos</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php include('muestra_archivos.php'); ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <div id="respuesta"></div>



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


<script>
    $(document).ready(function() {
      $("#rwd_auto2").DataTable({
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
} else {

  header("Location: ../Expediente/Expedientes.php", TRUE, 301);
}
?>