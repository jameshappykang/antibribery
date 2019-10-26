<?php
require 'class.phpmailer.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 2;                           // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;       // Enable SMTP authentication
$mail->Username = 'anti.bribery3@gmail.com'; // SMTP username
$mail->Password = 'ANTI-BRI123';             // SMTP password
$mail->SMTPSecure = 'ssl';      // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                     // TCP port to connect to
$mail->setFrom ('anti.bribery3@gmail.com', 'Mailer');
$mail->addAddress ('idcocode@gmail.com', 'Joe User');     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()){
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent';
}
    
?>