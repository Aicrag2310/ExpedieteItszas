<head>
    <style>
        .modalDialog {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 99999;
            opacity: 0;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
            pointer-events: none;
        }

        .modalDialog:target {
            opacity: 1;
            pointer-events: auto;
        }

        .modalDialog>div {
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
    if (isset($_POST['NuevoExp_consulta'])){
        $guardar_o_no=1;
    }
    ############################# Datos Generales #############################
    $Cont = $_POST['Control'];
    $N = $_POST['Nombre'];
    $P = $_POST['Paterno'];
    $M = $_POST['Materno'];
    $Direc = $conexion->query("SELECT MAX(ID_Direccion) FROM direcccionpacientes");
    $Direc2 = $Direc->fetch_array();
    $IdDirec = ($Direc2["MAX(ID_Direccion)"]) + 1;


    $fecha_nacimiento = $_POST['fecha-nacimiento']; // asumiendo que la fecha de nacimiento se envía por un formulario POST
    $hoy = new DateTime();
    $fecha_nacimiento_dt = new DateTime($fecha_nacimiento);
    $edad = $hoy->diff($fecha_nacimiento_dt)->y;

    $sexo = $_POST['sexo'];
    
    #echo $IdDirec, "Direccion ";
    #echo $Cont, "No COntrol ";
    #echo $N, "Nombre ";
    #echo $P, "Paterno ";
    #echo $M, "Materno ";

    ############################# Direccion #############################
    $consulta1 = "INSERT into direcccionpacientes 
                    (ID_Direccion,
                    Estado,
                    Municipio,
                    Colonia,
                    Calle,
                    Numero_exterior,
                    Numero_interior,
                    C_Postal) 
                  values 
                  ('$IdDirec',
                  '',
                  '',
                  '',
                  '',
                  0,
                  0,
                  0)";
    $consulta2 = $conexion->query($consulta1);
    if ($consulta2) {
        #echo "Consulta 1 realizada";
        ############################# Datos Generales #############################
        $consulta3 = "INSERT into datosgen_paciente 
            (No_Paciente, 
            ID_Direccion,
            Nombre,
            Apellido_Paterno,
            Apellido_Materno,
            Sexo,
            Fecha_Nacimiento,edad) 
            values 
            ('$Cont',
            '$IdDirec',
            '$N',
            '$P',
            '$M',
            '$sexo',
            '$fecha_nacimiento',
            '$edad')";
        $consulta4 = $conexion->query($consulta3);
        if ($consulta4) {
            #echo "Consulta 3 realizada";
            ############################# Antecedentes #############################
            $consulta5 = "INSERT into `ginecobstetrico` 
                (No_Paciente,
                Fecha_Ultima_menstruacion,
                Ciclo,
                Edad_Inicio_Menstruacion,
                Edad_Promedio_Inicio_Sexo,
                Num_Parejas,
                Menopausia,
                Embarazos,
                Partos,
                Cesareas,
                Abortos,
                Fecha_Ultimo_Parto) 
                VALUES ('$Cont',
                '0000-00-00',
                '', #Ciclo
                0,
                0,
                0,
                '', #Menopausia
                '',
                '',
                '',
                '',
                '0000-00-00')";
            $consulta6 = $conexion->query($consulta5);
            if ($consulta6) {
                #echo "Consulta 5 realizada";
                $consulta7 = "INSERT INTO `apnp`
                    (`No_Paciente`,
                    `Lugar_Nacimiento`,
                    `Duchas_semana`, 
                    `Lugar_Residencia`,
                    `Viajes_extranjero`,
                    `Trabajo`, 
                    `Deportes`, 
                    `Observaciones`, 
                    `Vivienda_Rural`) 
                    VALUES
                    ('$Cont',
                    '', #Lugar de nacimiento
                    0,
                    '',
                    '',
                    '',
                    '',
                    '',
                    '')";
                $consulta8 = $conexion->query($consulta7);
                if ($consulta8) {
                    #echo "Consulta 7 realizada";
                    $consulta9 = "INSERT INTO `heredofamiliares`
                        (`No_Paciente`,
                        `Texto_Cardio`, 
                        `Texto_TrastornosPsi`, 
                        `Texto_EnfermedadesRes`, 
                        `Texto_Hepatopatias`, 
                        `Texto_Alergias`, 
                        `Texto_EnfermedadesEndo`, 
                        `Texto_EnfermedadesGen`, 
                        `Texto_EnfermedadesNeuro`) 
                        VALUES
                            ('$Cont',
                            'Hola',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '')";
                    $consulta10 = $conexion->query($consulta9);
                    if ($consulta10) {
                        #echo "Consulta 9 realizada";
                        $consulta11 = "INSERT INTO `personales_patologicos`
                            (`No_Paciente`, 
                            `Enf_Infancia`, 
                            `Quirurgicos`, 
                            `Traumatismo`, 
                            `Secuelas`, 
                            `Transfucionoes`, 
                            `Hospitalizaciones`, 
                            `Fracturas`, 
                            `Otra_enfermedad`) 
                            VALUES ('$Cont',
                            'Hola',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '')";
                        $consulta12 = $conexion->query($consulta11);
                        
                        if ($consulta12) {
                            mysqli_close($conexion);
                            
                        } else {
                            #echo "Error Consulta 11";
                        }
                    } else {
                        #echo "Error Consulta 9";
                    }
                } else {
                    #echo "Error Consulta 7";
                }
            } else {
                #echo "Error Consulta 5";
            }
        } else {
            #echo "Error Consulta 3". $conexion->error;;
        }
    } else {
        #echo "Error Consulta 1";
    }
    if ($guardar_o_no==1){
        ob_start();
        header("Location: www.google.com");
        ob_end_flush();
        exit;
    }
    
}
?>
<a href="#openModal" class="bubbly-button" id="limpiar" align="center">Nuevo expediente</a>
<div id="openModal" class="modalDialog">

    <div class="containerDat">
        <a href="#close" title="Close" class="close">X</a>
        <div class="aside4">
            <div id="pointer2"></div>
            <h2 id="TextoAgenda2" id="atras1">Nuevo expediente</h2>
        </div>

        <div class="aside5">

            <form action="" method="POST" enctype="multipart/form-data" id="scroll">
                <div class="form first">

                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>Número de control</label>
                                <input type="text" required name="Control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)||
                                                                                        (event.charCode >= 65 && event.charCode <= 90) || 
                                                                                        (event.charCode >= 97 && event.charCode <= 122) || 
                                                                                        (event.charCode == 32) ||(event.charCode == 209) ||
                                                                                        (event.charCode == 241))" placeholder="Ingrese el número de control" />
                            </div>
                            <div class="input-field">
                                <label>Nombre(s)</label>
                                <input type="text" required name="Nombre" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                                        (event.charCode >= 97 && event.charCode <= 122) || 
                                                                                        (event.charCode == 32) ||(event.charCode == 209) ||
                                                                                        (event.charCode == 241))" placeholder="Ingrese el nombre" />
                            </div>
                            <div class="input-field">
                                <label>Apellido paterno</label>
                                <input type="text" required name="Paterno" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                                        (event.charCode >= 97 && event.charCode <= 122) || 
                                                                                        (event.charCode == 32) ||(event.charCode == 209) ||
                                                                                        (event.charCode == 241))" placeholder="Ingrese el apellido paterno" />
                            </div>
                            <div class="input-field">
                                <label>Apellido materno</label>
                                <input type="text" required name="Materno" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                                                                                        (event.charCode >= 97 && event.charCode <= 122) || 
                                                                                        (event.charCode == 32) ||(event.charCode == 209) ||
                                                                                        (event.charCode == 241))" placeholder="Ingrese el apellido materno" />
                            </div>

                            <div class="input-field">
                                <label>Sexo</label>
                                <select id="sexo" name="sexo">
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Fecha de nacimiento</label>
                                <input type="date" required id="fecha-nacimiento" name="fecha-nacimiento" max="<?php echo date('Y-m-d'); ?>">
                            </div>

                        </div>
                    </div>

                    <button class="bubbly-button" id="boton" type="submit" name="NuevoExp">
                        <span class="btnText">Guardar</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                    <button class="bubbly-button" id="boton2" type="submit" name="NuevoExp_consulta">
                        <span class="btnText2">Guardar e ir a consultas</span>
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