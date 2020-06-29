<?php

require 'system/config/bootstrap.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;

$mail->Username = $_SERVER['EMAILADRESS'];
$mail->Password = $_SERVER['PASSWORDMAIL'];

$mail->setFrom('wannes.vrijs@gmail.com', 'FabLab Genk');
$mail->addReplyTo('wannes.vrijs@gmail.com', 'FabLab Genk');
$mail->addAddress('wannes.vrijs@gmail.com');
$mail->Subject = 'Vervoledig uw registratie';
$mail->msgHTML('dsddss');


try {
    $mail->send();
} catch (Exception $e) {
    echo 'Caught exception: ';
}