<?php
// Si usas Composer, descomenta esta línea
// require 'vendor/autoload.php';

// Si no usas Composer, incluye el archivo de PHPMailer
require 'vendor/autoload.php';  // Ajusta la ruta si es necesario

// Crea la instancia de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();  // Usar SMTP
$mail->Host = 'sandbox.smtp.mailtrap.io';  // Servidor SMTP de Mailtrap (lo cambiarás luego para Hostinger)
$mail->SMTPAuth = true;
$mail->Username = '9a097bde8222a5';  // Tu username de Mailtrap
$mail->Password = '0d33763b545c27';  // Tu password de Mailtrap
$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;  // Seguridad
$mail->Port = 587;  // Puerto (587 o 2525 según Mailtrap)

$mail->setFrom($_POST['email'], $_POST['nombre']);  // Email del remitente
$mail->addAddress('brianf13@outlook.es');  // Dirección de correo a la que se enviará el mensaje
$mail->Subject = 'Nuevo mensaje desde el formulario';
$mail->Body = $_POST['mensaje'];  // El contenido del mensaje

// Intentar enviar el correo
if ($mail->send()) {
    echo '¡Correo enviado exitosamente!';
} else {
    echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
}
?>
