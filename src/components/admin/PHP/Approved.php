<?php
    include('connect.php');
    $refusedId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $FetchTraderQuery = "SELECT * FROM APPLY_TRADER WHERE APPLY_ID = $refusedId";     
            $RunFetchQuery = oci_parse($conn, $FetchTraderQuery);
            oci_execute($RunFetchQuery);
            if($RunFetchQuery)
                {   
                    while($row = oci_fetch_array($RunFetchQuery, OCI_ASSOC)){
                    $id=$row['APPLY_ID'];
                    $Username=$row['USERNAME'];
                    $Role='Trader';
                    $Firstname=$row['FIRST_NAME'];
                    $Lastname=$row['LAST_NAME'];
                    $Email=$row['EMAIL'];  
                    $Category=$row['SHOP_CATEGORY'];
                    $Gender=$row['GENDER'];
                    $BirthDate=$row['DATE_OF_BIRTH'];
                    $Address=$row['ADDRESS'];
                    $PhoneNumber=$row['PHONE_NUMBER'];
                    $Password=$row['PASSWORD'];
                    
                    $TraderInsertionQuery = "INSERT INTO USER_TABLE (USER_ID, USERNAME, ROLE, FIRST_NAME, LAST_NAME, EMAIL, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                    VALUES(USER_S.NEXTVAL, :TraderUserName, :TraderRole,:TraderFirstName, :TraderLastName, :TraderEmail, :TraderGender, :TraderPassword, :TraderBirthDate, :TraderAddress , :TraderPhoneNumber)";
                    $TraderRunInsertionQuery = oci_parse($conn, $TraderInsertionQuery);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderUserName', $Username);   
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderRole', $Role);                         
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderFirstName', $Firstname);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderLastName', $Lastname);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderEmail', $Email);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderGender', $Gender);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderPassword', $Password);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderBirthDate', $BirthDate);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderAddress', $Address);
                    oci_bind_by_name($TraderRunInsertionQuery, ':TraderPhoneNumber', $PhoneNumber);
                    oci_execute($TraderRunInsertionQuery);

                    $CategoryInsertionQuery = "INSERT INTO CATEGORY (CATEGORY_ID, CATEGORY_NAME) VALUES(CATEGORY_S.NEXTVAL,:TraderCategory)";
                    $RunCategoryInsertionQuery = oci_parse($conn, $CategoryInsertionQuery);
                    oci_bind_by_name($RunCategoryInsertionQuery, ':TraderCategory', $Category);
                    oci_execute($RunCategoryInsertionQuery); 
                    }

                    $DeleteAfterApproveQuery = "DELETE FROM APPLY_TRADER WHERE APPLY_ID = $refusedId";     
                    $RunDeleteQuery = oci_parse($conn, $DeleteAfterApproveQuery);
                    oci_execute($RunDeleteQuery);
                    header("Location:AdminApproveTrader.php?success=Trader has been approved.");
                }
        }
   
?>
