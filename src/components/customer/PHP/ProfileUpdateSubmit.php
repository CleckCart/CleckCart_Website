<?php
        /*Check if form is submitted*/
        if (isset($_POST['CustomerEdit'])) {
           
                    $CustomerEditUsername = trim(filter_input(INPUT_POST, 'CustomerEditUsername', FILTER_SANITIZE_STRING));
                    $CustomerEditFirstname = trim(filter_input(INPUT_POST, 'CustomerEditFirstname', FILTER_SANITIZE_STRING));
                    $CustomerEditLastname = trim(filter_input(INPUT_POST, 'CustomerEditLastname', FILTER_SANITIZE_STRING));
                    $CustomerEditEmail = trim(filter_input(INPUT_POST, 'CustomerEditEmail', FILTER_SANITIZE_EMAIL));
                    $CustomerEditPhone = trim(filter_input(INPUT_POST, 'CustomerEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $CustomerEditAddress = trim(filter_input(INPUT_POST, 'CustomerEditAddress', FILTER_SANITIZE_STRING));

                    /*Check if username is of 5-10 characters*/
                    if(strlen($CustomerEditUsername) >= 5 && strlen($CustomerEditUsername) <= 10)
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
                                                            header('Location:./ProfileUpdate.php?error=Please pick the added date of the product.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./ProfileUpdate.php?error=Please type integer numbers in phone number.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./ProfileUpdate.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./ProfileUpdate.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./ProfileUpdate.php?error=Please make sure username is 5 - 10 characters.');                   
                        }
                }
            
    ?>