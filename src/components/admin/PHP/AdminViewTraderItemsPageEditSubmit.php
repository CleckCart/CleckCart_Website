<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderEditItemSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderEditItemName']) || empty($_POST['TraderEditItemCategory']) || empty($_POST['TraderEditItemDescription']) || empty($_POST['TraderEditItemStock']) 
            || empty($_POST['TraderEditItemPrice']) || empty($_POST['TraderEditItemDiscount'])) 
                {
                    header('Location:./AdminViewTraderItemsPageEdit.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderEditItemName = strtolower(trim(filter_input(INPUT_POST, 'TraderEditItemName', FILTER_SANITIZE_STRING)));
                    $TraderEditItemCategory = strtolower(trim(filter_input(INPUT_POST, 'TraderEditItemCategory', FILTER_SANITIZE_STRING)));
                    $TraderEditItemDescription = strtolower(trim(filter_input(INPUT_POST, 'TraderEditItemDescription', FILTER_SANITIZE_STRING)));
                    $TraderEditItemDate = $_POST['TraderEditItemDate'];
                    $TraderEditItemStock = trim(filter_input(INPUT_POST, 'TraderEditItemStock', FILTER_SANITIZE_NUMBER_INT));
                    $TraderEditItemPrice = trim(filter_input(INPUT_POST, 'TraderEditItemPrice', FILTER_SANITIZE_NUMBER_FLOAT));
                    $TraderEditItemDiscount = trim(filter_input(INPUT_POST, 'TraderEditItemDiscount', FILTER_SANITIZE_NUMBER_FLOAT));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    if(!preg_match($alphabetPattern,$TraderEditItemName))
                        {                               
                            if(!preg_match($alphabetPattern,$TraderEditItemCategory))
                                {
                                    
                                    if (!empty($_POST['TraderEditItemDate']))
                                        {
                                            if(filter_input(INPUT_POST, 'TraderEditItemStock', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if(filter_input(INPUT_POST, 'TraderEditItemPrice', FILTER_VALIDATE_FLOAT) == true)
                                                        {
                                                            if(filter_input(INPUT_POST, 'TraderEditItemDiscount', FILTER_VALIDATE_FLOAT) == true)
                                                                {
                                                                    
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./AdminViewTraderItemsPageEdit.php?error=Please type decimal numbers in product discount.');
                                                                }
                                                        }
                                                    else
                                                        {
                                                            header('Location:./AdminViewTraderItemsPageEdit.php?error=Please type decimal numbers in product price.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./AdminViewTraderItemsPageEdit.php?error=Please type integer numbers in product stock.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./AdminViewTraderItemsPageEdit.php?error=Please pick the added date of the product.');
                                        }
                                    
                                }
                                                                                                             
                            else
                                {
                                    header('Location:./AdminViewTraderItemsPageEdit.php?error=Please use alphabets only in product category.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./AdminViewTraderItemsPageEdit.php?error=Please use alphabets only in product name.');                   
                        }
                }
            }
    ?>