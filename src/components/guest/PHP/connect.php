<?php 
$conn = oci_connect('admin','Nepal123#','//localhost/xe'); 
if (!$conn) {
      $m = oci_error();
      echo $m['message'], "\n";
      exit; 
   }
?>