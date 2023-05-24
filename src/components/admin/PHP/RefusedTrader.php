<?php
include('connect.php');
if(isset($_GET['user'])){
    $user = $_GET['user'];
}
?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    $refusedTraderId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $FetchTraderQuery = "SELECT * FROM APPLY_TRADER WHERE APPLY_ID = $refusedTraderId";     
            $RunFetchQuery = oci_parse($conn, $FetchTraderQuery);
            oci_execute($RunFetchQuery);

            $row = oci_fetch_array($RunFetchQuery, OCI_ASSOC);
            $Email=$row['EMAIL'];
            $Username=$row['USERNAME'];
            $Firstname=$row['FIRST_NAME'];


            $sql = "DELETE FROM APPLY_TRADER WHERE APPLY_ID = $refusedTraderId";     
            $DeleteQuery = oci_parse($conn, $sql);
            oci_execute($DeleteQuery);
            if($DeleteQuery)
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
                    $mail->Subject = 'Trading Rejection Notice'; //subject of the email for reciever
                    $mail->Body = 'Dear '.$Username.',<br><br>We regret to inform you that we are unable to accommodate the sale of your products on our website as another seller already offers similar products.<br><br>
                    Thank you for your interest in our platform. We apologize for any inconvenience caused.<br><br>
                    Best regards,<br><br>
                    CleckCart'; //message for the reciever
                    $mail->send();
                    header("Location:AdminApproveTrader.php?user=$user&error=Trader has been refused.");
                }
        }
?>