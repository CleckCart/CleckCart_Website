<?php
include('./connect.php');
if(isset($_GET['user']) && isset($_GET['id'])){
    $user = $_GET['user'];
    $id = $_GET['id'];
}
?>
<?php
 /*Check if form is submitted*/
 if(isset($_POST['CustomerProfileEditPasswordSubmit'])){
    /*Check if all fields are filled*/ 
    if (empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmnewPassword'])){
        header("Location:./PasswordUpdate.php?user=$user&id=$id&error=Please make sure all text fields are not empty.");
    }
    else{
        $customerCurrentPassword = trim(filter_input(INPUT_POST, 'currentPassword', FILTER_SANITIZE_STRING));
        $customerNewPassword = trim(filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING));
        $customerConfirmNewPassword = trim(filter_input(INPUT_POST, 'confirmnewPassword', FILTER_SANITIZE_STRING));
        if(strcmp($customerCurrentPassword,$customerNewPassword)!=0){
            $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
            $CurrentEnteredPassword = md5($customerCurrentPassword);
            $query = "SELECT * FROM USER_TABLE WHERE USER_ID = '$id' AND PASSWORD = '$CurrentEnteredPassword'";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            $row = oci_fetch_assoc($result);
            $password = $row['PASSWORD'];
            if($CurrentEnteredPassword == $password)
                {
                    if(strcmp($customerNewPassword,$customerConfirmNewPassword)==0)
                        {
                            /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                            if(preg_match($passwordPattern, $customerNewPassword))
                                {
                                    /*For inserting into database*/
                                    $customerConfirmNewPassword = md5($customerConfirmNewPassword);
                                    $query = "UPDATE USER_TABLE SET PASSWORD = :password WHERE USER_ID = '$id' AND ROLE='customer'";
                                    $result = oci_parse($conn, $query);
                                    oci_bind_by_name($result, ":password", $customerConfirmNewPassword);
                                    oci_execute($result);
                                    header("Location:./PasswordUpdate.php?user=$user&id=$id&success=Password successfully updated.");  
                                    }
                            else
                                {
                                    header("Location:./PasswordUpdate.php?user=$user&id=$id&error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.");
                                }
                        }

                    else
                        {
                            header("Location:./PasswordUpdate.php?user=$user&id=$id&error=Please make sure password are matched.");
                        }
                    }
                    
                else
                    {
                            header("Location:./PasswordUpdate.php?user=$user&id=$id&error=Password doesnot match with your original password.");
                    }
        }
        else{
            header("Location:./PasswordUpdate.php?user=$user&id=$id&error=Current password and new password cannot same.");
        }
    }
}
?>