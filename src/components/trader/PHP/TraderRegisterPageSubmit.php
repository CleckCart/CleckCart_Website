<?php
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
                    $TraderFirstName = trim(filter_input(INPUT_POST, 'TraderFirstName', FILTER_SANITIZE_STRING));
                    $TraderLastName = trim(filter_input(INPUT_POST, 'TraderLastName', FILTER_SANITIZE_STRING));
                    $TraderUserName = trim(filter_input(INPUT_POST, 'TraderUserName', FILTER_SANITIZE_STRING));
                    $TraderEmail = trim(filter_input(INPUT_POST, 'TraderEmail', FILTER_SANITIZE_EMAIL));
                    $TraderPhoneNumber = trim(filter_input(INPUT_POST, 'TraderPhoneNumber', FILTER_SANITIZE_NUMBER_INT));
                    $TraderGender = trim(filter_input(INPUT_POST, 'TraderGender', FILTER_SANITIZE_NUMBER_INT));
                    $TraderShopName = trim(filter_input(INPUT_POST, 'TraderShopName', FILTER_SANITIZE_NUMBER_INT));
                    $TraderShopCategory = trim(filter_input(INPUT_POST, 'TraderShopCategory', FILTER_SANITIZE_NUMBER_INT));
                    $TraderPassword = trim(filter_input(INPUT_POST, 'TraderPassword', FILTER_SANITIZE_STRING));
                    $TraderConfirmPassword = trim(filter_input(INPUT_POST, 'TraderConfirmPassword', FILTER_SANITIZE_STRING));
                    /*Check if username is of 5-10 characters*/
                    if(strlen($TraderUserName) >= 5 && strlen($TraderUserName) <= 10)
                        {      
                            $alphabetPattern = "/[^a-zA-Z]/";
                            if(!preg_match($alphabetPattern,$TraderFirstName))
                                {
                                    if(!preg_match($alphabetPattern,$TraderLastName))
                                        {
                                            if(filter_input(INPUT_POST, 'TraderPhoneNumber', FILTER_VALIDATE_INT) == true)
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
                                                                        /*For inserting into database*/
                                                                        }
                                                                    else
                                                                        {
                                                                            header('Location:./TraderRegisterPage.php?error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./TraderRegisterPage.php?error=Please make sure password are matched.');;
                                                                }
                                                        }
                                                    else
                                                        {
                                                            header('Location:./TraderRegisterPage.php?error=Please use alphabets only in shop category.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./TraderRegisterPage.php?error=Please type integer numbers in phone number.');
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
                            header('Location:./TraderRegisterPage.php?error=Please make sure username is 5 - 10 characters.');                   
                        }
                }
            }
    ?>