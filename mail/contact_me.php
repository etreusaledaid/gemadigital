<?php
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "Test@prueba.com";
$subject = "Contacto de Gema Digital:  $name";
$body = "Recibiste un nuevo mensaje del formulario de contacto de tu sitio web.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\nCorreo electrónico: $email\n\nTeléfono: $phone\n\nMensaje:\n$message";
$header = "From: noreply@yourdomain.com\n";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
