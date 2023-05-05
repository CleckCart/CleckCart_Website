<?php
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
                    $customerUsername = trim(filter_input(INPUT_POST, 'customerUsername', FILTER_SANITIZE_STRING));
                    $customerFirstname = trim(filter_input(INPUT_POST, 'customerFirstname', FILTER_SANITIZE_STRING));
                    $customerLastname = trim(filter_input(INPUT_POST, 'customerLastname', FILTER_SANITIZE_STRING));
                    $customerBirthDate = $_POST['customerBirthDate'];
                    $customerEmail = trim(filter_input(INPUT_POST, 'customerEmail', FILTER_SANITIZE_EMAIL));
                    $customerGender = $_POST['customerGender'];
                    $customerPhone = trim(filter_input(INPUT_POST, 'customerPhone', FILTER_SANITIZE_NUMBER_INT));
                    $customerAddress = trim(filter_input(INPUT_POST, 'customerAddress', FILTER_SANITIZE_STRING));
                    $customerPassword = trim(filter_input(INPUT_POST, 'customerPassword', FILTER_SANITIZE_STRING));
                    $customerConfirmPassword = trim(filter_input(INPUT_POST, 'customerConfirmPassword', FILTER_SANITIZE_STRING));
                    /*Check if username is of 5-10 characters*/
                    if(strlen($customerUsername) >= 5 && strlen($customerUsername) <= 10)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$customerFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$customerLastname))
                                        {
                                            if (!empty($_POST['customerBirthDate']))
                                                {
                                                    if(filter_input(INPUT_POST, 'customerPhone', FILTER_VALIDATE_INT) == true)
                                                        {
                                                            
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($customerPassword,$customerConfirmPassword)==0)
                                                                {
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $customerPassword))
                                                                        {
                                                                        /*For inserting into database*/
                                                                            $customer_role = 'Customer';
                                                                            $customer_password = md5($customerPassword);
                                            
                                                                            $sql = "INSERT INTO USER_TABLE(USERNAME, ROLE, FIRST_NAME, LAST_NAME, EMAIL, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                                                                            VALUES(:customerUsername, :customer_role, :customerFirstname, :customerLastname, :customerEmail, :customerGender, :customer_password, :customerBirthDate, :customerAddress, :customerPhone)";
                                                                            
                                                                            $check = oci_parse($conn, $sql);
                                            
                                                                            // bind parameters to statement
                                                                            oci_bind_by_name($check, ':customerUsername', $customerUsername);
                                                                            oci_bind_by_name($check, ':customer_role', $customer_role);
                                                                            oci_bind_by_name($check, ':customerFirstname', $customerFirstname);
                                                                            oci_bind_by_name($check, ':customerLastname', $customerLastname);
                                                                            oci_bind_by_name($check, ':customerEmail', $customerEmail);
                                                                            oci_bind_by_name($check, ':customerGender', $customerGender);
                                                                            oci_bind_by_name($check, ':customer_password', $customer_password);
                                                                            oci_bind_by_name($check, ':customerBirthDate', $customerBirthDate);
                                                                            oci_bind_by_name($check, ':customerAddress', $customerAddress);
                                                                            oci_bind_by_name($check, ':customerPhone', $customerPhone);
                                            
                                                                            // execute statement
                                                                            $result = oci_execute($check);
                                                                            if ($result) {
                                                                                header('Location:./Register.php?success=Registration Success!');
                                                                                
                                                                            } else {
                                                                                header('Location:./Register.php?error=Error');
                                                                                
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
                                                            header('Location:./Register.php?error=Please type integer numbers in phone number.');
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
                            header('Location:./Register.php?error=Please make sure username is 5 - 10 characters.');                   
                        }
                }
            }
    ?>