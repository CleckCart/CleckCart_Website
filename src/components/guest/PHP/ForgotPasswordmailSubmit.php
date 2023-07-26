<?php 
session_start();
$otp = $_SESSION['otp'];
echo$otp;
if (isset($_POST['CustomerOTPsubmit'])) {
    if(empty($_POST['CustomerOTP'])){
        header('Location:./Forgotpasswordmail.php?error=Please enter your OTP before submitting ');
    }else{
        $UserOTP = trim(filter_input(INPUT_POST, 'CustomerOTP', FILTER_SANITIZE_NUMBER_INT));
        if($UserOTP == $otp){
        header('Location:./Updatepassword.php');

        }else{
        header('Location:./Forgotpasswordmail.php?error=OTP does not match. Enter the Correct OTP');

        }
    }

}
?>