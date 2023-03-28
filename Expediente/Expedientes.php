<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<html>
<?php
$title = "Expediente Clinico ITSZaS";
require '../Menu/menu_cabecera.php';
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="estilo_expediente_modificada2.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../Expediente/js/jquery-3.6.1.min.js"></script>
<!--DATATABLES-->
<script src="../Agenda/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="../Agenda/jquery.dataTables.min.css" />
</head>


<style>
  #scroll2 {
    overflow-y: scroll;
    overflow-x: hidden;
  }
</style>
<div>
  <?php
  include '../Expediente_Nuevo/NuevoExpedienteModal.php';
  ?>
</div>

<div>
  <?php
  include '../Expediente_Unifica/Unificar_Expedientes_Modal.php';
  ?>
</div>

<div class="aside3">
  <div id="pointer"></div>
  <h2 id="TextoAgenda" id="atras1">Expedientes</h2>
</div>
<div class="aside2">

  <form class="" action="" method="get">

    <div class="form first">
      <div class="fields">
        <input class="CajasText" id="nomb" type="text" name="Nombre" placeholder="Nombres">
      </div>

      <div class="fields">
        <input class="CajasText" id="pate" type="text" name="Paterno" placeholder="Ap. paterno">
      </div>

      <div class="fields">
        <input class="CajasText" id="mater" type="text" name="Materno" placeholder="Ap. materno">
      </div>

      <div class="fields">
        <select class="CajasText" id="sex" type="text" name="Sexo">
          <option value="" selected>Selecciona un Sexo</option>
          <option value="Hombre">Hombre</option>
          <option value="Mujer">Mujer</option>
        </select>
      </div>

      <div class="fields">
        <input class="CajasText" id="date" type="text" name="Control" placeholder="No. control">
      </div>
      
    </div>

    <div class="fields">
      <input id="buton" class="bubbly-button" type="submit" name="enviar" value="Buscar">
    </div>
  </form>

</div>


<div class="container">

  <form method="post" action="../Datos_Del_Paciente/Dat_Pac_Interfaz.php" >
    <table id="tabla">
      <thead>
        <tr>
          <th>No. control</th>
          <th>Nombre</th>
          <th>Apellido paterno</th>
          <th>Apellido materno</th>
          <th>Sexo</th>
          <th>Acciones...</th>
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

<script>
  $(document).ready(function() {
    $("#tabla").DataTable({
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
        [5, 10, 25],
        [5, 10, 25],
      ],
    });
  });
</script>

</html>