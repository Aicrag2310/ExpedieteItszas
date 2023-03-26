<?php
if (empty ($title)){
    $title="Menu";
    $css="css/estilo_menu.css";
    $menu_cabecera="menu_cabecera.php";
    $img1="img/logo_medicina_azul.png";
    $agenda="../Agenda/Agenda_Interfaz.php";
    $iconagenda="img/agenda.ico";
    $registro_paciente="../Expediente/Expedientes.php";
    $imgexpediente="img/expediente.ico";
    $imgconsulta="img/consulta.ico";
    $confi="configuracion.php";
    $img_confi="img/configuracion.ico";
    $php_cerrar="php/cerrar_sesion.php";
    $imagensalir="img/salir.ico";

    $consulta_rapida = "../Consulta/Consultas_Interfaz.php";
    $img_consulta = "../Menu/img/icons8-hospital-96.png"; ###################################
}
if ($title=="Configuración"){
    $title="Menu";
    $css="css/estilo_menu.css";
    $menu_cabecera="menu_cabecera.php";
    $img1="img/logo_medicina_azul.png";
    $agenda="../Agenda/Agenda_Interfaz.php";
    $iconagenda="img/agenda.ico";
    $registro_paciente="Expedientes.php";
    $imgexpediente="img/expediente.ico";
    $imgconsulta="img/consulta.ico";
    $confi="configuracion.php";
    $img_confi="img/configuracion.ico";
    $php_cerrar="php/cerrar_sesion.php";
    $imagensalir="img/salir.ico";

    $consulta_rapida = "../Consulta/Consultas_Interfaz.php";
    $img_consulta = "../Menu/img/icons8-hospital-96.png"; ###################################
}
if ($title=="Expediente Clinico ITSZaS"){
    $css="../Menu/css/estilo_menu.css";
    $menu_cabecera="../Menu/menu_cabecera.php";
    $img1="../Menu/img/Logo_Tec.png"; ###################################
    $agenda="../Agenda/Agenda_Interfaz.php";
    $iconagenda="../Menu/img/A.png";########################
    $registro_paciente="../Expediente/Expedientes.php";
    $imgexpediente="../Menu/img/E.png";##########################
    $imgconsulta="../Menu/img/consulta.ico";
    $confi="../Menu/configuracion.php";
    $img_confi="../Menu/img/C.png"; ######################
    $php_cerrar="../Menu/php/cerrar_sesion.php";
    $imagensalir="../Menu/img/Salir.png"; ###################################
    $trata = "../Expediente/Datos_Del_Paciente/Dat_Pac_Interfaz.php";

    $consulta_rapida = "../Consulta/Consultas_Interfaz.php";
    $img_consulta = "../Menu/img/icons8-hospital-96.png"; ###################################
}
if ($title=="Registro de paciente"){
    $css="../Menu/css/estilo_menu.css";
    $menu_cabecera="../Menu/menu_cabecera.php";
    $img1="../Menu/img/Logo_Tec.png";
    $agenda="../Agenda/Agenda_Interfaz.php";
    $iconagenda="../Menu/img/agenda.ico";
    $registro_paciente="Expedientes.php";
    $imgexpediente="../Menu/img/expediente.ico";
    $imgconsulta="../Menu/img/consulta.ico";
    $confi="../Menu/configuracion.php";
    $img_confi="../Menu/img/configuracion.ico";
    $php_cerrar="../Menu/php/cerrar_sesion.php";
    $imagensalir="../Menu/img/salir.ico";

    $consulta_rapida = "../Consulta/Consultas_Interfaz.php";
    $img_consulta = "../Menu/img/icons8-hospital-96.png"; ###################################
}
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if (!isset($_SESSION['usuario'])) {
    
    header('Location: ../index.php');

    exit();
}else{
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href=<?php echo $css;?>>
</head>

<body class = "body-expanded">
    <div id="sidemenu" class="menu-expanded">
        <!-- HEADER (CABEZERA) -->
        <div id="header">
            <div id="title"><span>Expediente clínico</span></div>
            <!-- MENU -->
            <div id="menu-btn">
                <div class="btn-hamburguer"></div>
                <div class="btn-hamburguer"></div>
                <div class="btn-hamburguer"></div>
            </div>
        </div>
        <!-- PERFIL -->
        <div id="profile">
            <a href="<?php echo $agenda;?>">
                <div id="photo"><img src=<?php echo $img1;?> alt=""></div>
                <!--<div class="title"> <span>ITSZaS</span></div> -->
            </a>
        </div>
        <!--ITEMS -->
        <div id="menu-items">
            <div class="item">
                <a href="<?php echo $agenda;?>">
                    <div class="icon"> <img src=<?php echo $iconagenda;?> alt=""></div>
                    <div class="title"><span>Agenda</span></div>
                </a>

            </div>
            <div class="item">
                <a href=<?php echo $consulta_rapida;?>>
                    <div class="icon"> <img src=<?php echo $img_consulta;?> alt=""></div>
                    <div class="title"><span>Consulta</span></div>
                </a>

            </div>
            <div class="item">
                <a href=<?php echo $registro_paciente;?>>
                    <div class="icon"> <img src=<?php echo $imgexpediente;?> alt=""></div>
                    <div class="title"><span>Expedientes</span></div>
                </a>

            </div>
            <div class="item">
                <a href=<?php echo $confi;?>>
                <div class="icon"> <img src=<?php echo $img_confi;?> alt=""></div>
                    <div class="title"><span>Configuración</span></div>
                </a>

            </div>
        
            <div class="item separator">
            </div>

            <div class="item">
                <a href=<?php echo $php_cerrar;?>>
                    <div class="icon"> <img src=<?php echo $imagensalir;?> alt=""></div>
                    <div class="title"><span>Cerrar sesión</span></div>
                </a>
            </div>
        </div>
    </div>
    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', e => {
            //menu.classList.toggle("menu-expanded");
            //menu.classList.toggle("menu-collapsed");
            //document.querySelector('body').classList.toggle('body-expanded');

            menu.classList.toggle("menu-collapsed");
            menu.classList.toggle("menu-expanded");
            document.querySelector('body').classList.toggle('body-collapsed');
            //document.querySelector('body').classList.toggle('body-expanded');
        })
    </script>
</body>
<?php
}

//Solo ocuparemos un boton para cerrar session

?>

