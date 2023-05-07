<?php
        /*Check if form is submitted*/
        if (isset($_POST['AdminAddItemSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['AdminAddItemName']) || empty($_POST['AdminAddItemCategory']) || empty($_POST['AdminAddItemDescription']) || empty($_POST['AdminAddItemStock']) 
            || empty($_POST['AdminAddItemPrice']) || empty($_POST['AdminAddItemImage'])) 
                {
                    header('Location:./AdminViewTraderItemsPageAdd.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $AdminAddItemName = trim(filter_input(INPUT_POST, 'AdminAddItemName', FILTER_SANITIZE_STRING));
                    $AdminAddItemCategory = trim(filter_input(INPUT_POST, 'AdminAddItemCategory', FILTER_SANITIZE_STRING));
                    $AdminAddItemDescription = trim(filter_input(INPUT_POST, 'AdminAddItemDescription', FILTER_SANITIZE_STRING));
                    $AdminAddItemDate = $_POST['AdminAddItemDate'];
                    $AdminAddItemStock = trim(filter_input(INPUT_POST, 'AdminAddItemStock', FILTER_SANITIZE_NUMBER_INT));
                    $AdminAddItemPrice = trim(filter_input(INPUT_POST, 'AdminAddItemPrice', FILTER_SANITIZE_NUMBER_FLOAT));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    $AdminAddItemImage = ($_FILES["AdminAddItemImage"]["name"]);
                    $AdminAddItemImageType = ($_FILES["AdminAddItemImage"]["type"]);
                    $AdminAddItemImageTmpName = ($_FILES["AdminAddItemImage"]["tmp_name"]);
                    $AdminAddItemImageLocation = "AdminAddItemImages/" . $AdminAddItemImage;
                    if(!preg_match($alphabetPattern,$AdminAddItemName))
                        {                               
                            if(!preg_match($alphabetPattern,$AdminAddItemCategory))
                                {

                                    if(filter_input(INPUT_POST, 'AdminAddItemStock', FILTER_VALIDATE_INT) == true)
                                        {
                                            if(filter_input(INPUT_POST, 'AdminAddItemPrice', FILTER_VALIDATE_FLOAT) == true)
                                                {
                                                    
                                                    if(($TraderEditImageType == "image/jpeg" || $TraderEditImageType == "image/jpg" || $TraderEditImageType == "image/png"))
                                                        {
                                                        }

                                                    else
                                                        {
                                                            header('Location:./AdminViewTraderItemsPageAdd.php?error=Please choose an image.');
                                                        }
                                                                                                          
                                                }

                                            else
                                                {
                                                    header('Location:./AdminViewTraderItemsPageAdd.php?error=Please type decimal numbers in product price.');
                                                }
                                        }

                                    else
                                        {
                                            header('Location:./AdminViewTraderItemsPageAdd.php?error=Please type integer numbers in product stock.');
                                        }
                                }                                                                                                                   
                                
                            else
                                {
                                    header('Location:./AdminViewTraderItemsPageAdd.php?error=Please use alphabets only in product category.');
                                }
                            
                        }

                    else
                        {   
                            header('Location:./AdminViewTraderItemsPageAdd.php?error=Please use alphabets only in product name.');                   
                        }
                }
            }
    ?>