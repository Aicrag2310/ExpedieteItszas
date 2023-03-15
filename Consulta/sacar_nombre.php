<?php
include "../Conexion_BD/Conexion.php";

$nombre = $_POST["nombre"];
//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');

$sql = "SELECT * FROM datosgen_paciente Where No_Paciente ='$nombre'";
$result = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $datos = array(
        'estado' => 'ok',
        'nombre' => $row['Nombre'],
        'apellido' => $row['Apellido_Paterno'],
        'apellido2' => $row['Apellido_Materno']
    );
}
echo json_encode($datos, JSON_FORCE_OBJECT);