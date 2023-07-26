<?php
include('connect.php');
if(isset($_GET['user'])){
    $user = $_GET['user'];
}
?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    $refusedProductId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $FetchProductQuery = "SELECT * FROM APPLY_PRODUCT WHERE APPLY_PRODUCT_ID=$refusedProductId";     
            $RunFetchProductQuery = oci_parse($conn, $FetchProductQuery);
            oci_execute($RunFetchProductQuery);
            $ProductRow = oci_fetch_array($RunFetchProductQuery, OCI_ASSOC);
            $CategoryName = $ProductRow['CATEGORY_NAME'];

            $FetchShopQuery = "SELECT * FROM SHOP WHERE SHOP_NAME=:CategoryName";  
            $RunFetchShopQuery = oci_parse($conn, $FetchShopQuery);
            oci_bind_by_name($RunFetchShopQuery, ':CategoryName', $CategoryName);   
            oci_execute($RunFetchShopQuery);
            $ShopRow = oci_fetch_array($RunFetchShopQuery, OCI_ASSOC);
            $ShopOwnerUsername= $ShopRow['SHOP_OWNER'];

            $FetchEmailQuery = "SELECT * FROM USER_TABLE WHERE USERNAME=:ShopOwnerUsername";     
            $RunFetchEmailQuery = oci_parse($conn, $FetchEmailQuery);
            oci_bind_by_name($RunFetchEmailQuery, ':ShopOwnerUsername', $ShopOwnerUsername);
            oci_execute($RunFetchEmailQuery);
            $EmailRow = oci_fetch_array($RunFetchEmailQuery, OCI_ASSOC);
            $Email= $EmailRow['EMAIL'];

            $DeleteDiscountQuery = "DELETE FROM OFFER WHERE PRODUCT_ID = $refusedProductId";     
            $RunDeleteDiscountQuery = oci_parse($conn, $DeleteDiscountQuery);
            oci_execute($RunDeleteDiscountQuery);

            $sql = "DELETE FROM APPLY_PRODUCT WHERE APPLY_PRODUCT_ID = $refusedProductId";     
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
                    $mail->Subject = 'Product Listing Rejection Notice'; //subject of the email for reciever
                    $mail->Body = 'Dear '.$ShopOwnerUsername.',<br><br>
                                We regret to inform you that your product listing request has been denied for inclusion on our website. It did not meet our required guidelines and standards.<br><br>
                                We appreciate your interest in our platform and thank you for considering us. If you have any questions or would like further information regarding the reasons for the rejection, please feel free to reach out to us.<br><br>
                                Best regards,<br><br>
                                CleckCart'; //message for the reciever
                    $mail->send();
                    header("Location:AdminApproveTraderItemPage.php?user=$user&error=Product has been refused.");
                }
        }
?>