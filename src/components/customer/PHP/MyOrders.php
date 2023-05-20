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
            $UserQuery = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user'";
            $runUserQuery=oci_parse($conn,$UserQuery);
            oci_execute($runUserQuery);
            $userRow = oci_fetch_assoc($runUserQuery);
            $userId=$userRow['USER_ID'];

            $CartQuery = "SELECT * FROM CART WHERE USER_ID = '$userId'";
            $runCartQuery=oci_parse($conn,$CartQuery);
            oci_execute($runCartQuery);
            $CartRow = oci_fetch_assoc($runCartQuery);
            $CartId = $CartRow['CART_ID'];
            
            $OrderQuery = "SELECT * FROM ORDER_C WHERE CART_ID = '$CartId'";
            $runOrderQuery=oci_parse($conn,$OrderQuery);
            oci_execute($runOrderQuery);
            while($row=oci_fetch_assoc($runOrderQuery))
                {
                    $OrderId=$row['ORDER_ID'];
                    $OrderDate=$row['ORDER_DATE'];
                    echo("
                        <div class = 'container'>
                            <div class = 'container'>
                                <p class = 'mt-5'>Order Id : $OrderId </p>
                                    <div class='row table-responsive'>
                                        <table class='table table-light table-striped text-center'>
                                            <thead class='table-success'>
                                                <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Order Date</th>
                                                <th>Collection Date</th>
                                                </tr>
                                            </thead><tbody>");
                    $OrderProductQuery = "SELECT * FROM ORDER_PRODUCT WHERE ORDER_ID = '$OrderId'";
                    $runOrderProductQuery=oci_parse($conn,$OrderProductQuery);
                    oci_execute($runOrderProductQuery);
                    while($row2=oci_fetch_assoc($runOrderProductQuery))
                        {
                            
                            $ProductId = $row2['PRODUCT_ID'];
                            $ProductQuantity = $row2['ORDER_QUANTITY'];

                            $ProductQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$ProductId'";
                            $runProductQuery=oci_parse($conn,$ProductQuery);
                            oci_execute($runProductQuery);  
                            $ProductRow = oci_fetch_assoc($runProductQuery); 

                            $CollectionQuery = "SELECT * FROM COLLECTION_SLOT WHERE ORDER_ID = '$OrderId' AND SLOT_STATUS='Y'";
                            $runCollectionQuery=oci_parse($conn,$CollectionQuery);
                            oci_execute($runCollectionQuery);  
                            $CollectionRow = oci_fetch_assoc($runCollectionQuery); 
                            $CollectionDate=$CollectionRow['COLLECTION_DATE'];
                            echo("<tr>
                                    <td>$ProductRow[PRODUCT_IMAGE]</td>
                                    <td>$ProductRow[PRODUCT_NAME]</td>
                                    <td>$ProductRow[CATEGORY_NAME]</td>
                                    <td>$ProductRow[PRODUCT_DESCRIPTION]</td>
                                    <td>$ProductRow[PRODUCT_PRICE]</td>
                                    <td>$ProductQuantity</td>
                                    <td>$OrderDate</td>
                                    <td>$CollectionDate</td></tr>");
                        }
                    echo("</tbody></table></div></div></div>");
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