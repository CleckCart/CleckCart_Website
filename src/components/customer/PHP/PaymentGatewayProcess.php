<?php
    include('./connect.php');
    
    if(isset($_GET['user']) && isset($_GET['cartId']) && isset($_GET['totalCartItems']) && isset($_GET['time']) && isset($_GET['date'])){
        $user = $_GET['user'];
        $cartId = $_GET['cartId'];
        $productTotalQuantity = $_GET['totalCartItems'];
        $collectionDate = $_GET['date'];
        $collectionTime = $_GET['time'];

        $todayDate = date("m-d-Y");

        $query = "SELECT * FROM CART_PRODUCT WHERE CART_ID = $cartId";
        $result = oci_parse($conn, $query);
        oci_execute($result);
        while($row = oci_fetch_array($result, OCI_ASSOC)){
            $productId = $row['PRODUCT_ID'];
    
        }

        $queryOrder = "INSERT INTO ORDER_C(ORDER_ID, CART_ID, ORDER_DATE) VALUES (ORDER_S.NEXTVAL, :cartId, :orderDate)";
        $resultOrder = oci_parse($conn, $queryOrder);
        oci_bind_by_name($resultOrder, ':cartId', $cartId);
        oci_bind_by_name($resultOrder, ':orderDate', $todayDate);
        oci_execute($resultOrder);
      
        
        $query = "SELECT * FROM ORDER_C WHERE CART_ID = $cartId";
        $result = oci_parse($conn, $query);
        oci_execute($result);

        while ($row = oci_fetch_assoc($result))
        {
            $OrderId = $row['ORDER_ID'];
        }
        
        $SlotStatus = 'N';
        $queryOrderCollection = "INSERT INTO COLLECTION_SLOT(COLLECTION_ID, ORDER_ID, COLLECTION_DATE, COLLECTION_TIME, SLOT_STATUS)
        VALUES (COLLECTION_SLOT_S.NEXTVAL, :OrderId, :collectionDate, :collectionTime, :slotStatus)";
        $resultOrderCollection = oci_parse($conn, $queryOrderCollection);
        oci_bind_by_name($resultOrderCollection, ':OrderId', $OrderId);
        oci_bind_by_name($resultOrderCollection, ':collectionDate', $collectionDate);
        oci_bind_by_name($resultOrderCollection, ':collectionTime', $collectionTime);
        oci_bind_by_name($resultOrderCollection, ':slotStatus', $SlotStatus);
        oci_execute($resultOrderCollection);
        
        $query = "SELECT * FROM CART_PRODUCT WHERE CART_ID = $cartId";
        $result = oci_parse($conn, $query);
        oci_execute($result);

        while ($row = oci_fetch_array($result, OCI_ASSOC))
        {
            $ProductId = $row['PRODUCT_ID'];
            $ProductQuantity = $row['PRODUCT_QUANTITY'];

            $queryOrderProduct = "INSERT INTO ORDER_PRODUCT(ORDER_PRODUCT_ID, ORDER_ID, PRODUCT_ID, ORDER_QUANTITY) VALUES (ORDER_PRODUCT_S.NEXTVAL, :orderId, :productId, :productQuantity)";
            $resultOrderProduct = oci_parse($conn, $queryOrderProduct);
            oci_bind_by_name($resultOrderProduct, ':orderId', $OrderId);
            oci_bind_by_name($resultOrderProduct, ':productId', $ProductId);
            oci_bind_by_name($resultOrderProduct, ':productQuantity', $ProductQuantity);
            oci_execute($resultOrderProduct);
        }      
        

        header("Location:./PaymentGateway.php?user=$user");
    }
?>