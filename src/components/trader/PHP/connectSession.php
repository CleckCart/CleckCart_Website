<?php 
session_start();
$conn = oci_connect('website', 'website', '//localhost/xe'); 
if (!$conn) 
   {
      $m = oci_error();
      echo $m['message'], "\n";
      exit; 
   } 
?>