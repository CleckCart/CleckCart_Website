<?php
include('./connectSession.php');
$email = $_SESSION['email'];
?>
<?php
if (isset($_POST['UserUpdatepasswordSubmit'])) {
    if (empty($_POST['UserNewPassword']) || empty($_POST['UserConfirmNewPassword'])) {
        header('Location:./Updatepassword.php?error=Make sure the fields are not empty');
    } else {
        $UserNewPassword = trim(filter_input(INPUT_POST, 'UserNewPassword', FILTER_SANITIZE_STRING));
        $UserConfirmNewPassword = trim(filter_input(INPUT_POST, 'UserConfirmNewPassword', FILTER_SANITIZE_STRING));

        $encryptNewPassword = md5($UserNewPassword);
        $encryptConfirmPassword = md5($UserConfirmNewPassword);

        $passCheckingQuery = "SELECT PASSWORD FROM USER_TABLE WHERE EMAIL = '$email' ";
        $passwordResult = oci_parse($conn, $passCheckingQuery);
        oci_execute($passwordResult);

        $row = oci_fetch_array($passwordResult, OCI_ASSOC);
        $pass = $row['PASSWORD'];
        if (strcmp($UserNewPassword, $UserConfirmNewPassword) == 0) {

            $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,16}$/';
            /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
            if (preg_match($passwordPattern, $UserNewPassword)) {
                if (!strcmp($encryptNewPassword, $pass) == 0) {
                    // 064081befb3823d6cc6ed8ce4972f573	
                    // 064081befb3823d6cc6ed8ce4972f573
                    $PassUpdateQuery = "UPDATE USER_TABLE SET PASSWORD =:encryptNewPassword WHERE EMAIL =:email";
                    $result = oci_parse($conn, $PassUpdateQuery);

                    oci_bind_by_name($result, ":encryptNewPassword", $encryptNewPassword);
                    oci_bind_by_name($result, ":email", $email);

                    
                    if (oci_execute($result)) {
                        header('Location:./Updatepassword.php?success=Password Updated!');
                    } else {
                        header('Location:./Updatepassword.php?error=Error. Try again');
                    }
                } else {
                    header('Location:./Updatepassword.php?error=New password cannot be same as old password');
                }
            }
        } else {
            header('Location:./Updatepassword.php?error=Passwords donot match');
        }
    }
}
?>