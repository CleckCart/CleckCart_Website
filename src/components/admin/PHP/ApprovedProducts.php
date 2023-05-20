<?php
    include('connect.php');
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception; 
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $approvedProductId = $_GET['id'];
            $FetchProductQuery = "SELECT * FROM APPLY_PRODUCT WHERE APPLY_PRODUCT_ID = $approvedProductId";     
            $RunFetchProductQuery = oci_parse($conn, $FetchProductQuery);
            oci_execute($RunFetchProductQuery);
            if($RunFetchProductQuery)
                {   
                    while($row = oci_fetch_array($RunFetchProductQuery, OCI_ASSOC)){
                    $ProductId=$row['APPLY_PRODUCT_ID'];
                    $CategoryName=strtolower($row['CATEGORY_NAME']);
                    $ProductImage=$row['PRODUCT_IMAGE'];
                    $ProductName=strtolower($row['PRODUCT_NAME']);  
                    $ProductDate=$row['PRODUCT_DATE']; 
                    $ProductDescription=strtolower($row['PRODUCT_DESCRIPTION']);
                    $ProductPrice=$row['PRODUCT_PRICE'];
                    $ProductDiscount=$row['DISCOUNT'];
                    $ProductStock=$row['PRODUCT_STOCK'];

                    $FetchCategoryIdQuery = "SELECT * FROM CATEGORY WHERE CATEGORY_NAME=:CategoryName";
                    $RunFetchCategoryIdQuery = oci_parse($conn, $FetchCategoryIdQuery);
                    oci_bind_by_name($RunFetchCategoryIdQuery, ':CategoryName', $CategoryName);
                    oci_execute($RunFetchCategoryIdQuery);
                    $CategoryIdRow = oci_fetch_array($RunFetchCategoryIdQuery, OCI_ASSOC);
                    $CategoryId = $CategoryIdRow['CATEGORY_ID'];

                    $FetchShopIdQuery = "SELECT * FROM SHOP WHERE SHOP_NAME=:ShopName"; 
                    $RunFetchShopIdQuery = oci_parse($conn, $FetchShopIdQuery);
                    oci_bind_by_name($RunFetchShopIdQuery, ':ShopName', $CategoryName);
                    oci_execute($RunFetchShopIdQuery);        
                    $ShopIdRow = oci_fetch_array($RunFetchShopIdQuery, OCI_ASSOC);
                    $ShopId = $ShopIdRow['SHOP_ID'];  

                    $InsertionQuery = "INSERT INTO PRODUCT (PRODUCT_ID, CATEGORY_ID, SHOP_ID, CATEGORY_NAME, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_DATE, PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_STOCK)
                    VALUES(PRODUCT_S.NEXTVAL, :CategoryId, :ShopId, :ProductCategoryName, :ProductImage, :ProductName, :ProductDate, :ProductDescription, :ProductPrice, :ProductStock)";
                    $RunInsertionQuery = oci_parse($conn, $InsertionQuery); 
                    oci_bind_by_name($RunInsertionQuery, ':CategoryId', $CategoryId);   
                    oci_bind_by_name($RunInsertionQuery, ':ShopId', $ShopId);                         
                    oci_bind_by_name($RunInsertionQuery, ':ProductCategoryName', $CategoryName);
                    oci_bind_by_name($RunInsertionQuery, ':ProductImage', $ProductImage);   
                    oci_bind_by_name($RunInsertionQuery, ':ProductName', $ProductName);   
                    oci_bind_by_name($RunInsertionQuery, ':ProductDate', $ProductDate); 
                    oci_bind_by_name($RunInsertionQuery, ':ProductDescription', $ProductDescription);                         
                    oci_bind_by_name($RunInsertionQuery, ':ProductPrice', $ProductPrice);
                    oci_bind_by_name($RunInsertionQuery, ':ProductStock', $ProductStock);
                    oci_execute($RunInsertionQuery);

                    $FetchIdQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_NAME='$ProductName' AND PRODUCT_DESCRIPTION='$ProductDescription'";
                    $RunFetchIdQuery = oci_parse($conn, $FetchIdQuery);
                    oci_execute($RunFetchIdQuery);
                    $ProductRow = oci_fetch_array($RunFetchIdQuery, OCI_ASSOC);
                    $ProductId = $ProductRow['PRODUCT_ID'];

                    $StartDate = date('Y-m-d');
                    $EndDate = date('Y-m-d', strtotime($StartDate . ' +1 week'));
                    $OfferStatus = 'Y';
                    if(!empty($ProductDiscount)){
                        $DiscountInsertionQuery = "INSERT INTO OFFER (OFFER_ID, PRODUCT_ID, DISCOUNT, START_DATE, END_DATE, OFFER_STATUS)
                        VALUES(OFFER_S.NEXTVAL, $ProductId, $ProductDiscount, :StartDate, :EndDate, :OfferStatus)";
                        $RunDiscountInsertionQuery = oci_parse($conn, $DiscountInsertionQuery);
                        oci_bind_by_name($RunDiscountInsertionQuery, ':StartDate', $StartDate);
                        oci_bind_by_name($RunDiscountInsertionQuery, ':EndDate', $EndDate);                     
                        oci_bind_by_name($RunDiscountInsertionQuery, ':OfferStatus', $OfferStatus);
                        oci_execute($RunDiscountInsertionQuery);
                    }
   
                    $FetchProductQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$approvedProductId'";     
                    $RunFetchProductQuery = oci_parse($conn, $FetchProductQuery);
                    oci_execute($RunFetchProductQuery);
                    $ProductRow = oci_fetch_array($RunFetchProductQuery, OCI_ASSOC);
                    $ShopId = $ProductRow['SHOP_ID'];
        
                    $FetchShopQuery = "SELECT * FROM SHOP WHERE SHOP_ID='$ShopId'";     
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

                    $sql = "DELETE FROM APPLY_PRODUCT WHERE APPLY_PRODUCT_ID = $approvedProductId";     
                    $DeleteQuery = oci_parse($conn, $sql);
                    oci_execute($DeleteQuery);                   

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
                    $mail->Subject = 'CleckCleck! ' . $ShopOwnerUsername . ',' . ' Your product ' . $ProductName .' has been approved.'; //subject of the email for reciever
                    $mail->Body = 'Dear, '. $ShopOwnerUsername .'<br>Your product has been approved to be listed in CleckCart.<br>Happy Trading!'; //message for the reciever
                    $mail->send();
                    header("Location:AdminApproveTraderItemPage.php?user=$user&success=Product has been approved.");       
                    }
                }
        }
?>