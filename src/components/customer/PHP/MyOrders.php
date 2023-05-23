<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!--WebPage Icon-->
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
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
                            <?php echo("<a class='nav-link' href='#'><i class='fa-solid fa-magnifying-glass fa-lg text-white'></i></a>"); ?>
                        </li>
                        <li class="nav-item me-3">
                            <?php echo("<a class='nav-link' href='./WishList.php?user=$user'><i class='fa-regular fa-heart fa-lg text-white'></i></a>"); ?>
                        </li>

                        <li class="nav-item dropdown me-3">
                            <a class='nav-link' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class="fa-regular fa-user fa-lg text-white"></i>
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
                            <?php echo("<a class='nav-link' href='./Checkout.php?user=$user'><i class='fa-solid fa-cart-shopping fa-lg text-white' ></i></a>"); ?>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>
    </div>

    <div class = "container">
            <h1 class="mb-4">My Orders</h1>
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
                        <div class = 'container bg-light border rounded mb-3'>
                            <div class = 'container'>
                                <p class = 'mt-5'>Order Id : $OrderId </p>
                                    <div class='row table-responsive rounded'>
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
                                                <th>Action</th>
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
                            
                            $slotStatus = $CollectionRow['SLOT_STATUS'];

                            if(!empty($slotStatus)){
                                echo("<tr>
                                        <td>$ProductRow[PRODUCT_IMAGE]</td>
                                        <td>$ProductRow[PRODUCT_NAME]</td>
                                        <td>$ProductRow[CATEGORY_NAME]</td>
                                        <td>$ProductRow[PRODUCT_DESCRIPTION]</td>
                                        <td>&pound;$ProductRow[PRODUCT_PRICE]</td>
                                        <td>$ProductQuantity</td>
                                        <td>$OrderDate</td>
                                        <td>$CollectionDate</td>
                                        <td><a class = 'btn border rounded' href = './ReviewProduct.php?user=$user&id=$ProductId' style='background-color:#d1e7dd;'>Review</a></td>
                                        </tr>");
                            }
                            else{
                                echo("<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>No payment made for this order.</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>");
                            }

                        }
                    echo("</tbody></table></div></div></div>");
                }
                
                                

    ?>
    <div class = "container">&nbsp;</div>
    
    <!--footer-->
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