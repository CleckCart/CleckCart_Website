<?php
    include('connect.php');
        /*Check if form is submitted*/
        if (isset($_POST['TraderRegisterSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderFirstName']) || empty($_POST['TraderLastName']) || empty($_POST['TraderUserName']) || empty($_POST['TraderEmail']) 
            || empty($_POST['TraderPhoneNumber']) || empty($_POST['TraderGender']) || empty($_POST['TraderShopCategory']) || empty($_POST['TraderAddress']) 
            || empty($_POST['TraderPassword']) || empty($_POST['TraderConfirmPassword'])) 
                {
                    header('Location:./TraderRegisterPage.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderFirstName = strtolower(trim(filter_input(INPUT_POST, 'TraderFirstName', FILTER_SANITIZE_STRING)));
                    $TraderLastName = strtolower(trim(filter_input(INPUT_POST, 'TraderLastName', FILTER_SANITIZE_STRING)));
                    $TraderUserName = strtolower(trim(filter_input(INPUT_POST, 'TraderUserName', FILTER_SANITIZE_STRING)));
                    $TraderAddress = strtolower(trim(filter_input(INPUT_POST, 'TraderAddress', FILTER_SANITIZE_STRING)));
                    $TraderBirthDate = $_POST['TraderBirthDate'];
                    $TraderEmail = strtolower(trim(filter_input(INPUT_POST, 'TraderEmail', FILTER_SANITIZE_EMAIL)));
                    $TraderPhoneNumber = trim(filter_input(INPUT_POST, 'TraderPhoneNumber', FILTER_SANITIZE_NUMBER_INT));
                    $TraderGender = strtolower($_POST['TraderGender']);
                    $TraderShopCategory = strtolower(trim(filter_input(INPUT_POST, 'TraderShopCategory', FILTER_SANITIZE_STRING)));
                    $TraderPassword = trim(filter_input(INPUT_POST, 'TraderPassword', FILTER_SANITIZE_STRING));
                    $TraderConfirmPassword = trim(filter_input(INPUT_POST, 'TraderConfirmPassword', FILTER_SANITIZE_STRING));
                    $TraderRole = 'trader';
                    
                    /*Check if username is of 5-30 characters*/
                    if(strlen($TraderUserName) >= 5 && strlen($TraderUserName) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$TraderFirstName))
                                {
                                    if(!preg_match($alphabetPattern,$TraderLastName))
                                        {
                                            if(filter_input(INPUT_POST, 'TraderPhoneNumber', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if(!preg_match($alphabetPattern,$TraderShopCategory))
                                                        {
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($TraderPassword,$TraderConfirmPassword)==0)
                                                                {                                                                
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $TraderPassword))
                                                                        {
                                                                            $TraderEncryptedPassword = md5($TraderPassword);
                                                                        /*For inserting into database*/
                                                                            $query = "INSERT INTO APPLY_TRADER (APPLY_ID, USERNAME, FIRST_NAME, LAST_NAME, EMAIL, SHOP_CATEGORY, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                                                                                    VALUES(APPLY_TRADER_S.NEXTVAL, :TraderUserName, :TraderFirstName, :TraderLastName, :TraderEmail, :TraderShopCategory, :TraderGender, :TraderEncryptedPassword, :TraderBirthDate, :TraderAddress , :TraderPhoneNumber)";
                                                                            $result = oci_parse($conn, $query);
                                                                            oci_bind_by_name($result, ':TraderUserName', $TraderUserName);                           
                                                                            oci_bind_by_name($result, ':TraderFirstName', $TraderFirstName);
                                                                            oci_bind_by_name($result, ':TraderLastName', $TraderLastName);
                                                                            oci_bind_by_name($result, ':TraderEmail', $TraderEmail);
                                                                            oci_bind_by_name($result, ':TraderShopCategory', $TraderShopCategory);
                                                                            oci_bind_by_name($result, ':TraderGender', $TraderGender);
                                                                            oci_bind_by_name($result, ':TraderEncryptedPassword', $TraderEncryptedPassword);
                                                                            oci_bind_by_name($result, ':TraderBirthDate', $TraderBirthDate);
                                                                            oci_bind_by_name($result, ':TraderAddress', $TraderAddress);
                                                                            oci_bind_by_name($result, ':TraderPhoneNumber', $TraderPhoneNumber);
                                                                            oci_execute($result);
                                                                            header('Location:./TraderRegisterPage.php?success=Form submitted successfully.');
                                                                        }
                                                                    else
                                                                        {
                                                                            header('Location:./TraderRegisterPage.php?error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header('Location:./TraderRegisterPage.php?error=Please make sure password are matched.');
                                                                }
                                                        }
                                                    else
                                                        {
                                                            header('Location:./TraderRegisterPage.php?error=Please use alphabets only in shop category.');
                                                        }
                                                }
                                            else
                                                {
                                                    header('Location:./TraderRegisterPage.php?error=Please type integer numbers in phone number.');
                                                }
                                        }
                                    else
                                        {
                                            header('Location:./TraderRegisterPage.php?error=Please use alphabets only in lastname.');
                                        }        
                                }   
                                
                            else
                                {
                                    header('Location:./TraderRegisterPage.php?error=Please use alphabets only in firstname.');
                                }
                            
                        }
                    else
                        {   
                            header('Location:./TraderRegisterPage.php?error=Please make sure username is 5 - 30 characters.');                   
                        }
                }
            }
    ?>