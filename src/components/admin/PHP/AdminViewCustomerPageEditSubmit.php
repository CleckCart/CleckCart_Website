<?php
        /*Check if form is submitted*/
        if (isset($_POST['CustomerEdit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['CustomerEditUsername']) || empty($_POST['CustomerEditFirstname']) || empty($_POST['CustomerEditLastname']) || empty($_POST['CustomerEditEmail']) 
            || empty($_POST['CustomerEditPhone']) || empty($_POST['CustomerEditAddress'])) 
                {
                    header('Location:./AdminViewCustomerPage.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $CustomerEditUsername = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditUsername', FILTER_SANITIZE_STRING)));
                    $CustomerEditFirstname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditFirstname', FILTER_SANITIZE_STRING)));
                    $CustomerEditLastname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditLastname', FILTER_SANITIZE_STRING)));
                    $CustomerEditEmail = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditEmail', FILTER_SANITIZE_EMAIL)));
                    $CustomerEditPhone = trim(filter_input(INPUT_POST, 'CustomerEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $CustomerEditAddress = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditAddress', FILTER_SANITIZE_STRING)));
                    $CustomerEditDate = $_POST['CustomerEditDate'];
                    /*Check if username is of 5-10 characters*/
                    if(strlen($CustomerEditUsername) >= 5 && strlen($CustomerEditUsername) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$CustomerEditFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$CustomerEditLastname))
                                        {
                                            if(filter_input(INPUT_POST, 'CustomerEditPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if (!empty($_POST['CustomerEditDate']))
                                                        {
                                                            include('connect.php');                                                       
                                                                    $UpdateProductQuery = "UPDATE USER_TABLE SET CATEGORY_NAME=:CategoryName, PRODUCT_IMAGE=:ProductImage, PRODUCT_NAME=:ProductName, PRODUCT_DESCRIPTION=:ProductDescription, PRODUCT_PRICE=:ProductPrice, PRODUCT_STOCK=:ProductStock WHERE PRODUCT_ID=$TraderEditItemId"; 
                                                                    $RunUpdateProductQuery = oci_parse($conn, $UpdateProductQuery);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':CategoryName', $TraderEditItemCategory);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductImage',  $TraderEditItemImage);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductName', $TraderEditItemName);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductDescription', $TraderEditItemDescription);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductPrice', $TraderEditItemPrice);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductStock', $TraderEditItemStock);
                                                                    oci_execute($RunUpdateProductQuery); 
                                                        }

                                                    else
                                                        {
                                                            header('Location:./AdminViewCustomerPage.php?error=Please pick the added date of the product.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./AdminViewCustomerPage.php?error=Please type integer numbers in phone number.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./AdminViewCustomerPage.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./AdminViewCustomerPage.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./AdminViewCustomerPage.php?error=Please make sure username is 5 - 30 characters.');                   
                        }
                }
            }
    ?>