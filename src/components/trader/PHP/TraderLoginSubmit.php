<?php

 /*Check if form is submitted*/
 if(isset($_POST['TraderLoginSubmit'])){
    include('./connectSession.php');
    /*Check if all fields are filled*/ 
    if (empty($_POST['TraderLoginUsername']) || empty($_POST['TraderLoginPassword'])){
        header('Location:./TraderLogin.php?error=Please make sure all text fields are not empty.');
    }
    else{
        $TraderLoginUsername = strtolower(trim(filter_input(INPUT_POST, 'TraderLoginUsername', FILTER_SANITIZE_STRING)));
        $TraderLoginPassword = trim(filter_input(INPUT_POST, 'TraderLoginPassword', FILTER_SANITIZE_STRING));
        $UserRole = $_POST['UserRole'];
        /*Check if username is of 5-10 characters*/
        if(strlen($TraderLoginUsername) >= 5 && strlen($TraderLoginUsername) <= 30){
                $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                if(preg_match($passwordPattern, $TraderLoginPassword))
                    {
                        //Gather detail submitted from POST and store 
                        if (!$conn) {
                            $error_message = "Unable to connect to the database.";
                        } else {
                            if($UserRole == "Admin"){
                                $encryptedPassword = md5($TraderLoginPassword);
                                $query = "SELECT * FROM USER_TABLE WHERE USERNAME = '$TraderLoginUsername' AND PASSWORD = '$encryptedPassword' AND ROLE ='admin'";
                                $result = oci_parse($conn, $query);
                                oci_execute($result);
                                // Fetch the result
                                $row = oci_fetch_array($result, OCI_ASSOC);
                                if ($row) {
                                    // If the user is found, create a session
                                    $_SESSION['username'] = $TraderLoginUsername;
                                    $_SESSION['UserRole'] = $UserRole;
                                    
                                }
                                else {
                                        $_SESSION['error'] = 'Invalid Credentials!';
                                    }
                                header('Location:../../admin/PHP/AdminSession.php');
                            }
                            else if($UserRole == "Trader"){
                                $encryptedPassword = md5($TraderLoginPassword);
                                $query = "SELECT * FROM USER_TABLE WHERE USERNAME = '$TraderLoginUsername' AND PASSWORD = '$encryptedPassword' AND ROLE ='trader'";
                                $result = oci_parse($conn, $query);
                                oci_execute($result);
                                // Fetch the result
                                $row = oci_fetch_array($result, OCI_ASSOC);
                                if ($row) {
                                    // If the user is found, create a session
                                    $_SESSION['username'] = $TraderLoginUsername;
                                    $_SESSION['UserRole'] = $UserRole;
                                    echo($_SESSION['UserRole']);
                                }
                                else {
                                        $_SESSION['error'] = 'Invalid Credentials!';
                                    }
                                header('Location:./TraderSession.php');
                            }
                        }
                    }
                else
                    {
                        header('Location:./TraderLogin.php?error=Please enter a valid password.');
                    }
            }
            else{
                header('Location:./TraderLogin.php?error=Please enter a valid username.');

            }
        }
    }
?>