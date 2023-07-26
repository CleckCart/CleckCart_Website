<?php 
include('./connectSession.php');
$otp = rand(100000,999999);
$_SESSION['otp'] = $otp;

?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// function OTPgenerate()
// {
//     $otp = rand(1000, 9999);
//     return $otp;
// }

include('../../customer/PHP/connect.php');
if (isset($_POST['CustomerEmailSubmit'])) {
    

    if (empty($_POST['CustomerRegisteredEmail'])) { {
            header('Location:./Forgotpassword.php?error=Please enter your email address before submitting ');
        }
    } else {
        $CustomerRegisteredEmail = trim(filter_input(INPUT_POST, 'CustomerRegisteredEmail', FILTER_SANITIZE_EMAIL));
        $emailCheckingQuery = "SELECT EMAIL FROM USER_TABLE WHERE EMAIL = '$CustomerRegisteredEmail'";
        $result = oci_parse($conn, $emailCheckingQuery);
        oci_execute($result);

        if (($row = oci_fetch_array($result, OCI_ASSOC)) !== false) {
            require '../../../mail/phpmailer/src/Exception.php';
            require '../../../mail/phpmailer/src/PHPMailer.php';
            require '../../../mail/phpmailer/src/SMTP.php';
            
            $mail = new PHPMailer(true);
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cleckcart@gmail.com'; //sender's email address
            $mail->Password = 'jqmuadhegtgyetci'; //app password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = '465';
            
            $mail->setFrom('cleckcart@gmail.com'); //sender's email address
            $mail->addAddress($CustomerRegisteredEmail); //reciever's email
            $mail->isHTML(true);
            $mail->Subject = 'CleckCart Password Reset'; //subject of the email for reciever
            $mail->Body='<html>
            <head>
                <style>
                    .container{padding: 5vh;}
                    .heading{text-align: center;color: rgb(129, 127, 127);}
                    .line{border: 1px solid rgb(68, 68, 68);}
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="heading">
                        <h1>One Time Password</h1>
                    </div>
                    <hr class="line">
                    <div class="content">
                        <p>Dear User, Please use OTP:</p>
                        <h2>'.$otp.'</h2>
                        <br>Warm regards,<br>CleckCart
                    </div>
                </div>
            </body>
            </html>';
            // $mail->Body = 'Your OTP: '.$otp; //message for the reciever
            $mail->send();
            header('Location:./Forgotpasswordmail.php?success=Mail Sent');
            // header('Location:./Forgotpasswordmail.php');
            $_SESSION['email'] = $CustomerRegisteredEmail;
            // header('Location:./Forgotpassword.php?success=');
        } else {
            header('Location:./Forgotpassword.php?error=No such registered Email');
        }
    }
}
