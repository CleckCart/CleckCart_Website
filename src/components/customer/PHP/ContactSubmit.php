<?php
        /*Check if form is submitted*/
        if (isset($_POST['ContactSendMessage'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['ContactFullname']) || empty($_POST['ContactEmail']) || empty($_POST['ContactPhone']) || empty($_POST['ContactSubject']) 
            || empty($_POST['ContactMessage'])) 
                {
                    header('Location:./Contact.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $ContactFullname = trim(filter_input(INPUT_POST, 'ContactFullname', FILTER_SANITIZE_STRING));
                    $ContactEmail= trim(filter_input(INPUT_POST, 'ContactEmail', FILTER_SANITIZE_EMAIL));
                    $ContactPhone = trim(filter_input(INPUT_POST, 'ContactPhone', FILTER_SANITIZE_NUMBER_INT));
                    $ContactSubject = trim(filter_input(INPUT_POST, 'ContactSubject', FILTER_SANITIZE_STRING));
                    $ContactMessage = trim(filter_input(INPUT_POST, 'ContactMessage', FILTER_SANITIZE_STRING));
                    $alphabetPattern = "/[^a-zA-Z\s]/";                            
                            if(!preg_match($alphabetPattern,$ContactFullname))
                                {
                                            if(filter_input(INPUT_POST, 'ContactPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                            if(!preg_match($alphabetPattern,$ContactSubject))
                                                                {
                                                                    if(!preg_match($alphabetPattern,$ContactMessage))
                                                                        {
                                                                            
                                                                        }
                                                                    else
                                                                        {
                                                                            header('Location:./Contact.php?error=Please use alphabets only in message.');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./Contact.php?error=Please use alphabets only in subject.');
                                                                }
                                                }
                                            else
                                                {
                                                    header('Location:./Contact.php?error=Please type integer numbers in phone number.');
                                                }
                                    }
                            else
                                {
                                    header('Location:./Contact.php?error=Please use alphabets only in fullname.');
                                }
                            
                                  
                        }   
                
                }
    ?>