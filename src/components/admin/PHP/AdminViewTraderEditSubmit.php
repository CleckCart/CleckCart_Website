<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderEditSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderEditFirstName']) || empty($_POST['TraderEditLastName']) || empty($_POST['TraderEditUserName']) || empty($_POST['TraderEditEmail']) 
            || empty($_POST['TraderEditPhone']) || empty($_POST['TraderEditAddress'])) 
                {
                    header('Location:./AdminViewTraderEdit.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderEditFirstName = trim(filter_input(INPUT_POST, 'TraderEditFirstName', FILTER_SANITIZE_STRING));
                    $TraderEditLastName = trim(filter_input(INPUT_POST, 'TraderEditLastName', FILTER_SANITIZE_STRING));
                    $TraderEditUserName = trim(filter_input(INPUT_POST, 'TraderEditUserName', FILTER_SANITIZE_STRING));
                    $TraderEditEmail = trim(filter_input(INPUT_POST, 'TraderEditEmail', FILTER_SANITIZE_EMAIL));
                    $TraderEditPhone = trim(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $TraderEditAddress = trim(filter_input(INPUT_POST, 'TraderEditAddress', FILTER_SANITIZE_STRING));
                    $TraderEditDate = $_POST['TraderEditDate'];
                    /*Check if username is of 5-10 characters*/
                    if(strlen($TraderEditUserName) >= 5 && strlen($TraderEditUserName) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$TraderEditFirstName))
                                {
                                    if(!preg_match($alphabetPattern,$TraderEditLastName))
                                        {
                                            if(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if (!empty($_POST['TraderEditDate']))
                                                        {

                                                        }

                                                    else
                                                        {
                                                            header('Location:./AdminViewTraderEdit.php?error=Please pick the date for date of birth.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./AdminViewTraderEdit.php?error=Please type integer numbers in phone number.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./AdminViewTraderEdit.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./AdminViewTraderEdit.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./AdminViewTraderEdit.php?error=Please make sure username is 5 - 30 characters.');                   
                        }
                }
            }
    ?>