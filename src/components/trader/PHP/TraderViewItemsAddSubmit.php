<?php
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
?>
<?php
/*Check if form is submitted*/
if (isset($_POST['TraderItemAddSubmit'])) {
    include('./connect.php');
    /*Check if all fields are filled*/ 
    if (empty($_POST['TraderItemAddName']) || empty($_POST['TraderItemAddDescription']) || empty($_POST['TraderItemAddStock']) 
    || empty($_POST['TraderItemAddPrice']))
        {
            header("Location:./TraderViewItemsAdd.php?user=$user&error=Please make sure all text fields are not empty.");
        }
    else
        {
            $TraderItemAddName = strtolower(trim(filter_input(INPUT_POST, 'TraderItemAddName', FILTER_SANITIZE_STRING)));
            $TraderItemAddCategory = $_POST['TraderItemAddCategory'];
            $TraderItemAddDescription = strtolower(trim(filter_input(INPUT_POST, 'TraderItemAddDescription', FILTER_SANITIZE_STRING)));
            $TraderItemAddStock = trim(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_SANITIZE_NUMBER_INT));
            $TraderItemAddPrice = $_POST['TraderItemAddPrice'];
            $TraderItemAddDiscount=$_POST['TraderItemAddDiscount'];
            $alphabetPattern = "/[^a-zA-Z\s]/";
            $TraderItemAddImage = ($_FILES["TraderItemAddImage"]["name"]);
            $TraderItemAddImageType = ($_FILES["TraderItemAddImage"]["type"]);
            $TraderItemImageAddTmpName = ($_FILES["TraderItemAddImage"]["tmp_name"]);
            $TraderItemAddImageLocation = "../../../dist/public/TraderItemImages/" . $TraderItemAddImage;
            if(!preg_match($alphabetPattern,$TraderItemAddName))
                {                               
             
                    if(filter_input(INPUT_POST, 'TraderItemAddStock', FILTER_VALIDATE_INT) == true)
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
                                                        if($TraderItemAddPrice > $TraderItemAddDiscount)
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

                                                                $ProductInsertionQuery = "INSERT INTO APPLY_PRODUCT (APPLY_PRODUCT_ID, CATEGORY_NAME, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_PRICE, DISCOUNT, PRODUCT_STOCK)
                                                                VALUES(APPLY_PRODUCT_S.NEXTVAL, :CategoryName, :ProductImage, :ProductName, :ProductDescription, :ProductPrice, :ProductDiscount, :ProductStock)";
                                                                $ProductRunInsertionQuery = oci_parse($conn, $ProductInsertionQuery);                     
                                                                oci_bind_by_name($ProductRunInsertionQuery, ':CategoryName', $TraderItemAddCategory);
                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductImage', $TraderItemAddImage);
                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductName', $TraderItemAddName);
                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductDescription', $TraderItemAddDescription);
                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductPrice', $TraderItemAddPrice);
                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductDiscount', $TraderItemAddDiscount);
                                                                oci_bind_by_name($ProductRunInsertionQuery, ':ProductStock', $TraderItemAddStock);
                                                                oci_execute($ProductRunInsertionQuery);
                                                                   
                                                                header("Location:./TraderViewItems.php?user=$user&success=Product Listing Requested.");

                                                            }

                                                        else
                                                            {
                                                                header("Location:./TraderViewItemsAdd.php?user=$user&error=Discount amount cannot be greater than price.");
                                                            }
                                                
                                                    }    
                                        }

                                    else
                                        {
                                            header("Location:./TraderViewItemsAdd.php?user=$user&error=Failed to upload the image.");
                                        }
                                                                                                                                
                                }

                            else
                                {
                                    header("Location:./TraderViewItemsAdd.php?user=$user&error=Please choose an image.");
                                }
                                    
                        }
                

                    else
                        {
                            header("Location:./TraderViewItemsAdd.php?user=$user&error=Please type integer numbers in product stock.");
                        }                                                                         
                    
                }
            else
                {   
                    header("Location:./TraderViewItemsAdd.php?user=$user&error=Please use alphabets only in product name.");
                }
        }
    }
    ?>