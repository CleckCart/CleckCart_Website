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

        //Getting User ID
        $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$productUser' AND ROLE = 'customer'";
        $resultCustomer = oci_parse($conn, $queryCustomer);
        oci_execute($resultCustomer);
        while($rowCustomer = oci_fetch_array($resultCustomer, OCI_ASSOC)){
            $userId = $rowCustomer['USER_ID'];
        }

        //Inserting UserId and Total Amount of Products of the user in WishList
        $queryWishList = "INSERT INTO WISHLIST(WISHLIST_ID, USER_ID, WISHLIST_QUANTITY) VALUES (WISHLIST_S.NEXTVAL, :user_Id, :wishlistQuantity)";
        $resultWishList = oci_parse($conn, $queryWishList);
        oci_bind_by_name($resultWishList, ':user_id', $userId);
        oci_bind_by_name($resultWishList, ':wishlistQuantity', $productQuantity);
        oci_execute($resultWishList);

        //Selecting Wishlist Id from Wishlist
        $queryWishList = "SELECT * FROM WISHLIST WHERE USER_ID = $userId";
        $resultWishList = oci_parse($conn, $queryWishList);
        oci_execute($resultWishList);
        while($rowWishList = oci_fetch_array($resultWishList, OCI_ASSOC)){
            $wishlistId = $rowWishList['WISHLIST_ID'];
        }

        //Inserting Wishlist items in WishList Product
        $queryWishlistProduct = "INSERT INTO WISHLIST_PRODUCT(WISHLIST_PRODUCT_ID, WISHLIST_ID, PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE) VALUES (WISHLIST_PRODUCT_S.NEXTVAL, :wishlistId, :productId, :productImage, :productName, :productPrice)";
        $resultWishListProduct = oci_parse($conn, $queryWishlistProduct);
        oci_bind_by_name($resultWishListProduct, ':wishlistId', $wishlistId);
        oci_bind_by_name($resultWishListProduct, ':productId', $productId);
        oci_bind_by_name($resultWishListProduct, ':productImage', $productImage);
        oci_bind_by_name($resultWishListProduct, ':productName', $productName);
        oci_bind_by_name($resultWishListProduct, ':productPrice', $productPrice);
        oci_execute($resultWishListProduct);

        header("Location:./WishList.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&quantity=$productQuantity&success=Added to WishList");
    }
    else{
        header("Location:./wishList.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&quantity=$productQuantity&success=Something went wrong");
    }
    ?>