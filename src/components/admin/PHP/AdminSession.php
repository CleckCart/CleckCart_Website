<?php
include('./connectSession.php');
if(isset($_SESSION['username']) && $_SESSION['UserRole'] == 'Admin')
        {
            include('./AdminDashboard.php');    
        }
    
    else
        {
            header('Location:../../trader/PHP/TraderLogin.php?error=Invalid Credentials');
            if(isset($_SESSION['error']))
                {
                    echo("<br>" .$_SESSION['error']);   
                }

        }
?>