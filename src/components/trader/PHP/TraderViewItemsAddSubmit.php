<?php
/*Check if form is submitted*/
if (isset($_POST['TraderItemAddSubmit'])) {
    include('./connect.php');
    /*Check if all fields are filled*/ 
    if (empty($_POST['TraderItemAddName']) || empty($_POST['TraderItemAddCategory']) || empty($_POST['TraderItemAddDescription']) || empty($_POST['TraderItemAddStock']) 
    || empty($_POST['TraderItemAddPrice']) || empty($_POST['TraderItemAddDiscount']))
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
            $TraderItemAddImageLocation = "../../dist/TraderItemImages/" . $TraderItemAddImage;
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
                                                                    $checkCategoryQuery = "SELECT * FROM CATEGORY WHERE CATEGORY_NAME='$TraderItemAddCategory'";
                                                                    $runCheckCategoryQuery = oci_parse($conn, $checkCategoryQuery);
                                                                    oci_execute($runCheckCategoryQuery);

                                                                    $row = oci_fetch_array($runCheckCategoryQuery, OCI_ASSOC);
                                                                        if($row['CATEGORY_NAME']==$TraderItemAddCategory)
                                                                            {
                                                                                $query2="SELECT * FROM CATEGORY WHERE CATEGORY_NAME ='$TraderItemAddCategory'";
                                                                                $result2 = oci_parse($conn, $query2);
                                                                                oci_execute($result2);
                                                                                $row1 = oci_fetch_array($result2, OCI_ASSOC);
                                                                                $TraderItemAddCategory=$row1['CATEGORY_NAME'];
                                                                                $TraderItemAddCategoryID=$row1['CATEGORY_ID'];
    
                                                                                $query3="SELECT * FROM SHOP WHERE SHOP_NAME ='$TraderItemAddCategory'";
                                                                                $result3 = oci_parse($conn, $query3);
                                                                                oci_execute($result3);
                                                                                $row2 = oci_fetch_array($result3, OCI_ASSOC);
                                                                                $TraderItemAddShopID=$row2['SHOP_ID'];
                                                                                echo($TraderItemAddShopID); 

                                                                                $ProductInsertionQuery = "INSERT INTO USER_TABLE (PRODUCT_ID, CATEGORY_ID, SHOP_ID, CATEGORY_NAME, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRICE, PRICE_STOCK)
                                                                                VALUES(:ProductIdm :CategoryId, ShopId, CategoryName, ProductImage, Pridc)";
                                                                                $ProductRunInsertionQuery = oci_parse($conn, $ProductInsertionQuery);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderId', $Id);   
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderUserName', $Username);   
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderRole', $Role);                         
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderFirstName', $Firstname);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderLastName', $Lastname);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderEmail', $Email);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderGender', $Gender);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderPassword', $Password);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderBirthDate', $BirthDate);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderAddress', $Address);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':TraderPhoneNumber', $PhoneNumber);
                                                                                oci_execute($ProductRunInsertionQuery);
                                                                            }

                                                                        else 
                                                                            {
                                                                                header('Location:./TraderViewItemsAdd.php?error=Please enter a valid category.');
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