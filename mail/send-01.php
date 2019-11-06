<?php

// Mudar Aqui

$email_envio = 'anti.bribery3@gmail.com'; // E-mail receptor
$email_pass = 'ANTI-BRI123'; // Senha do e-mail

$site_name = 'asdsds'; // Nome do Site
$site_url = 'sdsdsds'; // URL do Site

$host_smtp = 'smtp.gmail.com'; // HOST SMTP Ex: smtp.domain.com.br
$host_port = '465'; // Porta do Host

// Variáveis do Formulário
// Conteúdo do Formulário

// Não mudar a partir daqui

require ('../PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

$mail->isSMTP();
$mail->Host = $host_smtp;
$mail->SMTPAuth = true;
$mail->Username = $email_envio;
$mail->Password = $email_pass;
$mail->Port = $host_port; 

$mail->From = "lopogax@gmail.com";

$mail->addAddress("lopogax@gmail.com");

$mail->FromName = 'Formulário de Contato';
$mail->AddReplyTo("lopogax@gmail.com", 'joao');

$mail->WordWrap = 70;

$mail->Subject = 'Formulário sd';

$mail->Body = "lopogax@gmail.com";

if(!$mail->send()) {
echo 'Message could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent';
   }
?>