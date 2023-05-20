<?php
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
        }

        $query = "INSERT INTO PAYMENT(PAYMENT_ID, USER_ID, CART_ID, PAYMENT_AMOUNT, PAYMENT_METHOD, PAYMENT_DATE) VALUES (PAYMENT_S.NEXTVAL, :userId, :cartId, :paymentAmount, :paymentMethod, :paymentDate)";
        $result = oci_parse($conn, $query);
        oci_bind_by_name($result, ':userId', $userid);
        oci_bind_by_name($result, ':cartId', $cartId);
        oci_bind_by_name($result, ':paymentAmount', $productTotalPrice);
        oci_bind_by_name($result, ':paymentMethod', $paymentMethod);
        oci_bind_by_name($result, ':paymentDate', $paymentDate);
        oci_execute($result);

        $queryDeleteCartProduct = "DELETE FROM CART_PRODUCT WHERE CART_ID = $cartId";     
        $resultDeleteCartProduct = oci_parse($conn, $queryDeleteCartProduct);
        oci_execute($resultDeleteCartProduct);

        $queryDeleteInvoice = "DELETE FROM INVOICE WHERE CART_ID = $cartId";     
        $resultDeleteCartProduct = oci_parse($conn, $queryDeleteInvoice);
        oci_execute($resultDeleteCartProduct);

        header("Location:./PaymentSuccess.php?user=$user&cartId=$cartId&amount=$productTotalPrice");
    }
    ?>