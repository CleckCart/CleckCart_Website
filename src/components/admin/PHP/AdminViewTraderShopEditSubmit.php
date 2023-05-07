<?php
    /*Check if form is submitted*/
    if (isset($_POST['TraderShopEditSubmit'])) 
        {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderShopName']) || empty($_POST['TraderShopDescription']) || empty($_POST['TraderShopCategory'])) 
                {
                    header('Location:./AdminViewTrader\'sShopEdit.php?error=Please make sure all text fields are not empty.');
                }

            else
                {
                    $TraderShopName = trim(filter_input(INPUT_POST, 'TraderShopName', FILTER_SANITIZE_STRING));
                    $TraderShopDescription = trim(filter_input(INPUT_POST, 'TraderShopDescription', FILTER_SANITIZE_STRING));
                    $TraderShopCategory = trim(filter_input(INPUT_POST, 'TraderShopCategory', FILTER_SANITIZE_STRING));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$TraderShopName))
                                {
                                    if(!preg_match($alphabetPattern,$TraderShopCategory))
                                        {
                                            //Insert into database
                                        }
                                    else
                                        {
                                            header('Location:./AdminViewTrader\'sShopEdit.php?error=Please use alphabets only in shop category.');
                                        }
                                                                          
                                }
                            else
                                {
                                    header('Location:./AdminViewTrader\'sShopEdit.php?error=Please use alphabets only in shop name.');
                                }
                }
        }
?>