<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;



if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `admin` WHERE `user_name`='" . $email . "'");
    $n = $rs->num_rows;

    if (empty($email)) {
        echo ("Please enter your Email");
    } else if (strlen($email) > 100) {
        echo ("Email must have less than 100 characters");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo ("Invalid Email");

    } else {
        if ($n == 1) {
            $code = uniqid();

            Database::iud("UPDATE `admin` SET `ad_v_code`='" . $code . "' WHERE `user_name`='" . $email . "'");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nimeshashaluka75@gmail.com';
            $mail->Password = 'ervxxxfvhayynxut';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('nimeshashaluka75@gmail.com', 'Reset Password');
            $mail->addReplyTo('nimeshashaluka75@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Film Ux ForgotPassword Verification Code';
            $bodyContent = '<h1 style="color:black;">FILM <sapn style="color:#BF360C;">U</sapn>X <br>Your Verification Code is <br> ' . $code . '</h1>';
            $mail->Body = $bodyContent;

            if (!$mail->send()) {
                echo ('Verification Code Sending Failed Try Again');
            } else {
                echo ('Success');
            }
        } else {
            echo ("Invalid Email Address");
        }
    }
} else {
    echo ("Please Enter your Email Address in Email Field.");
}

?>