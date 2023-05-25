<?php
    session_start();
    include('connect.php');
    if(isset($_POST['TraderVerify']))
        {
            $TraderEnteredOTP = $_POST['TraderOTP'];
            $TraderOTP=$_SESSION['TraderVerifyOTP'];
            $TraderUserName=$_SESSION['TraderUsername'];
            $TraderFirstName=$_SESSION['TraderFirstname'];
            $TraderLastName=$_SESSION['TraderLastname'];
            $TraderBirthDate=$_SESSION['TraderBirthdate'];
            $TraderEmail=$_SESSION['TraderEmail'];
            $TraderGender=$_SESSION['TraderGender'];
            $TraderPhoneNumber=$_SESSION['TraderPhone'];
            $TraderAddress=$_SESSION['TraderAddress'];
            $TraderEncryptedPassword=$_SESSION['TraderPassword'];
            $TraderShopCategory = $_SESSION['TraderShopCategory'];
            $TraderImage = $_SESSION['TraderFirstname'] . '.jpg';

            if(strlen($TraderEnteredOTP)==6)
                {
                    if($TraderEnteredOTP==$TraderOTP)
                        {

                            $query = "INSERT INTO APPLY_TRADER (APPLY_ID, IMAGE, USERNAME, FIRST_NAME, LAST_NAME, EMAIL, SHOP_CATEGORY, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                            VALUES(APPLY_TRADER_S.NEXTVAL, :TraderImage, :TraderUserName, :TraderFirstName, :TraderLastName, :TraderEmail, :TraderShopCategory, :TraderGender, :TraderEncryptedPassword, :TraderBirthDate, :TraderAddress , :TraderPhoneNumber)";
                            $result = oci_parse($conn, $query);

                            oci_bind_by_name($result, ':TraderImage', $TraderImage);
                            oci_bind_by_name($result, ':TraderUserName', $TraderUserName);                           
                            oci_bind_by_name($result, ':TraderFirstName', $TraderFirstName);
                            oci_bind_by_name($result, ':TraderLastName', $TraderLastName);
                            oci_bind_by_name($result, ':TraderEmail', $TraderEmail);
                            oci_bind_by_name($result, ':TraderShopCategory', $TraderShopCategory);
                            oci_bind_by_name($result, ':TraderGender', $TraderGender);
                            oci_bind_by_name($result, ':TraderEncryptedPassword', $TraderEncryptedPassword);
                            oci_bind_by_name($result, ':TraderBirthDate', $TraderBirthDate);
                            oci_bind_by_name($result, ':TraderAddress', $TraderAddress);
                            oci_bind_by_name($result, ':TraderPhoneNumber', $TraderPhoneNumber);
                            oci_execute($result);
                            header("Location:./TraderLogin.php?success=Verified!!! Please wait to be approved.");
                        }

                    else
                        {
                            header("Location:./VerifyEmailOtp.php?error=Please enter a valid OTP from your mail.");

                        }
                }
                        
            else
                {                          
                    header("Location:./VerifyEmailOtp.php?error=Please enter a valid 6 digit OTP.");
                }
        }
?>