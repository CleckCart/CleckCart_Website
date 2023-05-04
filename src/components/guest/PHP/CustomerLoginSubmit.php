<?php
 /*Check if form is submitted*/
 if(isset($_POST['CustomerLoginSubmit'])){
    include('./connectSession.php');
    /*Check if all fields are filled*/ 
    if (empty($_POST['CustomerLoginUsername']) || empty($_POST['CustomerLoginPassword'])){
        header('Location:./CustomerLogin.php?error=Please make sure all text fields are not empty.');
    }
    else{
        $CustomerLoginUsername = trim(filter_input(INPUT_POST, 'CustomerLoginUsername', FILTER_SANITIZE_STRING));
        $CustomerLoginPassword = trim(filter_input(INPUT_POST, 'CustomerLoginPassword', FILTER_SANITIZE_STRING));
        $CustomerRole="Customer";
        /*Check if username is of 5-10 characters*/
        if(strlen($CustomerLoginUsername) >= 5 && strlen($CustomerLoginUsername) <= 10){
                $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                if(preg_match($passwordPattern, $CustomerLoginPassword))
                    {
                        if (!$conn) {
                            $error_message = "Unable to connect to the database.";
                        } else {
                            $encryptedPassword = md5($CustomerLoginPassword);
                            $query = "SELECT * FROM USER_TABLE WHERE USERNAME = '$CustomerLoginUsername' AND PASSWORD = '$encryptedPassword' AND ROLE ='$CustomerRole'";
                            $result = oci_parse($conn, $query);
                            oci_execute($result);
                            // Fetch the result
                            $row = oci_fetch_array($result, OCI_ASSOC);
                            if ($row) {
                                // If the user is found, create a session
                                $_SESSION['username'] = $CustomerLoginUsername;
                                $_SESSION['UserRole'] = $CustomerRole;
                            }
                            else{
                                    $_SESSION['error'] = 'Invalid Credentials!';
                            }
                            header('Location:../../customer/PHP/CustomerSession.php');
                        }
                    }
                else
                    {
                        header('Location:./CustomerLogin.php?error=Please enter a valid password.');
                    }
            }
            else{
                header('Location:./CustomerLogin.php?error=Please enter a valid username.');
            }
        }
    }
?>