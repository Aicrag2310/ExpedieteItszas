<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php include '../Conexion_BD/Conexion.php';
$sql = "SELECT * FROM datosgen_paciente ";
$result = mysqli_query($conexion, $sql);
?>
<select class="tablaEX1" name="Control1" id="Control1" onchange="ObtenerPaciente1();">
  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option>$row[No_Paciente]</option>";
  }
  ?>
</select>
<script>
  $(".tablaEX1").select2({
    placeholder: "Seleccionar paciente"
  });
  $('.tablaEX1').val(null).trigger("change")


  function ObtenerPaciente1(){
    var Paciente = document.getElementById("Control1").value;
    if((Paciente != "")||(Paciente != " "))
    {   

        datos = { nombre: Paciente };
  $.ajax({
    url: "../Expediente_Unifica/sacar_nombre1.php",
    type: "POST",
    data: datos,
  }).done(function (respuesta) {
    if (respuesta.estado === "ok") {
      console.log(JSON.stringify(respuesta));
      
      var nombre = respuesta.nombre;
      var Apellido = respuesta.apellido;
      var Apellido2 = respuesta.apellido2;
      
      $("#nombre1").val(nombre);
      $("#apellido_paterno1").val(Apellido);
      $("#apellido_materno1").val(Apellido2);
    }
  });

    }
}

</script>
