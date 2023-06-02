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
<script src="../Expediente/js/jquery-3.6.1.min.js"></script>
<!--DATATABLES-->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="jquery.dataTables.min.css" />
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



<div class="container">

  <form method="post" action="../Datos_Del_Paciente/Dat_Pac_Interfaz.php" >
    <table id="tabla" style="width=50%">
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

