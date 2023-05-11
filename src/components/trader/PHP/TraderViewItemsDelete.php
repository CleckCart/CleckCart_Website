<?php
  include('connect.php');
  if(isset($_GET['user'])){
    $user = $_GET['user'];
  }
  $deleteProductId = $_GET['id'];
  if(isset($_GET['id'])&&isset($_GET['action']))
    {
      $sql = "DELETE FROM PRODUCT WHERE PRODUCT_ID = $deleteProductId";     
      $DeleteQuery = oci_parse($conn, $sql);
      oci_execute($DeleteQuery);
      header("Location:./TraderViewItems.php?user=$user&success= Product has been deleted.");
    }
    else{
      header("Location:./TraderViewItems.php?user=$user&error= Something went wrong. Please try again.");
    }
?>