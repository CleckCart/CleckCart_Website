<?php
    include('./connect.php');
    if(isset($_GET['stock'])){
        $productStock = $_GET['stock'];
    }
    if(isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price']) && isset($_GET['quantity'])){
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $productQuantity = $_GET['quantity'];
        $productTotalAmount = $productPrice * $productQuantity;
        if($productStock <= 1){
            header("Location:./ProductDetail.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity&error=Item Out of Stock");
        }
        else{
            //Inserting UserId and Total Amount of Proudcts of the user in Cart
            $queryCart = "INSERT INTO   GUEST_CART(GUEST_CART_ID, CART_AMOUNT) VALUES (CART_S.NEXTVAL, :cartAmount)";
            $resultCart = oci_parse($conn, $queryCart);
            oci_bind_by_name($resultCart, ':cartAmount', $productTotalAmount);
            oci_execute($resultCart);
    
                //Selecting CartId from Cart 
                $queryGuestFetchCart = "SELECT * FROM GUEST_CART";
                $resultGuestFetchCart = oci_parse($conn, $queryGuestFetchCart);
                oci_execute($resultGuestFetchCart);
                while($rowGuestFetchCart = oci_fetch_assoc($resultGuestFetchCart)){
                    $guestCartId = $rowGuestFetchCart['GUEST_CART_ID'];
    
                    $queryGuestFetchCartProduct = "SELECT * FROM GUEST_CART_PRODUCT WHERE PRODUCT_ID = '$productId' AND GUEST_CART_ID = '$guestCartId'";
                    $resultGuestFetchCartProduct = oci_parse($conn, $queryGuestFetchCartProduct);
                    oci_execute($resultGuestFetchCartProduct);
                    while($rowGuestFetchCartProduct = oci_fetch_assoc($resultGuestFetchCartProduct)){
                        $guestCarProducttId = $rowGuestFetchCartProduct['GUEST_CART_ID'];
                    }
    
                    if(empty($guestCarProducttId)){
                        //Inserting Cart items in Cart Product
                        $queryCartProduct = "INSERT INTO GUEST_CART_PRODUCT(GUEST_CART_PRODUCT_ID, GUEST_CART_ID, PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_QUANTITY) 
                        VALUES (GUEST_CART_PRODUCT_S.NEXTVAL, :guestCartId, :productId, :productImage, :productName, :productPrice, :productQuantity)";
                        $resultCartProduct = oci_parse($conn, $queryCartProduct);
                        oci_bind_by_name($resultCartProduct, ':guestCartId', $guestCartId);
                        oci_bind_by_name($resultCartProduct, ':productId', $productId);
                        oci_bind_by_name($resultCartProduct, ':productImage', $productImage);
                        oci_bind_by_name($resultCartProduct, ':productName', $productName);
                        oci_bind_by_name($resultCartProduct, ':productPrice', $productPrice);
                        oci_bind_by_name($resultCartProduct, ':productQuantity', $productQuantity);
                        oci_execute($resultCartProduct);
                    }
                    else{
                        $queryCartProduct = "UPDATE GUEST_CART_PRODUCT SET PRODUCT_QUANTITY=:productQuantity WHERE PRODUCT_ID = '$productId' AND GUEST_CART_ID = '$guestCarProducttId'";
                        $resultCartProduct = oci_parse($conn, $queryCartProduct);
                        oci_bind_by_name($resultCartProduct, ":productQuantity", $productQuantity);
                        oci_execute($resultCartProduct);
                        echo($productQuantity);
                    }
                }
    
            header("Location:./Checkout.php?&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity");
        }
    }
    else{
        header("Location:./Checkout.php?&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity");
    }
    ?>