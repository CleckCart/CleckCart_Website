<?php
         include('./connect.php');
         if(isset($_GET['user'])){
             $user = $_GET['user'];
         }
        /*Check if form is submitted*/
        if (isset($_POST['CustomerEdit'])) {
           
                    $CustomerEditUsername = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditUsername', FILTER_SANITIZE_STRING)));
                    $CustomerEditFirstname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditFirstname', FILTER_SANITIZE_STRING)));
                    $CustomerEditLastname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditLastname', FILTER_SANITIZE_STRING)));
                    $CustomerEditEmail = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditEmail', FILTER_SANITIZE_EMAIL)));
                    $CustomerEditPhone = $_POST['CustomerEditPhone'];
                    $CustomerEditAddress = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditAddress', FILTER_SANITIZE_STRING)));
                    $CustomerEditDate = $_POST['CustomerEditDate'];
                    $CustomerEditGender = $_POST['CustomerEditGender'];

                    /*Check if username is of 5-10 characters*/
                    if(strlen($CustomerEditUsername) >= 5 && strlen($CustomerEditUsername) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$CustomerEditFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$CustomerEditLastname))
                                        {
                                            if(strlen($CustomerEditPhone)>=10 && strlen($CustomerEditPhone) < 12) 
                                                {
                                                    if (!empty($_POST['CustomerEditDate']))
                                                        {
                                                            if (!empty($_POST['TraderEditDate']))
                                                                {

                                                                }

                                                            else
                                                                {
                                                                    header("Location:./ProfilePage.php?user=$user&error=Please pick the added date of the product.");
                                                                }
                                                        }

                                                    else
                                                        {
                                                            header("Location:./ProfilePage.php?user=$user&error=Please pick the added date of the product.");
                                                        }
                                                }
                                            else
                                                {
                                                    header("Location:./ProfilePage.php?user=$user&error=Please type integer numbers in phone number.");
                                                }
                                        }
                                    else
                                        {
                                            header("Location:./ProfilePage.php?user=$user&error=Please use alphabets only in lastname.");
                                        }        
                                }   
                                
                            else
                                {
                                    header("Location:./ProfilePage.php?user=$user&error=Please use alphabets only in firstname.");
                                }
                            
                        }
                    else
                        {   
                            header("Location:./ProfilePage.php?user=$user&error=Please make sure username is 5 - 30 characters.");                   
                        }
                }
            
    ?>