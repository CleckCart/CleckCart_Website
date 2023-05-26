<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
    <script src="https://www.paypal.com/sdk/js?client-id=AarTuLub3lSk6uTiV1S7315Ko-KglQS4W_ugQBmhoahLhCblaJ76IoA5rcdSUOatI1IDOachafdJLhOW&disable-funding=credit,card&currency=GBP"></script>
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
        <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color bg-success">
            <div class="container-fluid">
                <?php echo("<a class='navbar-brand' href='./CustomerSession.php?user=$user'>"); ?>
                    <img src="./../../../dist/public/logo.jpg" class="img-fluid rounded-circle img-thumbnail" width="80" height="70" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item me-5">
                            <?php echo("<a class='nav-link mr-3 text-light' aria-current='page' href='./CustomerSession.php?user=$user'>HOME</a>"); ?>
                        </li>

                        <li class="nav-item dropdown me-5"><!---->
                            <a class='nav-link mr-3 dropdown-toggle text-light' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php echo("<li><a class='dropdown-item text-success' href='./Categories.php?user=$user'>CATEGORY</a></li>"); ?>
                            </ul>
                        </li>

                        <li class="nav-item me-5">
                        <?php echo("<a class='nav-link mr-3 text-light' href='./Sale.php?user=$user'>SALE</a>"); ?>

                        </li>

                        <li class="nav-item me-5">
                            <?php echo("<a class='nav-link mr-3 text-light' href='./About.php?user=$user'>ABOUT</a>"); ?>
                        </li>

                        <li class="nav-item me-5">
                            <?php echo("<a class='nav-link mr-3 text-light' href='./Contact.php?user=$user'>CONTACT</a>"); ?>
                        </li>
                    </ul>

                    <ul class="d-flex mb-2 mb-lg-0 list-unstyled">
                        <li class="nav-item me-3">
                        <?php echo("<a class='nav-link' href='./ShopNow.php?user=$user'><i class='fa-solid fa-magnifying-glass fa-lg text-white'></i></a>"); ?>
                        </li>
                        <li class="nav-item me-3">
                            <?php echo("<a class='nav-link' href='./WishList.php?user=$user'><i class='fa-regular fa-heart fa-lg text-white'></i></a>"); ?>
                        </li>

                        <li class="nav-item dropdown me-3">
                            <a class='nav-link' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class="fa-regular fa-user fa-lg text-white"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php echo ("<li><a class='dropdown-item text-success' href='./ProfilePage.php?user=$user'>Manage Profile</a></li>")?>
                                <li><hr class="dropdown-divider"></li>
                                <?php echo ("<li><a class='dropdown-item text-success' href='./MyOrders.php?user=$user'>My Orders</a></li>");?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-success" href="./CustomerLogout.php">Log Out</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-5">
                            <?php echo("<a class='nav-link' href='./Checkout.php?user=$user'><i class='fa-solid fa-cart-shopping fa-lg text-white' ></i></a>"); ?>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>
    </div>


    <!--external container-->
    <div class="container-fluid">
        <!--bi-containers-->
        <div class="row row-cols-1 row-cols-lg-2 g-2 m-3 mt-5">
            <!--first-container-->
            <div class =  "col text-center">
                <div class = "row">
                    <div class = "col-8">
                        <div class = "container-fluid ">
                            <h3><p class = "text-start">How would you like to pay?</p></h3>
                        </div>
                    </div>
                </div>
                <div class = "container-fluid mb-5 mt-5 ">
                    <div class="row row-cols-1 row row-cols-lg-1 g-4 p-3">
                            <div class = "m-5 w-75" id="paypal-payment-button">
                            </div>
                            <div class = "m-3 w-75">
                            </div>
                            <!-- <button type="button" class="btn btn-primary btn-lg btn-block border-0 " id = "paypal-payment-button" style = "background-color: #ffff33; height: 200px"><img src = "../../../dist/public/paypal.png" alt = "paypal"/></button> -->
                            <button type="button" class="btn btn-primary w-75 m-5" id = "stripeButton" onclick = "showToast()" style = " background-image: url('../../../dist/public/stripe-background.png')">
                            <img src = "../../../dist/public/stripe.png" alt = "stripe"/></button>
                    </div>
                </div>
            </div>
            <!--second containers-->
            <div class =  "col text-center">
                <h3><p>Your Order Summary</p></h3>
                <div class = "container-fluid mt-5">
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
                        <div class = "col">
                            Total Price
                        </div>
                    </div>
                    <hr style = "height: 10px">
                    <?php
                    $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE = 'customer'";
                    $resultCustomer = oci_parse($conn, $queryCustomer);
                    oci_execute($resultCustomer);
                    while($rowCustomer = oci_fetch_array($resultCustomer, OCI_ASSOC)){
                        $userId = $rowCustomer['USER_ID'];
                    }
                    
                    $queryCart = "SELECT * FROM CART WHERE USER_ID = $userId";
                    $resultCart = oci_parse($conn, $queryCart);
                    oci_execute($resultCart);
                    while($rowCart = oci_fetch_array($resultCart, OCI_ASSOC)){
                        $cartId = $rowCart['CART_ID'];
                    }

                    $queryCartProduct = "SELECT * FROM CART_PRODUCT WHERE CART_ID = $cartId";
                    $resultCartProduct = oci_parse($conn, $queryCartProduct);
                    oci_execute($resultCartProduct);
                    $productTotalPrice = 0;
                    $productTotalQuantity = 0;
                    while($rowCartProduct = oci_fetch_array($resultCartProduct, OCI_ASSOC)){
                        $cartId = $rowCartProduct['CART_ID'];
                        $productName = $rowCartProduct['PRODUCT_NAME'];
                        $productPrice = $rowCartProduct['PRODUCT_PRICE'];
                        $productQuantity = $rowCartProduct['PRODUCT_QUANTITY'];
                        $productTotal = $productPrice * $productQuantity;
                        $productTotalPrice += $productPrice * $productQuantity;
                        echo ("<div class = 'row mt-3'>
                                    <div class = 'col'>
                                        $productName
                                    </div>
                                    <div class = 'col'>
                                        $productQuantity
                                    </div>
                                    <div class = 'col'>
                                        &pound;$productPrice
                                    </div>
                                    <div class = 'col'>
                                        &pound;$productTotal
                                </div>
                                </div>"
                        );
                    }
                    ?>
                </div>
                <div class="d-flex flex-row-reverse bd-highlight mt-3 mb-5">
                    <div class="p-2 bd-highlight mt-5 mb-5">
                        <h5>Total : &pound;<?php echo("$productTotalPrice")?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class = "container mt-5">&nbsp;</div>
    </div>
    <script>
        paypal.Buttons({
        style : {
            color: 'gold',
            shape: 'rect'
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units : [{
                    amount: {
                        value: <?php echo($productTotalPrice)?>
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                console.log(details)
                <?php echo ("window.location.href = './PaymentSuccessProcess.php?user=$user&cartId=$cartId&amount=$productTotalPrice&method=paypal'");?>
            })
        }
    }).render('#paypal-payment-button');
    </script>



        <!--footer-->
        <footer class='mt-5'>
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
                            <a href="./../../guest/PHP/Register.php" class='text-decoration-none text-light' target="_blank"><h5 class="mt-3">Buy from CleckCart</h5></a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 text-center">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h3 class="mt-5">Help</h3>
                            <?php echo("<a href='./Contact.php?user=$user' class='text-decoration-none text-light' target='_blank'><h5 class='mt-4 mb-3'>Contact Us</h5></a>"); ?>
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