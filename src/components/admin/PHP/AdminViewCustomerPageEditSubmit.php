<?php
        /*Check if form is submitted*/
        if (isset($_POST['CustomerEdit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['CustomerEditFirstname']) || empty($_POST['CustomerEditLastname']) || empty($_POST['CustomerEditEmail']) 
            || empty($_POST['CustomerEditPhone']) || empty($_POST['CustomerEditAddress']) || empty($_POST['CustomerEditGender'])) 
                {
                    header('Location:./AdminViewCustomerPage.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $CustomerEditId = $_POST['EditCustomerId'];
                    $CustomerEditGender = strtolower($_POST['CustomerEditGender']);
                    $CustomerEditFirstname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditFirstname', FILTER_SANITIZE_STRING)));
                    $CustomerEditLastname = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditLastname', FILTER_SANITIZE_STRING)));
                    $CustomerEditEmail = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditEmail', FILTER_SANITIZE_EMAIL)));
                    $CustomerEditPhone = trim(filter_input(INPUT_POST, 'CustomerEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $CustomerEditAddress = strtolower(trim(filter_input(INPUT_POST, 'CustomerEditAddress', FILTER_SANITIZE_STRING)));
                    $CustomerEditDate = $_POST['CustomerEditDate'];
                    $CustomerRole='customer';
    
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
                                                    $UpdateUserQuery = "UPDATE USER_TABLE SET FIRST_NAME=:CustomerFirstname, LAST_NAME=:CustomerLastname, EMAIL=:CustomerEmail, GENDER=:CustomerGender, DATE_OF_BIRTH=:CustomerDate, ADDRESS=:CustomerAddress, PHONE_NUMBER=:CustomerPhone WHERE USER_ID = $CustomerEditId AND ROLE = :CustomerRole"; 
                                                    $RunUpdateUserQuery = oci_parse($conn, $UpdateUserQuery);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerRole', $CustomerRole);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerFirstname', $CustomerEditFirstname);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerLastname', $CustomerEditLastname);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerEmail', $CustomerEditEmail);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerGender', $CustomerEditGender);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerDate', $CustomerEditDate);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerAddress', $CustomerEditAddress);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':CustomerPhone', $CustomerEditPhone);
                                                    oci_execute($RunUpdateUserQuery); 
                                                    header('Location:./AdminViewCustomerPage.php?success=Customer details successfully updated.');
                                                }

                                            else
                                                {
                                                    header('Location:./AdminViewCustomerPage.php?error=Please pick the birth date of the product.');
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
            }
    ?>