
<?php 
if (isset($_POST['Unificacion'])) {
    $NumerodeControl1 = $_POST['Control1'];
    $NumerodeControl2 = $_POST['Control2'];

    ################################# CAMBIO NOTAS #################################
    $NotaMAX1 = $conexion->query("SELECT MAX(No_Nota) FROM notas_evolucion where No_Paciente = '$NumerodeControl1'");
    while($row=$NotaMAX1->fetch_array()){
        $NumNota1 = $row[0];
    }
    $NumNota1Conv = (int) $NumNota1;

    $Notas1 = $conexion->query("SELECT * FROM notas_evolucion where	No_Paciente = '$NumerodeControl2'");
    $Notas2 = $conexion->query("DELETE FROM notas_evolucion where No_Paciente = '$NumerodeControl2'");
    while($row=$Notas1->fetch_array()){
        $NumNota1Conv = $NumNota1Conv + 1;
        ##
        $NombreNotas2 = $row[2];
        $ConteNotas2 = $row[3];
        $FechaNotas2 = $row[4];
        $DisagNotas2 = $row[5];
        $consulta1="INSERT into notas_evolucion (No_Nota,
                                                No_Paciente,
                                                Nombre,
                                                Contenido,
                                                Fecha,
                                                Diagnostico) 
                    values ('$NumNota1Conv',
                            '$NumerodeControl1',
                            '$NombreNotas2',
                            '$ConteNotas2', 
                            '$FechaNotas2',
                            '$DisagNotas2')";
        $consulta2=$conexion->query($consulta1);
    }

    ################################# CAMBIO TRATAMIENTOS #################################
    $TrataMAX1 = $conexion->query("SELECT MAX(No_Trata) FROM tratamientos where No_Paciente = '$NumerodeControl1'");
    while($row= $TrataMAX1 ->fetch_array()){
        $NumTrata1 = $row[0];
    }
    $NumTrata1Conv = (int) $NumTrata1;

    $Tratamientos1 = $conexion->query("SELECT * FROM tratamientos where	No_Paciente = '$NumerodeControl2'");
    $Tratamientos2 = $conexion->query("DELETE FROM tratamientos where No_Paciente = '$NumerodeControl2'");
    while($row=$Tratamientos1->fetch_array()){
        $NumTrata1Conv = $NumTrata1Conv + 1;
        ##
        $NombreTrata2 = $row[2];
        $ConteTrata2 = $row[3];
        $FechaTrata2 = $row[4];
        $consulta3="INSERT into tratamientos (No_Trata,
                                                No_Paciente,
                                                Nombre,
                                                Contenido,
                                                Fecha) 
                    values ('$NumTrata1Conv',
                            '$NumerodeControl1',
                            '$NombreTrata2',
                            '$ConteTrata2', 
                            '$FechaTrata2')";
        $consulta4=$conexion->query($consulta3);
    }
    

    ################################# CAMBIO ARCHIVOS #################################

    $Archivos2 = $conexion->query("UPDATE archivos_expediente
                                    SET No_Paciente = '$NumerodeControl1'
                                    where No_Paciente = '$NumerodeControl2';");

    ################################# CAMBIO CONSULTAS #################################

    $Consultas2 = $conexion->query("UPDATE consultas 
                                    SET No_Paciente = '$NumerodeControl1'
                                    where No_Paciente = '$NumerodeControl2'");

    ################################# ELIMINAR EXPEDIENTE #################################



    $Antecedentes1 = $conexion->query("DELETE FROM apnp where No_Paciente = '$NumerodeControl2'");

    $Antecedentes2 = $conexion->query("DELETE FROM ginecobstetrico where No_Paciente = '$NumerodeControl2'");

    $Antecedentes3 = $conexion->query("DELETE FROM heredofamiliares where No_Paciente = '$NumerodeControl2'");

    $Antecedentes4 = $conexion->query("DELETE FROM personales_patologicos where No_Paciente = '$NumerodeControl2'");

    $Direccion2 = $conexion->query("SELECT ID_Direccion FROM datosgen_paciente  where No_Paciente = '$NumerodeControl2'");
    while($row = $Direccion2->fetch_array()) {
        $IDDirec2 = $row[0];
    }

    $Datos1 = $conexion->query("DELETE FROM datosgen_paciente  where No_Paciente = '$NumerodeControl2'");

    $Direccion1 = $conexion->query("DELETE FROM direcccionpacientes  where ID_Direccion = '$IDDirec2'");

    

    #$ConsultaMAX1 = $conexion->query("SELECT MAX(No_Consulta) FROM consultas");
    
}
?>
<head>
    <style>
        .modalDialogUnif {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 10;
            opacity: 0;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
            pointer-events: none;
        }

        .modalDialogUnif:target {
            opacity: 1;
            pointer-events: auto;
        }

        .modalDialogUnif>div {
            background: linear-gradient(270deg, #c4dfe6, #84cfc8);
            width: 50%;
            height: 50%;
            position: relative;
            margin: 10% auto;
            padding: 5px 20px 13px 20px;
            border-radius: 10px;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
        }

        .close {
            background: #606061;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            right: -12px;
            text-align: center;
            top: -10px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            -webkit-border-radius: 12px;
            -moz-border-radius: 12px;
            border-radius: 12px;
            -moz-box-shadow: 1px 1px 3px #000;
            -webkit-box-shadow: 1px 1px 3px #000;
            box-shadow: 1px 1px 3px #000;
            z-index: 3;
        }

        .close:hover {
            background: #00d9ff;
        }

        .aside4 {
            position: relative;
            width: 90%;
            height: 15%;
            z-index: 2;
        }

        .aside5 {
            top: 10%;
            position: relative;
            width: 100%;
            height: 85%;
        }

        #pointer2 {
            left: 5%;
            width: 100%;
            height: 75px;
            top: 0%;
            position: absolute;
            background: #007261;
            z-index: -1;
        }

        #pointer2:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 0;
            border-left: 37.5px solid rgb(255, 255, 255);
            border-top: 37.5px solid transparent;
            border-bottom: 37.5px solid transparent;
        }

        #pointer2:before {
            content: "";
            position: absolute;
            right: -37.5px;
            bottom: 0;
            width: 0;
            height: 0;
            border-left: 37.5px solid #007261;
            border-top: 37.5px solid transparent;
            border-bottom: 37.5px solid transparent;
        }

        #TextoAgenda2 {
            color: #FFFFFF;
            position: relative;
            width: 100%;
            left: 15%;
            padding: 20px;
            bottom: 5px;
            top: -10px;
            font-size: 40px;
        }

        .DisclaimerText {
            position: relative;
            top: 40px;
            font-size: 18px;
            border-top-style: dashed;
            border-right-style: dashed;
            border-bottom-style: dashed;
            border-left-style: dashed;
            border-top-color: #CC0000;
            border-right-color: #CC0000;
            border-bottom-color: #CC0000;
            border-left-color: #CC0000;
            animation: blur .75s ease-out 5;
            text-shadow: 0px 0px 5px #fff,
                0px 0px 7px #fff;

        }

        #Control1{
            position: relative;
            outline: none;
            font-size: 16px;
            color: #333;
            border-radius: 5px;
            height: 25%;
        }
        #Control2{
            position: relative;
            outline: none;
            font-size: 16px;
            color: #333;
            border-radius: 5px;
            height: 25%;
        }
        .TextBusqueda {
        font-size: 24px;
        margin: 0 0 10px 0
        }
            

        @keyframes blur {
            from {
                text-shadow: 0px 0px 25px black,
                    0px 0px 10px red,
                    0px 0px 25px red,
                    0px 0px 25px red,
                    0px 0px 25px red,
                    0px 0px 25px red,
                    0px 0px 25px red,
                    0px 0px 25px red,
                    0px 0px 30px red,
                    0px 0px 30px red
            }
        }
    </style>

