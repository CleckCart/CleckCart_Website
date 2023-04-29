<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleckCart</title>
    <link rel="icon" href="./../../../dist/public/logo.png" sizes="16x16 32x32" type="image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/contactpage.css">
    <style>
        .error_msg {
            color: red;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../service/passwordVisibility.js"></script>
    <!--NavBar-->
    <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color">
            <div class="container-fluid">
                <a class="navbar-brand" href="./HomePage.php">
                    <img src="./../../../dist/public/logo.png" class="img-fluid" width="70" height="70" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item me-5">
                            <a class="nav-link mr-3" aria-current="page" href="./HomePage.php">HOME</a>
                        </li>

                        <li class="nav-item dropdown me-5"><!---->
                            <a class="nav-link mr-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./Categories.php">Category</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link" href="#">SALE</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3" href="./About.php">ABOUT</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3" href="./Contact.php">CONTACT</a>
                        </li>
                    </ul>

                    <ul class="d-flex mb-2 mb-lg-0 list-unstyled">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#"><img src="./../../../dist/public/search.svg" alt="search"></a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#"><img src="./../../../dist/public/heart.svg" alt="heart"></a>
                        </li>
                        <li class="nav-item dropdown me-3"><!---->
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./../../../dist/public/person.svg" alt="person">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Log In Customer</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Log In Trader</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./Register.php">Sign In</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Log Out</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="#"><img src="./../../../dist/public/cart.svg" alt="cart"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="LoginSubmit.php">
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                    </div>
                                    <div class="col text-end">
                                        <label class="form-link-label" for="exampleLink1"><a class="text-reset" href="#">Forgot Password?</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary w-100" value="Log In">
                                <div class="d-flex flex-column text-center mt-5">
                                    <div class="row">
                                        <label for="exampleInputText1" class="form-label">Don't Have an Account?</label>
                                    </div>
                                    <div class="row">
                                        <label class="form-link-label" for="exampleLink1">
                                            <a class="fs-6 text-reset" href="./Register.php">Sign Up</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h2 style="margin-bottom:2vh">Your Information</h2>
            </div>
            <div class="col"></div>
        </div>

    </div>
    <div class="container">
        <form>
            <fieldset disabled>
                <div class="row">
                    <div class="col">
                        <img src="../../../dist/public/3.jpg" class="rounded-circle pull-right" alt="profile pic" width="200" height="200">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="disabledTextInput-fn" class="form-label">First Name</label>
                            <input type="text" id="disabledTextInput-fn" class="form-control" placeholder="First Name">
                            <label for="disabledTextInput-pn" class="form-label" style="margin-top:1.5vh">Phone Number</label>
                            <input type="text" id="disabledTextInput-pn" class="form-control" placeholder="Phone Number">
                            <label for="disabledTextInput-add" class="form-label" style="margin-top:1.5vh">Address</label>
                            <input type="text" id="disabledTextInput-add" class="form-control" placeholder="Address">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="disabledTextInput-ln" class="form-label">Last Name</label>
                            <input type="text" id="disabledTextInput-ln" class="form-control" placeholder="Last Name">
                            <label for="disabledTextInput-email" class="form-label" style="margin-top:1.5vh">Email Address</label>
                            <input type="text" id="disabledTextInput-email" class="form-control" placeholder="Email Address">
                            <label for="disabledTextInput-g" class="form-label" style="margin-top:1.5vh">Gender</label>
                            <input type="text" id="disabledTextInput-g" class="form-control" placeholder="Gender">
                        </div>
                    </div>
            </fieldset>
        </form>
    </div>
    <?php
    $firstname_error = $lastname_error = $phone_error = $address_error = "";


    if (isset($_POST['update'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['Email'];
        $phone = $_POST['phone'];
        $address = $_POST['Address'];
        $gender = $_POST['gend'];
        $photo = $_POST['photo'];

        $alphabetPattern = "/[^a-zA-Z]/";
        // $pass="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s:])([^\s]){8,}$/";
        if (preg_match($alphabetPattern, $firstname)) {
            $firstname_error = "**Please use alphabets only in First Name";
        }
        if (preg_match($alphabetPattern, $lastname)) {
            $lastname_error = "**Please use alphabets only in Last Name";
        }
        if (!preg_match('/^[0-9]{10}$/', $phone)) {
            $phone_error = "**Enter a valid phone number";
        }


        // if (!preg_match('/[a-z][A-Z][A-za-z][A-za-z0-9]/', $address)) {
        //     $address_error = "Enter a valid address";
        // } 
        // else {
        //     $sql = ""; //database update here
        // }
    }
    ?>
    <div class="container" style="margin-top:3vh">
        <div class="row">
            <div class="col"></div>
            <div class="col">

                <!-- Button trigger modal for edit profile-->

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile">Edit Profile</button>

                <!-- Modal for Edit Profile-->
                <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content ">
                            <div class="modal-header text-center">

                                <h1 class="modal-title fs-5 w-100" id="staticBackdropLabel">Edit Profile</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                            </div>
                            <div class="modal-body">

                                <div class="container">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <label for="firstname">First Name</label>
                                                <span class="error_msg"><?php echo $firstname_error; ?></span>
                                                <input type="text" id="firstname" class="form-control form-control-sm" name="first_name" placeholder="First name">

                                                <label for="email" style="margin-top:1.5vh">Email</label>
                                                <input type="text" id="email" class="form-control form-control-sm" name="Email" placeholder="Email Address">
                                                <label for="address" style="margin-top:1.5vh">Address</label>

                                                <input type="text" id="address" class="form-control form-control-sm" name="Address" placeholder="Address">
                                                <label for="photo" style="margin-top:3vh">Profile Picture</label>
                                                <input type="file" id="photo" class="form-control form-control-sm" name="photo">
                                            </div>
                                            <div class="col">
                                                <label for="lastname">Last Name</label>
                                                <span class="error_msg"><?php echo $lastname_error; ?></span>

                                                <input type="text" id="lastname" class="form-control form-control-sm" name="last_name" placeholder="Last name">
                                                <label for="phoneno" style="margin-top:1.5vh">Phone Number</label>
                                                <span class="error_msg"><?php echo $phone_error;?></span>

                                                <input type="text" id="phoneno" class="form-control form-control-sm" name="phone" placeholder="Phone Number">
                                                <label for="gender" style="margin-top:1.5vh">Gender</label>
                                                <input type="text" id="gender" class="form-control form-control-sm" name="gend" placeholder="Gender">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->

                                <input type="submit" class="w-100 btn btn-primary" name="update" value="Update">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal to change password-->
                <input type="submit" class="btn btn-primary" name="password" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="Change Password">


                <!-- Modal for editing password -->

                <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h1 class="modal-title fs-5 w-100" id="staticBackdropLabel">Change Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form>
                                        <div class="row">
                                            <div class="col">
                                                <label for="current-password">Enter Current Password</label>
                                                <input type="password" id="current-password" class="form-control form-control-sm" placeholder="Current Password">
                                                <label for="new-password" style="margin-top:3vh">Enter New Password</label>
                                                <input type="password" id="new-password" class="form-control form-control-sm" placeholder="New Password">
                                                <label for="re-enter-new-password" style="margin-top:3vh">Re-Enter New Password</label>
                                                <input type="text" id="re-enter-new-password" class="form-control form-control-sm" placeholder="New Password" style="margin-bottom:3vh">

                                            </div>
                                            <div class="col">
                                                <img src="../../../dist/public/3.jpg" class="rounded-circle pull-right" alt="profile pic" width="120" height="120">
                                                <input type="submit" class=" w-100 btn btn-primary btn-sm" style="margin-top:6.5vh" value="Update Password">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="modal-footer"> -->
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
    </div>





    <footer>
        <footer class="page-footer font-small pt-5">

            <div class="container-fluid bg-secondary">
                <div class="row row-cols-2 row-cols-md-4 g-4">
                    <div class="col mt-5 text-center">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <h3 class="mt-5">Cleck Cart</h3>
                                <h5 class="mt-5">Satisfy your cravings, with local farm savings</h5>
                            </div>
                            <div class="d-flex flex-row flex-wrap p-2 align-self-center">
                                <a class="nav-link p-3" href="#"><img src="./../../../dist/public/twitter.svg" alt="twitter"></a>
                                <a class="nav-link p-3" href="#"><img src="./../../../dist/public/facebook.svg" alt="facebook"></a>
                                <a class="nav-link p-3" href="#"><img src="./../../../dist/public/instagram.svg" alt="instagram"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-5 text-center">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <h3 class="mt-5">Join Us</h3>
                                <h5 class="mt-5">Sell on CleckCart</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-5 text-center">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <h3 class="mt-5">Help</h3>
                                <h5 class="mt-5">Pick Up Information</h5>
                                <h5 class="mt-2">Lorem ipsum</h5>
                                <h5 class="mt-2">Lorem ipsum</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-5 text-center">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <h3 class="mt-5">Send Us a message</h3>
                            </div>
                            <div class="p-2 bd-highlight">
                                <a class="nav-link text-reset text-decoration-none" href="#"><img src="./../../../dist/public/location.svg" alt="twitter"> lorem ipsum </a>
                                <a class="nav-link text-reset text-decoration-none" href="#"><img src="./../../../dist/public/call.svg" alt="call"> lorem ipsum </a>
                                <a class="nav-link text-reset text-decoration-none" href="#"><img src="./../../../dist/public/message.svg" alt="instagram"> lorem ipsum </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

</body>

</html>