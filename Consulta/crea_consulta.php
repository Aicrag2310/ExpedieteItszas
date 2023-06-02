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
        #$consulta=$conexion->query("SELECT MAX() FROM consultas;");
        $sqlSelectRegistro = $conexion->query("SELECT MAX(No_Consulta) 
        FROM consultas;");

        while($row=$sqlSelectRegistro->fetch_array()) {
        $NumNota = $row[0];
        }
        $NumNota = (int) $NumNota;
        //Convirtiendo el registro de la mascota en entero
        $NumNota = $NumNota + 1;
        $numconsulta= $NumNota;
        $no_paciente = $_POST["campo"];


    //OBTENCION DE SIGNOS VITALES
    $motivo = $_POST["motivo"];
    #echo $motivo;
    $padecimiento = $_POST["padecimiento"];
    #echo $padecimiento;
    $diagnostico = $_POST["Diagnostico"];

    //TRATAMIENTO
    $TratamientoTitulo = $_POST["TratamientoTitulo"];
    $Tratamientotxt = $_POST["Tratamientotxt"];
    $fecha = date("Y-m-d");

    #echo $diagnostico;

  //PRIMERO SE CREA LA CONSULTA

 $insert = $conexion->query(
    "INSERT `consultas`(`No_Consulta`,`No_Paciente`, `Hora_inicio`, `Hora_end`, `Motivo_consulta`, 
    `Padecimiento`, `Diagnostico`, `Fecha`) 
    VALUES ('$numconsulta','$no_paciente',CURTIME(),CURTIME(),'$motivo','$padecimiento','$diagnostico',CURDATE()) ;");
 if($insert){
    $var=1;

    $peso = $_POST["Peso"];
    $talla = $_POST["Talla"];
    $temperatura = $_POST["Temperatura"];

    if ($peso != "" && $talla != ""){
        $imc = $peso / ($talla * $talla) * 10000;
    } else {
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
    
    $insert_trta = $conexion->query(
        "INSERT INTO `tratamientos`( `No_Paciente`, `Nombre`, `Contenido`, `Fecha`)
         VALUES ('$no_paciente','$TratamientoTitulo','$Tratamientotxt','$fecha')"
    );

    //echo $no_paciente;

 //echo $numconsulta."numero de consulta";
 
 //SE INSERTAN LOS SIGNOS VITALES
 
  if($insert2==1){
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
    echo mysqli_error($conexion);
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
