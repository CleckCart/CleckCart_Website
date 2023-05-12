<?php
  if(isset($_GET['user'])){
    $user = $_GET['user'];
  }
?>
<?php
  include('connect.php');
  $deleteCustomerId = $_GET['id'];
  if(isset($_GET['id'])&&isset($_GET['action']))
    {

      $DeleteUserQuery = "DELETE FROM USER_TABLE WHERE USER_ID = '$deleteCustomerId'";     
      $RunDeleteUserQuery = oci_parse($conn, $DeleteUserQuery);
      oci_execute($RunDeleteUserQuery);
      header("Location:./AdminViewCustomerPage.php?user=$user&success= Customer has been deleted.");
    }

    else{
      header("Location:./AdminViewCustomerPage.php?user=$user&error= Something went wrong. Please try again.");
    }
?>