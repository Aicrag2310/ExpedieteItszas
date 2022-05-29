<?php
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if (!isset($_SESSION['usuario'])) {
    
    header('Location: ../index.php');

    exit();
} else {
    //$nombre = $_SESSION['usuario'];
    //echo "El nombre  de la sesión era $nombre<br />";
?>
    <html>

    <h1>Aqui ira el menu </h1>

    </html>


<?php
}

//Solo ocuparemos un boton para cerrar session
session_destroy();
?>