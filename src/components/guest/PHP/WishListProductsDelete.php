<?php
    include('./connect.php');
    if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['action'])){
        $guestwishlistproductId = $_GET['id'];
        $productName = $_GET['name'];

        $query = "DELETE FROM GUEST_WISHLIST_PRODUCT WHERE GUEST_WISHLIST_PRODUCT_ID = $guestwishlistproductId";
        $result = oci_parse($conn, $query);
        oci_execute($result);

        header("Location:./WishList.php?success=Wishlist Product Removed");
    }
    else{
        header("Location:./WishList.php?error=Something went wrong");
    }
    ?>