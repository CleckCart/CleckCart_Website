<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleckCart</title>
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
    ?>
    <!--NavBar-->
    <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color bg-light">
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
                            <a class="nav-link mr-3 text-success" aria-current="page" href="./HomePage.php">HOME</a>
                        </li>

                        <li class="nav-item dropdown me-5"><!---->
                            <a class="nav-link mr-3 dropdown-toggle text-success" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-success" href="./Categories.php">CATEGORY</a></li>
                            </ul>
                        </li>

                        <li class="nav-item me-5">
                        <a class="nav-link mr-3 text-success" href="./Sale.php">SALE</a>

                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-success" href="./About.php">ABOUT</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-success" href="./Contact.php">CONTACT</a>
                        </li>
                    </ul>

                    <ul class="d-flex mb-2 mb-lg-0 list-unstyled">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #157347;"></i></a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="./WishList.php"><i class="fa-regular fa-heart fa-lg" style="color: #157347;"></i></a>
                        </li>

                        <li class="nav-item dropdown me-3">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user fa-lg" style="color: #157347;"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./CustomerLogin.php">Log In Customer</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../trader/PHP/TraderLogin.php">Log In Trader</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="./Checkout.php"><i class="fa-solid fa-cart-shopping fa-lg" style="color: #157347;"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>


    <!--Carousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner h-75">
            <div class="carousel-item active">
                <img src="./../../../dist/public/vegetable3.jpg" class="d-block w-100 h-100" alt="..." style="object-fit:cover;">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>First slide label</h5> -->
                    <!-- <p>Some representative placeholder content for the first slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="./../../../dist/public/vegetable2.jpg" class="d-block w-100 h-100" alt="..." style="object-fit:cover;">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Second slide label</h5> -->
                    <!-- <p>Some representative placeholder content for the second slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="./../../../dist/public/vegetable.jpg" class="d-block w-100 h-100" alt="..." style="object-fit:cover;">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5> -->
                    <!-- <p>Some representative placeholder content for the third slide.</p> -->
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!--Images-->
    <div class="container-fluid">
        <div class="row row-cols-2 row-cols-md-4 g-4 pt-5">
            <div class="col mt-5 text-center">
                <div class="d-flex justify-content-center">
                    <div class="ellipse p-5">
                        <img src="./../../../dist/public/package.svg" alt="package">
                    </div>
                </div>
                <h3 class="mt-5">SELF-PICKUP</h1>
                    <h5 class="mt-5 text-muted">WELL-PACKAGED</h1>
            </div>
            <div class="col mt-5 text-center">
                <div class="d-flex justify-content-center">
                    <div class="ellipse p-5">
                        <img src="./../../../dist/public/carrot.svg" alt="carrot">
                    </div>
                </div>
                <h3 class="mt-5">ALWAYS FRESH</h1>
                    <h5 class="mt-5 text-muted">LOCALLY MADE</h1>
            </div>
            <div class="col mt-5 text-center">
                <div class="d-flex justify-content-center">
                    <div class="ellipse p-5">
                        <img src="./../../../dist/public/badge.svg" alt="badge">
                    </div>
                </div>
                <h3 class="mt-5">SUPERIOR-QUALITY</h1>
                    <h5 class="mt-5 text-muted">QUALITY-PRODUCTS</h1>
            </div>
            <div class="col mt-5 text-center">
                <div class="d-flex justify-content-center">
                    <div class="ellipse p-5">
                        <img src="./../../../dist/public/customersupport.svg" alt="ellipse">
                    </div>
                </div>
                <h3 class="mt-5">SUPPORT</h1>
                    <h5 class="mt-5 text-muted">24H-SUPPORT</h1>
            </div>
        </div>
    </div>
    <div class="custom-margin"></div>


    <!--Button and Text-->
    <div class="container-fluid text-center mt-5">
        <h1>Lorem ipsum dolor sit amet.</h1>
        <a class="btn btn-size btn-success border-2 border-secondary mt-5" href="#" role="button">SHOP NOW</a>
    </div>
    <div class="custom-margin"></div>

    <!--Product Space-->
    <div class="container-fluid text-center mb-5">
        <h1 class="text-success">OUR PRODUCTS</h1>
    </div>
    <div class="container-fluid p-5">
        <div class="row row-cols-1 row row-cols-md-2 row-cols-xl-4 g-2">
            <?php
            $query = "SELECT * FROM PRODUCT ORDER BY PRODUCT_ID";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            while ($row = oci_fetch_array($result, OCI_ASSOC)) {
                $id = $row['PRODUCT_ID'];
                $name = $row['PRODUCT_NAME'];
                $categoryId = $row['CATEGORY_ID'];
                $shopId = $row['SHOP_ID'];
                $categoryName = $row['CATEGORY_NAME'];
                $productImage = $row['PRODUCT_IMAGE'];
                $productName = $row['PRODUCT_NAME'];
                $changecase = ucfirst($row['PRODUCT_NAME']);
                $productDescription = $row['PRODUCT_DESCRIPTION'];
                $productPrice = $row['PRODUCT_PRICE'];
                $productStock = $row['PRODUCT_STOCK'];
                echo ("<div class='col p-5'>");
                echo ("<div class='card'>");
                echo ("<a class = 'text-decoration-none color-gray' href = './ProductDetail.php?id=$id&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock'>
                <img src='./../../../dist/public/TraderItemImages/$row[PRODUCT_IMAGE]' class='card-img-top' alt='...' 
                style='width:100%;
                height:17vw;
                object-fit:cover;'>");//or use contain here

                echo ("<div class='card-body'>");
                echo ("<div class = 'row'>            
                            <h3 class='card-title text-dark'>$name</h3>
                        </div>
                        <div class = 'row'>
                            <h3 class='card-title'> &pound;$row[PRODUCT_PRICE]</h3>
                        </div>
                    ");
                // echo ("<p class='card-text'>$row[PRODUCT_DESCRIPTION]</p>");
                echo ("</div></a>");
                echo ("<div class='d-flex flex-row flex-wrap p-2 align-self-center w-100'>");
                echo ("<a class='#add-to-cart'></a>");   //section of page to be redirected when header is passed            
                echo ("<a class='btn btn-productsize btn-primary btn-outline-dark w-50' 
                href='./CartProducts.php?id=$id&image=$productImage&name=$productName&description=$productDescription&price=$productPrice&quantity=1' role='button'>
                <img src = './../../../dist/public/cart2.svg' 
                style='filter: invert(100%) sepia(0%) saturate(7482%) hue-rotate(83deg) brightness(97%) contrast(109%);'
                alt = 'cart2'/></a>");
                echo ("<a class='btn btn-productsize btn-primary btn-outline-dark w-50' 
                href='./WishListProducts.php?id=$id&image=$productImage&name=$productName&description=$productDescription&price=$productPrice' role='button'>
                <img src = './../../../dist/public/heart2.svg' 
                style='filter: invert(100%) sepia(0%) saturate(7482%) hue-rotate(83deg) brightness(97%) contrast(109%);'
                alt = 'cart2'/></a>");
                echo ("</div>");
                echo ("</div>");
                echo ("</div>");
            }
            ?>
        </div>
    </div>
    <div class="custom-margin"></div>

    <!--Category-->

    <div class="container-fluid text-center mb-5">
        <h1 class="text-success">CATEGORIES</h1>
    </div>
    <div class="custom-margin"></div>
    <div class="container-fluid bg-light border rounded">
        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 g-4">
            <a class="nav-link p-5" href="./CategoryView.php?category=bakery">
                <div class="col mt-5 text-center">
                    <div class="d-flex justify-content-center">
                        <div class="ellipse bg-success p-5">
                            <img src="./../../../dist/public/bread.svg" alt="package">
                        </div>
                    </div>
                    <h3 class="mt-5 text-success">BAKERY</h1>
                </div>
            </a>
            <a class="nav-link p-5" href="./CategoryView.php?category=dairy">
                <div class="col mt-5 text-center">
                    <div class="d-flex justify-content-center">
                        <div class="ellipse bg-success p-5">
                            <img src="./../../../dist/public/icecream.svg" alt="package">
                        </div>
                    </div>
                    <h3 class="mt-5 text-success">DAIRY</h1>
                </div>
            </a>
            <a class="nav-link p-5" href="./CategoryView.php?category=fruit">
                <div class="col mt-5 text-center">
                    <div class="d-flex justify-content-center">
                        <div class="ellipse bg-success p-5">
                            <img src="./../../../dist/public/fruits.svg" alt="package">
                        </div>
                    </div>
                    <h3 class="mt-5 text-success">FRUIT</h1>
                </div>
            </a>
            <a class="nav-link p-5" href="./CategoryView.php?category=meat">
                <div class="col mt-5 text-center">
                    <div class="d-flex justify-content-center">
                        <div class="ellipse bg-success p-5">
                            <img src="./../../../dist/public/meat.svg" alt="package">
                        </div>
                    </div>
                    <h3 class="mt-5 text-success">MEAT</h1>
                </div>
            </a>
            <a class="nav-link p-5 " href="./CategoryView.php?category=vegetable">
                <div class="col mt-5 text-center">
                    <div class="d-flex justify-content-center">
                        <div class="ellipse bg-success p-5">
                            <img src="./../../../dist/public/carrot.svg" alt="package">
                        </div>
                    </div>
                    <h3 class="mt-5 text-success">VEGETABLE</h1>
                </div>
            </a>
        </div>
    </div>
    <div class="custom-margin"></div>


    <!--footer-->
    <footer>
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