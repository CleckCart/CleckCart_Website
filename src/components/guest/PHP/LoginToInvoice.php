<?php
include('./connect.php');
if(isset($_GET['user']) && isset($_GET['cartId']) && isset($_GET['totalCartItems']) && isset($_GET['collectionDate']) && isset($_GET['collectionTime'])){
    $user = $_GET['user'];
    $guestCartId = $_GET['cartId'];
    $totalCartItems = $_GET['totalCartItems'];
    $collectionDate = $_GET['collectionDate'];
    $collectionTime = $_GET['collectionTime'];

    //select userId
    $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE = 'customer'";
    $resultCustomer = oci_parse($conn, $queryCustomer);
    oci_execute($resultCustomer);
    while($rowCustomer = oci_fetch_array($resultCustomer, OCI_ASSOC)){
        $userId = $rowCustomer['USER_ID'];
    }

    //select productTotalAmount from guestCartId
    $queryGuestCartProduct = "SELECT * FROM GUEST_CART WHERE GUEST_CART_ID = '$guestCartId'";
    $resultGuestCartProduct = oci_parse($conn, $queryGuestCartProduct);
    oci_execute($resultGuestCartProduct);
    while($rowGuestCartProduct = oci_fetch_array($resultGuestCartProduct, OCI_ASSOC)){
        $productTotalAmount = $rowGuestCartProduct['CART_AMOUNT'];
    }

    // Prepare and execute the query
    //select userId
    $queryCartCustomer = "SELECT * FROM CART WHERE USER_ID = '$userId'";
    $resultCartCustomer = oci_parse($conn, $queryCartCustomer);
    oci_execute($resultCartCustomer);
    $rowCartCustomer = oci_fetch_assoc($resultCartCustomer);
    $cartId = $rowCartCustomer['CART_ID'];

    //if cartId doesnot exist for the userId
    if(!$rowCartCustomer){
        $queryCart = "INSERT INTO CART(CART_ID, USER_ID, CART_AMOUNT) VALUES (CART_S.NEXTVAL, :user_Id, :cartAmount)";
        $resultCart = oci_parse($conn, $queryCart);
        oci_bind_by_name($resultCart, ':user_id', $userId);
        oci_bind_by_name($resultCart, ':cartAmount', $productTotalAmount);
        oci_execute($resultCart);
    }

    //fetching cartId of that userId
    $queryCart = "SELECT * FROM CART WHERE USER_ID = '$userId'";
    $resultCart = oci_parse($conn, $queryCart);
    oci_execute($resultCart);
    while($rowCart = oci_fetch_array($resultCart, OCI_ASSOC)){
        $cartId = $rowCart['CART_ID'];
    }

    $queryGuestCartProduct = "SELECT * FROM GUEST_CART_PRODUCT WHERE GUEST_CART_ID = '$guestCartId'";
    $resultGuestCartProduct = oci_parse($conn, $queryGuestCartProduct);
    oci_execute($resultGuestCartProduct);
    while($rowGuestCartProduct = oci_fetch_array($resultGuestCartProduct, OCI_ASSOC)){
        $guestCartProductId = $rowGuestCartProduct['GUEST_CART_PRODUCT_ID'];
        $productId = $rowGuestCartProduct['PRODUCT_ID'];
        $productImage = $rowGuestCartProduct['PRODUCT_IMAGE'];
        $productName = $rowGuestCartProduct['PRODUCT_NAME'];
        $productPrice = $rowGuestCartProduct['PRODUCT_PRICE'];
        $productQuantity = $rowGuestCartProduct['PRODUCT_QUANTITY'];
        //Inserting UserId and Total Amount of Proudcts of the user in Cart
        $queryCartProduct = "INSERT INTO CART_PRODUCT(CART_PRODUCT_ID, CART_ID, PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_QUANTITY) 
        VALUES (CART_PRODUCT_S.NEXTVAL, :cartId, :productId, :productImage, :productName, :productPrice, :productQuantity)";
        $resultCartProduct = oci_parse($conn, $queryCartProduct);
        oci_bind_by_name($resultCartProduct, ':cartId', $cartId);
        oci_bind_by_name($resultCartProduct, ':productId', $productId);
        oci_bind_by_name($resultCartProduct, ':productImage', $productImage);
        oci_bind_by_name($resultCartProduct, ':productName', $productName);
        oci_bind_by_name($resultCartProduct, ':productPrice', $productPrice);
        oci_bind_by_name($resultCartProduct, ':productQuantity', $productQuantity);
        oci_execute($resultCartProduct);
        
        $query = "DELETE FROM GUEST_CART_PRODUCT WHERE GUEST_CART_PRODUCT_ID = $guestCartProductId";
        $result = oci_parse($conn, $query);
        oci_execute($result);
    }


    header("Location:./InvoiceProcess.php?user=$user&cartId=$cartId&time=$collectionTime&day=$collectionDate");
}
?>