<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include('connect.php');
    $approvedTraderId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $FetchTraderQuery = "SELECT * FROM APPLY_TRADER WHERE APPLY_ID = $approvedTraderId";     
            $RunFetchQuery = oci_parse($conn, $FetchTraderQuery);
            oci_execute($RunFetchQuery);
            if($RunFetchQuery)
                {   
                    while($row = oci_fetch_array($RunFetchQuery, OCI_ASSOC)){
                    $Id=$row['APPLY_ID'];
                    $Username=$row['USERNAME'];
                    $Role='Trader';
                    $Firstname=$row['FIRST_NAME'];
                    $Lastname=$row['LAST_NAME'];
                    $Email=$row['EMAIL'];  
                    $Category=$row['SHOP_CATEGORY'];
                    $Gender=$row['GENDER'];
                    $BirthDate=$row['DATE_OF_BIRTH'];
                    $Address=$row['ADDRESS'];
                    $PhoneNumber=$row['PHONE_NUMBER'];
                    $Password=$row['PASSWORD'];
                    
                    $TraderInsertionQuery = "INSERT INTO USER_TABLE (USER_ID, USERNAME, ROLE, FIRST_NAME, LAST_NAME, EMAIL, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                    VALUES(:TraderId, :TraderUserName, :TraderRole,:TraderFirstName, :TraderLastName, :TraderEmail, :TraderGender, :TraderPassword, :TraderBirthDate, :TraderAddress , :TraderPhoneNumber)";
                    $TraderRunInsertionQuery = oci_parse($conn, $TraderInsertionQuery);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderId', $Id);   
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
                    $mail->Body = 'Dear, '. $Firstname .'<br>You have been approved to sell your products with CleckCart. Happy Trading!'; //message for the reciever
                    $mail->send();

                    $CategoryInsertionQuery = "INSERT INTO CATEGORY (CATEGORY_ID, CATEGORY_NAME) VALUES(CATEGORY_S.NEXTVAL,:TraderCategory)";
                    $RunCategoryInsertionQuery = oci_parse($conn, $CategoryInsertionQuery);
                    oci_bind_by_name($RunCategoryInsertionQuery, ':TraderCategory', $Category);
                    oci_execute($RunCategoryInsertionQuery);


                    $ShopInsertionQuery = "INSERT INTO SHOP (SHOP_ID, USER_ID, SHOP_NAME, SHOP_OWNER) VALUES(USER_S.NEXTVAL, :TraderUserId, :TraderShopName, :TraderUsername)";
                    $RunShopInsertionQuery = oci_parse($conn, $ShopInsertionQuery);
                    oci_bind_by_name($RunShopInsertionQuery, ':TraderUserId', $Id);
                    oci_bind_by_name($RunShopInsertionQuery, ':TraderShopName', $Category);
                    oci_bind_by_name($RunShopInsertionQuery, ':TraderUsername', $Username);    
                    oci_execute($RunShopInsertionQuery); 

                    $DeleteAfterApproveQuery = "DELETE FROM APPLY_TRADER WHERE APPLY_ID = $approvedTraderId";     
                    $RunDeleteQuery = oci_parse($conn, $DeleteAfterApproveQuery);
                    oci_execute($RunDeleteQuery);
                    header("Location:AdminApproveTrader.php?success=Trader has been approved.");
                    }
                }
        }
?>
