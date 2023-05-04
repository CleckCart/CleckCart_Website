<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderItemAddSubmit'])) {
            include('./connect.php');
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderItemAddName']) || empty($_POST['TraderItemAddCategory']) || empty($_POST['TraderItemAddDescription']) || empty($_POST['TraderItemAddStock']) 
            || empty($_POST['TraderItemAddPrice']) || empty($_POST['TraderItemAddImage']) || empty($_POST['TraderItemAddDiscount']))
                {
                    header('Location:./TraderViewItemsAdd.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderItemAddName = trim(filter_input(INPUT_POST, 'TraderItemAddName', FILTER_SANITIZE_STRING));
                    $TraderItemAddCategory = trim(filter_input(INPUT_POST, 'TraderItemAddCategory', FILTER_SANITIZE_STRING));
                    $TraderItemAddDescription = trim(filter_input(INPUT_POST, 'TraderItemAddDescription', FILTER_SANITIZE_STRING));
                    $TraderItemAddStock = trim(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_SANITIZE_NUMBER_INT));
                    $TraderItemAddPrice = trim(filter_input(INPUT_POST, 'TraderItemAddPrice', FILTER_SANITIZE_NUMBER_FLOAT));
                    $TraderItemAddDiscount = trim(filter_input(INPUT_POST, 'TraderItemAddDiscount', FILTER_SANITIZE_NUMBER_FLOAT));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    $TraderItemAddImage = ($_FILES["TraderItemAddImage"]["name"]);
                    $TraderItemAddImageType = ($_FILES["TraderItemAddImage"]["type"]);
                    $TraderItemAddImageLocation = "../../dist/TraderItemImages/" . $TraderItemImage;
                    if(!preg_match($alphabetPattern,$TraderItemAddName))
                        {                               
                            if(!preg_match($alphabetPattern,$TraderItemAddCategory))
                                {
                                    if(!preg_match($alphabetPattern,$TraderItemAddDescription))
                                        {
                                            if(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if(filter_input(INPUT_POST, 'TraderItemAddPrice', FILTER_VALIDATE_FLOAT) == true)
                                                        {
                                                            if(filter_input(INPUT_POST, 'TraderItemAddDiscount', FILTER_VALIDATE_FLOAT) == true)
                                                                {
                                                                    if(($TraderItemAddImageType == "image/jpeg" || $TraderItemAddImageType == "image/jpg" || $TraderItemAddImageType == "image/png"))
                                                                        {
                                            
                                                                            $sql = "INSERT INTO PRODUCT(PRODUCT_ID, CATEGORY_NAME, PRODUCT_IMAGE, PRODUCT_NAME ,PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_STOCK)
                                                                            VALUES(PRODUCT_S.NEXTVAL ,:TraderItemAddCategory, :TraderItemAddImage, :TraderItemAddName, :TraderItemAddDescription, :TraderItemAddPrice, :TraderItemAddStock)";
                                                                            
                                                                            $check = oci_parse($conn, $sql);
                                            
                                                                            // bind parameters to statement
                                                                            oci_bind_by_name($check, ':TraderItemAddCategory', $TraderItemAddCategory);
                                                                            oci_bind_by_name($check, ':TraderItemAddImage',  $TraderItemAddImage);
                                                                            oci_bind_by_name($check, ':TraderItemAddName', $TraderItemAddName);
                                                                            oci_bind_by_name($check, ':TraderItemAddDescription', $TraderItemAddDescription);
                                                                            oci_bind_by_name($check, ':TraderItemAddPrice', $TraderItemAddPrice);
                                                                            oci_bind_by_name($check, ':TraderItemAddStock', $TraderItemAddStock);

                                                                            // execute statement
                                                                            $result = oci_execute($check);
                                                                            if ($result) {
                                                                                header('Location:./TraderViewItemsAdd.php?success=Registration Success!');
                                                                                
                                                                            } else {
                                                                                header('Location:./TraderViewItemsAdd.php?error=Error');
                                                                                
                                                                            }
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