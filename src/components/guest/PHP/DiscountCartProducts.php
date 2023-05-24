<?php
    include('./connect.php');
    if(isset($_GET['stock'])){
        $productStock = $_GET['stock'];
    }
    if(isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price']) && isset($_GET['newPrice']) && isset($_GET['quantity'])){
       
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $discountedPrice = $_GET['newPrice'];
        $productQuantity = $_GET['quantity'];
        $productTotalAmount = $discountedPrice * $productQuantity;

        if($productStock <= 1){
            header("Location:./DiscountProductDetail.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&newPrice=$discountedPrice&stock=$productStock&quantity=$productQuantity&error=Item Out Of Stock");
        }
        else{
            //Inserting UserId and Total Amount of Proudcts of the user in Cart
            $queryGuestCart = "INSERT INTO GUEST_CART(GUEST_CART_ID, CART_AMOUNT) VALUES (GUEST_CART_S.NEXTVAL, :cartAmount)";
            $resultGuestCart = oci_parse($conn, $queryGuestCart);
            oci_bind_by_name($resultGuestCart, ':cartAmount', $productTotalAmount);
            oci_execute($resultGuestCart);
    
            //Selecting CartId from Cart 
            $queryGuestFetchCart = "SELECT * FROM GUEST_CART";
            $resultGuestFetchCart = oci_parse($conn, $queryGuestFetchCart);
            oci_execute($resultGuestFetchCart);
            while($rowGuestFetchCart = oci_fetch_assoc($resultGuestFetchCart)){
                $guestCartId = $rowGuestFetchCart['GUEST_CART_ID'];
                //Inserting Cart items in Cart Product
                $queryCartProduct = "INSERT INTO GUEST_CART_PRODUCT(GUEST_CART_PRODUCT_ID, GUEST_CART_ID, PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_QUANTITY) 
                VALUES (GUEST_CART_PRODUCT_S.NEXTVAL, :guestCartId, :productId, :productImage, :productName, :productPrice, :productQuantity)";
                $resultCartProduct = oci_parse($conn, $queryCartProduct);
                oci_bind_by_name($resultCartProduct, ':guestCartId', $guestCartId);
                oci_bind_by_name($resultCartProduct, ':productId', $productId);
                oci_bind_by_name($resultCartProduct, ':productImage', $productImage);
                oci_bind_by_name($resultCartProduct, ':productName', $productName);
                oci_bind_by_name($resultCartProduct, ':productPrice', $discountedPrice);
                oci_bind_by_name($resultCartProduct, ':productQuantity', $productQuantity);
                oci_execute($resultCartProduct);
            }
            header("Location:./DiscountProductDetail.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&newPrice=$discountedPrice&stock=$productStock&quantity=$productQuantity&success=Added to Cart");
        }
    }
    else{
        header("Location:./DiscountProductDetail.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&newPrice=$discountedPrice&stock=$productStock&quantity=$productQuantity&error=Something went wrong");
    }
    ?>