<?php
        /*Check if form is submitted*/
        if (isset($_POST['traderRegisterSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['FirstName']) || empty($_POST['LastName']) || empty($_POST['UserName']) || empty($_POST['Email']) 
            || empty($_POST['PhoneNumber']) || empty($_POST['Gender']) || empty($_POST['ShopCategory']) || empty($_POST['Address']) || empty($_POST['Password']) || empty($_POST['ConfirmPassword'])) 
                {
                    header('Location:./TraderRegisterPage.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderFirstName = trim(filter_input(INPUT_POST, 'FirstName', FILTER_SANITIZE_STRING));
                    $TraderLastName = trim(filter_input(INPUT_POST, 'LastName', FILTER_SANITIZE_STRING));
                    $TraderUserName = trim(filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING));
                    $TraderEmail = trim(filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL));
                    $TraderPhoneNumber = trim(filter_input(INPUT_POST, 'PhoneNumber', FILTER_SANITIZE_NUMBER_INT));
                    $TraderGender = trim(filter_input(INPUT_POST, 'Gender', FILTER_SANITIZE_NUMBER_INT));
                    $TraderShopName = trim(filter_input(INPUT_POST, 'ShopName', FILTER_SANITIZE_NUMBER_INT));
                    $TraderShopCategory = trim(filter_input(INPUT_POST, 'ShopCategory', FILTER_SANITIZE_NUMBER_INT));
                    $TraderPassword = trim(filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING));
                    $TraderConfirmPassword = trim(filter_input(INPUT_POST, 'ConfirmPassword', FILTER_SANITIZE_STRING));
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
                                                    if(!preg_match($alphabetPattern,$customerGender))
                                                        {
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($customerPassword,$customerConfirmPassword)==0)
                                                                {
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $Password))
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
                                                            header('Location:./TraderRegisterPage.php?error=Please use alphabets only in address.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./TraderRegisterPage.php?error=Please type integer numbers in PhoneNumber.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./TraderRegisterPage.php?error=Please use alphabets only in LastName.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./TraderRegisterPage.php?error=Please use alphabets only in FirstName.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./TraderRegisterPage.php?error=Please make sure username is 5 - 10 characters.');                   
                        }
                }
            }
    ?>