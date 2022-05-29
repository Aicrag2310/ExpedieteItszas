<?php

?>
<!DOCTYPE html>
<html>

<head>
<link rel="icon" href="img/Logo2.jpg
">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="Login/js/funciones.js"></script>
    <link rel="stylesheet" type="text/css" href="Login/alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="Login/alertify/css/themes/default.css">

    <script src="Login/js/jquery-3.6.0.min.js"></script>
    <script src="Login/alertify/alertify.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="Login/css/estilos.css">
</head>

<body>
    <div id="contenedor">
        <div id="contenedorcentrado">
            <div id="login">
                <form id="login-form" class="form" action="" method="POST">
                    <label for="usuario">Iniciar Sesión</label>
                    <input id="usuario" type="text" name="username" placeholder="Usuario">
                    <br>

                    <input id="password" type="password" placeholder="Contraseña" name="password">
                    <div>
                        <br>

                        <a id="recuperar" href="Login/Recuperar_Contra.php">¿Olvidaste tu contraseña?</a>
                    </div>
                    <span id="entrar">Entrar</span>

                    <!-- <button id="entrar" type="submit" title="Ingresar" name="Ingresar">Ingresar</button>-->

                </form>

            </div>
            <a href="http://www.itszas.edu.mx"><img id="imagen" src="Login/img/Logo2.jpg" alt=""></a>

            <div id="derecho">


            </div>
        </div>
    </div>
</body>

</html>



<script type="text/javascript">
    $(document).ready(function() {
        //script para evento click y ajax 
        $('#entrar').click(function() {

            vacio = validarFormVacio('login-form');
            if (vacio > 0) {
                alertify.alert('Error', 'Debes llenar todos los campos', function(){ alertify.success('Debes llenar todos los campos'); });
                return false;
            }
            datos = $('#login-form').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "Login/PHP/validar_login.php",
                success: function(r) {
                    
                    if (r == 1) {
                        window.location = "Agenda/Agenda_Interfaz.php";

                    } else {
                        alertify.alert('Error', 'Usuario o contraseña no válidos.', function(){ alertify.success('Usuario no encontrado'); });
                    }

                }
            });
        });
    })
</script>