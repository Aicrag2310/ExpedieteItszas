<html>

<head>
    <title>Recuperar contraseña</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/recuperar.css">
    <script src="js/funciones.js"></script>

    <link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="alertify/css/themes/default.css">

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="alertify/alertify.js"></script>



    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="contenedor">
        <div id="contenedorcentrado">
            <div id="login">
                <form id="login-form" class="form" action="" method="POST">
                    <label for="usuario">Recuperar contraseña</label>
                    <br>
                    <br>
                    <input id="usuario" type="text" name="correo" placeholder="Correo electrónico">
                    <br>
                    <!--<span class="btn btn-info btn-md" id="entrar">Entrar</span>-->
                    <span id="entrar">Enviar</span>



                </form>
            </div>
            <a href="../index.php" id="fuente"><span id="regresar" class="btn btn-info btn-md">Regresar</span></a>
            <a href="http://www.itszas.edu.mx"><img id="imagen" src="img/Logo2.jpg" alt=""></a>

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
                alertify.alert('Error', 'Debes llenar todos los campos', function() {
                    alertify.success('Debes llenar todos los campos');
                });
                return false;
            }
            datos = $('#login-form').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "PHP/validar_correo.php",
                success: function(r) {

                    if (r == 1) {
                        alert("Correcto");
                    } else if (r == "Correo Mal escrito") {
                        alertify.alert('Error', r, function() {
                            alertify.success(r);
                        });
                    } else if (r == "Correcto") {
                        alertify.alert('Correcto', 'Contraseña enviada con exito', function() {
                            alertify.success('Contraseña enviada con exito');
                        });
                    } else if (r == "No enviado1") {
                        alertify.alert('Error', 'Contraseña no enviada', function() {
                            alertify.success('Contraseña no enviada');
                        });
                    } else {
                        alertify.alert('Error', 'Correo no encontrado', function() {
                            alertify.success('Correo no encontrado');
                        });
                    }

                }
            });
        });
    })
</script>