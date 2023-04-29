<?php

$rememberMe = 'off';

if (isset($POST('rememberMeLogin'))){
    $rememberMe = $_POST['rememberMeLogin'];
}

if (isset($_POST['traderSubmit'])) {
    /* To ensure that the input fields are not empty. */
    if (empty($_POST['traderUsername']) || empty($_POST['traderPassword'])) {
        header('Location:./TraderLogin.php?error=Please make sure all text fields are not empty.');
    }

    else {
        $traderUsername = trim(filter_input(INPUT_POST, 'traderUsername', FILTER_SANITIZE_STRING));
        $traderPassword = trim(filter_input(INPUT_POST, 'traderPassword', FILTER_SANITIZE_STRING));

        /* To ensure that the username has letter count greater than 4 but less than 11. */
        if(strlen($traderUsername) >= 5 && strlen($traderUsername) <= 10) { 
                            
        /*Checks to see if password has 6-10 characters, 1 Uppercase, 1 Lowercase, 1 Number, and 1 Special character.*/
        $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';

        /* To ensure that the input values are correct. */
        if(preg_match($passwordPattern, $traderPassword)) {
            /*For inserting into database*/
        }

        else {
            header('Location:./TraderLogin.php?error=Please enter a valid password.');
        }
    }
    
    else {                          
        header('Location:./TraderLogin.php?error=Please enter a valid username.');
    }
    }
}
?>
    