<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderAddItemSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderAddItemName']) || empty($_POST['TraderAddItemCategory']) || empty($_POST['TraderAddItemDescription']) || empty($_POST['TraderAddItemStock']) 
            || empty($_POST['TraderAddItemPrice']) || empty($_POST['TraderAddItemDiscount'])) 
                {
                    header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderAddItemName = trim(filter_input(INPUT_POST, 'TraderAddItemName', FILTER_SANITIZE_STRING));
                    $TraderAddItemCategory = trim(filter_input(INPUT_POST, 'TraderAddItemCategory', FILTER_SANITIZE_STRING));
                    $TraderAddItemDescription = trim(filter_input(INPUT_POST, 'TraderAddItemDescription', FILTER_SANITIZE_STRING));
                    $TraderAddItemDate = $_POST['TraderAddItemDate'];
                    $TraderAddItemStock = trim(filter_input(INPUT_POST, 'TraderAddItemStock', FILTER_SANITIZE_NUMBER_INT));
                    $TraderAddItemPrice = trim(filter_input(INPUT_POST, 'TraderAddItemPrice', FILTER_SANITIZE_NUMBER_FLOAT));
                    $TraderAddItemDiscount = trim(filter_input(INPUT_POST, 'TraderAddItemDiscount', FILTER_SANITIZE_NUMBER_FLOAT));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    if(!preg_match($alphabetPattern,$TraderAddItemName))
                        {                               
                            if(!preg_match($alphabetPattern,$TraderAddItemCategory))
                                {
                                    if(!preg_match($alphabetPattern,$TraderAddItemDescription))
                                        {
                                            if (!empty($_POST['TraderAddItemDate']))
                                                {
                                                    if(filter_input(INPUT_POST, 'TraderAddItemStock', FILTER_VALIDATE_INT) == true)
                                                        {
                                                            if(filter_input(INPUT_POST, 'TraderAddItemPrice', FILTER_VALIDATE_FLOAT) == true)
                                                                {
                                                                    if(filter_input(INPUT_POST, 'TraderAddItemDiscount', FILTER_VALIDATE_FLOAT) == true)
                                                                        {
                                                                            
                                                                        }
                                                                    else
                                                                        {
                                                                            header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please type decimal numbers in product discount.');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please type decimal numbers in product price.');
                                                                }
                                                        }
                                                    else
                                                        {
                                                            header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please type integer numbers in product stock.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please pick the added date of the product.');
                                                }
                                          
                                        }
                                    else
                                        {
                                            header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please use alphabets only in product description.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please use alphabets only in product category.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./AdminViewTrader\'sItemsPageAdd.php?error=Please use alphabets only in product name.');                   
                        }
                }
            }
    ?>