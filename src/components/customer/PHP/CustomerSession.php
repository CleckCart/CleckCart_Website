<?php
include('./connectSession.php');
if(isset($_SESSION['username']) && $_SESSION['UserRole'] == 'customer'){
            $user = $_SESSION['username'];
            header('Location:./HomePageSession.php?user='.$_SESSION['username']);
        }
    
    else
        {
            header('Location:../../guest/PHP/CustomerLogin.php?error=Invalid Credentials');
            if(isset($_SESSION['error']))
                {
                    echo("<br>" .$_SESSION['error']);
                }
        }
?>