<?php
/*Check if form is submitted*/
if (isset($_POST['TraderItemAddSubmit'])) {
    include('./connect.php');
    /*Check if all fields are filled*/ 
    if (empty($_POST['TraderItemAddName']) || empty($_POST['TraderItemAddCategory']) || empty($_POST['TraderItemAddDescription']) || empty($_POST['TraderItemAddStock']) 
    || empty($_POST['TraderItemAddPrice']))
        {
            header('Location:./TraderViewItemsAdd.php?error=Please make sure all text fields are not empty.');
        }
    else
        {
            $TraderItemAddName = strtolower(trim(filter_input(INPUT_POST, 'TraderItemAddName', FILTER_SANITIZE_STRING)));
            $TraderItemAddCategory = strtolower(trim(filter_input(INPUT_POST, 'TraderItemAddCategory', FILTER_SANITIZE_STRING)));
            $TraderItemAddDescription = strtolower(trim(filter_input(INPUT_POST, 'TraderItemAddDescription', FILTER_SANITIZE_STRING)));
            $TraderItemAddStock = trim(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_SANITIZE_NUMBER_INT));
            $TraderItemAddPrice = trim(filter_input(INPUT_POST, 'TraderItemAddPrice', FILTER_SANITIZE_NUMBER_FLOAT));
            $alphabetPattern = "/[^a-zA-Z\s]/";
            $TraderItemAddImage = ($_FILES["TraderItemAddImage"]["name"]);
            $TraderItemAddImageType = ($_FILES["TraderItemAddImage"]["type"]);
            $TraderItemImageAddTmpName = ($_FILES["TraderItemAddImage"]["tmp_name"]);
            $TraderItemAddImageLocation = "../../../dist/public/TraderItemImages/" . $TraderItemAddImage;
            if(!preg_match($alphabetPattern,$TraderItemAddName))
                {                               
                    if(!preg_match($alphabetPattern,$TraderItemAddCategory))
                        {                         
                                    if(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_VALIDATE_INT) == true)
                                        {
                                            if(filter_input(INPUT_POST, 'TraderItemAddPrice', FILTER_VALIDATE_FLOAT) == true)
                                                {
                                                    
                                                    if(($TraderItemAddImageType == "image/jpeg" || $TraderItemAddImageType == "image/jpg" || $TraderItemAddImageType == "image/png"))
                                                        {
                                                            if(move_uploaded_file($TraderItemImageAddTmpName, $TraderItemAddImageLocation))
                                                                {
                                                                    $checkCategoryQuery = "SELECT * FROM CATEGORY WHERE CATEGORY_NAME='$TraderItemAddCategory'";
                                                                    $runCheckCategoryQuery = oci_parse($conn, $checkCategoryQuery);
                                                                    oci_execute($runCheckCategoryQuery);

                                                                    $row = oci_fetch_array($runCheckCategoryQuery, OCI_ASSOC);
                                                                                                                                

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
                                                                                $TraderItemAddCategoryID=$row1['CATEGORY_ID'];
                                                                                $TraderItemAddCategoryName=$row1['CATEGORY_NAME'];

                                                                                $query3="SELECT * FROM SHOP WHERE SHOP_NAME ='$TraderItemAddCategory'";
                                                                                $result3 = oci_parse($conn, $query3);
                                                                                oci_execute($result3);
                                                                                $row2 = oci_fetch_array($result3, OCI_ASSOC);
                                                                                $TraderItemAddShopID=$row2['SHOP_ID'];
                                                                                $TraderItemAddShopName=$row2['SHOP_NAME'];

                                                                                $ProductInsertionQuery = "INSERT INTO APPLY_PRODUCT (APPLY_PRODUCT_ID, CATEGORY_NAME, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_STOCK)
                                                                                VALUES(APPLY_PRODUCT_S.NEXTVAL, :CategoryName, :ProductImage, :ProductName, :ProductDescription, :ProductPrice, :ProductStock)";
                                                                                $ProductRunInsertionQuery = oci_parse($conn, $ProductInsertionQuery);                     
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':CategoryName', $TraderItemAddCategory);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductImage', $TraderItemAddImage);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductName', $TraderItemAddName);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductDescription', $TraderItemAddDescription);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductPrice', $TraderItemAddPrice);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductStock', $TraderItemAddStock);
                                                                                oci_execute($ProductRunInsertionQuery);
                                                                                header('Location:./TraderViewItemsAdd.php?success=Product Listing Requested.');
                                                                            }

                                                                        else 
                                                                            {
                                                                                header('Location:./TraderViewItemsAdd.php?error=Please enter a valid category.');
                                                                            }   
                                                                }    
                                                            
                                                            else
                                                                {
                                                                    header('Location:./TraderViewItemsAdd.php?error=Failed to upload image.');
                                                                }
                                                            
                                                        }
                                                        
                                                    else
                                                        {
                                                            header('Location:./TraderViewItemsAdd.php?error=Please choose an image.');                                                                
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