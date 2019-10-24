<?php
$to      = 'etk1688@gmail.com';
$subject = '測試信';
$message = 'hello';
$headers = 'From: etk1688@gmail.com' . "\r\n" .
    'Reply-To: etk1688@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>