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
                                <li><a class="dropdown-item" href="./CustomerLogin.php">Log In Customer</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./ProfilePage.php">Manage Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./MyOrders.php">My Orders</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./CustomerLogin.php">Log In Trader</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./Register.php">Sign Up Customer</a></li>
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

    </div>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h2 style="margin-bottom:3vh;margin-top:3vh">Your Information</h2>
            </div>
            <div class="col "></div>
        </div>

    </div>
    <div class="container">
        <form>
            <fieldset disabled>
                <div class="row ">
                    <div class="col">
                        <img src="../../../dist/public/3.jpg" class="rounded-circle pull-right" alt="profile pic" width="200" height="200">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="disabledTextInput-fn" class="form-label">First Name</label>
                            <input type="text" id="disabledTextInput-fn" class="form-control" placeholder="First Name">
                            <label for="disabledTextInput-g" class="form-label" style="margin-top:1.5vh">Username</label>
                            <input type="text" id="disabledTextInput-g" class="form-control" placeholder="Username">
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
                            <label for="disabledTextInput-pn" class="form-label" style="margin-top:1.5vh">Phone Number</label>
                            <input type="text" id="disabledTextInput-pn" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
            </fieldset>
        </form>
    </div>

    <div class="container" style="margin-top:5vh;margin-bottom:2vh;">
        <div class="row ">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
                <a class="btn btn-primary d-block mx-auto" href="ProfileUpdate.php" role="button">Edit Profile</a>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-primary d-block mx-auto" href="PasswordUpdate.php" role="button">Update Password</a>
            </div>
            <div class="col-sm-4"></div>



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
    </div>


<!-- <footer> -->
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
                        <a class="nav-link p-3" href="https://twitter.com/" target="_blank"><img src="./../../../dist/public/twitter.svg" alt="twitter"></a>
                        <a class="nav-link p-3" href="https://www.facebook.com/" target="_blank"><img src="./../../../dist/public/facebook.svg" alt="facebook"></a>
                        <a class="nav-link p-3" href="https://www.instagram.com/" target="_blank"><img src="./../../../dist/public/instagram.svg" alt="instagram"></a>
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