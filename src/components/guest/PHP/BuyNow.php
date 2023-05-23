<?php
    include('./connect.php');
    if(isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price']) && isset($_GET['quantity'])){
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $productQuantity = $_GET['quantity'];
        $productTotalAmount = $productPrice * $productQuantity;


        //Inserting UserId and Total Amount of Proudcts of the user in Cart
        $queryCart = "INSERT INTO   GUEST_CART(GUEST_CART_ID, CART_AMOUNT) VALUES (CART_S.NEXTVAL, :cartAmount)";
        $resultCart = oci_parse($conn, $queryCart);
        oci_bind_by_name($resultCart, ':cartAmount', $productTotalAmount);
        oci_execute($resultCart);

        //Selecting CartId from Cart 
        $queryCart = "SELECT * FROM GUEST_CART";
        $resultCart = oci_parse($conn, $queryCart);
        oci_execute($resultCart);
        while($rowCart = oci_fetch_array($resultCart, OCI_ASSOC)){
            $guestcartId = $rowCart['GUEST_CART_ID'];
        }

        //Inserting Cart items in Cart Product
        $queryCartProduct = "INSERT INTO GUEST_CART_PRODUCT(GUEST_CART_PRODUCT_ID, GUEST_CART_ID, PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_QUANTITY) VALUES (CART_PRODUCT_S.NEXTVAL, :guestcartId, :productId, :productImage, :productName, :productPrice, :productQuantity)";
        $resultCartProduct = oci_parse($conn, $queryCartProduct);
        oci_bind_by_name($resultCartProduct, ':guestcartId', $guestcartId);
        oci_bind_by_name($resultCartProduct, ':productId', $productId);
        oci_bind_by_name($resultCartProduct, ':productImage', $productImage);
        oci_bind_by_name($resultCartProduct, ':productName', $productName);
        oci_bind_by_name($resultCartProduct, ':productPrice', $productPrice);
        oci_bind_by_name($resultCartProduct, ':productQuantity', $productQuantity);
        oci_execute($resultCartProduct);


        header("Location:./Checkout.php?&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity");
    }
    else{
        header("Location:./Checkout.php?&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity");
    }
    ?>