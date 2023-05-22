<?php
    include('./connect.php');
    if(isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price'])){
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];

        // Check if GUEST_WISHLIST_ID 1 already exists
        $queryCheckWishlist = "SELECT COUNT(*) AS wishlistCount FROM GUEST_WISHLIST WHERE GUEST_WISHLIST_ID = 1";
        $resultCheckWishlist = oci_parse($conn, $queryCheckWishlist);
        oci_execute($resultCheckWishlist);
        $rowCheckWishlist = oci_fetch_array($resultCheckWishlist, OCI_ASSOC);
        $wishlistCount = $rowCheckWishlist['WISHLISTCOUNT'];

        // If GUEST_WISHLIST_ID 1 doesn't exist, insert it
        if($wishlistCount == 0) {
            $queryInsertWishlist = "INSERT INTO GUEST_WISHLIST(GUEST_WISHLIST_ID) VALUES (1)";
            $resultInsertWishlist = oci_parse($conn, $queryInsertWishlist);
            oci_execute($resultInsertWishlist);
        }

        // Inserting Wishlist items in WishList Product
        $queryWishlistProduct = "INSERT INTO GUEST_WISHLIST_PRODUCT(GUEST_WISHLIST_PRODUCT_ID, GUEST_WISHLIST_ID, PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE) 
        VALUES (GUEST_WISHLIST_PRODUCT_S.NEXTVAL, 1, :productId, :productImage, :productName, :productPrice)";
        $resultWishListProduct = oci_parse($conn, $queryWishlistProduct);
        oci_bind_by_name($resultWishListProduct, ':productId', $productId);
        oci_bind_by_name($resultWishListProduct, ':productImage', $productImage);
        oci_bind_by_name($resultWishListProduct, ':productName', $productName);
        oci_bind_by_name($resultWishListProduct, ':productPrice', $productPrice);
        oci_execute($resultWishListProduct);

        header("Location:./WishList.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&success=Added to WishList");
    }
    else{
        header("Location:./wishList.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&success=Something went wrong");
    }
?>
