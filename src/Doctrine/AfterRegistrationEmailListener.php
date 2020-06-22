<?php


namespace App\Doctrine;

use App\helpers\MailerTrait;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use App\Entity\User;

class AfterRegistrationEmailListener
{
    use MailerTrait;

    //function to be executed after persisting to the database
    public function postPersist (User $user)
    {
        $this->sendMail($user->getEmail(), $user->getUseRegkey());
        return;
    }
}