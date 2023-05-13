<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price']) && isset($_GET['quantity'])){
        $productUser = $_GET['user'];
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $productQuantity = $_GET['quantity'];
        $productTotalAmount = $productPrice * $productQuantity;

        //Getting User ID
        $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$productUser' AND ROLE = 'customer'";
        $resultCustomer = oci_parse($conn, $queryCustomer);
        oci_execute($resultCustomer);
        while($rowCustomer = oci_fetch_array($resultCustomer, OCI_ASSOC)){
            $userId = $rowCustomer['USER_ID'];
        }

        //Inserting UserId and Total Amount of Proudcts of the user in Cart
        $queryCart = "INSERT INTO CART(CART_ID, USER_ID, CART_AMOUNT) VALUES (CART_S.NEXTVAL, :user_Id, :cartAmount)";
        $resultCart = oci_parse($conn, $queryCart);
        oci_bind_by_name($resultCart, ':user_id', $userId);
        oci_bind_by_name($resultCart, ':cartAmount', $productTotalAmount);
        oci_execute($resultCart);

        //Selecting CartId from Cart 
        $queryCart = "SELECT * FROM CART WHERE USER_ID = $userId";
        $resultCart = oci_parse($conn, $queryCart);
        oci_execute($resultCart);
        while($rowCart = oci_fetch_array($resultCart, OCI_ASSOC)){
            $cartId = $rowCart['CART_ID'];
        }

        //Inserting Cart items in Cart Product
        $queryCartProduct = "INSERT INTO CART_PRODUCT(CART_PRODUCT_ID, CART_ID, PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_QUANTITY) VALUES (CART_PRODUCT_S.NEXTVAL, :cartId, :productId, :productImage, :productName, :productPrice, :productQuantity)";
        $resultCartProduct = oci_parse($conn, $queryCartProduct);
        oci_bind_by_name($resultCartProduct, ':cartId', $cartId);
        oci_bind_by_name($resultCartProduct, ':productId', $productId);
        oci_bind_by_name($resultCartProduct, ':productImage', $productImage);
        oci_bind_by_name($resultCartProduct, ':productName', $productName);
        oci_bind_by_name($resultCartProduct, ':productPrice', $productPrice);
        oci_bind_by_name($resultCartProduct, ':productQuantity', $productQuantity);
        oci_execute($resultCartProduct);


        header("Location:./Checkout.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity");
    }
    else{
        header("Location:./Checkout.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity");
    }
    ?>