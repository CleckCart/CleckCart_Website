<?php
    session_start();
    include('connect.php');
    if(isset($_POST['CustomerVerify']))
        {
            $CustomerEnteredOTP = $_POST['CustomerOTP'];
            $CustomerOTP = $_SESSION['VerifyOTP'];
            $customer_role = 'customer';
            $customerUsername = $_SESSION['Username'];
            $customerFirstname = $_SESSION['Firstname'];
            $customerLastname = $_SESSION['Lastname'];
            $customerEmail = $_SESSION['Email'];
            $customerBirthDate = $_SESSION['Birthdate'];
            $customerGender = $_SESSION['Gender'];
            $customerPhone = $_SESSION['Phone'];
            $customerAddress= $_SESSION['Address'];
            $customerPassword = $_SESSION['Password'];
            $customerImage = $_SESSION['Firstname'] . '.jpg';

            if(strlen($CustomerEnteredOTP)==6)
                {
                    if($CustomerEnteredOTP==$CustomerOTP)
                        {

                            $sql = "INSERT INTO USER_TABLE(USER_ID, IMAGE, USERNAME, ROLE, FIRST_NAME, LAST_NAME, EMAIL, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                            VALUES(USER_S.NEXTVAL, :customerImage, :customerUsername, :customer_role, :customerFirstname, :customerLastname, :customerEmail, :customerGender, :customer_password, :customerBirthDate, :customerAddress, :customerPhone)";
                            
                            $check = oci_parse($conn, $sql);
                            
                            // bind parameters to statement
                            oci_bind_by_name($check, ':customerImage', $customerImage);
                            oci_bind_by_name($check, ':customerUsername', $customerUsername);
                            oci_bind_by_name($check, ':customer_role', $customer_role);
                            oci_bind_by_name($check, ':customerFirstname', $customerFirstname);
                            oci_bind_by_name($check, ':customerLastname', $customerLastname);
                            oci_bind_by_name($check, ':customerEmail', $customerEmail);
                            oci_bind_by_name($check, ':customerGender', $customerGender);
                            oci_bind_by_name($check, ':customer_password', $customerPassword);
                            oci_bind_by_name($check, ':customerBirthDate', $customerBirthDate);
                            oci_bind_by_name($check, ':customerAddress', $customerAddress);
                            oci_bind_by_name($check, ':customerPhone', $customerPhone);
                            oci_execute($check);
                            header("Location:./CustomerLogin.php?success=Congratulations!!! You can start buying from CleckCart.");
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