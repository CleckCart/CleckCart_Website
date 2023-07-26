<?php
include('./connect.php');
if(isset($_GET['user']) && isset($_GET['id'])){
    $user = $_GET['user'];
    $id = $_GET['id'];
}
?>
<?php
 /*Check if form is submitted*/
 if(isset($_POST['TraderProfileEditPasswordSubmit'])){
    /*Check if all fields are filled*/ 
    if (empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmnewPassword'])){
        header("Location:./TraderProfileEditPassword.php?user=$user&id=$id&error=Please make sure all text fields are not empty.");
    }
    else{
        $traderCurrentPassword = trim(filter_input(INPUT_POST, 'currentPassword', FILTER_SANITIZE_STRING));
        $traderNewPassword = trim(filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING));
        $traderConfirmNewPassword = trim(filter_input(INPUT_POST, 'confirmnewPassword', FILTER_SANITIZE_STRING));
        if(strcmp($traderCurrentPassword,$traderNewPassword)!=0){
            $traderCurrentEnteredPassword = md5($traderCurrentPassword);
            $query = "SELECT * FROM USER_TABLE WHERE USER_ID = '$id' AND PASSWORD = '$traderCurrentEnteredPassword'";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            $row = oci_fetch_assoc($result);
            echo($password = $row['PASSWORD']);

            if($traderCurrentEnteredPassword == $password){
                /*Check if password and confirm password matches*/
    
                if(strcmp($traderNewPassword,$traderConfirmNewPassword)==0){
                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                    if(preg_match($passwordPattern, $traderNewPassword))
                        {
                            $traderConfirmNewPassword = md5($traderConfirmNewPassword);
                            $query = "UPDATE USER_TABLE SET PASSWORD = :password WHERE USER_ID = '$id' AND ROLE='trader'";
                            $result = oci_parse($conn, $query);
                            oci_bind_by_name($result, ":password", $traderConfirmNewPassword);
                            oci_execute($result);
                            header("Location:./TraderProfileEditPassword.php?user=$user&id=$id&success=Password successfully updated.");  
                        
                        }
                    else
                        {
                            header("Location:./TraderProfileEditPassword.php?user=$user&id=$id&error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.");
                        }
                }
                else{
                    header("Location:./TraderProfileEditPassword.php?user=$user&id=$id&error=Please make sure password are matched.");
                }
            }
            else{
                header("Location:./TraderProfileEditPassword.php?user=$user&id=$id&error=Password doesnot match with your original password.");
            }
        }
        else{
            header("Location:./TraderProfileEditPassword.php?user=$user&id=$id&error=Current password and new password cannot same.");
        }
    }
}
?>