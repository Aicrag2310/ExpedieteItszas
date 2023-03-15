<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php include '../Conexion_BD/Conexion.php';

$sql = "SELECT * FROM datosgen_paciente ";
$result = mysqli_query($conexion, $sql);




?>




<select class="tabla" name="campo" id="campo" onchange="ObtenerPaciente();">
  <?php
  while ($row = mysqli_fetch_assoc($result)) {

    echo "<option>$row[No_Paciente]</option>";
  }
  ?>
</select>

<script>
  $(".tabla").select2({
    placeholder: "Seleccionar paciente"

  });

  $('.tabla').val(null).trigger("change")

</script>
