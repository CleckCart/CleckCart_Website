<?php
    include('./connect.php');
    if(empty(isset($_GET['user']))){
        header("Location:./CustomerLogin.php?");
        
    }
    ?>