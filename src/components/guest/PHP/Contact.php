<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/contactpage.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src = "../../service/passwordVisibility.js"></script>
        <!--NavBar-->
        <div class = "topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color">
            <div class="container-fluid">
                <a class="navbar-brand" href="./HomePage.php">
                    <img src="./../../../dist/public/logo.png" class="img-fluid" width = "70" height="70" alt="logo">
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
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../../trader/PHP/TraderLogin.php">Log In Trader</a></li>
                                <li><hr class="dropdown-divider"></li>
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

    <div class="container-fluid mt-5 bg-secondary">
        <div class="d-flex flex-column bd-highlight mb-3 text-center">
            <div class = "custom-margin"></div>
            <div class="p-2 bd-highlight">
                <h1 class = "custom-font-heading">Get In Touch</h1>
            </div>
            <div class="p-2 bd-highlight">
                Lorem, ipsum dolor sit amet consectetur
            </div>
            <div class = "custom-margin"></div>
        </div>
    </div>

    <div class = "custom-margin"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 text-center p-5">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <div class="row bg-secondary align-items-center rounded">
                        <div class="col-md-1">
                            <div class="ellipse p-3">
                                <img  src="../../../dist/public/call.svg" alt="call">
                            </div>
                        </div>
                        <div class="col-md-11 text-center">
                            <h6>Phone Number</h6>
                            <p>000-000-000</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 bd-highlight">
                    <div class="row bg-secondary align-items-center rounded">
                        <div class="col-md-1">
                            <div class="ellipse p-3">
                                <img  src="../../../dist/public/message.svg" alt="call">
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h6>Email-Address</h6>
                            <p>cleckcart@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 bd-highlight">
                    <div class="row bg-secondary align-items-center rounded">
                        <div class="col-md-1">
                            <div class="ellipse p-3">
                                <img  src="../../../dist/public/location.svg" alt="call">
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h6>Location</h6>
                            <p>lorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-7 rounded bg-secondary p-5">
            <form method = "POST" action = "ContactSubmit.php" class = "p-5">
                <h1>Send Message</h1>
                <?php
                if(isset($_GET['error'])) {?>
                <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
                <?php }?>
                <?php
                    if(isset($_GET['success'])) {?>
                    <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
                <?php }?>
                <div class="mb-3">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="exampleInputText1" class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter Fullname" aria-label="Full name" name="ContactFullname">
                        </div>
                        <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Enter Email Address" name="ContactEmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="exampleInputText1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Enter Phone Nubmer" aria-label="Phone Number" name="ContactPhone">
                        </div>
                        <div class="col">
                            <label for="exampleInputText1" class="form-label">Subject</label>
                            <input type="text" class="form-control" placeholder="Subject" aria-label="Subject" name="ContactSubject">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="floatingTextarea2" class="form-label">Message</label>
                            <textarea class="form-control" placeholder="Message" style="height: 100px" name="ContactMessage"></textarea>
                        </div>
                    </div>
                    <div class = "custom-margin"></div>
                    <input type="submit" class="btn btn-primary w-25 " value = "Send Message" name = "ContactSendMessage" >
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class = "custom-margin"></div>


    <!--footer-->
    <footer>
    <div class = "container-fluid bg-secondary">
            <div class="row row-cols-2 row-cols-md-4 g-4">
                <div class="col mt-5 text-center">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                    <h3 class = "mt-5">Cleck Cart</h3>
                                    <h5 class = "mt-5">Satisfy your cravings, with local farm savings</h5>
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
                                    <h3 class = "mt-5">Join Us</h3>
                                    <h5 class = "mt-5">Sell on CleckCart</h5>
                            </div>
                        </div>
                </div>
                <div class="col mt-5 text-center">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                    <h3 class = "mt-5">Help</h3>
                                    <h5 class = "mt-5">Pick Up Information</h5>
                                    <h5 class = "mt-2">Lorem ipsum</h5>
                                    <h5 class = "mt-2">Lorem ipsum</h5>
                            </div>
                        </div>
                </div>
                <div class="col mt-5 text-center">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                    <h3 class = "mt-5">Send Us a message</h3>
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