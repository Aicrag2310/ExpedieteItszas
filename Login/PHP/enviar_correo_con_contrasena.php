<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';


class correo_clase{
	public static $conn;
	public function validar_correo($datos){
        $from= 'expediente_itszas@hotmail.com';
        $username= 'expediente_itszas@hotmail.com';
		self :: $conn = Conexion :: connectar();
        $bandera=0;
        $sql="SELECT * FROM `usuarios` WHERE correo='$datos[0]'";
        $resultado=mysqli_query(self :: $conn,$sql);
        $contrasena="";
		if(mysqli_num_rows($resultado) > 0){
			$bandera=0;
            while ($mostrar=mysqli_fetch_array($resultado)){
                $contrasena=$mostrar['Contrasena'];
                
            }
		}
        else{
			return 0;
		}
        if ($bandera==0){
            
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                                    // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.office365.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        
                $mail->Username   = 'expediente_itszas@hotmail.com';                     // SMTP username
                $mail->Password   = 'expediente123';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;
        
                //Recipients
                $mail->setFrom($from, $username);
                $mail -> addAddress($datos[0],'Contrasena segura');    // Add a recipient
        
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail -> Subject = 'Recuperar Contrasena';
                $mail -> Body = 'Se ha solicitado recuperar la contraseña del correo: '.$datos[0].' Tu contraseña actual es <b></b>'.$contrasena;
        
                $mail->send();
                return "Correcto";
            } catch (Exception $e) {
                echo "No enviado";
            }



























            return 1;
            Conexion :: cerrar_conexion(); 
        }
		
	}
	
}



?>