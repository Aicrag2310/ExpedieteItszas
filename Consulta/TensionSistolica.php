<?php
if(isset($_POST["Sist"])){
    include ('../Conexion_BD/Conexion.php');

//SISTOLICA==================================================
$sistol_Estado= "No información";
$PacienteActual = $_POST["PacienteCita"];
$consulta=$conexion->query(
"SELECT MIN_Sistolica,MAX_Sistolica 
FROM `informacion_sistolica` 
WHERE Genero= (SELECT Sexo from datosgen_paciente WHERE No_Paciente='$PacienteActual')
AND (SELECT Edad from datosgen_paciente WHERE No_Paciente='$PacienteActual') >= Min_Edad 
and (SELECT Edad from datosgen_paciente WHERE No_Paciente='$PacienteActual') <= Max_edad;");

$Tension_Sistolica_MIN="";
$Tension_Sistolica_MAX="";

$sis= $_POST["Sist"];
$sistol = intval($sis);
$Color = "lightgray";

$valores = array();
$valores['Color'] = $Color;
$valores['Sistol'] = $sistol_Estado;

while($row = $consulta->fetch_array()) {
    $Tension_Sistolica_MIN= intval($row["MIN_Sistolica"]);
    $Tension_Sistolica_MAX= intval($row["MAX_Sistolica"]);
    #echo $Tension_Sistolica_MAX, $Tension_Sistolica_MIN;

    if ($sistol >= $Tension_Sistolica_MIN and $sistol <= $Tension_Sistolica_MAX)
    {
        $sistol_Estado="Normal";
        $Color = "lightgreen";
    }
    else{
        $sistol_Estado="Anormal";
        $Color = "red";
    }
    $valores['Color'] = $Color;
    $valores['Sistol'] = $sistol_Estado;
}
$valores = json_encode($valores);
#$valores = json_encode($valores);
echo $valores;
}


?>