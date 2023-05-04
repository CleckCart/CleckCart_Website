<?php
    include('connect.php');
    $refusedId = $_GET['id'];
    if(isset($_GET['id'])&&isset($_GET['action']))
        {
            $sql = "SELECT * FROM APPLY_TRADER WHERE APPLY_ID = $refusedId";     
            $qry = oci_parse($conn, $sql);
            oci_execute($qry);
            if($qry)
                {   
                    while($row = oci_fetch_array($qry, OCI_ASSOC)){
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
                    
                    $query = "INSERT INTO USER_TABLE (USER_ID, USERNAME, ROLE, FIRST_NAME, LAST_NAME, EMAIL, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                    VALUES(USER_S.NEXTVAL, :TraderUserName, :TraderRole,:TraderFirstName, :TraderLastName, :TraderEmail, :TraderGender, :TraderPassword, :TraderBirthDate, :TraderAddress , :TraderPhoneNumber)";
                    $result = oci_parse($conn, $query);
                    oci_bind_by_name($result, ':TraderUserName', $Username);   
                    oci_bind_by_name($result, ':TraderRole', $Role);                         
                    oci_bind_by_name($result, ':TraderFirstName', $Firstname);
                    oci_bind_by_name($result, ':TraderLastName', $Lastname);
                    oci_bind_by_name($result, ':TraderEmail', $Email);
                    oci_bind_by_name($result, ':TraderGender', $Gender);
                    oci_bind_by_name($result, ':TraderPassword', $Password);
                    oci_bind_by_name($result, ':TraderBirthDate', $BirthDate);
                    oci_bind_by_name($result, ':TraderAddress', $Address);
                    oci_bind_by_name($result, ':TraderPhoneNumber', $PhoneNumber);
                    oci_execute($result);
                    header("Location:AdminApproveTrader.php?success=Trader has been approved.");
                            }

                    $sql = "DELETE FROM APPLY_TRADER WHERE APPLY_ID = $refusedId";     
                    $delete = oci_parse($conn, $sql);
                    oci_execute($delete);
                }
        }
   
?>
