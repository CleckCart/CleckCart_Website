<?php
    include('./connect.php');
    if(isset($_POST['CollectionDateSubmit'])){
        if(isset($_GET['user']) && isset($_GET['cartId']) && isset($_GET['totalCartItems'])){
            $user = $_GET['user'];
            $cartId = $_GET['cartId'];
            $productTotalQuantity = $_GET['totalCartItems'];
            $todayDate = date("m/d/Y");
        }
        if(isset($_POST['time']) && isset($_POST['day'])){
            $collectionTime = $_POST['time'];
            $collectionDate = $_POST['day'];

            $query = "SELECT * FROM CART_PRODUCT WHERE CART_ID = $cartId";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            while($row = oci_fetch_array($result, OCI_ASSOC)){
                $cartproductId = $row['CART_PRODUCT_ID'];
            }

            if(!empty($cartproductId)){
                if($productTotalQuantity <= 20){
                    $today = date('Y-m-d');
                    $queryInvoice = "INSERT INTO INVOICE(INVOICE_ID, CART_ID, INVOICE_DATE, CUSTOMER_NAME) VALUES(INVOICE_S.NEXTVAL, :cartId, :invoiceDate, :customerName)";
                    $resultInvoice = oci_parse($conn, $queryInvoice);
                    oci_bind_by_name($resultInvoice, ':cartId', $cartId);
                    oci_bind_by_name($resultInvoice, ':invoiceDate', $today);
                    oci_bind_by_name($resultInvoice, ':customerName', $user);
                    oci_execute($resultInvoice);
                    header("Location:./Invoice.php?user=$user&time=$collectionTime&day=$collectionDate");
                }
                else{
                    header("Location:./Checkout.php?user=$user&error=You can Only Have Total of 20 Cart Items.");
                }
            }
            else{
                header("Location:./Checkout.php?user=$user&error=No items in cart.");
            }
        }
        else{
            header("Location:./Checkout.php?user=$user&error=Please select collection Day and Time.");
        }
    }
?>