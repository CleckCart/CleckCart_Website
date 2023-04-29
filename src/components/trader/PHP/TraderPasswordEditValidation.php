<?php
session_start();

$currentPassword=$_POST['currentPassword']; 
$password=$_POST['password'];  
$passwordConfirm=$_POST['passwordConfirm']; 



if(strcmp($traderPassword,$traderConfirmPassword)==0) {

    /*Checks to see if password has 6-10 characters, 1 Uppercase, 1 Lowercase, 1 Number, and 1 Special character.*/
    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
    
    if(preg_match($passwordPattern, $customerPassword)) {
        /*For inserting into database*/
    }
    
    else {
        header('Location:./TraderProfileEditPassword.php?error=Password must include 6-10 characters, 1 Uppercase, 1 Lowercase, 1 Number, and 1 Special character.');
    }
}

else {
    header('Location:./TraderProfileEditPassword.php?error=Please make sure both the password match.');
}
?>                                              