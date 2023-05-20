<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id']) ){
        $user = $_GET['user'];
        $productId = $_GET['id'];
    }

    $reviewDate = date('Y-m-d');
    $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE = 'customer'";
    $resultCustomer = oci_parse($conn, $queryCustomer);
    oci_execute($resultCustomer);
    $row = oci_fetch_assoc($resultCustomer);
    $userid = $row['USER_ID'];
?>

<?php
    if(isset($_POST['reviewSubmit'])){
        if(!empty($_POST['reviewDescription'])){
            if(!empty($_POST['selectedRating'])){
                $reviewDescription = strtolower(trim(filter_input(INPUT_POST, 'reviewDescription', FILTER_SANITIZE_STRING))); 
                $selectedRating = $_POST['selectedRating'];

                $query = "INSERT INTO REVIEW(REVIEW_ID, PRODUCT_ID, USER_ID, PRODUCT_DESCRIPTION, RATING, REVIEW_DATE) VALUES(REVIEW_S.NEXTVAL, :productId, :userId, :reviewDescription, :rating, :reviewDate)";
                $result = oci_parse($conn, $query);
                oci_bind_by_name($result, ':productId', $productId);
                oci_bind_by_name($result, ':userId', $userid);
                oci_bind_by_name($result, ':reviewDescription', $reviewDescription);
                oci_bind_by_name($result, ':rating', $selectedRating);
                oci_bind_by_name($result, ':reviewDate', $reviewDate);
                oci_execute($result);
                //header("Location:./ReviewPage.php?&success=Review Submitted Successfully&user=$user&id=$productId");
            }
            else{
                header("Location:./ReviewPage.php?&error=Please select a rating&user=$user&id=$productId");
            }
        }
        else{
            header("Location:./ReviewPage.php?&error=Please enter a review&user=$user&id=$productId");
        }
    }
?>