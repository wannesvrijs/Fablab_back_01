<?php


namespace App\helpers;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

trait MailerTrait
{
    public function sendMail($email, $regkey)
    {

        $link = $_SERVER['FRONTENDWEBADRESS'].'account/profielactivatie?e='.$email.'&r='.$regkey;

        $mail = new PHPMailer;
        $mail->isSMTP();
//        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;

        $mail->Username = $_SERVER['EMAILADRESS'];
        $mail->Password = $_SERVER['PASSWORDMAIL'];

        $mail->setFrom('wannes.vrijs@gmail.com', 'FabLab Genk');
        $mail->addReplyTo('wannes.vrijs@gmail.com', 'FabLab Genk');
        $mail->addAddress($email);
        $mail->Subject = 'Vervoledig uw registratie';
        $mail->msgHTML(str_replace("%%link%%", $link ,file_get_contents(__DIR__.'/../Mail/mail.xhtml')), __DIR__);


        try {
            $mail->send();
        } catch (Exception $e) {
            echo 'Caught exception: ';
        }
    }

}