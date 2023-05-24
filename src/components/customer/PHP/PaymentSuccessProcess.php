<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include("./connect.php");

    if(isset($_GET['user']) && isset($_GET['cartId']) && isset($_GET['amount']) && isset($_GET['method'])){
        $user = $_GET['user'];
        $cartId = $_GET['cartId'];
        $productTotalPrice = $_GET['amount'];
        $paymentMethod = $_GET['method'];

        $paymentDate = date('Y-m-d');

        $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE = 'customer'";
        $resultCustomer = oci_parse($conn, $queryCustomer);
        oci_execute($resultCustomer);

        while($row = oci_fetch_array($resultCustomer, OCI_ASSOC)){
            $userid = $row['USER_ID'];
            $Email = $row['EMAIL'];
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
        $CollectionId = $rowCollection['COLLECTION_ID'];
        
        $SlotStatus = 'Y';
        $queryUpdateCollectionSlot = "UPDATE COLLECTION_SLOT SET SLOT_STATUS=:SlotStatus WHERE COLLECTION_ID='$CollectionId'";
        $resultUpdateCollectionSlot = oci_parse($conn, $queryUpdateCollectionSlot);
        oci_bind_by_name($resultUpdateCollectionSlot, ":SlotStatus", $SlotStatus);
        oci_execute($resultUpdateCollectionSlot);

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
        $mail->addAddress($Email); //receiver's email
        $mail->isHTML(true);
        $mail->Subject = 'Dear ' . $user .', Your Order ID : ' . $orderId . ' Receipt.'; //subject of the email for the receiver

        $queryOrderProduct = "SELECT * FROM ORDER_PRODUCT WHERE ORDER_ID = $orderId";
        $resultOrderProduct = oci_parse($conn, $queryOrderProduct);
        oci_execute($resultOrderProduct);

        $tableContent = '<table>';
        $tableContent .= '<tr>';
        $tableContent .= '<th>Product</th>';
        $tableContent .= '<th>Price</th>';
        $tableContent .= '<th>Quantity</th>';
        $tableContent .= '</tr>';

        while($rowOrderProduct = oci_fetch_array($resultOrderProduct, OCI_ASSOC)){
            $orderProductId = $rowOrderProduct['ORDER_PRODUCT_ID'];
            $ProductId = $rowOrderProduct['PRODUCT_ID'];
            $orderProductQuantity = $rowOrderProduct['ORDER_QUANTITY'];

            $queryProduct = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $ProductId";
            $resultProduct = oci_parse($conn, $queryProduct);
            oci_execute($resultProduct);

            while($rowProduct = oci_fetch_array($resultProduct, OCI_ASSOC)){
                $productName = $rowProduct['PRODUCT_NAME'];
                $productPrice = $rowProduct['PRODUCT_PRICE'];

                $tableContent .= '<tr>';
                $tableContent .= '<td>' . $productName . '</td>';
                $tableContent .= '<td>' . '&pound;'.$productPrice . '</td>';
                $tableContent .= '<td>' . $orderProductQuantity . '</td>';
                $tableContent .= '</tr>';
            }
        }
        $tableContent .= '</table>';
        $mail->Body = $tableContent; //message for the receiver
        $mail->send();
        
        header("Location:./PaymentSuccess.php?user=$user&orderId=$orderId&amount=$productTotalPrice");
    }
?>
