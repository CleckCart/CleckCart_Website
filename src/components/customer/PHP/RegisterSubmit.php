<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <?php
        /*Check if form is submitted*/
        if (isset($_POST['customerRegisterSubmit'])) {
            /*Check if all fields are filled*/ 
            if (empty($_POST['customerUsername']) || empty($_POST['customerFirstname']) || empty($_POST['customerLastname']) || empty($_POST['customerEmail']) 
            || empty($_POST['customerPhone']) || empty($_POST['customerAddress']) || empty($_POST['customerPassword']) || empty($_POST['customerConfirmPassword'])) 
                {            
                   echo("<div class='alert alert-danger text-center' role='alert'>
                   Please make sure all text fields are not empty.
                 </div>");
                 include('Register.php');
                }
            else
                {
                    $customerUsername = trim(filter_input(INPUT_POST, 'customerUsername', FILTER_SANITIZE_STRING));
                    $customerFirstname = trim(filter_input(INPUT_POST, 'customerFirstname', FILTER_SANITIZE_STRING));
                    $customerLastname = trim(filter_input(INPUT_POST, 'customerLastname', FILTER_SANITIZE_STRING));
                    $customerEmail = trim(filter_input(INPUT_POST, 'customerEmail', FILTER_SANITIZE_EMAIL));
                    $customerPhone = trim(filter_input(INPUT_POST, 'customerPhone', FILTER_SANITIZE_NUMBER_INT));
                    $customerAddress = trim(filter_input(INPUT_POST, 'customerAddress', FILTER_SANITIZE_STRING));
                    $customerPassword = trim(filter_input(INPUT_POST, 'customerPassword', FILTER_SANITIZE_STRING));
                    $customerConfirmPassword = trim(filter_input(INPUT_POST, 'customerConfirmPassword', FILTER_SANITIZE_STRING));
                    /*Check if username is of 5-10 characters*/
                    if(strlen($customerUsername) >= 5 && strlen($customerUsername) <= 10)
                        {      
                            $alphabetPattern = "/[^a-zA-Z]/";
                            if(!preg_match($alphabetPattern,$customerFirstname))
                                {
                                    if(!preg_match($alphabetPattern,$customerLastname))
                                        {
                                            if(filter_input(INPUT_POST, 'customerPhone', FILTER_VALIDATE_INT) == true)
                                                {
                                                    if(!preg_match($alphabetPattern,$customerAddress))
                                                        {
                                                            /*Check if password and confirm password matches*/
                                                            if(strcmp($customerPassword,$customerConfirmPassword)==0)
                                                                {
                                                                    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                                                                    /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                                                                    if(preg_match($passwordPattern, $customerPassword))
                                                                        {
                                                                        /*For inserting into database*/
                                                                        }
                                                                    else
                                                                        {
                                                                            echo("<div class='alert alert-danger text-center' role='alert'>
                                                                            Password must have 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.
                                                                            </div>");
                                                                            include('Register.php');
                                                                        }
                                                                }
                                                            else
                                                                {
                                                                    echo("<div class='alert alert-danger text-center' role='alert'>
                                                                    Please make sure password are matched.
                                                                    </div>");
                                                                    include('Register.php');
                                                                }
                                                        }
                                                    else
                                                        {
                                                            echo("<div class='alert alert-danger text-center' role='alert'>
                                                            Please use alphabets only in address.
                                                            </div>");
                                                            include('Register.php');
                                                        }
                                                }
                                            else
                                                {
                                                    echo("<div class='alert alert-danger text-center' role='alert'>
                                                            Please type integer numbers in phone number.
                                                            </div>");
                                                            include('Register.php');
                                                }
                                        }
                                    else
                                        {
                                            echo("<div class='alert alert-danger text-center' role='alert'>
                                            Please use alphabets only in lastname.
                                            </div>");
                                            include('Register.php');
                                        }        
                                }   
                                
                            else
                                {
                                    echo("<div class='alert alert-danger text-center' role='alert'>
                                            Please use alphabets only in firstname.
                                            </div>");
                                    include('Register.php');
                                }
                            
                        }
                    else
                        {                          
                            echo("<div class='alert alert-danger text-center' role='alert'>
                            Please make sure username is 5 - 10 characters.
                          </div>");
                          include('Register.php');
                        }
                }
            }
    ?>
</body>

</html>