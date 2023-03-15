<?php


if(isset($_POST["Cardi"])){

    include ('../Conexion_BD/Conexion.php');

    $frec_cardi_Estado= "No informacion";
    $PacienteActual = $_POST["PacienteCita"];
    #echo "Paciente actual: ", $PacienteActual;
    
    $Inadecuado="";
    $Normal_min="";
    $Normal_max="";
    $Bueno_min="";
    $Bueno_max="";

    $Ca= $_POST["Cardi"];
    $Cardi = intval($Ca);
    $Color = "lightgray";

    $valores = array();
    $valores['Color'] = $Color;
    $valores['Frec'] = $frec_cardi_Estado;

    $consulta=$conexion->query(
        "SELECT Inadecuado, Normal_MIN, Normal_MAX, Bueno_MIN, Bueno_MAX
        FROM `frecuencia_cardiaca` 
        WHERE Genero= (SELECT Sexo from datosgen_paciente WHERE No_Paciente= '$PacienteActual')
        AND (SELECT Edad from datosgen_paciente WHERE No_Paciente= '$PacienteActual') >= Min_Edad 
        and (SELECT Edad from datosgen_paciente WHERE No_Paciente= '$PacienteActual') <= Max_edad;");


    while($row = $consulta->fetch_array()) {
        $Inadecuado= intval($row["Inadecuado"]);
        $Normal_min= intval($row["Normal_MIN"]);
        $Normal_max= intval($row["Normal_MAX"]);
        $Bueno_min= intval($row["Bueno_MIN"]);
        $Bueno_max= intval($row["Bueno_MAX"]);
        ?>
        <?php
        
        if ($Cardi >= $Inadecuado){
            $frec_cardi_Estado="Inadecuado";
            $Color = "red";
        }
        elseif($Cardi >= $Normal_min & $Cardi <= $Normal_max ){
            $frec_cardi_Estado="Normal";
            $Color = "lightgreen";
            
        }
        elseif
            ($Cardi >= $Bueno_min & $Cardi <= $Bueno_max ){
            $frec_cardi_Estado="Bueno";
            $Color = "yellow";
        }
        else{
            $frec_cardi_Estado= "Inadecuado";
            $Color = "lightgray";
        }
        $valores['Color'] = $Color;
        $valores['Frec'] = $frec_cardi_Estado;
        }
        
}
$valores = json_encode($valores);
#$valores = json_encode($valores);
echo $valores;
?>