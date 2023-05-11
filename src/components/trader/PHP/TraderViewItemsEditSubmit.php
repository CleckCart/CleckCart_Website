<?php
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
?>
<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderItemEditSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderItemEditName']) || empty($_POST['TraderItemEditCategory']) || empty($_POST['TraderItemEditDescription']) || empty($_POST['TraderItemEditStock']) 
            || empty($_POST['TraderItemEditPrice']) || empty($_POST['TraderItemEditDiscount'])) 
                {
                    header("Location:./TraderViewItemsEdit.php?user=$user&error=Please make sure all text fields are not empty.");
                }
            else
                {
                    $TraderEditItemId = $_POST['TraderEditItemId'];
                    $TraderItemEditName = strtolower(trim(filter_input(INPUT_POST, 'TraderItemEditName', FILTER_SANITIZE_STRING)));
                    $TraderItemEditCategory = strtolower(trim(filter_input(INPUT_POST, 'TraderItemEditCategory', FILTER_SANITIZE_STRING)));
                    $TraderItemEditDescription = strtolower(trim(filter_input(INPUT_POST, 'TraderItemEditDescription', FILTER_SANITIZE_STRING)));
                    $TraderItemEditStock = trim(filter_input(INPUT_POST, 'TraderItemEditStock', FILTER_SANITIZE_NUMBER_INT));
                    $TraderItemEditPrice = $_POST['TraderItemEditPrice'];
                    $TraderItemEditDiscount = $_POST['TraderItemEditDiscount'];
                    $TraderItemEditImage = ($_FILES["TraderItemEditImage"]["name"]);
                    $TraderItemEditImageType = ($_FILES["TraderItemEditImage"]["type"]);
                    $TraderItemEditImageTmpName = ($_FILES["TraderItemEditImage"]["tmp_name"]);
                    $TraderItemEditImageLocation = "../../../dist/public/TraderItemImages/" . $TraderItemEditImage;
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    if(!preg_match($alphabetPattern,$TraderItemEditName))
                        {                               
                            if(!preg_match($alphabetPattern,$TraderItemEditCategory))
                                {                                                           
                                    if(filter_input(INPUT_POST, 'TraderItemEditStock', FILTER_VALIDATE_INT) == true)
                                        {
                                            if(filter_input(INPUT_POST, 'TraderItemEditPrice', FILTER_VALIDATE_FLOAT) == true)
                                                {                                                      
                                                    if($TraderItemEditImageType == "image/jpeg" || $TraderItemEditImageType == "image/jpg" || $TraderItemEditImageType == "image/png")
                                                        {
                                                            if(move_uploaded_file($TraderItemEditImageTmpName, $TraderItemEditImageLocation))
                                                                {          
                                                                    include('./connect.php');                                                       
                                                                    $UpdateProductQuery = "UPDATE PRODUCT SET CATEGORY_NAME=:CategoryName, PRODUCT_IMAGE=:ProductImage, PRODUCT_NAME=:ProductName, PRODUCT_DESCRIPTION=:ProductDescription, PRODUCT_PRICE=:ProductPrice, PRODUCT_STOCK=:ProductStock WHERE PRODUCT_ID=$TraderEditItemId"; 
                                                                    $RunUpdateProductQuery = oci_parse($conn, $UpdateProductQuery);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':CategoryName', $TraderItemEditCategory);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductImage',  $TraderItemEditImage);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductName', $TraderItemEditName);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductDescription', $TraderItemEditDescription);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductPrice', $TraderItemEditPrice);
                                                                    oci_bind_by_name($RunUpdateProductQuery, ':ProductStock', $TraderItemEditStock);
                                                                    oci_execute($RunUpdateProductQuery); 
                                                                    header("Location:./TraderViewItems.php?user=$user&success=Details successfully updated.");  
                                                                }
                                                            else
                                                                {
                                                                    header("Location:./TraderViewItems.php?user=$user&error=Failed to upload image.");
                                                                }
                                                        }
                                                    else
                                                        {
                                                            header("Location:./TraderViewItems.php?user=$user&error=Please choose an image.");
                                                        }
                                                }
                                            else
                                                {
                                                    header("Location:./TraderViewItems.php?user=$user&error=Please type decimal numbers in product price.");
                                                }
                                        }
                                    else
                                        {
                                            header("Location:./TraderViewItems.php?user=$user&error=Please type integer numbers in product stock.");
                                        }
                                }
                            else
                                {
                                    header("Location:./TraderViewItems.php?user=$user&error=Please use alphabets only in product category.");
                                }
                        }
                    else
                        {
                            header("Location:./TraderViewItems.php?user=$user&error=Please use alphabets only in product name.");                   
                        }
                }
        }
    ?>