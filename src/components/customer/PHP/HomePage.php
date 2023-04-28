<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!--WebPage Icon-->
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/homepage.css">
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
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Log In Customer</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Manage Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Log In Trader</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="./Register.php">Sign In</a></li>
                                <li><hr class="dropdown-divider"></li>
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
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method = "POST" action = "#">
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder = "Password" id="password" name="password">
                                    <span class = "input-group-text" id="togglePassword">
                                        <i class="fa-solid fa-eye" aria-hidden = "true" id = "eye" onclick = "toggle()"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                    </div>
                                    <div class="col text-end">
                                        <label class="form-link-label" for="exampleLink1"><a class="text-reset" href="#">Forgot Password?</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary w-100" value="Log In">
                                <div class="d-flex flex-column text-center mt-5">
                                    <div class="row">
                                        <label for="exampleInputText1" class="form-label">Don't Have an Account?</label>
                                    </div>
                                    <div class="row">
                                        <label class="form-link-label" for="exampleLink1">
                                            <a class="fs-6 text-reset" href="./Register.php">Sign Up</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Carousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner h-75" >
            <div class="carousel-item active">
            <img src="./../../../dist/public/vegetable3.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>First slide label</h5> -->
                <!-- <p>Some representative placeholder content for the first slide.</p> -->
            </div>
            </div>
            <div class="carousel-item">
            <img src="./../../../dist/public/vegetable2.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Second slide label</h5> -->
                <!-- <p>Some representative placeholder content for the second slide.</p> -->
            </div>
            </div>
            <div class="carousel-item">
            <img src="./../../../dist/public/vegetable.jpg" class="d-block w-100 h-100" alt="...">
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
    <div class = "container-fluid">
            <div class="row row-cols-2 row-cols-md-4 g-4 pt-5">
                <div class="col mt-5 text-center">
                    <div class= "d-flex justify-content-center">
                        <div class="ellipse p-5">
                            <img src="./../../../dist/public/package.svg" alt="package">
                        </div>
                    </div>
                    <h3 class = "mt-5">SELF-PICKUP</h1>
                    <h5 class = "mt-5 text-muted">WELL-PACKAGED</h1>
                </div>
                <div class="col mt-5 text-center">
                    <div class= "d-flex justify-content-center">
                        <div class="ellipse p-5">
                            <img src="./../../../dist/public/carrot.svg" alt="carrot">
                        </div>
                    </div>
                    <h3 class = "mt-5">ALWAYS FRESH</h1>
                    <h5 class = "mt-5 text-muted">LOCALLY MADE</h1>
                </div>
                <div class="col mt-5 text-center">
                    <div class= "d-flex justify-content-center">
                        <div class="ellipse p-5">
                            <img src="./../../../dist/public/badge.svg" alt="badge">
                        </div>
                    </div>
                    <h3 class = "mt-5">SUPERIOR-QUALITY</h1>
                    <h5 class = "mt-5 text-muted">QUALITY-PRODUCTS</h1>
                </div>
                <div class="col mt-5 text-center">
                    <div class= "d-flex justify-content-center">
                        <div class="ellipse p-5">
                            <img src="./../../../dist/public/customersupport.svg" alt="ellipse">
                        </div>
                    </div>
                    <h3 class = "mt-5">SUPPORT</h1>
                    <h5 class = "mt-5 text-muted">24H-SUPPORT</h1>
                </div>
            </div>
    </div>
    <div class = "custom-margin"></div>


    <!--Button and Text-->
    <div class="container-fluid text-center mt-5">
        <h1>Lorem ipsum dolor sit amet.</h1>
        <a class="btn btn-size btn-primary btn-outline-dark mt-5" href="#" role="button">Shop Now</a>
    </div>
    <div class = "custom-margin"></div>

    <!--Product Space-->
    <div class="container-fluid text-center mb-5">
        <h1 >OUR PRODUCTS</h1>
    </div>
    <div class = "container-fluid p-5">
        <div class="row row-cols-1 row row-cols-md-2 row-cols-xl-4 g-2">
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
            <div class="col p-5">
                <div class="card">
                    <img src="../../../dist/public/kiwi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="d-flex flex-row flex-wrap p-2 align-self-center w-100">
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/cart2.svg" alt = "cart2"/></a>
                        <a class="btn btn-productsize btn-primary btn-outline-dark w-50" href="#" role="button"><img src = "./../../../dist/public/heart2.svg" alt = "cart2"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class = "custom-margin"></div>

    <!--Category-->

    <div class="container-fluid text-center mb-5">
        <h1 >CATEGORIES</h1>
    </div>
    <div class = "custom-margin"></div>
    <div class = "container-fluid bg-info">
            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-6 g-4">
                <a class="nav-link p-5" href="#">
                    <div class="col mt-5 text-center">
                        <div class= "d-flex justify-content-center">
                            <div class="ellipse p-5">
                                <img src="./../../../dist/public/package.svg" alt="package">
                            </div>
                        </div>
                        <h3 class = "mt-5">SELF-PICKUP</h1>
                        <h5 class = "mt-5 text-muted">WELL-PACKAGED</h1>
                    </div>
                </a>
                <a class="nav-link p-5" href="#">
                    <div class="col mt-5 text-center">
                        <div class= "d-flex justify-content-center">
                            <div class="ellipse p-5">
                                <img src="./../../../dist/public/package.svg" alt="package">
                            </div>
                        </div>
                        <h3 class = "mt-5">SELF-PICKUP</h1>
                        <h5 class = "mt-5 text-muted">WELL-PACKAGED</h1>
                    </div>
                </a>
                <a class="nav-link p-5" href="#">
                    <div class="col mt-5 text-center">
                        <div class= "d-flex justify-content-center">
                            <div class="ellipse p-5">
                                <img src="./../../../dist/public/package.svg" alt="package">
                            </div>
                        </div>
                        <h3 class = "mt-5">SELF-PICKUP</h1>
                        <h5 class = "mt-5 text-muted">WELL-PACKAGED</h1>
                    </div>
                </a>
                <a class="nav-link p-5" href="#">
                    <div class="col mt-5 text-center">
                        <div class= "d-flex justify-content-center">
                            <div class="ellipse p-5">
                                <img src="./../../../dist/public/package.svg" alt="package">
                            </div>
                        </div>
                        <h3 class = "mt-5">SELF-PICKUP</h1>
                        <h5 class = "mt-5 text-muted">WELL-PACKAGED</h1>
                    </div>
                </a>
                <a class="nav-link p-5" href="#">
                    <div class="col mt-5 text-center">
                        <div class= "d-flex justify-content-center">
                            <div class="ellipse p-5">
                                <img src="./../../../dist/public/package.svg" alt="package">
                            </div>
                        </div>
                        <h3 class = "mt-5">SELF-PICKUP</h1>
                        <h5 class = "mt-5 text-muted">WELL-PACKAGED</h1>
                    </div>
                </a>
                <a class="nav-link p-5" href="#">
                    <div class="col mt-5 text-center">
                        <div class= "d-flex justify-content-center">
                            <div class="ellipse p-5">
                                <img src="./../../../dist/public/package.svg" alt="package">
                            </div>
                        </div>
                        <h3 class = "mt-5">SELF-PICKUP</h1>
                        <h5 class = "mt-5 text-muted">WELL-PACKAGED</h1>
                    </div>
                </a>
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
                                <a class="nav-link p-3" href="#"><img src="./../../../dist/public/twitter.svg" alt="twitter"></a>
                                <a class="nav-link p-3" href="#"><img src="./../../../dist/public/facebook.svg" alt="facebook"></a>
                                <a class="nav-link p-3" href="#"><img src="./../../../dist/public/instagram.svg" alt="instagram"></a>
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