<?php
    include('../../trader/PHP/connect.php');
    if(isset($_GET['cartId']) && isset($_GET['totalCartItems']) && isset($_GET['collectionDate']) && isset($_GET['collectionTime'])){
        $guestCartId = $_GET['cartId'];
        $productTotalQuantity = $_GET['totalCartItems'];
        $collectionDate = $_GET['collectionDate'];
        $collectionTime = $_GET['collectionTime'];
    }
?>
<?php
    include('./connectSession.php');
        /*Check if form is submitted*/
        if (isset($_POST['customerRegisterSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['customerUsername']) || empty($_POST['customerFirstname']) || empty($_POST['customerLastname']) || empty($_POST['customerEmail']) 
            || empty($_POST['customerPhone']) || empty($_POST['customerAddress']) || empty($_POST['customerPassword']) || empty($_POST['customerConfirmPassword'])) 
                {
                    header('Location:./Register.php?error=Please make sure all text fields are not empty.');
                }
            else
                {
                    $customerUsername = strtolower(trim(filter_input(INPUT_POST, 'customerUsername', FILTER_SANITIZE_STRING)));
                    $customerFirstname = strtolower(trim(filter_input(INPUT_POST, 'customerFirstname', FILTER_SANITIZE_STRING)));
                    $customerLastname = strtolower(trim(filter_input(INPUT_POST, 'customerLastname', FILTER_SANITIZE_STRING)));
                    $customerBirthDate = $_POST['customerBirthDate'];
                    $customerEmail = strtolower(trim(filter_input(INPUT_POST, 'customerEmail', FILTER_SANITIZE_EMAIL)));
                    $customerGender = strtolower($_POST['customerGender']);
                    $customerPhone = trim(filter_input(INPUT_POST, 'customerPhone', FILTER_SANITIZE_NUMBER_INT));
                    $customerAddress = strtolower(trim(filter_input(INPUT_POST, 'customerAddress', FILTER_SANITIZE_STRING)));
                    $customerPassword = trim(filter_input(INPUT_POST, 'customerPassword', FILTER_SANITIZE_STRING));
                    $customerConfirmPassword = trim(filter_input(INPUT_POST, 'customerConfirmPassword', FILTER_SANITIZE_STRING));
                    $customerRole = 'customer';
                    /*Check if username is of 5-30 characters*/
                    if(strlen($customerUsername) >= 5 && strlen($customerUsername) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$customerFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$customerLastname))
                                        {
                                            if (!empty($_POST['customerBirthDate']))
                                                {
                                                    if(strlen($customerPhone)>=10 && strlen($customerPhone) < 12) 
                                                        {
                                                            
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($customerPassword,$customerConfirmPassword)==0)
                                                                {
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $customerPassword))
                                                                        {
                                                                        /*For inserting into database*/
                                                                            $customer_role = 'customer';
                                                                            $customer_password = md5($customerPassword);
                                            
                                                                            $sql = "INSERT INTO USER_TABLE(USERNAME, ROLE, FIRST_NAME, LAST_NAME, EMAIL, GENDER, PASSWORD, DATE_OF_BIRTH, ADDRESS, PHONE_NUMBER)
                                                                            VALUES(:customerUsername, :customer_role, :customerFirstname, :customerLastname, :customerEmail, :customerGender, :customer_password, :customerBirthDate, :customerAddress, :customerPhone)";
                                                                            
                                                                            $check = oci_parse($conn, $sql);
                                            
                                                                            // bind parameters to statement
                                                                            oci_bind_by_name($check, ':customerUsername', $customerUsername);
                                                                            oci_bind_by_name($check, ':customer_role', $customer_role);
                                                                            oci_bind_by_name($check, ':customerFirstname', $customerFirstname);
                                                                            oci_bind_by_name($check, ':customerLastname', $customerLastname);
                                                                            oci_bind_by_name($check, ':customerEmail', $customerEmail);
                                                                            oci_bind_by_name($check, ':customerGender', $customerGender);
                                                                            oci_bind_by_name($check, ':customer_password', $customer_password);
                                                                            oci_bind_by_name($check, ':customerBirthDate', $customerBirthDate);
                                                                            oci_bind_by_name($check, ':customerAddress', $customerAddress);
                                                                            oci_bind_by_name($check, ':customerPhone', $customerPhone);
                                            
                                                                            // execute statement
                                                                            $result = oci_execute($check);
                                                                            if ($result) {
                                                                            $query = "SELECT * FROM USER_TABLE WHERE USERNAME = '$customerUsername' AND PASSWORD = '$customer_password' AND ROLE ='$customerRole'";
                                                                            $result = oci_parse($conn, $query);
                                                                            oci_execute($result);
                                                                            // Fetch the result
                                                                            $row = oci_fetch_array($result, OCI_ASSOC);
                                                                            if ($row) {
                                                                                // If the user is found, create a session
                                                                                $_SESSION['username'] = $customerUsername;
                                                                                $_SESSION['UserRole'] = $customerRole;
                                                                            }
                                                                            else{
                                                                                $_SESSION['error'] = 'Invalid Credentials!';
                                                                            }
                                                                            header("Location:./CustomerCheckoutSession.php?username=$customerUsername&cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime");
                                                                            } else {
                                                                                header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Error");
                                                                            }

                                                                        }
                                                                    else
                                                                        {
                                                                            header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.");
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Please make sure password are matched.");
                                                                }
                                                        
                                                        }

                                                    else
                                                        {
                                                            header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Please enter a valid phone number.");
                                                        }
                                                }

                                            else
                                                {
                                                    header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Please pick the date for date of birth.");
                                                }
                                            
                                        }
                                    else
                                        {
                                            header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Please use alphabets only in lastname.");
                                        }        
                                }   
                                
                            else
                                {
                                    header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Please use alphabets only in firstname.");
                                }
                            
                        }
                    else
                        {   
                            header("Location:./RegisterCheckout.php?cartId=$guestCartId&totalCartItems=$productTotalQuantity&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Please make sure username is 5 - 30 characters.");                   
                        }
                }
            }
    ?>