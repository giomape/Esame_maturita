<?php
require("https.php");
session_start();
$email=$_SESSION["email"];

$to = $email;
$subject = 'Email di conferma';
$message = file_get_contents("email_text.php");
$message = str_replace("{{username}}", $_SESSION["username"], $message);
$headers = 'From: Football Meet <registrazione@football.com>' . "\r\n" .'Reply-To: noreplytothis@football.com' . "\r\n" .'X-Mailer: PHP/' . phpversion() . "\r\n" .'Content-type: text/html';

mail($to, $subject, $message, $headers);
http_response_code(200);

?>