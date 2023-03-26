<html>


<?php
$title = "Expediente Clinico ITSZaS";
require '../Menu/menu_cabecera.php';

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="estilo_agenda_modificada2.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!--DATATABLES-->
<script src="jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="jquery.dataTables.min.css" />
<style>
  #scroll2 {
    overflow-y: scroll;
    overflow-x: hidden;
  }
</style>

<div class="aside3">
  <div id="pointer"></div>
  <h2 id="TextoAgenda" id="atras1">Agenda</h2>
</div>

<div class="aside2">
  <form class="" action="" method="get">
    <div class="form first">
      <div class="fields">
        <input class="CajasText" id="cont" type="text" name="No. Control" placeholder="No. control">
      </div>
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
          <option value="" selected>Sexo</option>
          <option value="Hombre">Masculino</option>
          <option value="Mujer">Femenino</option>
        </select>
      </div>
      <div class="fields">
        <input class="CajasText" id="date" type="date" name="Calendari" placeholder="Sexo" onkeydown="return false">
      </div>
    </div>

    <div class="fields">
      <input id="buton" class="bubbly-button" type="submit" name="enviar" value="Buscar">
    </div>
  </form>

</div>

<!-- <a href="../Consulta/Consultas_Interfaz.php" class="bubbly-button2" id="Consultas" align="center">Nueva consulta</a> -->

<div class="container">

  <table id="tabla">
    <thead>
      <tr>
        <th>CURP</th>
        <th>No. consulta</th>
        <th>No. control</th>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Hora de inicio</th>
        <th>Hora de finalización</th>
        <th>Sexo</th>
        <th>Fecha</th>

      </tr>
    </thead>
    <tbody>

      <?php
      include  'Busqueda_combinada.php';
      ?>
    </tbody>
  </table>
  </form>
</div>
<!--Jquery-->

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
        [5, 10, 25, -1],
        [5, 10, 25, "All"],
      ],
    });
  });
</script>

</html>