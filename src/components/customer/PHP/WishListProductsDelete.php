<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id']) && isset($_GET['name']) && isset($_GET['action'])){
        $productUser = $_GET['user'];
        $wishlistproductId = $_GET['id'];
        $productName = $_GET['name'];

        $query = "DELETE FROM WISHLIST WHERE WISHLIST_PRODUCT_ID = $wishlistproductId";
        $result = oci_parse($conn, $query);
        oci_execute($result);

        header("Location:./WishList.php?user=$productUser&success=Wishlist Product Removed");
    }
    else{
        header("Location:./WishList.php?user=$productUser&error=Something went wrong");
    }
    ?>