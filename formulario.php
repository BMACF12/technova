<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    $to = "tu-correo@dominio.com";  // Cambia esto por tu correo real
    $subject = "Nuevo mensaje desde el formulario de contacto";
    $body = "Nombre: $nombre\nCorreo: $email\n\nMensaje:\n$mensaje";
    $headers = "From: $email";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "¡Gracias por contactarnos! Te responderemos pronto.";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtalo nuevamente.";
    }
}
?>
