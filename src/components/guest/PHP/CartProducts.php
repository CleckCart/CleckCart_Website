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
        $queryGuestCart = "INSERT INTO GUEST_CART(GUEST_CART_ID, GUEST_ID, CART_AMOUNT) VALUES (GUEST_CART_S.NEXTVAL, GUEST_S.NEXTVAL, :cartAmount)";
        $resultGuestCart = oci_parse($conn, $queryGuestCart);
        oci_bind_by_name($resultGuestCart, ':cartAmount', $productTotalAmount);
        oci_execute($resultGuestCart);

        //Selecting CartId from Cart 
        $queryGuestFetchCart = "SELECT * FROM GUEST_CART";
        $resultGuestFetchCart = oci_parse($conn, $queryGuestFetchCart);
        oci_execute($resultGuestFetchCart);
        
        while($rowGuestFetchCart = oci_fetch_assoc($resultGuestFetchCart))
        {
            $guestCartId = $rowGuestFetchCart['GUEST_CART_ID'];
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
    
    
            header("Location:./ProductDetail.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity&success=Added to Cart");
        }
        }
        

    else{
        header("Location:./ProductDetail.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity&error=Something went wrong");
    }
    ?>