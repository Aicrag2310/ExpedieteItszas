<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
$NumPaciente = $_POST["submit"];
//echo$NumPaciente;

if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));

        //Credenciales Mysql
        include('../Conexion_BD/Conexion.php');

        #$Host = 'localhost';
        #$Username = 'u283658544_Admin';
        #$Password = 'Itszas1234';
        #$dbName = 'u283658544_Itszas';
        
        //Crear conexion con la abse de datos
        //Insertar imagen en la base de datos
        $sqlSelectRegistro = $conexion->query("SELECT MAX(Id_Imagen) 
        FROM archivos_expediente;");

        while($row=$sqlSelectRegistro->fetch_array()) {
        $NumNota = $row[0];
        }
        $NumNota = (int) $NumNota;
        //Convirtiendo el registro de la mascota en entero
        $NumNota = $NumNota + 1;
        $numImagen= $NumNota;
        #$no_paciente = $_POST["campo"];

        $insertar = $conexion->query("INSERT INTO `archivos_expediente`(`Id_Imagen`,`No_Paciente`, `Imagen`) VALUES ('$numImagen','$NumPaciente','$imgContenido')");
        // COndicional para verificar la subida del fichero
        if($insertar){
            echo "Archivo Subido Correctamente.";
            sleep(1);
            header("Location:Historial_paciente.php");
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
            sleep(1);
            header("Location:Historial_paciente.php");
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
        sleep(1);
        header("Location:Historial_paciente.php");
    }
}


?>