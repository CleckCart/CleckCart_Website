<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <!--WebPage Icon-->
    <link rel="icon" href="./../../../dist/public/logo.png" sizes="16x16 32x32" type="image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/homepage.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../service/passwordVisibility.js"></script>
    <?php
    include('./connect.php');
    include('../../trader/PHP/connect.php');
    if(isset($_GET['cartId']) && isset($_GET['totalCartItems']) && isset($_GET['collectionDate']) && isset($_GET['collectionTime'])){
        $guestCartId = $_GET['cartId'];
        $productTotalQuantity = $_GET['totalCartItems'];
        $collectionDate = $_GET['collectionDate'];
        $collectionTime = $_GET['collectionTime'];
    }
    ?>
            <!--NavBar-->
            <div class = "topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../guest/PHP/HomePage.php">
                    <img src="./../../../dist/public/logo.png" class="img-fluid rounded-circle img-thumbnail" width = "80" height="70" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-light" aria-current="page" href="../../guest/PHP/HomePage.php">HOME</a>
                        </li>

                        <li class="nav-item dropdown me-5"><!---->
                            <a class="nav-link mr-3 dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-success" href="../../guest/PHP/Categories.php">CATEGORY</a></li>
                            </ul>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link text-light" href="../../guest/PHP/Sale.php">SALE</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-light" href="../../guest/PHP/About.php">ABOUT</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-light" href="../../guest/PHP/Contact.php">CONTACT</a>
                        </li>
                    </ul>

                    <ul class="d-flex mb-2 mb-lg-0 list-unstyled">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="./../../guest/PHP/ShopNow.php"><i class="fa-solid fa-magnifying-glass fa-lg text-white"></i></a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="../../guest/PHP/WishList.php"><i class="fa-regular fa-heart fa-lg text-white"></i></a>
                        </li>
                        <li class="nav-item dropdown me-3"><!---->
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user fa-lg text-white"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-success" href="../../guest/PHP/CustomerLogin.php">Log In Customer</a></li>
                                <li>
                                    <hr class="dropdown-divider text-success">
                                </li>
                                <li><a class="dropdown-item text-success" href="../../trader/PHP/TraderLogin.php">Log In Trader</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="../../guest/PHP/Checkout.php"><i class="fa-solid fa-cart-shopping fa-lg text-white" ></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container bg-light border rounded mt-5 mb-5">
        <div class = "row m-4 p-4 g-4 text-center ">
            <div class="row ">
                <h1>Enter Your OTP</h1>
            </div>
            <div class="row p-3 ">
                <h6 class="text-muted">Please enter the OTP you received in your mail.</h6>
            </div>
        </div>
        <div class = "row">
                <div class="col-sm-4 "></div>
                <div class="col-sm-4">
                    <form method = "POST" action = "./VerifyEmailOtpProcess.php">
                        <?php
                            if(isset($_GET['error'])) {?>
                            <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
                        <?php }?>
                        <?php
                            if(isset($_GET['success'])) {?>
                            <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
                        <?php }?>
                        
                            <div class="mb-3 col">
                                <label for="exampleInputText1" class="form-label">Enter OTP</label>
                                <input type="number" class="form-control" placeholder="123456" aria-label="OTP" name = "TraderOTP">
                                
                            </div>
                            <div class="mb-3 col mt-4">
                                <input type="submit" class="btn btn-success w-100" name = "TraderVerify" value="Verify">
                            </div>             
                    </form>
                </div>
            </div>
            
    </div>
    <div class="container mt-5">&nbsp;</div>
    <div class="container mt-5">&nbsp;</div>
    <footer>
        <div class="container-fluid bg-success" style="color: white;">
            <div class="row row-cols-2 row-cols-md-4 g-4">
                <div class="col mt-2 text-center">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h3 class="mt-5">Cleck Cart</h3>
                            <h5 class="mt-4">Satisfy your cravings, with local farm savings.</h5>
                            <h6>&#169; 2023 CleckCart. All rights reserved.</h6>
                        </div>
                        <div class="d-flex flex-row flex-wrap p-2 align-self-center">
                            <a class="nav-link p-3" href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter fa-2xl" style="color: #ffffff;"></i></a>
                            <a class="nav-link p-3" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook fa-2xl" style="color: #ffffff;"></i></a>
                            <a class="nav-link p-3" href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram fa-2xl" style="color: #ffffff;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 text-center">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h3 class="mt-5">Join Us</h3>
                            <a href="./../../trader/PHP/TraderRegisterPage.php" class='text-decoration-none text-light' target="_blank"><h5 class="mt-5">Sell on CleckCart</h5></a>
                            <a href="./Register.php" class='text-decoration-none text-light' target="_blank"><h5 class="mt-3">Buy from CleckCart</h5></a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 text-center">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h3 class="mt-5">Help</h3>
                            <a href="./Contact.php" class='text-decoration-none text-light' target="_blank"><h5 class="mt-4 mb-3">Contact Us</h5></a>
                            <a href="#" class='text-decoration-none text-light'><h5 class="mb-3">Back to top</h5></a>
                            <a class='text-decoration-none text-light' target="_blank"><h5 class="mb-3">Opens From<br> 10:00 - 19:00</h5></a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 text-center">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h3 class="mt-5">Send Us a message</h3>
                        </div>
                        <div class="p-2 bd-highlight text-center">
                            <a class="nav-link text-reset text-decoration-none"><i class="fa-solid fa-location-dot fa-xl" style="color: #ffffff;"></i>&nbsp;Cleckhuddersfax, UK </a>
                            <a class="nav-link text-reset text-decoration-none"><i class="fa-solid fa-phone fa-xl" style="color: #ffffff;"></i>&nbsp;01632 960315 </a>
                            <a class="nav-link text-reset text-decoration-none" href="https://mail.google.com/?" target="_blank"><i class="fa-regular fa-envelope fa-xl" style="color: #ffffff;"></i>&nbsp;cleckcart@gmail.com </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</body>
</html>