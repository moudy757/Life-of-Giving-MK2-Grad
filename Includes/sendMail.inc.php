<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


class Mail {
    public static function sendMail($subject, $body, $address) {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'supp.lifeofgiving@gmail.com';
        $mail->Password = 'lifeofgiving123456';
        $mail->setFrom('no-reply@lifeofgiving.com');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->addAddress($address);

        $mail->Send();
    }
}


    

?>