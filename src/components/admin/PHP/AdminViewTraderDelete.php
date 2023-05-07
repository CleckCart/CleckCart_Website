<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  include('connect.php');
  $deleteTraderId = $_GET['id'];
  $deleteTraderName = $_GET['username'];
  $deleteTraderEmail = $_GET['email'];
  if(isset($_GET['id'])&&isset($_GET['action']))
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
      $mail->addAddress($deleteTraderEmail); //reciever's email
      $mail->isHTML(true);
      $mail->Subject = 'Notice Of Termination! '; //subject of the email for reciever
      $mail->Body = 'Dear, '. $deleteTraderName .'<br>You have been removed from CleckCart as a Trader.<br> Thank you for your time and contribution!'; //message for the reciever
      $mail->send();
      $sql = "DELETE FROM USER_TABLE WHERE USER_ID = $deleteTraderId";     
      $DeleteQuery = oci_parse($conn, $sql);
      oci_execute($DeleteQuery);
      header("Location:./AdminViewTraderPage.php?success= Trader has been deleted.");
    }
    else{
      header("Location:./AdminViewTraderPage.php?error= Something went wrong. Please try again.");
    }
?>