<?php

include 'Conexion.php';


if(isset($_GET['enviar'])){
    $Aux="";
    $Fecha=$_GET['Calendari'];
    $Aux= $Aux. $Fecha;
   
    echo strlen ($Aux);

    if ($Aux !== ""){
	echo  "Esta es la fecha a buscarA", $Aux, "    ";

   
        
    $consulta = $conexion->query(" call `Busqueda_Calendario` ('$Aux')");

    

   // $r = mysqli_query($conexion, $consulta) 
    
    //or die (mysqli_error($conexion));
    
    

    
            while ($row=$consulta->fetch_array()) {
                ?>
        
                <tr>
                <td><?php echo $row['No_Consulta']; ?></td>
                <td><?php echo $row['No_Paciente']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Apellido_Paterno']; ?></td>
                <td><?php echo $row['Apellido_Materno']; ?></td>
                <td><?php echo $row['Hora_inicio']; ?></td>
                <td><?php echo $row['Hora_end']; ?></td>
                <td><?php echo $row['Sexo']; ?></td>
                </tr>
            <?php
        
            }
        



    

   
    
}
}
?>