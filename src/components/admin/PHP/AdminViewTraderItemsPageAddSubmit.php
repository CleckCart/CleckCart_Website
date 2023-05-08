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
                                                            $checkCategoryQuery = "SELECT * FROM CATEGORY WHERE CATEGORY_NAME='$AdminAddItemCategory'";
                                                            $runCheckCategoryQuery = oci_parse($conn, $checkCategoryQuery);
                                                            oci_execute($runCheckCategoryQuery);

                                                            $row = oci_fetch_array($runCheckCategoryQuery, OCI_ASSOC);
                                                            if($row['CATEGORY_NAME']==$AdminAddItemCategory)
                                                                {                                                              

                                                                    $checkCategoryQuery = "SELECT * FROM CATEGORY WHERE CATEGORY_NAME='$AdminAddItemCategory'";
                                                                    $runCheckCategoryQuery = oci_parse($conn, $checkCategoryQuery);
                                                                    oci_execute($runCheckCategoryQuery);

                                                                    $row = oci_fetch_array($runCheckCategoryQuery, OCI_ASSOC);
                                                                        if($row['CATEGORY_NAME']==$AdminAddItemCategory)
                                                                            {
                                                                                $query2="SELECT * FROM CATEGORY WHERE CATEGORY_NAME ='$AdminAddItemCategory'";
                                                                                $result2 = oci_parse($conn, $query2);
                                                                                oci_execute($result2);
                                                                                $row1 = oci_fetch_array($result2, OCI_ASSOC);
                                                                                $AdminAddItemCategoryID=$row1['CATEGORY_ID'];
                                                                                $AdminAddItemCategoryName=$row1['CATEGORY_NAME'];
    
                                                                                $query3="SELECT * FROM SHOP WHERE SHOP_NAME ='$AdminAddItemCategory'";
                                                                                $result3 = oci_parse($conn, $query3);
                                                                                oci_execute($result3);
                                                                                $row2 = oci_fetch_array($result3, OCI_ASSOC);
                                                                                $TraderItemAddShopID=$row2['SHOP_ID'];
                                                                                $TraderItemAddShopName=$row2['SHOP_NAME'];

                                                                                $ProductInsertionQuery = "INSERT INTO PRODUCT (PRODUCT_ID, CATEGORY_ID, SHOP_ID, CATEGORY_NAME, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_STOCK)
                                                                                VALUES(PRODUCT_S.NEXTVAL, :CategoryId, :ShopId, :CategoryName, :ProductImage, :ProductName, :ProductDescription, :ProductPrice, :ProductStock)";
                                                                                $ProductRunInsertionQuery = oci_parse($conn, $ProductInsertionQuery);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':CategoryId', $AdminAddItemCategoryID);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ShopId', $TraderItemAddShopID);                     
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':CategoryName', $AdminAddItemCategory);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductImage', $AdminAddItemImage);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductName', $AdminAddItemName);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductDescription', $AdminAddItemDescription);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductPrice', $AdminAddItemPrice);
                                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductStock', $AdminAddItemStock);
                                                                                oci_execute($ProductRunInsertionQuery);
                                                                                header('Location:./TraderViewItemsAdd.php?success=Product Listing Requested.');
                                                                            }

                                                                        else 
                                                                            {
                                                                                header('Location:./TraderViewItemsAdd.php?error=Please enter a valid category.');
                                                                            }
                                                                }
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