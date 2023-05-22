<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['cartId']) && isset($_GET['day']) && isset($_GET['time'])){
        $user = $_GET['user'];
        $guestCartId = $_GET['cartId'];
        $collectionDate = $_GET['day'];
        $collectionTime = $_GET['time'];

        $today = date('Y-m-d');
        $queryInvoice = "INSERT INTO INVOICE(INVOICE_ID, CART_ID, INVOICE_DATE, CUSTOMER_NAME) VALUES(INVOICE_S.NEXTVAL, :cartId, :invoiceDate, :customerName)";
        $resultInvoice = oci_parse($conn, $queryInvoice);
        oci_bind_by_name($resultInvoice, ':cartId', $cartId);
        oci_bind_by_name($resultInvoice, ':invoiceDate', $today);
        oci_bind_by_name($resultInvoice, ':customerName', $user);
        oci_execute($resultInvoice);
        header("Location:../../customer/PHP/Invoice.php?user=$user&time=$collectionTime&day=$collectionDate");
    }
?>