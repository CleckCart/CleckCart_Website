<?php
include('./connectSession.php');
if(isset($_SESSION['username']) && $_SESSION['UserRole'] == 'Admin')
        {
            header('Location:./AdminDashboard.php?user='.$_SESSION['username']);    
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