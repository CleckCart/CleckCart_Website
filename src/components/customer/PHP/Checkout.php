<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleckCart</title>
    <link rel="icon" href="./../../../dist/public/logo.png" sizes="16x16 32x32" type="image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <!-- <link rel="stylesheet" href="../CSS/categorypage.css"> -->
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!--NavBar-->
    <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color">
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
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Log In Trader</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./Register.php">Sign In</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
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
                        <form method="POST" action="#">
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
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
                                <button type="submit" class="btn btn-primary w-100">Log In</button>
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


    <div class="container-fluid">
        <div class="row px-5 ">
            <div class="col-sm-8 ">
                <h3>My Cart</h3>
            </div>
            <div class="col-sm-4 "></div>
        </div>


        <div class="row px-5 ">
            <div class="col-sm-7 ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="col-sm-1"></th>
                            <th scope="col" class="col-sm-5"></th>
                            <th scope="col" class="col-sm-2">Price</th>
                            <th scope="col" class="col-sm-2">Quantity</th>
                            <th scope="col" class="col-sm-2">Total</th>
                        </tr>
                    </thead>

                    <?php
                    for ($i = 0; $i < 4; $i++) { //needs no of products added to cart
                        echo '<tr>
                                <td class = "text-center"><img src="../../../dist/public/3.jpg" alt="image" width="80"height="60"></td>
                                <td> link product name here</td>
                                <td class = "text-center">$10</td>
                                <td class = "text-center">
                                
                                </td>
                                <td class = "text-center">
                                    $10
                                    <!-- Delete Button trigger modal -->
                                    <button class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModalDelete">
                                    <img src="./../../../dist/public/delete.svg" alt="delete" >
                                    </button>
                                </td>';
                    }
                    ?>

                </table>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4 ">
                <div class="row text-center ">
                    <h4>Collection Slot</h4>
                </div>
                <div class="row border pb-4">
                    <div class="col-sm-6 px-4 ">
                        <h6 class="py-2">Day</h6>


                        <div class="form-check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="wed-check">
                                <label class="form-check-label" for="wed-check">
                                    Wednesday
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="thurs-check">
                                <label class="form-check-label" for="thurs-check">
                                    Thursday
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="fri-check">
                                <label class="form-check-label" for="fri-check">
                                    Friday
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 px-4 ">
                        <h6 class="py-2">Time</h6>


                        <div class="form-check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="10-check">
                                <label class="form-check-label" for="10-check">
                                    10:00-13:00
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="13-check">
                                <label class="form-check-label" for="13-check">
                                    13:00-16:00
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="16-check">
                                <label class="form-check-label" for="16-check">
                                    16:00-19:00
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row text-center py-4 border  my-4">
                    <h5>Sub Total: $40</h5>
                    <a class="btn btn-primary w-50 d-block mx-auto" href="PayementGateway.php" role="button">Link</a>
                </div>
            </div>
        </div>
        <!-- Delete Modal -->
        <div class="modal fade" id="exampleModalDelete" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Delete #product?</h4>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger  w-50 ">Delete</button>
                        <button type="button" class="btn btn-secondary  w-50 " data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
</body>
</div>
</div>





<!-- footer -->
<!-- <footer> -->
<footer class="page-footer font-small pt-5">

    <div class="container-fluid bg-secondary">
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <div class="col mt-5 text-center">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <h3 class="mt-5">Cleck Cart</h3>
                        <h5 class="mt-5">Satisfy your cravings, with local farm savings</h5>
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