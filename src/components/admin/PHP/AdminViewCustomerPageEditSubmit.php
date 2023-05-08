<?php
        /*Check if form is submitted*/
        if (isset($_POST['CustomerEdit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['CustomerEditUsername']) || empty($_POST['CustomerEditFirstname']) || empty($_POST['CustomerEditLastname']) || empty($_POST['CustomerEditEmail']) 
            || empty($_POST['CustomerEditPhone']) || empty($_POST['CustomerEditAddress'])) 
                {
                    header('Location:./AdminViewCustomerPageEdit.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $CustomerEditUsername = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditUsername', FILTER_SANITIZE_STRING)));
                    $CustomerEditFirstname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditFirstname', FILTER_SANITIZE_STRING)));
                    $CustomerEditLastname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditLastname', FILTER_SANITIZE_STRING)));
                    $CustomerEditEmail = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditEmail', FILTER_SANITIZE_EMAIL)));
                    $CustomerEditPhone = trim(filter_input(INPUT_POST, 'CustomerEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $CustomerEditAddress = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditAddress', FILTER_SANITIZE_STRING)));

                    /*Check if username is of 5-10 characters*/
                    if(strlen($CustomerEditUsername) >= 5 && strlen($CustomerEditUsername) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$CustomerEditFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$CustomerEditLastname))
                                        {
                                            if(filter_input(INPUT_POST, 'CustomerEditPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if (!empty($_POST['CustomerEditDate']))
                                                        {

                                                        }

                                                    else
                                                        {
                                                            header('Location:./AdminViewCustomerPageEdit.php?error=Please pick the added date of the product.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./AdminViewCustomerPageEdit.php?error=Please type integer numbers in phone number.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./AdminViewCustomerPageEdit.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./AdminViewCustomerPageEdit.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./AdminViewCustomerPageEdit.php?error=Please make sure username is 5 - 30 characters.');                   
                        }
                }
            }
    ?>