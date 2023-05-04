<?php
include('./connectSession.php');
if(isset($_SESSION['username']))
        {
            include('./HomePage.php');
        }
    
    else
        {
            include('./CustomerLogin.php');
            if(isset($_SESSION['error']))
                {
                    echo("<br>" .$_SESSION['error']);   
                }

        }
?>