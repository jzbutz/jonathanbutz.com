<?php
echo "Hello world";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$cap = $_POST['g-recaptcha-response'];

$content="From: $name\nEmail: $email\nMessage: $message";
$recipient = "jzbutz@gmail.com";
$mailheader = "Contact me submission from: $email \r\n";
mail($recipient, $mailheader, $content, ) or die("Error!");
mail($email, $responseheader, $responsemessage);

echo "Thank you for reaching out, " . $name . "! Your email was successfully sent.";
?>