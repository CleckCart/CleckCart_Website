<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop The Hudd</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/product.css" />
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
            include('./connect.php');
        ?>
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
                            </ul>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link" href="./Sale.php">SALE</a>
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
                            <a class="nav-link" href="./WishList.php"><img src="./../../../dist/public/heart.svg" alt="heart"></a>
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
                            <a class="nav-link" href="./Checkout.php"><img src="./../../../dist/public/cart.svg" alt="cart"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
  <section class="product_page">
    <h2 class="product_page--title">OUR PRODUCTS</h2>
    <div class = "container-fluid p-5">
    <div class = "container-fluid p-5">
        <div class="row row-cols-1 row row-cols-md-2 row-cols-xl-4 g-2">
            <?php

                if(isset($_GET['category'])){
                    $productCategory = $_GET['category'];
                }

                $queryCategory = "SELECT * FROM CATEGORY WHERE CATEGORY_NAME = '$productCategory'";
                $resultCategory = oci_parse($conn, $queryCategory);
                oci_execute($resultCategory);

                while($row = oci_fetch_array($resultCategory, OCI_ASSOC)){
                    $categoryid = $row['CATEGORY_ID'];
                }
                
                
                if(!empty($categoryid)){
                    $query = "SELECT * FROM PRODUCT WHERE CATEGORY_ID = '$categoryid'";
                    $result = oci_parse($conn, $query);
                    oci_execute($result);
                    while($row = oci_fetch_array($result, OCI_ASSOC)){
                        $id = $row['PRODUCT_ID'];
                        $name = $row['PRODUCT_NAME'];
                        $categoryId = $row['CATEGORY_ID'];
                        $shopId = $row['SHOP_ID'];
                        $categoryName = $row['CATEGORY_NAME'];
                        $productImage = $row['PRODUCT_IMAGE'];
                        $productName = $row['PRODUCT_NAME'];
                        $productDescription = $row['PRODUCT_DESCRIPTION'];
                        $productPrice = $row['PRODUCT_PRICE'];
                        $productStock = $row['PRODUCT_STOCK'];
                        echo("<div class='col p-5'>");
                        echo("<div class='card'>");
                        echo("<a class = 'text-decoration-none color-gray' href = './ProductDetail.php?id=$id&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock'>
                            <img src='$row[PRODUCT_IMAGE]' class='card-img-top' alt='...''>");
                        echo("<div class='card-body'>");
                        echo("<div class = 'row'>
                                <div class = 'col'>
                                    <h3 class='card-title'>$row[PRODUCT_NAME]</h3>
                                </div>
                                <div class = 'col'>
                                    <h3 class='card-title text-end'> &pound; $row[PRODUCT_PRICE]</h3>
                                </div>
                            </div>");
                        echo("<p class='card-text'>$row[PRODUCT_DESCRIPTION]</p>");              
                        echo("</div></a>");            
                        echo("<div class='d-flex flex-row flex-wrap p-2 align-self-center w-100'>");
                        echo("<a class='#add-to-cart'></a>");   //section of page to be redirected when header is passed            
                        echo("<a class='btn btn-productsize btn-primary btn-outline-dark w-50' href='./CartProducts.php?id=$id&image=$productImage&name=$productName&description=$productDescription&price=$productPrice&quantity=1' role='button'><img src = './../../../dist/public/cart2.svg' alt = 'cart2'/></a>");                
                    echo("<a class='btn btn-productsize btn-primary btn-outline-dark w-50' href='./WishListProducts.php?id=$id&image=$productImage&name=$productName&description=$productDescription&price=$productPrice' role='button'><img src = './../../../dist/public/heart2.svg' alt = 'cart2'/></a>");               
                        echo("</div>");
                        echo("</div>");
                        echo("</div>");
                    }
                }
                else{
                    echo("<div class='col-12 p-5'>");
                    echo("<div class='alert alert-danger text-center' role='alert'>No Products Found</div>");
                    echo("</div>");
                }

            ?>
        </div>
    </div>
    </div>
  </section>
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
<script src="app/js/script.js"></script>
</body>
</html>