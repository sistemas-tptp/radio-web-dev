<?php

//envio seguro

$mensaje="";
$i = 1;

$mensaje = "
Nombre: ".$_POST['nombre']."<br>
E-mail: ".$_POST['correo']."<br>
Teléfono: ".$_POST['telefono']."<br>
Curso: ".$_POST['curso']."
";


require 'phpmailer/class.phpmailer.php';
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


//$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.historiadelaradio.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'no-reply@historiadelaradio.com';                // SMTP username
$mail->Password = 'B@surto91';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = $_POST['correo'];
$mail->FromName = $_POST['nombre'];
$mail->AddAddress('capacitacion@historiadelaradio.com', 'Capacitacion');  // Add a recipient

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Contacto';
$mail->Body    = $mensaje;

if(!$mail->Send()) {
   echo '<script language="javascript">alert("El mensaje no pudo ser enviado");</script>';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
else
{
echo '<script language="javascript">alert("Mensaje enviado");</script>';
echo '<script>window.location="https://escuela.historiadelaradio.com";</script>';
}

		//fin envio seguro

?>