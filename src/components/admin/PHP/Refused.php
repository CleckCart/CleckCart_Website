<?php
include('connect.php');
$refusedId = $_GET['id'];
if(isset($_GET['id'])&&isset($_GET['action']))
    {
        $sql = "DELETE FROM APPLY_TRADER WHERE APPLY_ID = $refusedId";     
        $qry = oci_parse($conn, $sql);
        oci_execute($qry);
        if($qry)
            {
                header("Location:AdminApproveTrader.php?error=Trader has been refused.");
            }
    }
?>