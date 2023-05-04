<?php
include('./connectSession.php');
if(isset($_SESSION['username']) && $_SESSION['UserRole'] == 'Trader'){
            include('./TraderDashboard.php');    
        }
    
    else
        {
            header('Location:./TraderLogin.php?error=Invalid Credentials');
            if(isset($_SESSION['error']))
                {
                    echo("<br>" .$_SESSION['error']);   
                }

        }
?>