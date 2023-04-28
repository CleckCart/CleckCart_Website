<?php
 /*Check if form is submitted*/
 if(isset($_POST['traderLogin'])){
    /*Check if all fields are filled*/ 
    if (empty($_POST['traderUsername']) || empty($_POST['traderPassword'])){
        header('Location:./TraderLogin.php?error=Please make sure all text fields are not empty.');
    }
    else{
        $traderUsername = trim(filter_input(INPUT_POST, 'traderUsername', FILTER_SANITIZE_STRING));
        $traderPassword = trim(filter_input(INPUT_POST, 'traderPassword', FILTER_SANITIZE_STRING));
        /*Check if username is of 5-10 characters*/
        if(strlen($traderUsername) >= 5 && strlen($traderUsername) <= 10){
                $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                if(preg_match($passwordPattern, $traderPassword))
                    {
                    /*For inserting into database*/
                    }
                else
                    {
                        header('Location:./TraderLogin.php?error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.');
                    }
            }
            else{
                header('Location:./TraderLogin.php?error=Please make sure username is 5 - 10 characters.');

            }
        }
    }
?>