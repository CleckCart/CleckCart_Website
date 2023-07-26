<?php
include('./connectSession.php');
if(isset($_SESSION['username']) && $_SESSION['UserRole'] == 'Trader'){
            header('Location:./TraderDashboard.php?user='.$_SESSION['username']);    
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