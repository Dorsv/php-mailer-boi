<?php
// dopinam bibliotekę SwiftMailer - pobraną z GitHub



require 'vendor/autoload.php';
require 'mail_config.php';



// tu twój kod php

if (isset($_POST['message'])){
    // Create the Transport
    $transport = (new Swift_SmtpTransport($server, $port, $encrypt))
        ->setUsername($login)
        ->setPassword($passwd)
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message($_POST['topic']))
        ->setFrom($login)
        ->setTo($_POST['recipient'])
        ->setBody($_POST['message'])
    ;

// Send the message
    $result = $mailer->send($message);


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP wysyła maile przez SMTP</title>
</head>
<body>
<form method="post" action="">
    <input type="text" placeholder="Topic of your message..." name="topic" required><br>
    <input type="email" name="recipient" placeholder="adresat" required><br>
    <textarea name="message" placeholder="Type your message here..." id="" cols="30" rows="10" required></textarea>
    <input type="submit" name="sendMessage" id="" value="Wyślij">
</form>
</body>
</html>
