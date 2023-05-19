<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!--WebPage Icon-->
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <div class = "container">
            <h1>My Orders</h1>
    </div>
    
    <?php

        $queryUserId = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user'";
        $resultUserId = oci_parse($conn, $queryUserId);
        oci_execute($resultUserId);
        while($rowUserId = oci_fetch_array($resultUserId, OCI_ASSOC)){
            $uid = $rowUserId['USER_ID'];
        }

        $queryCart = "SELECT * FROM CART WHERE USER_ID = $uid";
        $resultCart = oci_parse($conn, $queryCart);
        oci_execute($resultCart);
        while($rowCart = oci_fetch_array($resultCart, OCI_ASSOC)){
            $cartId = $rowCart['CART_ID'];
        }

        $queryOrder = "SELECT * FROM ORDER_C WHERE CART_ID = $cartId";
        $resultOrder = oci_parse($conn, $queryOrder);
        oci_execute($resultOrder);
        while($rowOrder = oci_fetch_array($resultOrder, OCI_ASSOC)){
            $productId = $rowOrder['PRODUCT_ID'];
            $orderQuantity = $rowOrder['ORDER_QUANTITY'];
            $orderDate = $rowOrder['ORDER_DATE'];
        }

        $queryProduct = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $productId";
        $resultProduct = oci_parse($conn, $queryProduct);
        oci_execute($resultProduct);
        while($rowOrder = oci_fetch_array($resultProduct, OCI_ASSOC)){
            $productImage = $rowOrder['PRODUCT_IMAGE'];
            $productName = $rowOrder['PRODUCT_NAME'];
            $productCategory = $rowOrder['CATEGORY_NAME'];
            $productDescription = $rowOrder['PRODUCT_DESCRIPTION'];
            $productPrice = $rowOrder['PRODUCT_PRICE'];
            $productStock = $rowOrder['PRODUCT_STOCK'];
        }
        
        $queryCollectionSlot = "SELECT * FROM COLLECTION_SLOT WHERE CART_ID = $cartId";
        $resultCollectionSlot = oci_parse($conn, $queryCollectionSlot);
        oci_execute($resultCollectionSlot);
        while($rowCollectionSlot = oci_fetch_array($resultCollectionSlot, OCI_ASSOC)){
            $collectionDate = $rowCollectionSlot['COLLECTION_DATE'];
            $collectionTime = $rowCollectionSlot['COLLECTION_TIME'];
        }
        
        $queryOrder = "SELECT * FROM ORDER_C WHERE CART_ID = $cartId";
        $resultOrder = oci_parse($conn, $queryOrder);
        oci_execute($resultOrder);
        while($rowOrder = oci_fetch_array($resultOrder, OCI_ASSOC)){
            $productId = $rowOrder['PRODUCT_ID'];
            $orderQuantity = $rowOrder['ORDER_QUANTITY'];
            $orderDate = $rowOrder['ORDER_DATE'];
        }

        $queryPayment = "SELECT * FROM PAYMENT WHERE CART_ID = $cartId";
        $resultPayment = oci_parse($conn, $queryPayment);
        oci_execute($resultPayment);
        while($rowPayment = oci_fetch_array($resultPayment, OCI_ASSOC)){
            $paymentId = $rowPayment['PAYMENT_ID'];
            echo("
            <div class = 'container'>
                <div class = 'container'>
                    <p class = 'mt-5'>Payment ID : $paymentId </p>
                        <div class='row table-responsive'>
                            <table class='table table-light table-striped text-center'>
                                <thead class='table-success'>
                                    <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th >Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Order Date</th>
                                    <th>Collection Date</th>
                                    </tr>
                                </thead>
                                    <tr>
                                    <td><img src = '$productImage' class = 'w-50 h-50'/></td>
                                    <td>$productName</td>
                                    <td>$productCategory</td>
                                    <td>$productDescription</td>
                                    <td>&pound;$productPrice</td>
                                    <td>$orderQuantity</td>
                                    <td>$orderDate</td>
                                    <td>$collectionDate</td>
                                    </tr>
                            </table>
                        </div>
                </div>
            </div>
            ");
        }


    ?>
    <div class = "container">&nbsp;</div>
    
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