<?php
include('connect.php');
if(isset($_GET['user'])){
    $user = $_GET['user'];
}
?>
<?php
        
        /*Check if form is submitted*/
        if (isset($_POST['AdminAddItemSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['AdminAddItemName']) || empty($_POST['AdminAddItemCategory']) || empty($_POST['AdminAddItemDescription']) || empty($_POST['AdminAddItemStock']) 
            || empty($_POST['AdminAddItemPrice'])) 
                {
                    header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Please make sure all text fields are not empty.");
                }
            else
                {
                    $AdminAddItemName = strtolower(trim(filter_input(INPUT_POST, 'AdminAddItemName', FILTER_SANITIZE_STRING)));
                    $AdminAddItemCategory = strtolower(trim(filter_input(INPUT_POST, 'AdminAddItemCategory', FILTER_SANITIZE_STRING)));
                    $AdminAddItemDescription = strtolower(trim(filter_input(INPUT_POST, 'AdminAddItemDescription', FILTER_SANITIZE_STRING)));
                    $AdminAddItemStock = trim(filter_input(INPUT_POST, 'AdminAddItemStock', FILTER_SANITIZE_NUMBER_INT));
                    $AdminAddItemPrice = $_POST['AdminAddItemPrice'];
                    $AdminAddItemDiscount = $_POST['AdminAddItemDiscount'];
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    $AdminAddItemImage = ($_FILES["AdminAddItemImage"]["name"]);
                    $AdminAddItemImageType = ($_FILES["AdminAddItemImage"]["type"]);
                    $AdminAddItemImageTmpName = ($_FILES["AdminAddItemImage"]["tmp_name"]);
                    $AdminAddItemImageLocation = "../../../dist/public/AdminItemImages/" . $AdminAddItemImage;
                    if(!preg_match($alphabetPattern,$AdminAddItemName))
                        {                               
                            if(!preg_match($alphabetPattern,$AdminAddItemCategory))
                                {
                                    if(filter_input(INPUT_POST, 'AdminAddItemStock', FILTER_VALIDATE_INT) == true)
                                        {
                                                                                           
                                                    if(($AdminAddItemImageType == "image/jpeg" || $AdminAddItemImageType == "image/jpg" || $AdminAddItemImageType == "image/png"))
                                                        {
                                                            if(move_uploaded_file($AdminAddItemImageTmpName, $AdminAddItemImageLocation))
                                                                {
                                                           
                                                                    $checkCategoryQuery = "SELECT * FROM CATEGORY WHERE CATEGORY_NAME='$AdminAddItemCategory'";
                                                                    $runCheckCategoryQuery = oci_parse($conn, $checkCategoryQuery);
                                                                    oci_execute($runCheckCategoryQuery);

                                                                    $row = oci_fetch_array($runCheckCategoryQuery, OCI_ASSOC);
                                                                        if($row['CATEGORY_NAME']==$AdminAddItemCategory)
                                                                            {
                                                                                if($AdminAddItemPrice > $AdminAddItemDiscount)
                                                                                    {
                                                                                        $query2="SELECT * FROM CATEGORY WHERE CATEGORY_NAME =:CategoryName";
                                                                                        $result2 = oci_parse($conn, $query2);
                                                                                        oci_bind_by_name($result2,':CategoryName', $AdminAddItemCategory);
                                                                                        oci_execute($result2);
                                                                                        $row1 = oci_fetch_array($result2, OCI_ASSOC);
                                                                                        $AdminAddItemCategoryID=$row1['CATEGORY_ID'];
                                                                                        $AdminAddItemCategoryName=$row1['CATEGORY_NAME'];
            
                                                                                        $query3="SELECT * FROM SHOP WHERE SHOP_NAME =:ShopName";
                                                                                        $result3 = oci_parse($conn, $query3);
                                                                                        oci_bind_by_name($result3, ':ShopName', $AdminAddItemCategory);
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

                                                                                        $FetchIdQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_NAME='$AdminAddItemName'";
                                                                                        $RunFetchIdQuery = oci_parse($conn, $FetchIdQuery);
                                                                                        oci_execute($RunFetchIdQuery);
                                                                                        $ProductRow = oci_fetch_array($RunFetchIdQuery, OCI_ASSOC);
                                                                                        $ProductId = $ProductRow['PRODUCT_ID'];
                                                                                        
                                                                                        $StartDate = date('Y-m-d');
                                                                                        $EndDate = date('Y-m-d', strtotime($StartDate . ' +1 week'));
                                                                                        $OfferStatus = 'Y';
                                                                                        $DiscountInsertionQuery = "INSERT INTO OFFER (OFFER_ID, PRODUCT_ID, DISCOUNT, START_DATE, END_DATE, OFFER_STATUS)
                                                                                        VALUES(OFFER_S.NEXTVAL, $ProductId, $AdminAddItemDiscount, :StartDate, :EndDate, :OfferStatus)";
                                                                                        $RunDiscountInsertionQuery = oci_parse($conn, $DiscountInsertionQuery);
                                                                                        oci_bind_by_name($RunDiscountInsertionQuery, ':StartDate', $StartDate);
                                                                                        oci_bind_by_name($RunDiscountInsertionQuery, ':EndDate', $EndDate);                     
                                                                                        oci_bind_by_name($RunDiscountInsertionQuery, ':OfferStatus', $OfferStatus);
                                                                                        oci_execute($RunDiscountInsertionQuery);
                                                                                        //header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&success=Product listed successfully.");
                                                                                    }

                                                                                else
                                                                                    {
                                                                                        header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Discount amount cannot be greater than price.");
                                                                                    }
                                                                            }

                                                                        else 
                                                                            {
                                                                                header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Please enter a valid category.");
                                                                            }
                                                                }

                                                            else
                                                                {
                                                                    header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Failed to upload the image.");
                                                                }
                                                        }

                                                    else
                                                        {
                                                            header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Please choose an image.");
                                                        }
                                        }
                                    else
                                        {
                                            header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Please type integer numbers in product stock.");
                                        }
                                }                                                                                                                   
                                
                            else
                                {
                                    header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Please use alphabets only in product category.");
                                }
                        }

                    else
                        {
                            header("Location:./AdminViewTraderItemsPageAdd.php?user=$user&error=Please use alphabets only in product name.");
                        }
                }
            }
    ?>