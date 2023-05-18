<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <!--WebPage Icon-->
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <!-- Import the toastr CSS -->
    <link rel="stylesheet" href="../../../../node_modules/toastr/build/toastr.min.css">
    <!-- Import the jQuery library -->
    <script src="../../../../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Import the toastr JavaScript -->
    <script src="../../../../node_modules/toastr/build/toastr.min.js"></script>
    <link rel="stylesheet" href="../CSS/homepage.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src = "../../service/passwordVisibility.js"></script>
    <script src = "../../service/toast.js"></script>
</head>
<body>
    
<?php
            include('./connect.php');
            if(isset($_GET['user'])){
                $user = $_GET['user'];
            }
        ?>
        <!--NavBar-->
        <div class = "topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color">
            <div class="container-fluid">
                <a class="navbar-brand" href="./CustomerSession.php">
                    <img src="./../../../dist/public/logo.png" class="img-fluid" width = "70" height="70" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item me-5">
                            <a class="nav-link mr-3" aria-current="page" href="./CustomerSession.php">HOME</a>
                        </li>

                        <li class="nav-item dropdown me-5"><!---->
                            <a class="nav-link mr-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php echo("<li><a class='dropdown-item' href='./Categories.php?user=$user'>Category</a></li>")?>
                            </ul>
                        </li>

                        <li class="nav-item me-5">
                            <?php echo ("<a class='nav-link' href='#'>SALE</a>");?>
                        </li>

                        <li class="nav-item me-5">
                            <?php echo ("<a class='nav-link mr-3' href='./About.php?user=$user'>ABOUT</a>");?>
                        </li>

                        <li class="nav-item me-5">
                            <?php echo ("<a class='nav-link mr-3' href='./Contact.php?user=$user'>CONTACT</a>");?>
                        </li>
                    </ul>

                    <ul class="d-flex mb-2 mb-lg-0 list-unstyled">
                        <li class="nav-item me-3">
                            <?php echo ("<a class='nav-link' href='#'><img src='./../../../dist/public/search.svg' alt='search'></a>");?>
                        </li>
                        <li class="nav-item me-3">
                            <?php echo ("<a class='nav-link' href='./WishList.php?user=$user'><img src='./../../../dist/public/heart.svg' alt='heart'></a>");?>
                            
                        </li>
                        <li class="nav-item dropdown me-3"><!---->
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./../../../dist/public/person.svg" alt="person">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php echo ("<li><a class='dropdown-item' href='./ProfilePage.php?user=$user'>Manage Profile</a></li>")?>
                                <li><hr class="dropdown-divider"></li>
                                <?php echo ("<li><a class='dropdown-item' href='./MyOrders.php?user=$user'>My Orders</a></li>");?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="./CustomerLogout.php">Log Out</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-5">
                            <?php echo ("<a class='nav-link' href='./Checkout.php?user=$user'><img src='./../../../dist/public/cart.svg' alt='cart'></a>");?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <!--external container-->
    <div class="container-fluid">
        <!--bi-containers-->
        <div class="row row-cols-1 row-cols-lg-2 g-2 m-3">
            <!--first-container-->
            <div class =  "col text-center">
                <div class = "row">
                    <div class = "col-8">
                        <div class = "container-fluid">
                            <h3><p class = "text-start">How Would you like to pay?</p></h3>
                        </div>
                    </div>
                    <div class = "col-4">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <select class="form-select" aria-label="Default select example">
                                <option selected>Country</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "container-fluid">
                    <div class="row row-cols-1 row row-cols-lg-2 g-4">
                            <button type="button" class="btn btn-primary btn-lg btn-block border-0 " style = "background-color: #ffff33; height: 200px"><img src = "../../../dist/public/paypal.png" alt = "paypal"/></button>
                            <button type="button" class="btn btn-primary btn-lg btn-block border-0" id = "stripeButton" onclick = "showToast()" style = "height:200px; background-image: url('../../../dist/public/stripe-background.png')"><img src = "../../../dist/public/stripe.png" alt = "stripe"/></button>
                    </div>
                </div>
                <div class = "container mt-5">
                    <h3><p class = "text-start">Fill up your personal information</p></h3>
                    <form method = "POST" action = "#">
                        <div class="mb-4">
                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="FirstName" aria-label="First name">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="LastName" aria-label="Last name">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Email Address">
                                </div>
                                <div class="col">
                                    <input type="tel" class="form-control" placeholder="Card Number" aria-label="CardNumber">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder = "Expiration Date" aria-label="date">
                                </div>
                                <div class="col">
                                    <input type="tel" class="form-control" placeholder="CVV" aria-label="CVV">
                                </div>
                                <div class="col">
                                    <input type="tel" class="form-control" placeholder="ZIP" aria-label="ZIP">
                                </div>
                            </div>
                            <div class="row mb-3 mt-5">
                                <div class = "d-grid gap-2">
                                    <button type="button" class="btn btn-primary btn-lg btn-block border-0">PAY NOW</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--second containers-->
            <div class =  "col text-center">
                <h3><p>Your Order Summary</p></h3>
                <div class = "container-fluid">
                    <div class = "row">
                        <div class = "col">
                            Item
                        </div>
                        <div class = "col">
                            Quantity
                        </div>
                        <div class = "col">
                            Price
                        </div>
                    </div>
                    <hr style = "height: 10px">
                    <?php
                        for($i = 0; $i < 10; $i++) {
                            echo '<div class = "row mt-3">
                                <div class = "col">
                                    Name
                                </div>
                                <div class = "col">
                                    10
                                </div>
                                <div class = "col">
                                    $$$
                                </div>
                            </div>';
                        }
                        ?>
                </div>
                <div class="d-flex flex-row-reverse bd-highlight">
                    <div class="p-2 bd-highlight">
                        <h5>Total : $$$</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>



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