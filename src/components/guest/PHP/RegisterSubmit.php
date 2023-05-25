<?php
        session_start();
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        /*Check if form is submitted*/
        if (isset($_POST['customerRegisterSubmit'])) {
            include('../../trader/PHP/connect.php');
            /*Check if all fields are filled*/ 
            if (empty($_POST['customerUsername']) || empty($_POST['customerFirstname']) || empty($_POST['customerLastname']) || empty($_POST['customerEmail']) 
            || empty($_POST['customerPhone']) || empty($_POST['customerAddress']) || empty($_POST['customerPassword']) || empty($_POST['customerConfirmPassword'])) 
                {
                    header('Location:./Register.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $customerUsername = strtolower(trim(filter_input(INPUT_POST, 'customerUsername', FILTER_SANITIZE_STRING)));
                    $customerFirstname = strtolower(trim(filter_input(INPUT_POST, 'customerFirstname', FILTER_SANITIZE_STRING)));
                    $customerLastname = strtolower(trim(filter_input(INPUT_POST, 'customerLastname', FILTER_SANITIZE_STRING)));
                    $customerBirthDate = $_POST['customerBirthDate'];
                    $customerEmail = strtolower(trim(filter_input(INPUT_POST, 'customerEmail', FILTER_SANITIZE_EMAIL)));
                    $customerGender = strtolower($_POST['customerGender']);
                    $customerPhone = trim(filter_input(INPUT_POST, 'customerPhone', FILTER_SANITIZE_NUMBER_INT));
                    $customerAddress = strtolower(trim(filter_input(INPUT_POST, 'customerAddress', FILTER_SANITIZE_STRING)));
                    $customerPassword = trim(filter_input(INPUT_POST, 'customerPassword', FILTER_SANITIZE_STRING));
                    $customerConfirmPassword = trim(filter_input(INPUT_POST, 'customerConfirmPassword', FILTER_SANITIZE_STRING));                   
                    /*Check if username is of 5-30 characters*/
                    if(strlen($customerUsername) >= 5 && strlen($customerUsername) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$customerFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$customerLastname))
                                        {
                                            if (!empty($_POST['customerBirthDate']))
                                                {
                                                    if(strlen($customerPhone)>=10 && strlen($customerPhone) < 12) 
                                                        {                                                           
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($customerPassword,$customerConfirmPassword)==0)
                                                                {
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $customerPassword))
                                                                        {
                                                                            $GenerateOTP=rand(100000,999999);  
                                                                            /*For inserting into database*/
                                                                            $customer_password = md5($customerPassword);
                                            
                                                                            $UsernameQuery = "SELECT * FROM USER_TABLE WHERE USERNAME='$customerUsername'";
                                                                            $RunUsernameQuery = oci_parse($conn, $UsernameQuery);
                                                                            oci_execute($RunUsernameQuery);
                                                                            if(oci_fetch_assoc($RunUsernameQuery))
                                                                                {
                                                                                    header('Location: ./Register.php?error=Username is taken.');
                                                                                }
                                                                                
                                                                            else
                                                                                {
                                                                                        
                                                                                    $EmailQuery = "SELECT * FROM USER_TABLE WHERE EMAIL='$customerEmail'";
                                                                                    $RunEmailQuery = oci_parse($conn, $EmailQuery);
                                                                                    oci_execute($RunEmailQuery);
                                                                                    if(oci_fetch_assoc($RunEmailQuery))
                                                                                        {
                                                                                            header('Location: ./Register.php?error=Email is taken.');
                                                                                        }
                                                                                        
                                                                                    else
                                                                                        {
                                                                                            $PhoneQuery = "SELECT * FROM USER_TABLE WHERE PHONE_NUMBER='$customerPhone'";
                                                                                            $RunPhoneQuery = oci_parse($conn, $PhoneQuery);
                                                                                            oci_execute($RunPhoneQuery);
                                                                                            if(oci_fetch_assoc($RunPhoneQuery))
                                                                                                {
                                                                                                    header('Location: ./Register.php?error=Phonenumber is taken.');
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
                                                                                                    $mail->addAddress($customerEmail); //reciever's email
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
                                                                                                                <h2>'.$GenerateOTP.'</h2>
                                                                                                                <br>Warm regards,<br>CleckCart
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </body>
                                                                                                    </html>';
                                                                                                    $mail->send();
                                                                                                    header("Location: ./VerifyEmailOTP.php");
                                                                                                    $_SESSION['VerifyOTP'] = $GenerateOTP;
                                                                                                    $_SESSION['Username'] = $customerUsername;
                                                                                                    $_SESSION['Firstname'] = $customerFirstname;
                                                                                                    $_SESSION['Lastname'] = $customerLastname;
                                                                                                    $_SESSION['Birthdate'] = $customerBirthDate;
                                                                                                    $_SESSION['Email'] = $customerEmail;
                                                                                                    $_SESSION['Gender']= $customerGender;
                                                                                                    $_SESSION['Phone']= $customerPhone;
                                                                                                    $_SESSION['Address']= $customerAddress;
                                                                                                    $_SESSION['Password']= $customer_password;
                                                                                                }
                                                                                        }
                                                                                }

                                                                        }
                                                                    else
                                                                        {
                                                                            header('Location:./Register.php?error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./Register.php?error=Please make sure password are matched.');
                                                                }
                                                        
                                                        }

                                                    else
                                                        {
                                                            header('Location:./Register.php?error=Please enter a valid phone number.');
                                                        }
                                                }

                                            else
                                                {
                                                    header('Location:./Register.php?error=Please pick the date for date of birth.');
                                                }
                                            
                                        }
                                    else
                                        {
                                            header('Location:./Register.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./Register.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./Register.php?error=Please make sure username is 5 - 30 characters.');                   
                        }
                }
            }
    ?>