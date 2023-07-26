<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id']) && isset($_GET['name']) && isset($_GET['action'])){
        $productUser = $_GET['user'];
        $cartproductId = $_GET['id'];
        $productName = $_GET['name'];

        $query = "DELETE FROM CART_PRODUCT WHERE CART_PRODUCT_ID = $cartproductId";
        $result = oci_parse($conn, $query);
        oci_execute($result);

        header("Location:./Checkout.php?user=$productUser&success=Cart Product Removed");
    }
    else{
        header("Location:./Checkout.php?user=$productUser&error=Something went wrong");
    }
    ?>