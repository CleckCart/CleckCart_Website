<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include('connect.php');
    $refusedProductId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $FetchProductQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_ID=$refusedProductId";     
            $RunFetchProductQuery = oci_parse($conn, $FetchProductQuery);
            oci_execute($RunFetchProductQuery);
            $ProductRow = oci_fetch_array($RunFetchProductQuery, OCI_ASSOC);
            $ShopId = $ProductRow['SHOP_ID'];

            $FetchShopQuery = "SELECT * FROM SHOP WHERE SHOP_ID=$ShopId";     
            $RunFetchShopQuery = oci_parse($conn, $FetchShopQuery);
            oci_execute($RunFetchShopQuery);
            $ShopRow = oci_fetch_array($RunFetchShopQuery, OCI_ASSOC);
            $ShopOwnerUsername= $ShopRow['SHOP_OWNER'];

            $FetchEmailQuery = "SELECT * FROM USER_TABLE WHERE USERNAME=:ShopOwnerUsername";     
            $RunFetchEmailQuery = oci_parse($conn, $FetchEmailQuery);
            oci_bind_by_name($RunFetchEmailQuery, ':ShopOwnerUsername', $ShopOwnerUsername);
            oci_execute($RunFetchEmailQuery);
            $EmailRow = oci_fetch_array($RunFetchEmailQuery, OCI_ASSOC);
            $Email= $EmailRow['EMAIL'];

            $sql = "DELETE FROM PRODUCT WHERE PRODUCT_ID = $refusedProductId";     
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
                    $mail->Subject = 'Sorry ' . $ShopOwnerUsername .', Your product has been refused.'; //subject of the email for reciever
                    $mail->Body = 'Dear, '. $ShopOwnerUsername .'<br>Your product has been denied to be a listed in CleckCart.<br>Please follow the trader guidelines.'; //message for the reciever
                    $mail->send();
                    header("Location:AdminApproveTrader'sItemPage.php?error=Product has been refused.");
                }
        }
?>