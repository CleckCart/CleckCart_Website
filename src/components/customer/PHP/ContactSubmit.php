<?php
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
?>
<?php
include('../../trader/PHP/connect.php');
/*Check if form is submitted*/
if (isset($_POST['ContactSendMessage'])) {
    /*Check if all fields are filled*/ 
    if (empty($_POST['ContactFullname']) || empty($_POST['ContactEmail']) || empty($_POST['ContactPhone']) || empty($_POST['ContactSubject']) 
    || empty($_POST['ContactMessage'])) 
        {
            header("Location:./Contact.php?user=$user&error=Please make sure all text fields are not empty.");
        }
    else
        {
            $ContactFullname = strtolower(trim(filter_input(INPUT_POST, 'ContactFullname', FILTER_SANITIZE_STRING)));
            $ContactEmail= strtolower(trim(filter_input(INPUT_POST, 'ContactEmail', FILTER_SANITIZE_EMAIL)));
            $ContactPhone = trim(filter_input(INPUT_POST, 'ContactPhone', FILTER_SANITIZE_NUMBER_INT));
            $ContactSubject = strtolower(trim(filter_input(INPUT_POST, 'ContactSubject', FILTER_SANITIZE_STRING)));
            $ContactMessage = strtolower(trim(filter_input(INPUT_POST, 'ContactMessage', FILTER_SANITIZE_STRING)));
            $alphabetPattern = "/[^a-zA-Z\s]/";
                    if(!preg_match($alphabetPattern,$ContactFullname))
                        {
                                    if(filter_input(INPUT_POST, 'ContactPhone', FILTER_VALIDATE_INT) == true)
                                        {
                                                    if(!preg_match($alphabetPattern,$ContactSubject))
                                                        {
                                                            if(!preg_match($alphabetPattern,$ContactMessage))
                                                                {
                                                                    $query = "INSERT INTO CONTACT_US (CONTACT_ID, NAME, EMAIL, PHONE_NUMBER, SUBJECT, MESSAGE) VALUES (CONTACT_US_S.NEXTVAL, :ContactFullname, :ContactEmail, :ContactPhone, :ContactSubject, :ContactMessage)";

                                                                    $result = oci_parse($conn, $query);

                                                                    oci_bind_by_name($result, ':ContactFullname', $ContactFullname);
                                                                    oci_bind_by_name($result, ':ContactEmail', $ContactEmail);
                                                                    oci_bind_by_name($result, ':ContactPhone', $ContactPhone);
                                                                    oci_bind_by_name($result, ':ContactSubject', $ContactSubject);
                                                                    oci_bind_by_name($result, ':ContactMessage', $ContactMessage);

                                                                    oci_execute($result);
                                                                    header("Location:./Contact.php?user=$user&success=Form submitted successfully.");
                                                                }
                                                            else
                                                                {
                                                                    header("Location:./Contact.php?user=$user&error=Please use alphabets only in message field.");
                                                                }
                                                        }
                                                    else
                                                        {
                                                            header("Location:./Contact.php?user=$user&error=Please use alphabets only in subject.");
                                                        }
                                        }
                                    else
                                        {
                                            header("Location:./Contact.php?user=$user&error=Please type integer numbers in phone number.");
                                        }
                            }
                    else
                        {
                            header("Location:./Contact.php?user=$user&error=Please use alphabets only in fullname.");
                        }
                }
        }
    ?>