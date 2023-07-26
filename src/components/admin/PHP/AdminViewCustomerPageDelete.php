<?php
  include('connect.php');
  if(isset($_GET['user'])){
    $user = $_GET['user'];
  }
?>
<?php
  $deleteCustomerId = $_GET['id'];
  echo($deleteCustomerId);
  if(isset($_GET['id'])&&isset($_GET['action']))
    {

      $queryCartId = "SELECT * FROM CART WHERE USER_ID =  '$deleteCustomerId'";
      $resultCartId = oci_parse($conn, $queryCartId);
      oci_execute($resultCartId);
      $rowCartId = oci_fetch_assoc($resultCartId);
      $cartId = $rowCartId['CART_ID'];
      if($cartId){
        $queryCartProductId = "SELECT * FROM CART_PRODUCT WHERE CART_ID =  '$cartId'";
        $resultCartProductId = oci_parse($conn, $queryCartProductId);
        oci_execute($resultCartProductId);
        $rowCartId = oci_fetch_assoc($resultCartProductId);
        $cartProductId = $rowCartId['CART_PRODUCT_ID'];

        if($cartProductId){
          $DeleteCartProductId = "DELETE FROM CART_PRODUCT WHERE CART_ID = '$cartId'";     
          $RunCartProductId = oci_parse($conn, $DeleteCartProductId);
          oci_execute($RunCartProductId);
        }


        $queryOrderId = "SELECT * FROM ORDER_C WHERE CART_ID =  '$cartId'";
        $resultOrderId = oci_parse($conn, $queryOrderId);
        oci_execute($resultOrderId);
        $rowOrderId = oci_fetch_assoc($resultOrderId);
        $OrderId = $rowOrderId['ORDER_ID'];

        if($OrderId){

          $queryPayement = "SELECT * FROM PAYMENT WHERE USER_ID =  '$deleteCustomerId'";
          $resultPayement = oci_parse($conn, $queryPayement);
          oci_execute($resultPayement);

          while($rowPayement = oci_fetch_array($resultPayement, OCI_ASSOC)){
            $paymentId = $rowPayement['PAYMENT_ID'];
            if($paymentId){
              $DeletePayment = "DELETE FROM PAYMENT WHERE PAYMENT_ID = '$paymentId'";     
              $RunPayment = oci_parse($conn, $DeletePayment);
              oci_execute($RunPayment);
            }
          };

          $DeleteCollectionSlot = "DELETE FROM COLLECTION_SLOT WHERE ORDER_ID = '$OrderId'";     
          $RunCollectionSlot = oci_parse($conn, $DeleteCollectionSlot);
          oci_execute($RunCollectionSlot);

          $DeleteOrderProduct = "DELETE FROM ORDER_PRODUCT WHERE ORDER_ID = '$OrderId'";     
          $RunOrderProduct = oci_parse($conn, $DeleteOrderProduct);
          oci_execute($RunOrderProduct);

          echo($cartId);

          $DeleteOrder = "DELETE FROM ORDER_C WHERE CART_ID = '$cartId'";
          $RunOrder = oci_parse($conn, $DeleteOrder);
          oci_execute($RunOrder);
        }

        $DeleteCart = "DELETE FROM CART WHERE CART_ID  = '$cartId'";
        $RunCart = oci_parse($conn, $DeleteCart);
        oci_execute($RunCart);

      }

      $DeleteUserQuery = "DELETE FROM USER_TABLE WHERE USER_ID = '$deleteCustomerId' AND ROLE = 'customer' ";     
      $RunDeleteUserQuery = oci_parse($conn, $DeleteUserQuery);
      oci_execute($RunDeleteUserQuery);
      //header("Location:./AdminViewCustomerPage.php?user=$user&success= Customer has been deleted.");
    }

    else{
      header("Location:./AdminViewCustomerPage.php?user=$user&error= Something went wrong. Please try again.");
    }
?>