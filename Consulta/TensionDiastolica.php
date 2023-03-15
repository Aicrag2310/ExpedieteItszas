<?php
if(isset($_POST["Diast"])){
    include ('../Conexion_BD/Conexion.php');
    #echo "Entramos a la funcion: ";
        $diastol_Estado= "No información";
        $PacienteActual = $_POST["PacienteCita"];
        $consulta=$conexion->query(
        "SELECT MIN_Diastolica,MAX_Diastolica
        FROM `informacion_diastolica` 
        WHERE Genero= (SELECT Sexo from datosgen_paciente WHERE No_Paciente='$PacienteActual')
        AND (SELECT Edad from datosgen_paciente WHERE No_Paciente='$PacienteActual') >= Min_Edad 
        and (SELECT Edad from datosgen_paciente WHERE No_Paciente='$PacienteActual') <= Max_edad;");
 
        $Tension_Diastolica_MIN="";
        $Tension_Diastolica_MAX="";

        $Dia= $_POST["Diast"];
        $diastol = intval($Dia);
        $Color = "lightgray";
    
        $valores = array();
        $valores['Color'] = $Color;
        $valores['Diasto'] = $diastol_Estado;

        while($row = $consulta->fetch_array()) {
            $Tension_Diastolica_MIN= intval($row["MIN_Diastolica"]);
            $Tension_Diastolica_MAX= intval($row["MAX_Diastolica"]);
            #echo $Tension_Diastolica_MAX, $Tension_Diastolica_MIN;

            if ($diastol >= $Tension_Diastolica_MIN and $diastol <= $Tension_Diastolica_MAX){
                $diastol_Estado="Normal";
                $Color = "lightgreen";
            }
            else{
                $diastol_Estado="Anormal";
                $Color = "red";
            }
        $valores['Color'] = $Color;
        $valores['Diasto'] = $diastol_Estado;

        }
        $valores = json_encode($valores);
        #$valores = json_encode($valores);
        echo $valores;
    }

?>