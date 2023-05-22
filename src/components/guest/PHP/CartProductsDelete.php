<?php
    include('./connect.php');
    if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['action'])){
        $guestCartProductId = $_GET['id'];
        $productName = $_GET['name'];

        $query = "DELETE FROM GUEST_CART_PRODUCT WHERE GUEST_CART_PRODUCT_ID = $guestCartProductId";
        $result = oci_parse($conn, $query);
        oci_execute($result);

        header("Location:./Checkout.php?&success=Cart Product Removed");
    }
    else{
        header("Location:./Checkout.php?&error=Something went wrong");
    }
    ?>