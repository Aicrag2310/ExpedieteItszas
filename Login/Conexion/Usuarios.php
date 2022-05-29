<?php 




class usuarios{
	public static $conn;
	public function loginuser($datos){
		self :: $conn = Conexion :: connectar();
        $sql="SELECT * FROM `usuarios` WHERE Nombre_Usuario='$datos[0]' and Contrasena='$datos[1]'";
        $resultado=mysqli_query(self :: $conn,$sql);

		if(mysqli_num_rows($resultado) > 0){
			session_start();
			$_SESSION["usuario"]=$datos[0];

			return 1;
			Conexion :: cerrar_conexion(); 
		}else{
			return 0;
		}
		
		
	}


	
}



?>