<?php 


if(isset($_POST["eliminaimagen"])){
echo "eliminado ";

include '../Conexion_BD/Conexion.php';

$NumPaciente = $_POST["eliminaimagen"];
echo$NumPaciente;

$consulta=$conexion->query("DELETE FROM `archivos_expediente` WHERE Id_Imagen=$NumPaciente");

?>
<script> Swal.fire('Any fool can use a computer')</script><?php
sleep(1);
header("Location:Historial_paciente.php");


}
?>