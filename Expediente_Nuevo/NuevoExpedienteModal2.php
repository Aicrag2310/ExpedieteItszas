

        <style>

        </style>
    <?php
    include '../Conexion_BD/Conexion.php'; 

    if (isset($_POST['NuevoExp'])){
        ############################# Datos Generales #############################
        $Cont = $_POST['Control'];
        $N = $_POST['Nombre'];
        $P = $_POST['Paterno'];
        $M = $_POST['Materno'];
        $IdDirec = $conexion->query("SELECT MAX(ID_Direccion) AS id FROM direcccionpacientes");

        $consulta1="INSERT into direcccionpacientes (ID_Direccion) 
                  values ('$IdDirec')";
        $consulta2=$conexion->query($consulta1);

        $consulta3="INSERT into datosgen_paciente (No_Paciente, ID_Direccion,Nombre,Apellido_Paterno,Apellido_Materno) 
                  values ('$Cont,$IdDirec,$N,$P,$M')";
        $consulta4=$conexion->query($consulta3);
    }
    ?>

        
