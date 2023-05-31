<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$responseheader = "Thanks for contacting me!";
$responsemessage = "Hi there!,\n\nThanks for getting in touch! This is an automatic response to let you know that I've received your message and will reach out to you shortly.\n\nRegards,\nJonathan Butz";
$receivedRecaptcha = $_POST['g-recaptcha-response'];
$google_secret = '6LfKesUdAAAAAIGXTzMKbtvXWqCE-5dNBYpAcgFJ';
if(strlen($receivedRecaptcha) == 0) {
    echo "Please complete the reCAPTCHA challenge.";
    return;
} 

else {

    $verifiedRecaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$google_secret.'&response='.$receivedRecaptcha);
    $verResponseData = json_decode($verifiedRecaptcha);
    if ($verResponseData->{'success'} == 1)
        {
            $content="From: $name\nEmail: $email\nMessage: $message";
            $recipient = "jzbutz@gmail.com";
            $mailheader = "Contact me submission from: $email \r\n";
            mail($recipient, $mailheader, $content, ) or die("Error!");
            mail($email, $responseheader, $responsemessage);
            echo "Thank you for reaching out, " . $name . "! Your email was successfully sent.";
        }
}

?>