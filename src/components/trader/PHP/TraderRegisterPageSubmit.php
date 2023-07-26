<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include('connect.php');
        /*Check if form is submitted*/
        if (isset($_POST['TraderRegisterSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderFirstName']) || empty($_POST['TraderLastName']) || empty($_POST['TraderUserName']) || empty($_POST['TraderEmail']) 
            || empty($_POST['TraderPhoneNumber']) || empty($_POST['TraderGender']) || empty($_POST['TraderShopCategory']) || empty($_POST['TraderAddress']) 
            || empty($_POST['TraderPassword']) || empty($_POST['TraderConfirmPassword'])) 
                {
                    header('Location:./TraderRegisterPage.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderOTP=rand(100000,999999);  
                    $TraderFirstName = strtolower(trim(filter_input(INPUT_POST, 'TraderFirstName', FILTER_SANITIZE_STRING)));
                    $TraderLastName = strtolower(trim(filter_input(INPUT_POST, 'TraderLastName', FILTER_SANITIZE_STRING)));
                    $TraderUserName = strtolower(trim(filter_input(INPUT_POST, 'TraderUserName', FILTER_SANITIZE_STRING)));
                    $TraderAddress = strtolower(trim(filter_input(INPUT_POST, 'TraderAddress', FILTER_SANITIZE_STRING)));
                    $TraderBirthDate = $_POST['TraderBirthDate'];
                    $TraderEmail = strtolower(trim(filter_input(INPUT_POST, 'TraderEmail', FILTER_SANITIZE_EMAIL)));
                    $TraderPhoneNumber = trim(filter_input(INPUT_POST, 'TraderPhoneNumber', FILTER_SANITIZE_NUMBER_INT));
                    $TraderGender = strtolower($_POST['TraderGender']);
                    $TraderShopCategory = strtolower(trim(filter_input(INPUT_POST, 'TraderShopCategory', FILTER_SANITIZE_STRING)));
                    $TraderPassword = trim(filter_input(INPUT_POST, 'TraderPassword', FILTER_SANITIZE_STRING));
                    $TraderConfirmPassword = trim(filter_input(INPUT_POST, 'TraderConfirmPassword', FILTER_SANITIZE_STRING));
                    $TraderRole = 'trader';
                    
                    /*Check if username is of 5-30 characters*/
                    if(strlen($TraderUserName) >= 5 && strlen($TraderUserName) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$TraderFirstName))
                                {
                                    if(!preg_match($alphabetPattern,$TraderLastName))
                                        {
                                            if(strlen($TraderPhoneNumber)>=10 && strlen($TraderPhoneNumber) < 12) 
                                                {
                                                    if(!preg_match($alphabetPattern,$TraderShopCategory))
                                                        {
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($TraderPassword,$TraderConfirmPassword)==0)
                                                                {                                                                
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $TraderPassword))
                                                                        {
                                                                            $TraderEncryptedPassword = md5($TraderPassword);
                                                                        /*For inserting into database*/
                                                                        $UsernameQuery = "SELECT * FROM USER_TABLE WHERE USERNAME='$TraderUserName'";
                                                                        $RunUsernameQuery = oci_parse($conn, $UsernameQuery);
                                                                        oci_execute($RunUsernameQuery);
                                                                        if(oci_fetch_assoc($RunUsernameQuery))
                                                                            {
                                                                                header('Location: ./TraderRegisterPage.php?error=Username is taken.');
                                                                            }
                                                                            
                                                                        else
                                                                            {
                                                                                    
                                                                                $EmailQuery = "SELECT * FROM USER_TABLE WHERE EMAIL='$TraderEmail'";
                                                                                $RunEmailQuery = oci_parse($conn, $EmailQuery);
                                                                                oci_execute($RunEmailQuery);
                                                                                if(oci_fetch_assoc($RunEmailQuery))
                                                                                    {
                                                                                        header('Location: ./TraderRegisterPage.php?error=Email is taken.');
                                                                                    }
                                                                                    
                                                                                else
                                                                                    {
                                                                                        $PhoneQuery = "SELECT * FROM USER_TABLE WHERE PHONE_NUMBER='$TraderPhoneNumber'";
                                                                                        $RunPhoneQuery = oci_parse($conn, $PhoneQuery);
                                                                                        oci_execute($RunPhoneQuery);
                                                                                        if(oci_fetch_assoc($RunPhoneQuery))
                                                                                            {
                                                                                                header('Location: ./TraderRegisterPage.php?error=Phonenumber is taken.');
                                                                                            }
                                                                                            
                                                                                        else
                                                                                            {   
                                                                                                
                                                                                                require '../../../mail/phpmailer/src/Exception.php';
                                                                                                require '../../../mail/phpmailer/src/PHPMailer.php';
                                                                                                require '../../../mail/phpmailer/src/SMTP.php';
                                                                                                
                                                                                                $mail = new PHPMailer(true);
                                                                                                
                                                                                                $mail->isSMTP();
                                                                                                $mail->Host = 'smtp.gmail.com';
                                                                                                $mail->SMTPAuth = true;
                                                                                                $mail->Username = 'cleckcart@gmail.com'; //sender's email address
                                                                                                $mail->Password = 'jqmuadhegtgyetci'; //app password
                                                                                                $mail->SMTPSecure = 'ssl';
                                                                                                $mail->Port = '465';
                                                                                                
                                                                                                $mail->setFrom('cleckcart@gmail.com'); //sender's email address
                                                                                                $mail->addAddress($TraderEmail); //reciever's email
                                                                                                $mail->isHTML(true);
                                                                                                $mail->Subject = 'CleckCart, Verify Your Email!'; //subject of the email for reciever
                                                                                                $mail->Body='<html>
                                                                                                <head>
                                                                                                    <style>
                                                                                                        .container{padding: 5vh;}
                                                                                                        .heading{text-align: center;color: rgb(129, 127, 127);}
                                                                                                        .line{border: 1px solid rgb(68, 68, 68);}
                                                                                                    </style>
                                                                                                </head>
                                                                                                <body>
                                                                                                    <div class="container">
                                                                                                        <div class="heading">
                                                                                                            <h1>One Time Password</h1>
                                                                                                        </div>
                                                                                                        <hr class="line">
                                                                                                        <div class="content">
                                                                                                            <p>Dear User, Please use OTP:</p>
                                                                                                            <h2>'.$TraderOTP.'</h2>
                                                                                                            <br>Warm regards,<br>CleckCart
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </body>
                                                                                                </html>';
                                                                                                $mail->send();
                                                                                                $_SESSION['TraderVerifyOTP'] = $TraderOTP;
                                                                                                $_SESSION['TraderUsername'] = $TraderUserName;
                                                                                                $_SESSION['TraderFirstname'] = $TraderFirstName;
                                                                                                $_SESSION['TraderLastname'] = $TraderLastName;
                                                                                                $_SESSION['TraderBirthdate'] = $TraderBirthDate;
                                                                                                $_SESSION['TraderEmail'] = $TraderEmail;
                                                                                                $_SESSION['TraderGender']= $TraderGender;
                                                                                                $_SESSION['TraderPhone']= $TraderPhoneNumber;
                                                                                                $_SESSION['TraderAddress']= $TraderAddress;
                                                                                                $_SESSION['TraderShopCategory']= $TraderShopCategory;
                                                                                                $_SESSION['TraderPassword']= $TraderEncryptedPassword;
                                                                                                header("Location: ./VerifyEmailOTP.php");
                                                                                            }
                                                                                    }
                                                                            }
                                                                        }
                                                                    else
                                                                        {
                                                                            header('Location:./TraderRegisterPage.php?error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./TraderRegisterPage.php?error=Please make sure password are matched.');
                                                                }
                                                        }
                                                    else
                                                        {
                                                            header('Location:./TraderRegisterPage.php?error=Please use alphabets only in shop category.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./TraderRegisterPage.php?error=Please enter a valid phone number.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./TraderRegisterPage.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./TraderRegisterPage.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./TraderRegisterPage.php?error=Please make sure username is 5 - 30 characters.');                   
                        }
                }
            }
    ?>