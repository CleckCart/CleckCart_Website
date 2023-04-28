<?php
        /*Check if form is submitted*/
        if (isset($_POST['customerRegisterSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['customerUsername']) || empty($_POST['customerFirstname']) || empty($_POST['customerLastname']) || empty($_POST['customerEmail']) 
            || empty($_POST['customerPhone']) || empty($_POST['customerAddress']) || empty($_POST['customerPassword']) || empty($_POST['customerConfirmPassword'])) 
                {
                    echo("<div class='alert alert-danger text-center' role='alert'>
                    Please make sure all text fields are not empty.
                    </div>");
                    include('Register.php');
                }
            else
                {
                    $customerUsername = trim(filter_input(INPUT_POST, 'customerUsername', FILTER_SANITIZE_STRING));
                    $customerFirstname = trim(filter_input(INPUT_POST, 'customerFirstname', FILTER_SANITIZE_STRING));
                    $customerLastname = trim(filter_input(INPUT_POST, 'customerLastname', FILTER_SANITIZE_STRING));
                    $customerEmail = trim(filter_input(INPUT_POST, 'customerEmail', FILTER_SANITIZE_EMAIL));
                    $customerPhone = trim(filter_input(INPUT_POST, 'customerPhone', FILTER_SANITIZE_NUMBER_INT));
                    $customerAddress = trim(filter_input(INPUT_POST, 'customerAddress', FILTER_SANITIZE_STRING));
                    $customerPassword = trim(filter_input(INPUT_POST, 'customerPassword', FILTER_SANITIZE_STRING));
                    $customerConfirmPassword = trim(filter_input(INPUT_POST, 'customerConfirmPassword', FILTER_SANITIZE_STRING));
                    /*Check if username is of 5-10 characters*/
                    if(strlen($customerUsername) >= 5 && strlen($customerUsername) <= 10)
                        {      
                            $alphabetPattern = "/[^a-zA-Z]/";
                            if(!preg_match($alphabetPattern,$customerFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$customerLastname))
                                        {
                                            if(filter_input(INPUT_POST, 'customerPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if(!preg_match($alphabetPattern,$customerAddress))
                                                        {
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($customerPassword,$customerConfirmPassword)==0)
                                                                {
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $customerPassword))
                                                                        {
                                                                        /*For inserting into database*/
                                                                        }
                                                                    else
                                                                        {
                                                                            echo("<div class='alert alert-danger text-center' role='alert'>
                                                                            Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.
                                                                            </div>");
                                                                            include('Register.php');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    echo("<div class='alert alert-danger text-center' role='alert'>
                                                                    Please make sure password are matched.
                                                                    </div>");
                                                                    include('Register.php');
                                                                }
                                                        }
                                                    else
                                                        {
                                                            echo("<div class='alert alert-danger text-center' role='alert'>
                                                            Please use alphabets only in address.
                                                            </div>");
                                                            include('Register.php');
                                                        }
                                                }
                                            else
                                                {
                                                    echo("<div class='alert alert-danger text-center' role='alert'>
                                                            Please type integer numbers in phone number.
                                                            </div>");
                                                            include('Register.php');
                                                }
                                        }
                                    else
                                        {
                                            echo("<div class='alert alert-danger text-center' role='alert'>
                                            Please use alphabets only in lastname.
                                            </div>");
                                            include('Register.php');
                                        }        
                                }   
                                
                            else
                                {
                                    echo("<div class='alert alert-danger text-center' role='alert'>
                                            Please use alphabets only in firstname.
                                            </div>");
                                    include('Register.php');
                                }
                            
                        }
                    else
                        {                          
                            echo("<div class='alert alert-danger text-center' role='alert'>
                            Please make sure username is 5 - 10 characters.
                          </div>");
                          include('Register.php');
                        }
                }
            }
    ?>