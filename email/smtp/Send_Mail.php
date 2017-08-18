<?php


function Send_Mail($to,$subject,$body)
{
  include 'class.phpmailer.php'; 
$from       = "registrations@aurganon.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "server25.hostingraja.in"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  25;                    // set the SMTP port
$mail->Username   = "registrations@aurganon.com";  // SMTP  username
$mail->Password   = "chandan@123";  // SMTP password
$mail->SetFrom($from, 'AURGANON REGISTRATIONS');
$mail->AddReplyTo($from,'AURGANON\'16');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