</head>
<?php
include '../Conexion_BD/Conexion.php';

$guardar_o_no = 0;
if (isset($_POST['NuevoExp']) || isset($_POST['NuevoExp_consulta'])) {
    
}
?>

<a href="#abrirModal" class="bubbly-button" id="UnificarExp" >Unificar expediente</a>
<div id="abrirModal" class="modalDialogUnif">

    <div class="containerDat">
        <a href="#close" title="Close" class="close">X</a>
        <div class="aside4">
            <div id="pointer2"></div>
            <h2 id="TextoAgenda2" id="atras1">Unificar Expedientes</h2>
        </div>
        <div class="aside5">
            <form action="" method="POST" enctype="multipart/form-data" id="scroll">
                <div class="form first">

                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <h2 class= "TextBusqueda">Expediente Principal (1)</h2>
                                <label for="Control1">Número de control:</label>
                                <?php include 'Buscar_Expediente1.php';?>
                            </div>
                            <div class="input-field">
                                <h2 class= "TextBusqueda">Expediente Erroneo (2)</h2>
                                <label for="Control2">Número de control:</label>
                                <?php include 'Buscar_Expediente2.php';?>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="input-field">
                                <input type="text" name="nombre1" id="nombre1" placeholder="Nombre" disabled>
                                <input type="text" name="apellido_paterno1" id="apellido_paterno1" placeholder="Apellido paterno" disabled>
                                <input type="text" name="apellido_materno1" id="apellido_materno1" placeholder="Apellido materno" disabled>
                            </div>
                            <div class="input-field">
                                <input type="text" name="nombre2" id="nombre2" placeholder="Nombre" disabled>
                                <input type="text" name="apellido_paterno2" id="apellido_paterno2" placeholder="Apellido paterno" disabled>
                                <input type="text" name="apellido_materno2" id="apellido_materno2" placeholder="Apellido materno" disabled>
                            </div>
                        </div>

                    <!--
                    <a href="EliminarTrata.php" class="bubbly-button" id="entrar" align="center">Eliminar</a>
                    -->
                    <button class="bubbly-button" id="Unificacion" type="submit" name="Unificacion">
                        <span class="btnText">Unir</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                    <!--
                    <div class="DisclaimerText">
                        <h4> Para realizar una consulta es necesario completar los "Datos del Paciente" dentro del expediente!</h4>
                    </div>
                    -->
                </div>
        </div>

        </form>
    </div>
</div>
</div>

        <!--



    -->