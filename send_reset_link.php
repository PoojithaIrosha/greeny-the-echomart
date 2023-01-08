<?php

require "MySQL.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require './assets/PHPMailer/Exception.php';
require './assets/PHPMailer/PHPMailer.php';
require './assets/PHPMailer/SMTP.php';

$email = $_GET["e"];

if (empty($email)) {
    echo "Please enter the email address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");

    if ($rs->num_rows == 1) {
        $uid = uniqid("USER_");

        Database::iud("UPDATE `user` SET `verification_code` = '" . $uid . "' WHERE `email` = '" . $email . "'");

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'poojithairosha0413@gmail.com';                     //SMTP username
            $mail->Password = 'ssukfsolezipwegk';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('poojithairosha0413@gmail.com', 'Greeny');
            $mail->addAddress($email);               //Name is optional
            $mail->addReplyTo('poojithairosha0413@gmail.com', 'Greeny');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Account Password';
            $mail->Body = '<center style="font-family: sans-serif;">
        <div style="height:auto;padding:50px 50px 50px 50px;background-color:#edeff1"> <br>
            <h1 style="color: #119744;">Greeny The Ecomart</h1><br>
            <div
                style="width:500px;height:auto;margin-top:0px;padding-bottom:80px;font-size:14px;background-color:white;text-align:center">
                <br><br>
                <center>
                    <h2>Request for Password Change!</h2><br>
                    <p>If you forgot your password or wish to <span class="il">reset</span> it,<br>use below link to change
                        your password </p><br>
                    <a href="http://localhost/greeny/change-password.php?uid=' . $uid . '"
                        style="width:180px;height:50px;background-color:#119744;padding: 15px 15px; text-align:center;color:white;text-decoration:none; font-size: 18px;font-weight: bold;"
                        target="_blank">
                        Reset Password
                    </a>
                    <br>
                    <br>
                    <p style="color: gray;">If you did not request a password <span class="il">reset</span>, you can safely
                        ignore this mail.
                        <br>
                        your password would not change until you create a new password
                    </p>
                </center>
            </div>
        </div>
    </center>';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "User not found. Please check your email address";
    }
}


