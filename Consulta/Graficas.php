
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content "IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" />
    </script>
    <meta name='viewport' content='user-scalable=0'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

</head>
<style>
    .fields1 {
        position: relative;
        background-color: #fff;

        width: 40%;
        height: 40%;
        display: inline-block;
        padding: 2%;
    }
</style>

    <div class="fields1">
        <canvas id="MiGrafica1"></canvas>
    </div>

    <div class="fields1">
        <canvas id="MiGrafica2"></canvas>
    </div>
    <div class="fields1">
        <canvas id="MiGrafica4"></canvas>
    </div>
    <div class="fields1">
        <canvas id="MiGrafica5"></canvas>
    </div>
    <?php
    include '../Conexion_BD/Conexion.php';
    $no_paciente = "";
    $no_paciente = $_POST["campo"];



    /* Aquí se obtienen los datos de la tabla de signos vitales para después mostrarlos en la gráfica*/

    #DESACTIVADO if(isset($_SESSION['nControl']))
    #{
    #$NumeroDePaciente = $_SESSION['nControl'];

    $NumeroDePaciente = $no_paciente;
    #echo "Numero del paciente dentro de Graficas" ,$NumeroDePaciente;
    $contador_perron = 0;

    $imc = 35;
    $temperatura = 40;
    $fc = 30;
    $fr = 17;
    $ts = 105;
    $td = 78;

    $consulta1 = $conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'");

    while ($row = $consulta1->fetch_array()) {
        $contador_perron = $contador_perron + 1;
    }
    ?>


    <!--Aquí está el código de las gráficas en js-->
    <script>
        let miCanvas1 = document.getElementById("MiGrafica1").getContext("2d");
        var chart = new Chart(miCanvas1, {
            type: "bar",
            data: {
                labels: [<?php
                            $c = 1;
                            while ($c <= $contador_perron) {
                                echo "\"Consulta $c\""; ?>, <?php
                                                            $c = $c + 1;
                                                        } ?>],
                datasets: [{
                    label: "IMC",
                    backgroundColor: [<?php $consulta1 = $conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'");
                                        while ($row = $consulta1->fetch_array()) {
                                            if ($row[4] >= 18.5 && $row[4] <= 24.9) {

                                                echo "\"rgb(0,179,60)\"" ?>, <?php
                                                                            } elseif ($row[4] >= 25 && $row[4] <= 29.9) {
                                                                                echo "\"rgb(255,255,51)\"" ?>, <?php

                                                                                                    } elseif ($row[4] >= 30 && $row[4] <= 34.9) {
                                                                                                        echo "\"rgb(255,128,0)\"" ?>, <?php

                                                                                                    } elseif ($row[4] >= 35 && $row[4] <= 39.9) {
                                                                                                        echo "\"rgb(255,128,0)\"" ?>, <?php

                                                                                                    } elseif ($row[4] >= 40) {
                                                                                                        echo "\"rgb(230,0,38)\"" ?>, <?php

                                                                                                    } elseif ($row[4] < 18) {
                                                                                                        echo "\"rgb(153,170,255)\"" ?>, <?php
                                                                                                    }
                                                                                                } ?>],

                    data: [<?php $consulta1 = $conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'");
                            while ($row = $consulta1->fetch_array()) {
                                echo $row[4] ?>, <?php } ?>]
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 50
                        }
                    }]
                }
            }
        })

        let miCanvas2=document.getElementById("MiGrafica2").getContext("2d");
    var chart = new Chart(miCanvas2,{
    type:"bar",
    data:{
        labels:[<?php  
        $c=1;
        $i="hola"; 
        while ($c<=$contador_perron){
            echo "\"Consulta $c\"";?>,<?php
            $c=$c+1;
        } ?>],
        datasets:[
            {
                label:"Glucosa",
                backgroundColor:[<?php $consulta1=$conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'"); 
                                $ayunas=1;
                                while ($row=$consulta1->fetch_array()) {
                                    if ($ayunas == 1)
                                    {
                                        if ($row[7]>=60 && $row[7]<=100){

                                            echo "\"rgb(0,179,60)\"" ?>, <?php 
                                        } elseif ($row[7]>100 && $row[7]<=125){
                                            echo "\"rgb(255,255,51)\"" ?>, <?php 
    
                                        }elseif ($row[7]>=126){
                                            echo "\"rgb(230,0,38)\"" ?>, <?php 
    
                                        }
                                    }else{
                                        
                                        if ($row[7]>=100 && $row[7]<=139){

                                            echo "\"rgb(0,179,60)\"" ?>, <?php 
                                        } elseif ($row[7]>139 && $row[7]<=199){
                                            echo "\"rgb(255,255,51)\"" ?>, <?php 
    
                                        }elseif ($row[7]>=200){
                                            echo "\"rgb(230,0,38)\"" ?>, <?php 
    
                                        }
                                    }
                                    
                                     
                                     
                                     }?>],
                data:[<?php $consulta1=$conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'"); 
                                while ($row=$consulta1->fetch_array()) { echo $row[7]?>, <?php }?>]
            }
            ]
        },

    // Configuration options go here
    options: {                                        
            scales: {
                yAxes: [
                    {
                        ticks: {     
                            min: <?php if ($ayunas==1)
                            {
                                echo 50?>,<?php
                            }else{
                                echo 100 ?>,<?php
                            }
                            ?>
                            max: <?php if ($ayunas==1)
                            {
                                echo 126?>,<?php
                            }else{
                                echo 200 ?>,<?php
                            }
                            ?> 
                        }
                    }
                ]
            }
    }
    })

        let miCanvas4 = document.getElementById("MiGrafica4").getContext("2d");
        var chart = new Chart(miCanvas4, {
            type: "bar",
            data: {
                labels: [<?php
                            $c = 1;
                            while ($c <= $contador_perron) {
                                echo "\"Consulta $c\""; ?>, <?php
                                                            $c = $c + 1;
                                                        } ?>],
                datasets: [{
                    label: "Presión sistólica",
                    backgroundColor: [<?php $consulta1 = $conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'");

                                        while ($row = $consulta1->fetch_array()) {

                                            $consulta2 = $conexion->query("SELECT MAX_Sistolica,MIN_Sistolica
                                    FROM informacion_sistolica 
                                    Where Genero = '$row[3]' AND ('$row[2]'>=Min_Edad AND '$row[2]'<=Max_Edad)");

                                            $row2 = $consulta2->fetch_array();
                                            $diferencia = $row2[0] - $row2[1];
                                            $division = $diferencia / 3;
                                            if ($row[5] >= $row2[1] && $row[5] <= ($row2[1] + $division)) {

                                                echo "\"rgb(0,179,60)\"" ?>, <?php
                                                                            } elseif ($row[5] > ($row2[1] + $division) && $row[5] <= ($row2[1] + ($division * 2))) {
                                                                                echo "\"rgb(255,255,51)\"" ?>, <?php

                                                                                                    } elseif ($row[5] > ($row2[1] + ($division * 2)) && $row[5] <= ($row2[1] + ($division * 3))) {
                                                                                                        echo "\"rgb(230,0,38)\"" ?>, <?php

                                                                                                    }
                                                                                                } ?>],

                    data: [<?php $consulta1 = $conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'");
                            while ($row = $consulta1->fetch_array()) {
                                echo $row[5] ?>, <?php } ?>]
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            min: <?php echo $row2[1] ?>,
                            max: <?php echo $row2[0] ?>
                        }
                    }]
                }
            }
        })
        let miCanvas5 = document.getElementById("MiGrafica5").getContext("2d");
        var chart = new Chart(miCanvas5, {
            type: "bar",
            data: {
                labels: [<?php
                            $c = 1;
                            while ($c <= $contador_perron) {
                                echo "\"Consulta $c\""; ?>, <?php
                                                            $c = $c + 1;
                                                        } ?>],
                datasets: [{
                    label: "Presión diastólica",
                    backgroundColor: [<?php $consulta1 = $conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'");

                                        while ($row = $consulta1->fetch_array()) {

                                            $consulta2 = $conexion->query("SELECT MAX_Diastolica,MIN_Diastolica
                                    FROM informacion_diastolica 
                                    Where Genero = '$row[3]' AND ('$row[2]'>=Min_Edad AND '$row[2]'<=Max_Edad)");

                                            $row2 = $consulta2->fetch_array();
                                            $diferencia = $row2[0] - $row2[1];
                                            $division = $diferencia / 3;
                                            if ($row[6] >= $row2[1] && $row[6] <= ($row2[1] + $division)) {

                                                echo "\"rgb(0,179,60)\"" ?>, <?php
                                                                            } elseif ($row[6] > ($row2[1] + $division) && $row[6] <= ($row2[1] + ($division * 2))) {
                                                                                echo "\"rgb(255,255,51)\"" ?>, <?php

                                                                                                    } elseif ($row[6] > ($row2[1] + ($division * 2)) && $row[6] <= ($row2[1] + ($division * 3))) {
                                                                                                        echo "\"rgb(230,0,38)\"" ?>, <?php

                                                                                                    }
                                                                                                } ?>],

                    data: [<?php $consulta1 = $conexion->query("SELECT c.No_Consulta, dp.Nombre, dp.Edad, dp.Sexo, sv.IMC, sv.TensionSistolica,sv.TensionDiastolica,sv.Glucosa
                                FROM signos_vitales sv 
                                INNER JOIN consultas c ON c.No_Consulta = sv.No_Consulta
                                INNER JOIN datosgen_paciente dp ON c.No_Paciente = dp.No_Paciente
                                Where dp.No_Paciente = '$NumeroDePaciente'");
                            while ($row = $consulta1->fetch_array()) {
                                echo $row[6] ?>, <?php } ?>]
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            min: <?php echo $row2[1] ?>,
                            max: <?php echo $row2[0] ?>
                        }
                    }]
                }
            }
        })
    </script>


<?php
#ESTA LLAVE ES DEL IF DEL PRINCIPIO }

?>