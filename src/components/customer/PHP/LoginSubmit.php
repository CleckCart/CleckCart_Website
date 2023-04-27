<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php 
        if (isset($_POST['customerLoginSubmit'])) 
        {
            /*Check if all fields are filled*/ 
            if (empty($_POST['customerLoginUsername']) || empty($_POST['customerLoginPassword']))
                {
                    echo("<div class='alert alert-danger text-center' role='alert'>
                   Please make sure all text fields are not empty.
                 </div>");
                 include('Register.php');
                }

            else
                {
                    $customerLoginUsername = trim(filter_input(INPUT_POST, 'customerLoginUsername', FILTER_SANITIZE_STRING));
                    $customerLoginPassword = trim(filter_input(INPUT_POST, 'customerLoginPassword', FILTER_SANITIZE_STRING));
                    if(strlen($customerLoginUsername) >= 5 && strlen($customerLoginUsername) <= 10)
                        { 
                            $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/';
                            /*Check if password has 6 - 10 characters, 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.*/
                            if(preg_match($passwordPattern, $customerLoginPassword))
                                {
                                 /*For inserting into database*/
                                }
                            else
                                {
                                    echo("<div class='alert alert-danger text-center' role='alert'>
                                         Please enter a valid password.
                                         </div>");
                                          include('Register.php');
                                }
                        }
                    else
                        {                          
                            echo("<div class='alert alert-danger text-center' role='alert'>
                            Please enter a valid username.
                          </div>");
                          include('Register.php');
                        }
                }
        }
    ?>
</body>

</html>