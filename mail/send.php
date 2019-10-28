<?php

//設定time out
set_time_limit(120);
//echo !extension_loaded('openssl')?"Not Available":"Available";

require_once("./PHPMailer-5.2.9/PHPMailerAutoload.php"); //記得引入檔案 
$mail = new PHPMailer;

//$mail->SMTPDebug = 3; // 開啟偵錯模式

$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'anti.bribery3@gmail.com'; // SMTP username
$mail->Password = 'ANTI-BRI123'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

$mail->setFrom('anti.bribery3@gmail.com', '名字'); //寄件的Gmail
$mail->addAddress('idcocode@gmail.com', '收件者名字'); // 收件的信箱

$mail->isHTML(true); // Set email format to HTML

/*
    內文
*/

$mail->Subject = 'Here is the subject';
$mail->Body = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
 echo 'Message could not be sent.';
 echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 echo 'Message has been sent';
}


?> 
