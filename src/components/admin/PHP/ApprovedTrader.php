<?php
include('connect.php');
if(isset($_GET['user'])){
    $user = $_GET['user'];
}
?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    $approvedTraderId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $FetchTraderQuery = "SELECT * FROM APPLY_TRADER WHERE APPLY_ID = '$approvedTraderId'";     
            $RunFetchQuery = oci_parse($conn, $FetchTraderQuery);
            oci_execute($RunFetchQuery);
            if($RunFetchQuery)
                {   
                    while($row = oci_fetch_array($RunFetchQuery, OCI_ASSOC)){
                    $Id=$row['APPLY_ID'];
                    $Username=strtolower($row['USERNAME']);
                    $Role='trader';
                    $Image=$row['IMAGE'];
                    $Firstname=strtolower($row['FIRST_NAME']);
                    $Lastname=strtolower($row['LAST_NAME']);
                    $Email=strtolower($row['EMAIL']);  
                    $Category=strtolower($row['SHOP_CATEGORY']);
                    $Gender=strtolower($row['GENDER']);
                    $BirthDate=$row['DATE_OF_BIRTH'];
                    $Address=strtolower($row['ADDRESS']);
                    $PhoneNumber=$row['PHONE_NUMBER'];
                    $Password=$row['PASSWORD'];
                    $Status = "No";
                    
                    $TraderInsertionQuery = "INSERT INTO USER_TABLE (USER_ID, IMAGE, USERNAME, ROLE, FIRST_NAME, LAST_NAME, EMAIL, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                    VALUES(USER_S.NEXTVAL, :TraderImage, :TraderUserName, :TraderRole,:TraderFirstName, :TraderLastName, :TraderEmail, :TraderGender, :TraderPassword, :TraderBirthDate, :TraderAddress , :TraderPhoneNumber)";
                    $TraderRunInsertionQuery = oci_parse($conn, $TraderInsertionQuery);  
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderImage', $Image);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderUserName', $Username);   
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderRole', $Role);                         
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderFirstName', $Firstname);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderLastName', $Lastname);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderEmail', $Email);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderGender', $Gender);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderPassword', $Password);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderBirthDate', $BirthDate);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderAddress', $Address);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderPhoneNumber', $PhoneNumber);
                    

                    oci_execute($TraderRunInsertionQuery);                    

                    $CategoryInsertionQuery = "INSERT INTO CATEGORY (CATEGORY_ID, CATEGORY_NAME) VALUES(CATEGORY_S.NEXTVAL,:TraderCategory)";
                    $RunCategoryInsertionQuery = oci_parse($conn, $CategoryInsertionQuery);
                    oci_bind_by_name($RunCategoryInsertionQuery, ':TraderCategory', $Category);
                    oci_execute($RunCategoryInsertionQuery);                   

                    $changeCase = strtolower($Category);
                    $ShopDate=date("Y-m-d");
                    $ShopDescription = "Welcome to ". $Username ."'s shop!\nWe offer a wide range of high-quality ". $changeCase . " products that are both affordable and fresh.";

                    $ShopInsertionQuery = "INSERT INTO SHOP (SHOP_ID, USER_ID, SHOP_NAME, SHOP_DATE, SHOP_OWNER, SHOP_DESCRIPTION) VALUES(USER_S.NEXTVAL, :TraderUserId, :TraderShopName, :TraderShopDate, :TraderUsername, :ShopDescription)";
                    $RunShopInsertionQuery = oci_parse($conn, $ShopInsertionQuery);
                    oci_bind_by_name($RunShopInsertionQuery, ':TraderUserId', $Id);
                    oci_bind_by_name($RunShopInsertionQuery, ':TraderShopName', $Category);
                    oci_bind_by_name($RunShopInsertionQuery, ':TraderShopDate', $ShopDate);
                    oci_bind_by_name($RunShopInsertionQuery, ':TraderUsername', $Username);   
                    oci_bind_by_name($RunShopInsertionQuery, ':ShopDescription', $ShopDescription);
                    if(oci_execute($RunShopInsertionQuery)){
                        $DeleteAfterApproveQuery = "DELETE FROM APPLY_TRADER WHERE APPLY_ID = $approvedTraderId";     
                        $RunDeleteQuery = oci_parse($conn, $DeleteAfterApproveQuery);
                        oci_execute($RunDeleteQuery);

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
                        $mail->Subject = 'Congratulations! ' . $Firstname .', You\'re Approved to Sell Your Products'; //subject of the email for reciever
                        $mail->Body = 'Dear, '. $Firstname .'<br><br>
                        We are thrilled to inform you that your request be a trader on CleckCart has been approved! Congratulations on this exciting opportunity to expand your business and reach a wider audience.
                        We believe that your unique products will be a valuable addition to our platform, and we are confident that our customers will appreciate the quality and innovation you bring. We can\'t wait to showcase your offerings and help you grow your brand.<br><br>
                        Should you have any questions or require assistance along the way, please don\'t hesitate to reach out to our support team. We\'re here to help.<br><br>
                        Thank you for choosing our platform to showcase your products. We look forward to a successful partnership and mutually beneficial results.<br><br>
                        Best regards,<br><br>
                        CleckCart
                        '; //message for the reciever
                        $mail->send();
                        header("Location:AdminApproveTrader.php?user=$user&success=Trader has been approved.");
                    } 


                    }
                }
        }
?>