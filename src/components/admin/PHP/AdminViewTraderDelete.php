<?php
  include('connect.php');
  if(isset($_GET['user'])){
    $user = $_GET['user'];
  }
?>
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  $deleteTraderId = $_GET['id'];
  $deleteTraderName = $_GET['username'];
  $deleteTraderEmail = $_GET['email'];
  if(isset($_GET['id'])&&isset($_GET['action']))
    {
  
      $FetchShopQuery = "SELECT * FROM SHOP WHERE USER_ID = $deleteTraderId";
      $RunFetchShopQuery = oci_parse($conn, $FetchShopQuery);
      oci_execute($RunFetchShopQuery);
      $ShopRow = oci_fetch_array($RunFetchShopQuery, OCI_ASSOC);
      $Categoryname = $ShopRow['SHOP_NAME'];
      $ShopId = $ShopRow['SHOP_ID'];

      $FetchProductQuery = "SELECT * FROM PRODUCT WHERE SHOP_ID = '$ShopId'";
      $RunFetchProductQuery = oci_parse($conn, $FetchProductQuery);
      oci_execute($RunFetchProductQuery);
      $ProductRow = oci_fetch_array($RunFetchProductQuery, OCI_ASSOC);
      $ProductId = $ProductRow['PRODUCT_ID'];

      $DeleteOfferQuery = "DELETE FROM OFFER WHERE PRODUCT_ID = '$ProductId'";
      $RunDeleteOfferQuery = oci_parse($conn, $DeleteOfferQuery);
      oci_execute($RunDeleteOfferQuery);

      $DeleteProductQuery = "DELETE FROM PRODUCT WHERE SHOP_ID = '$ShopId'";
      $RunDeleteProductQuery = oci_parse($conn, $DeleteProductQuery);
      oci_execute($RunDeleteProductQuery);

      $DeleteShopQuery = "DELETE FROM SHOP WHERE USER_ID = '$deleteTraderId'";
      $RunDeleteShopQuery = oci_parse($conn, $DeleteShopQuery);
      oci_execute($RunDeleteShopQuery); 

      $DeleteCategoryQuery = "DELETE FROM CATEGORY WHERE CATEGORY_NAME = :CategoryName";
      $RunDeleteCategoryQuery = oci_parse($conn, $DeleteCategoryQuery);
      oci_bind_by_name($RunDeleteCategoryQuery,':CategoryName',$Categoryname);
      oci_execute($RunDeleteCategoryQuery); 
     
      $DeleteUserQuery = "DELETE FROM USER_TABLE WHERE USER_ID = '$deleteTraderId'";     
      $RunDeleteUserQuery = oci_parse($conn, $DeleteUserQuery);
      oci_execute($RunDeleteUserQuery);

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
      $mail->Subject = 'Notice Of Termination!!! '; //subject of the email for reciever
      $mail->Body = 'Dear, '. $deleteTraderName .'<br>You have been removed from CleckCart as a Trader.<br> Thank you for your time and contribution!'; //message for the reciever
      $mail->send();
      header("Location:./AdminViewTraderPage.php?user=$user&success=Trader has been deleted.");
    }

    else{
      header("Location:./AdminViewTraderPage.php?user=$user&error=Something went wrong. Please try again.");
    }
?>