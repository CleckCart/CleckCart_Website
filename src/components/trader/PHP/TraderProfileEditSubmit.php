<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id'])){
        $user = $_GET['user'];
        $id = $_GET['id'];
    }
?>
<?php
        /*Check if form is submitted*/
        if (isset($_POST['TraderEdit'])) {
                    $TraderEditId = $_POST['EditTraderId'];
                    $TraderEditUsername = strtolower(trim(filter_input(INPUT_POST, 'TraderEditUsername', FILTER_SANITIZE_STRING)));
                    $TraderEditFirstname = strtolower(trim(filter_input(INPUT_POST, 'TraderEditFirstname', FILTER_SANITIZE_STRING)));
                    $TraderEditLastname = strtolower(trim(filter_input(INPUT_POST, 'TraderEditLastname', FILTER_SANITIZE_STRING)));
                    $TraderEditEmail = strtolower(trim(filter_input(INPUT_POST, 'TraderEditEmail', FILTER_SANITIZE_EMAIL)));
                    $TraderEditPhone = trim(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_SANITIZE_NUMBER_INT));
                    $TraderEditAddress = strtolower(trim(filter_input(INPUT_POST, 'TraderEditAddress', FILTER_SANITIZE_STRING)));
                    $TraderEditDate = $_POST['TraderEditDate'];
                    $TraderEditGender = strtolower($_POST['TraderEditGender']);
                    $TraderEditImage = ($_FILES["TraderEditImage"]["name"]);
                    $TraderEditImageType = ($_FILES["TraderEditImage"]["type"]);
                    $TraderEditImageTmpName = ($_FILES["TraderEditImage"]["tmp_name"]);
                    $TraderEditImageLocation = "TraderImages/" . $TraderEditImage;

                    if(strlen($TraderEditUsername) >= 5 && strlen($TraderEditUsername) <= 30)
                        {      
                            $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$TraderEditFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$TraderEditLastname))
                                        {
                                            if(filter_input(INPUT_POST, 'TraderEditPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if (!empty($_POST['TraderEditDate']))
                                                        {
                                                            if(($TraderEditImageType == "image/jpeg" || $TraderEditImageType == "image/jpg" || $TraderEditImageType == "image/png"))
                                                                {
                                                                    
                                                                    $query = "UPDATE USER_TABLE SET USERNAME=:username FIRST_NAME=:firstname, LAST_NAME=:lastname, EMAIL=:email, GENDER=:gender, DATE_OF_BIRTH=:dateofbirth, ADDERSS=:address, PHONE_NUMBER=:phonenumber WHERE USER_ID=$TraderEditId AND ROLE=:TraderRole";
                                                                    $result = oci_parse($conn, $query);
                                                                    oci_bind_by_name($result, ":username", $TraderEditUsername);
                                                                    oci_bind_by_name($result, ":firstname", $TraderEditFirstname);
                                                                    oci_bind_by_name($result, ":lastname", $TraderEditLastname);
                                                                    oci_bind_by_name($result, ":email", $TraderEditEmail);
                                                                    oci_bind_by_name($result, ":gender", $TraderEditGender);
                                                                    oci_bind_by_name($result, ":dateofbirth", $TraderEditDate);
                                                                    oci_bind_by_name($result, ":address", $TraderEditAddress);
                                                                    oci_bind_by_name($result, ":phonenumber", $TraderEditPhone);
                                                                    oci_execute($result);
                                                                    //header("Location:./TraderManageProfile.php?user=$user&success=Details updates successfully.");
                                                                }
                                                            else
                                                                {
                                                                    header("Location:./TraderManageProfile.php?user=$user&error=Please choose an image.");
                                                                }
                                                        }

                                                    else
                                                        {
                                                            header("Location:./TraderManageProfile.php?user=$user&error=Please pick the added date of the product.");
                                                        }
                                                }
                                            else
                                                {
                                                    header("Location:./TraderManageProfile.php?user=$user&error=Please type integer numbers in phone number.");
                                                }
                                        }
                                    else
                                        {
                                            header("Location:./TraderManageProfile.php?user=$user&error=Please use alphabets only in lastname.");
                                        }        
                                }   
                                
                            else
                                {
                                    header("Location:./TraderManageProfile.php?user=$user&error=Please use alphabets only in firstname.");
                                }
                            
                        }
                    else
                        {   
                            header("Location:./TraderManageProfile.php?user=$user&error=Please make sure username is 5 - 30 characters.");                   
                        }
                }
            
    ?>