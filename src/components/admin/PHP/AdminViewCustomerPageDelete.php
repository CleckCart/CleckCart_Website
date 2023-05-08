<?php
  include('connect.php');
  $deleteCustomerId = $_GET['id'];
  if(isset($_GET['id'])&&isset($_GET['action']))
    {

      $DeleteUserQuery = "DELETE FROM USER_TABLE WHERE USER_ID = '$deleteCustomerId'";     
      $RunDeleteUserQuery = oci_parse($conn, $DeleteUserQuery);
      oci_execute($RunDeleteUserQuery);
      header("Location:./AdminViewCustomerPage.php?success= Customer has been deleted.");
    }

    else{
      header("Location:./AdminViewCustomerPage.php?error= Something went wrong. Please try again.");
    }
?>