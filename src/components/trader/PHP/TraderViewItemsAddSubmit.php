<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderItemAddSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderItemAddName']) || empty($_POST['TraderItemAddCategory']) || empty($_POST['TraderItemAddDescription']) || empty($_POST['TraderItemAddStock']) 
            || empty($_POST['TraderItemAddPrice']) || empty($_POST['TraderItemAddDiscount']) || empty($_POST['TraderItemAddDate']) || empty($_POST['TraderItemAddImage'])) 
                {
                    header('Location:./TraderViewItemsAdd.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderItemAddName = trim(filter_input(INPUT_POST, 'TraderItemAddName', FILTER_SANITIZE_STRING));
                    $TraderItemAddCategory = trim(filter_input(INPUT_POST, 'TraderItemAddCategory', FILTER_SANITIZE_STRING));
                    $TraderItemAddDescription = trim(filter_input(INPUT_POST, 'TraderItemAddDescription', FILTER_SANITIZE_STRING));
                    $TraderItemAddDate = $_POST['TraderItemAddDate'];
                    $TraderItemAddStock = trim(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_SANITIZE_NUMBER_INT));
                    $TraderItemAddPrice = trim(filter_input(INPUT_POST, 'TraderItemAddPrice', FILTER_SANITIZE_NUMBER_FLOAT));
                    $TraderItemAddDiscount = trim(filter_input(INPUT_POST, 'TraderItemAddDiscount', FILTER_SANITIZE_NUMBER_FLOAT));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    $TraderItemImage = ($_FILES["TraderItemImage"]["name"]);
                    $TraderItemImageType = ($_FILES["TraderItemImage"]["type"]);
                    $TraderItemImageTmpName = ($_FILES["TraderItemImage"]["tmp_name"]);
                    $TraderItemImageLocation = "TraderItemImages/" . $TraderItemImage;
                    if(!preg_match($alphabetPattern,$TraderItemAddName))
                        {                               
                            if(!preg_match($alphabetPattern,$TraderItemAddCategory))
                                {
                                    if(!preg_match($alphabetPattern,$TraderItemAddDescription))
                                        {
                                            if (!empty($_POST['TraderItemAddDate'])) 
                                                {
                                                    if(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_VALIDATE_INT) == true)
                                                        {
                                                            if(filter_input(INPUT_POST, 'TraderItemAddPrice', FILTER_VALIDATE_FLOAT) == true)
                                                                {
                                                                    if(filter_input(INPUT_POST, 'TraderItemAddDiscount', FILTER_VALIDATE_FLOAT) == true)
                                                                        {
                                                                            if(($TraderEditImageType == "image/jpeg" || $TraderEditImageType == "image/jpg" || $TraderEditImageType == "image/png"))
                                                                                {
                                                                                }
                                                                            else
                                                                                {
                                                                                    header('Location:./TraderViewItemsAdd.php?error=Please choose an image.');
                                                                                }
                                                                        }
                                                                    else
                                                                        {
                                                                            header('Location:./TraderViewItemsAdd.php?error=Please type decimal numbers in product discount.');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./TraderViewItemsAdd.php?error=Please type decimal numbers in product price.');
                                                                }
                                                        }

                                                    else
                                                        {
                                                            header('Location:./TraderViewItemsAdd.php?error=Please type integer numbers in product stock.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./TraderViewItemsAdd.php?error=Please pick the added date of the product.');
                                                }                                           
                                        }
                                    else
                                        {
                                            header('Location:./TraderViewItemsAdd.php?error=Please use alphabets only in product description.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./TraderViewItemsAdd.php?error=Please use alphabets only in product category.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./TraderViewItemsAdd.php?error=Please use alphabets only in product name.');                   
                        }
                }
            }
    ?>