<?php
 /*Check if form is submitted*/
 if(isset($_POST['CustomerProfileEditPasswordSubmit'])){
    /*Check if all fields are filled*/ 
    if (empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmnewPassword'])){
        header('Location:./PasswordUpdate.php?error=Please make sure all text fields are not empty.');
    }
    else{
        $customerCurrentPassword = trim(filter_input(INPUT_POST, 'currentPassword', FILTER_SANITIZE_STRING));
        $customerNewPassword = trim(filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING));
        $customerConfirmNewPassword = trim(filter_input(INPUT_POST, 'confirmnewPassword', FILTER_SANITIZE_STRING));
        if(strcmp($customerCurrentPassword,$customerNewPassword)!=0){
            /*Check if password and confirm password matches*/
            if(strcmp($customerNewPassword,$customerConfirmPassword)==0){
                $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                if(preg_match($passwordPattern, $customerNewPassword))
                    {
                    /*For inserting into database*/
                    }
                else
                    {
                        header('Location:./PasswordUpdate.php?error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.');
                    }
            }
            else{
                header('Location:./PasswordUpdate.php?error=Please make sure password are matched.');
            }
        }
        else{
            header('Location:./PasswordUpdate.php?error=Current password and new password cannot same.');
        }
    }
}
?>