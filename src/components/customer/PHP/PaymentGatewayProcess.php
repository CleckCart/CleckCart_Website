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
            
            echo($collectionDate);
            echo($collectionDate);
            echo($productTotalQuantity);

            if($productTotalQuantity <= 20){
                $query = "SELECT * FROM CART_PRODUCT WHERE CART_ID = $cartId";
                $result = oci_parse($conn, $query);
                oci_execute($result);
                while($row = oci_fetch_array($result, OCI_ASSOC)){
                    $productId = $row['PRODUCT_ID'];
                    $productImage = $row['PRODUCT_IMAGE'];
                    $productName = $row['PRODUCT_NAME'];
                    $productPrice = $row['PRODUCT_PRICE'];
                    $productQuantity = $row['PRODUCT_QUANTITY'];
        
                    $queryOrder = "INSERT INTO ORDER_C(ORDER_ID, CART_ID, PRODUCT_ID, ORDER_QUANTITY, ORDER_DATE) VALUES (ORDER_S.NEXTVAL, :cartId, :productId, :orderQuantity, :orderDate)";
                    $resultOrder = oci_parse($conn, $queryOrder);
                    oci_bind_by_name($resultOrder, ':cartId', $cartId);
                    oci_bind_by_name($resultOrder, ':productId', $productId);
                    oci_bind_by_name($resultOrder, ':orderQuantity', $productQuantity);
                    oci_bind_by_name($resultOrder, ':orderDate', $todayDate);
                    oci_execute($resultOrder);
                }
    
                $query = "SELECT * FROM ORDER_C WHERE CART_ID = $cartId";
                $result = oci_parse($conn, $query);
                oci_execute($result);
                while($row = oci_fetch_array($result, OCI_ASSOC)){
                    $orderId = $row['ORDER_ID'];
                    $orderproductId = $row['PRODUCT_ID'];
                    $orderQuantity = $row['ORDER_QUANTITY'];
                    $orderDate = $row['ORDER_DATE'];
    
                    $queryOrderProduct = "INSERT INTO ORDER_PRODUCT(ORDER_PRODUCT_ID, ORDER_ID, PRODUCT_ID) VALUES (ORDER_PRODUCT_S.NEXTVAL, :orderId, :productId)";
                    $resultOrderProduct = oci_parse($conn, $queryOrderProduct);
                    oci_bind_by_name($resultOrderProduct, ':orderId', $orderId);
                    oci_bind_by_name($resultOrderProduct, ':productId', $orderproductId);
                    oci_execute($resultOrderProduct);
                }
    
                $query = "SELECT * FROM ORDER_C WHERE CART_ID = $cartId";
                $result = oci_parse($conn, $query);
                oci_execute($result);
                while($row = oci_fetch_array($result, OCI_ASSOC)){
                    $orderId = $row['ORDER_ID'];
                    $orderproductId = $row['PRODUCT_ID'];
                    $orderQuantity = $row['ORDER_QUANTITY'];
                    $orderDate = $row['ORDER_DATE'];
                    
                    $SlotStatus = 'N';
                    $queryOrderCollection = "INSERT INTO COLLECTION_SLOT(COLLECTION_ID, ORDER_ID, COLLECTION_DATE, COLLECTION_TIME, SLOT_STATUS) VALUES (COLLECTION_SLOT_S.NEXTVAL, :orderId, :collectionDate, :collectionTime, :slotStatus)";
                    $resultOrderCollection = oci_parse($conn, $queryOrderCollection);
                    oci_bind_by_name($resultOrderCollection, ':orderId', $orderId);
                    oci_bind_by_name($resultOrderCollection, ':collectionDate', $collectionDate);
                    oci_bind_by_name($resultOrderCollection, ':collectionTime', $collectionTime);
                    oci_bind_by_name($resultOrderCollection, ':slotStatus', $SlotStatus);
                    oci_execute($resultOrderCollection);
                }
                header("Location:./PaymentGateway.php?user=$user");
            }
            else{
                header("Location:./Checkout.php?user=$user&error=You can Only Have Total of 20 Cart Items.");
            }
        }
        else{
            header("Location:./Checkout.php?user=$user&error=Please select collection Day and Time.");
        }
    }



?>