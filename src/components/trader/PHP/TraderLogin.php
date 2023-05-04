<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraderLoginPage</title>
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="../../../dist/CSS/bootstrap.css">
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

    <div class = "container">
        <div class = "row row-cols-1 row-cols-lg-2 m-5 p-5 g-4">
            <div class = "col bg-success">
                    <img src = "../../../dist/public/2.jpg" class = "w-100 h-100"/>
            </div>
            <div class = "col">
                <form method = "POST" action = "./TraderLoginSubmit.php">
                    <?php
                        if(isset($_GET['error'])) {?>
                        <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
                    <?php }?>
                    <div class = "mb-3">
                        <h1 class = "text-center">Welcome to CleckCart</h1>
                    </div>
                            
                    <div class="mb-3 ">
                        <label for="exampleInputText1" class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username" aria-label="Username" name = "TraderLoginUsername" value = "<?php
                            if(isset($_POST['TraderLoginUsername'])){
                                echo(trim($_POST['TraderLoginUsername']));
                            }
                        ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" class="form-control" placeholder="Enter Password" aria-label="Password" name = "TraderLoginPassword" value = "<?php
                            if(isset($_POST['TraderLoginPassword'])){
                                echo(trim($_POST['TraderLoginPassword']));
                            }
                        ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" name="UserRole" >
                            <option value="Trader">Trader</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <p class = "text-end"><a href = "#">Forgot Password?</a></p>
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" name = "TraderLoginSubmit" value="Login">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <div class = "mb-3">
                        <p>New Here? <a href = "../../trader/PHP/TraderRegisterPage.php">Create an account</a></p>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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