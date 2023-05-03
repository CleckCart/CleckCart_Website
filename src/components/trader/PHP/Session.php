<?php
include('connectSession.php');
if(isset($_SESSION['username']))
        {
            include('TraderDashboard.php');    
        }
    
    else
        {
            include('TraderLogin.php');
            if(isset($_SESSION['error']))
                {
                    echo("<br>" .$_SESSION['error']);   
                }

        }
?>