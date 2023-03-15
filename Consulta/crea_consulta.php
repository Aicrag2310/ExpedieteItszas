<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="peticiones.js"></script>

<?php
#
#$host = "localhost";
#$user = "u283658544_Admin";
#$pass="Itszas1234";
#$database="u283658544_Itszas";

#$conexion=mysqli_connect($host,$user,$pass,$database);
include '../Conexion_BD/Conexion.php';

if($conexion)
{
    #echo "CONEXION EXISTOSA!!!";
}
else
{
    #echo "No se puede establecer una conexion";
}
$var=0;


if(isset($_POST["guardaconsulta"])){
     //SE OBTIENE EL NUMERO DE CONSULTA
        $numconsulta="";
        $no_paciente = $_POST["campo"];

        $consulta=$conexion->query("SELECT MAX(No_Consulta) FROM consultas;");
        while ($row=$consulta->fetch_array()) {
        $numconsulta=($row[0]);
        }



    //OBTENCION DE SIGNOS VITALES
    $motivo = $_POST["motivo"];
    #echo $motivo;
    $padecimiento = $_POST["padecimiento"];
    #echo $padecimiento;
    $diagnostico = $_POST["Diagnostico"];
    #echo $diagnostico;

  //PRIMERO SE CREA LA CONSULTA

 $insert = $conexion->query(
    "INSERT `consultas`(`No_Paciente`, `Hora_inicio`, `Hora_end`, `Motivo_consulta`, 
    `Padecimiento`, `Diagnostico`, `Fecha`) 
    VALUES ('$no_paciente',CURTIME(),CURTIME(),'$motivo','$padecimiento','$diagnostico',CURDATE()) ;");
 if($insert){
    $var=1;

    $peso = $_POST["Peso"];
    $talla = $_POST["Talla"];
    $temperatura = $_POST["Temperatura"];

    if (($peso != "" or $peso != " ") and ($talla != "" or $talla != " ")){
        $imc = (($peso)/ (($talla*$talla)))*10000;
    }
    else{
        $imc = 0;
    }

    $sistolica = $_POST["sistólica"];
    $diastolica = $_POST["diastólica"];
    $cardiaca = $_POST["cardiaca"];
    $respiratoria = $_POST["respiratoria"];
    $glucosa = $_POST["Glucosa"];


    $insert2 = $conexion->query(
    "INSERT INTO `signos_vitales`(`No_Consulta`, `Peso`, `Altura`, `Temperatura`, 
    `IMC`, `TensionSistolica`, `TensionDiastolica`, `FrecuenciaCardiaca`, `FrecuenciaRespiratoria`, `Glucosa`)
     VALUES ('$numconsulta','$peso','$talla','$temperatura','$imc','$sistolica','$diastolica','$cardiaca','$respiratoria','$glucosa')");
    //echo ("Hola");

    //echo $no_paciente;

 //echo $numconsulta."numero de consulta";
 
 //SE INSERTAN LOS SIGNOS VITALES
 
  if($insert==1){
      ?>
      <script>
      Swal.fire({
      icon: 'success',
      title: 'Consulta agregada correctamente',
      showConfirmButton: false,
      timer: 1500
      })
      </script> <?php
      
      ?>
      <div>
        <h2>Gráficas <h4>Si es la primera consulta del paciente, las gráficas no se mostrarán.</h4></h2>
      <?php
      include('Graficas.php');
      ?>
      </div>
      <?php
  }
  else
  {
     ?>
      <script>
      Swal.fire({
      icon: 'error',
      title: 'Error al agregar', 
      showConfirmButton: false,   
      timer: 1500
      })
      </script> <?php
  }

 }
 else
 {
    ?>
     <script>
     Swal.fire({
     icon: 'error',
     title: 'Error al agregar', 
     showConfirmButton: false,   
     timer: 1500
     })
     </script> <?php
 }


}
$conexion->close();

?>