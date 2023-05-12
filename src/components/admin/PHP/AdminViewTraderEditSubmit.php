<?php
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
?>
<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderEditSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderEditFirstName']) || empty($_POST['TraderEditLastName']) || empty($_POST['TraderEditEmail']) 
            || empty($_POST['TraderEditPhone']) || empty($_POST['TraderEditAddress'])) 
                {
                    header('Location:./AdminViewTrader.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $TraderEditId = $_POST['EditTraderId'];
                    $TraderEditFirstname = strtolower(trim(filter_input(INPUT_POST, 'TraderEditFirstName', FILTER_SANITIZE_STRING)));
                    $TraderEditLastname = strtolower(trim(filter_input(INPUT_POST, 'TraderEditLastName', FILTER_SANITIZE_STRING)));
                    $TraderEditEmail = strtolower(trim(filter_input(INPUT_POST, 'TraderEditEmail', FILTER_SANITIZE_EMAIL)));
                    $TraderEditPhone = trim(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $TraderEditAddress = strtolower(trim(filter_input(INPUT_POST, 'TraderEditAddress', FILTER_SANITIZE_STRING)));
                    $TraderEditDate = $_POST['TraderEditDate'];
                    $TraderEditGender = $_POST['TraderEditGender'];
                    $TraderRole = 'trader';
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                    if(!preg_match($alphabetPattern,$TraderEditFirstname))
                        {
                            if(!preg_match($alphabetPattern,$TraderEditLastname))
                                {
                                    if(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_VALIDATE_INT) == true)
                                        {
                                            if (!empty($_POST['TraderEditDate']))
                                                {
                                                    include('connect.php');
                                                    $UpdateUserQuery = "UPDATE USER_TABLE SET FIRST_NAME=:TraderFirstname, LAST_NAME=:TraderLastname, EMAIL=:TraderEmail, GENDER=:TraderGender, DATE_OF_BIRTH=:TraderDate, ADDRESS=:TraderAddress, PHONE_NUMBER=:TraderPhone WHERE USER_ID = $TraderEditId AND ROLE=:TraderRole"; 
                                                    $RunUpdateUserQuery = oci_parse($conn, $UpdateUserQuery);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderRole', $TraderRole);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderFirstname', $TraderEditFirstname);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderLastname', $TraderEditLastname);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderEmail', $TraderEditEmail);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderGender', $TraderEditGender);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderDate', $TraderEditDate);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderAddress', $TraderEditAddress);
                                                    oci_bind_by_name($RunUpdateUserQuery, ':TraderPhone', $TraderEditPhone);
                                                    oci_execute($RunUpdateUserQuery); 
                                                    header("Location:./AdminViewTraderPage.php?user=$user&success=Customer details successfully updated.");
                                                }

                                            else
                                                {
                                                    header("Location:./AdminViewTrader.php?user=$user&error=Please pick the date for date of birth.");
                                                }
                                        }
                                    else
                                        {
                                            header("Location:./AdminViewTrader.php?user=$user&error=Please type integer numbers in phone number.");
                                        }
                                }
                            else
                                {
                                    header("Location:./AdminViewTrader.php?user=$user&error=Please use alphabets only in lastname.");
                                }
                        }
                    else
                        {
                            header("Location:./AdminViewTrader.php?user=$user&error=Please use alphabets only in firstname.");
                        }
                }
            }
    ?>