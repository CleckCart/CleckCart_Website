<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderEdit'])) {
           
                    $TraderEditUsername = trim(filter_input(INPUT_POST, 'TraderEditUsername', FILTER_SANITIZE_STRING));
                    $TraderEditFirstname = trim(filter_input(INPUT_POST, 'TraderEditFirstname', FILTER_SANITIZE_STRING));
                    $TraderEditLastname = trim(filter_input(INPUT_POST, 'TraderEditLastname', FILTER_SANITIZE_STRING));
                    $TraderEditEmail = trim(filter_input(INPUT_POST, 'TraderEditEmail', FILTER_SANITIZE_EMAIL));
                    $TraderEditPhone = trim(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $TraderEditAddress = trim(filter_input(INPUT_POST, 'TraderEditAddress', FILTER_SANITIZE_STRING));

                    /*Check if username is of 5-10 characters*/
                    if(strlen($TraderEditUsername) >= 5 && strlen($TraderEditUsername) <= 10)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$TraderEditFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$TraderEditLastname))
                                        {
                                            if(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if (!empty($_POST['TraderEditDate']))
                                                        {

                                                        }

                                                    else
                                                        {
                                                            header('Location:./TraderProfileEdit.php?error=Please pick the added date of the product.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./TraderProfileEdit.php?error=Please type integer numbers in phone number.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./TraderProfileEdit.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./TraderProfileEdit.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./TraderProfileEdit.php?error=Please make sure username is 5 - 10 characters.');                   
                        }
                }
            
    ?>