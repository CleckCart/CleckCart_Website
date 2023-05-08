<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderItemEditSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderItemEditName']) || empty($_POST['TraderItemEditCategory']) || empty($_POST['TraderItemEditDescription']) || empty($_POST['TraderItemEditStock']) 
            || empty($_POST['TraderItemEditPrice']) || empty($_POST['TraderItemEditDiscount'])) 
                {
                    header('Location:./TraderViewItemsEdit.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderItemEditName = strtolower(trim(filter_input(INPUT_POST, 'TraderItemEditName', FILTER_SANITIZE_STRING)));
                    $TraderItemEditCategory = strtolower(trim(filter_input(INPUT_POST, 'TraderItemEditCategory', FILTER_SANITIZE_STRING)));
                    $TraderItemEditDescription = strtolower(trim(filter_input(INPUT_POST, 'TraderItemEditDescription', FILTER_SANITIZE_STRING)));
                    $TraderItemEditDate = $_POST['TraderItemEditDate'];
                    $TraderItemEditStock = trim(filter_input(INPUT_POST, 'TraderItemEditStock', FILTER_SANITIZE_NUMBER_INT));
                    $TraderItemEditPrice = trim(filter_input(INPUT_POST, 'TraderItemEditPrice', FILTER_SANITIZE_NUMBER_FLOAT));
                    $TraderItemEditDiscount = trim(filter_input(INPUT_POST, 'TraderItemEditDiscount', FILTER_SANITIZE_NUMBER_FLOAT));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    if(!preg_match($alphabetPattern,$TraderItemEditName))
                        {                               
                            if(!preg_match($alphabetPattern,$TraderItemEditCategory))
                                {
                                    
                                    if (!empty($_POST['TraderItemEditDate'])) 
                                        {
                                            if(filter_input(INPUT_POST, 'TraderItemEditStock', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if(filter_input(INPUT_POST, 'TraderItemEditPrice', FILTER_VALIDATE_FLOAT) == true)
                                                        {
                                                            
                                                        }
                                                    else
                                                        {
                                                            header('Location:./TraderViewItemsEdit.php?error=Please type decimal numbers in product price.');
                                                        }
                                                }

                                            else
                                                {
                                                    header('Location:./TraderViewItemsEdit.php?error=Please type integer numbers in product stock.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./TraderViewItemsEdit.php?error=Please pick the added date of the product.');
                                        }                                           
                                }                                          
                                
                            else
                                {
                                    header('Location:./TraderViewItemsEdit.php?error=Please use alphabets only in product category.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./TraderViewItemsEdit.php?error=Please use alphabets only in product name.');                   
                        }
                }
            }
    ?>