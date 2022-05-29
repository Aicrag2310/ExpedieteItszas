<html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php


include ('../Agenda/Conexion.php');


$NumControl = $_POST['nControl'];
#echo $NumControl;
$_SESSION["nControl"] = $NumControl;
echo $_SESSION["nControl"];


?>