<?php
    include('./connect.php');
    if(isset($_POST['CollectionDateSubmit'])){
        if(isset($_GET['cartId']) && isset($_GET['totalCartItems'])){
            $guestCartId = $_GET['cartId'];
            $productTotalQuantity = $_GET['totalCartItems'];
        }
        if(isset($_POST['time']) && isset($_POST['day'])){
            $collectionTime = $_POST['time'];
            $collectionDate = $_POST['day'];

            $query = "SELECT * FROM GUEST_CART_PRODUCT WHERE GUEST_CART_ID = $guestCartId";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            while($row = oci_fetch_array($result, OCI_ASSOC)){
                $guestcartproductId = $row['GUEST_CART_PRODUCT_ID'];
            }

            if(!empty($guestcartproductId)){
                if($productTotalQuantity <= 20){
                    header("Location:./CustomerCheckoutLogin.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime");
                }
                else{
                    header("Location:./Checkout.php?error=You can Only Have Total of 20 Cart Items.");
                }
            }
            else{
                header("Location:./Checkout.php?error=No items in cart.");
            }
        }
        else{
            header("Location:./Checkout.php?error=Please select collection Day and Time.");
        }
    }
?>