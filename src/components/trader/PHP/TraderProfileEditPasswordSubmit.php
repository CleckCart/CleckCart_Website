<?php
if(isset($_GET['user'])){
    $user = $_GET['user'];
}
?>
<?php
 /*Check if form is submitted*/
 if(isset($_POST['TraderProfileEditPasswordSubmit'])){
    /*Check if all fields are filled*/ 
    if (empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmnewPassword'])){
        header("Location:./TraderProfileEditPassword.php?user=$user&error=Please make sure all text fields are not empty.");
    }
    else{
        $traderCurrentPassword = trim(filter_input(INPUT_POST, 'currentPassword', FILTER_SANITIZE_STRING));
        $traderNewPassword = trim(filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING));
        $traderConfirmNewPassword = trim(filter_input(INPUT_POST, 'confirmnewPassword', FILTER_SANITIZE_STRING));
        if(strcmp($traderCurrentPassword,$traderNewPassword)!=0){
            /*Check if password and confirm password matches*/
            if(strcmp($traderNewPassword,$customerConfirmPassword)==0){
                $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                if(preg_match($passwordPattern, $traderNewPassword))
                    {
                    /*For inserting into database*/
                    }
                else
                    {
                        header("Location:./TraderProfileEditPassword.php?user=$user&error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.");
                    }
            }
            else{
                header("Location:./TraderProfileEditPassword.php?user=$user&error=Please make sure password are matched.");
            }
        }
        else{
            header("Location:./TraderProfileEditPassword.php?user=$user&error=Current password and new password cannot same.");
        }
    }
}
?>