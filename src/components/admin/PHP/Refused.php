<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include('connect.php');
    $refusedId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $sql = "DELETE FROM APPLY_TRADER WHERE APPLY_ID = $refusedId";     
            $qry = oci_parse($conn, $sql);
            oci_execute($qry);
            if($qry)
                {
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
                    $mail->addAddress($Email); //reciever's email
                    $mail->isHTML(true);
                    $mail->Subject = 'Congratulations! ' . $Firstname .', You can Start Selling with CleckCart'; //subject of the email for reciever
                    $mail->Body = 'Dear, '. $Firstname .' you have been approved to sell your products with CleckCart. Happy Trading!'; //message for the reciever
                    $mail->send();
                    header("Location:AdminApproveTrader.php?error=Trader has been refused.");
                }
        }
?>