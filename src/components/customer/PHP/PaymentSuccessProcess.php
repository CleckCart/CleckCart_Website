<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../../../mail/phpmailer/src/Exception.php';
    require '../../../mail/phpmailer/src/PHPMailer.php';
    require '../../../mail/phpmailer/src/SMTP.php';
    include("./connect.php");
    if(isset($_GET['user']) && isset($_GET['cartId']) && isset($_GET['amount']) && isset($_GET['method'])){
        $user = $_GET['user'];
        $cartId = $_GET['cartId'];
        $productTotalPrice= $_GET['amount'];
        $paymentMethod = $_GET['method'];

        $paymentDate = date('Y-m-d');
        $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE = 'customer'";
        $resultCustomer = oci_parse($conn, $queryCustomer);
        oci_execute($resultCustomer);
        while($row = oci_fetch_array($resultCustomer, OCI_ASSOC)){
            $userid = $row['USER_ID'];
            $userEmail = $row['EMAIL'];
            $userFirstName = $row['FIRST_NAME'];
        }

        $queryOrder = "SELECT * FROM ORDER_C WHERE CART_ID = $cartId";
        $resultOrder = oci_parse($conn, $queryOrder);
        oci_execute($resultOrder);
        while($rowOrder = oci_fetch_array($resultOrder, OCI_ASSOC)){
            $orderId = $rowOrder['ORDER_ID'];
        }

        $query = "INSERT INTO PAYMENT(PAYMENT_ID, USER_ID, ORDER_ID, PAYMENT_AMOUNT, PAYMENT_METHOD, PAYMENT_DATE) VALUES (PAYMENT_S.NEXTVAL, :userId, :orderId, :paymentAmount, :paymentMethod, :paymentDate)";
        $result = oci_parse($conn, $query);
        oci_bind_by_name($result, ':userId', $userid);
        oci_bind_by_name($result, ':orderId', $orderId);
        oci_bind_by_name($result, ':paymentAmount', $productTotalPrice);
        oci_bind_by_name($result, ':paymentMethod', $paymentMethod);
        oci_bind_by_name($result, ':paymentDate', $paymentDate);
        oci_execute($result);

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cleckcart@gmail.com'; //sender's email address
        $mail->Password = 'jqmuadhegtgyetci'; //app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';
        $mail->setFrom('cleckcart@gmail.com'); //sender's email address
        $mail->addAddress($userEmail); //reciever's email
        $mail->isHTML(true);
        $mail->Subject = 'Order Confirmation #' . $orderId . ' : Purchase Successfully Made!'; //subject of the email for the receiver
        $mail->Body = 'Dear '. $user .',<br><br>I hope this email finds you well. 
                        This is to confirm you that the total amount paid for your recent order with us. We greatly appreciate your business and want to ensure that all payment details are accurate.
                        The total amount paid for your ORDER ID : '. $orderId .' , is &pound;' .$productTotalPrice. '.<br><br>
                        Please review the payment information provided and feel free to contact us if you have any questions or concerns. We are committed to providing you with excellent service and want to ensure your complete satisfaction.<br><br>
                        Thank you for choosing CleckCart. We value your trust and look forward to serving you again in the future.<br><br>
                        Warm regards,<br><br>
                        CleckCart'; //message for the reciever
        $mail->send();


        $queryOrderProduct = "SELECT * FROM ORDER_PRODUCT WHERE ORDER_ID = $orderId";
        $resultOrderProduct = oci_parse($conn, $queryOrderProduct);
        oci_execute($resultOrderProduct);
        while($rowOrderProduct = oci_fetch_array($resultOrderProduct, OCI_ASSOC)){
            $orderProductId = $rowOrderProduct['PRODUCT_ID'];
            $orderProductQuantity = $rowOrderProduct['ORDER_QUANTITY'];

            $queryProductStock = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$orderProductId'";
            $resultProductStock = oci_parse($conn, $queryProductStock);
            oci_execute($resultProductStock);
            while($rowProductStock = oci_fetch_array($resultProductStock, OCI_ASSOC)){
                $productName = $rowProductStock['PRODUCT_NAME'];
                $productStock = $rowProductStock['PRODUCT_STOCK'];
                $productShopId = $rowProductStock['SHOP_ID'];

                $queryProductShop = "SELECT * FROM SHOP WHERE SHOP_ID = '$productShopId'";
                $resultProductShop = oci_parse($conn, $queryProductShop);
                oci_execute($resultProductShop);
                $rowProductShop = oci_fetch_assoc($resultProductShop);
                $shopOwner = $rowProductShop['SHOP_OWNER'];

                $queryTraderEmail = "SELECT * FROM USER_TABLE WHERE USERNAME = '$shopOwner' AND ROLE = 'trader'";
                $resultTraderEmail = oci_parse($conn, $queryTraderEmail);
                oci_execute($resultTraderEmail);
                $rowTraderEmail = oci_fetch_assoc($resultTraderEmail);
                $traderFirstName = $rowTraderEmail['FIRST_NAME'];
                $traderEmail = $rowTraderEmail['EMAIL'];

                //subtracting orderQuantity from productStock
                $newProductStock = $productStock - $orderProductQuantity;

                $queryUpdateProductStock = "UPDATE PRODUCT SET PRODUCT_STOCK=:productStock WHERE PRODUCT_ID='$orderProductId'";
                $resultUpdateProductStock = oci_parse($conn, $queryUpdateProductStock);
                oci_bind_by_name($resultUpdateProductStock, ":productStock", $newProductStock);
                oci_execute($resultUpdateProductStock);

                //send notification if product level is low to the respected trader
                if($newProductStock <= 1){
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'cleckcart@gmail.com'; //sender's email address
                        $mail->Password = 'jqmuadhegtgyetci'; //app password
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = '465';
                        $mail->setFrom('cleckcart@gmail.com'); //sender's email address
                        $mail->addAddress($traderEmail); //reciever's email
                        $mail->isHTML(true);
                        $mail->Subject = 'Urgent: Low Product Stock Alert'; //subject of the email for reciever
                        $mail->Body = 'Dear ' . ucfirst($traderFirstName).',<br><br>
                        We hope this email finds you well. We wanted to bring to your attention that the inventory level of your Product : <b>'. ucfirst($productName) .'</b> on our website is currently low. It is essential to ensure an adequate stock level to meet the demands of our customers and maximize sales opportunities.<br><br>
                        We highly recommend reviewing and replenishing your product inventory as soon as possible to avoid any potential loss of sales. This will help maintain a positive customer experience and ensure that your products remain available for purchase.<br><br>
                        Should you require any assistance or have any questions regarding inventory management or restocking, please do not hesitate to contact our support team. We are here to support you and provide guidance throughout the process.<br><br>
                        Thank you for your attention to this matter. We appreciate your partnership and look forward to your prompt action in restocking your products.<br><br>
                        Best regards,<br><br>
                        CleckCart'; //message for the reciever
                        $mail->send();
                }
            }
        }

        $queryDeleteCartProduct = "DELETE FROM CART_PRODUCT WHERE CART_ID = '$cartId'";     
        $resultDeleteCartProduct = oci_parse($conn, $queryDeleteCartProduct);
        oci_execute($resultDeleteCartProduct);

        $queryDeleteInvoice = "DELETE FROM INVOICE WHERE CART_ID = $cartId";     
        $resultDeleteCartProduct = oci_parse($conn, $queryDeleteInvoice);
        oci_execute($resultDeleteCartProduct);

        $queryCollection = "SELECT * FROM COLLECTION_SLOT WHERE ORDER_ID='$orderId'";
        $resultCollection = oci_parse($conn, $queryCollection);
        oci_execute($resultCollection);
        $rowCollection = oci_fetch_assoc($resultCollection);
        $CollectionId=$rowCollection['COLLECTION_ID'];

        $SlotStatus = 'Y';
        $queryUpdateCollectionSlot = "UPDATE COLLECTION_SLOT SET SLOT_STATUS=:SlotStatus WHERE COLLECTION_ID='$CollectionId'";
        $resultUpdateCollectionSlot = oci_parse($conn, $queryUpdateCollectionSlot);
        oci_bind_by_name($resultUpdateCollectionSlot, ":SlotStatus", $SlotStatus);
        oci_execute($resultUpdateCollectionSlot);

        header("Location:./PaymentSuccess.php?user=$user&orderId=$orderId&amount=$productTotalPrice");
    }
    ?>