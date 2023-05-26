<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="icon" href="./../../../dist/public/logo.png" sizes="16x16 32x32" type="image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/contactpage.css">
    <style>
        .error_msg {
            color: red;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../service/passwordVisibility.js"></script>
    <?php
            include('./connect.php');
            if(isset($_GET['user'])){
                $user = $_GET['user'];
            }
            

            if(isset($_GET['id']) && isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['email']) && isset($_GET['address']) && isset($_GET['phone_number']) && isset($_GET['gender'])){
                $userId = $_GET['id'];
                $first_name = $_GET['fname'];
                $last_name = $_GET['lname'];
                $email = $_GET['email'];
                $address = $_GET['address'];
                $phone_number = $_GET['phone_number'];
                $date_of_birth =$_GET['date_of_birth'];
                $gender = $_GET['gender'];
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

    <!-- Page content holder -->
    <div class="container p-5 bg-light border rounded mt-5" id="content">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="text-center">
                    <h5>Update Profile</h5>
                </div>
                <hr>
                    <div class="mb-3">
                        <?php echo"<form method='POST' action='./ProfileUpdateSubmit.php?user=$user' enctype='multipart/form-data'>";?>
                        <?php
                        if (isset($_GET['error'])) { ?>
                            <div class='alert alert-danger text-center' role='alert'><?php echo ($_GET['error']); ?></div>
                        <?php } ?>
                        <?php
                        if (isset($_GET['success'])) { ?>
                            <div class='alert alert-success text-center' role='alert'><?php echo ($_GET['success']); ?></div>
                        <?php } ?>
                        <div class="row mb-3">
                        <input type='hidden' name='EditCustomerId' value='<?php
                            echo($userId);?>'>
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">First Name</label>
                                <input type="text" class="form-control" value='<?php echo ($first_name)?>' aria-label="First name" name="CustomerEditFirstname">
                            </div>
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" value='<?php echo ($last_name)?>' aria-label="Last name" name="CustomerEditLastname">
                            </div>                           
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">Username</label>
                                <input type="tel" class="form-control" value='<?php echo ($user) ?>' aria-label="Username" name="CustomerEditUsername">
                            </div>
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">Address</label>
                                <input type="tel" class="form-control" value='<?php echo ($address)?>' aria-label="Address" name="CustomerEditAddress">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                    <label for="exampleInputText1" class="form-label">Phone</label>
                                    <input type="number" class="form-control" value='<?php echo ($phone_number) ?>' aria-label="PhoneNumber" name="CustomerEditPhone">
                            </div>
                            <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value='<?php echo ($email) ?>' name="CustomerEditEmail">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="date" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="date" aria-label="date" name="CustomerEditDate" value='<?php echo ($date_of_birth) ?>'>
                                </div>
                                <div class="col">
                                    <label for="exampleInputText1" class="form-label">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="CustomerEditGender">
                                        <?php
                                                if($gender=='male')
                                                {
                                                    echo("<option value='male' selected>Male</option>");
                                                    echo("<option value='female'>Female</option>");
                                                    echo("<option value='other'>Other</option>");
                                                }
                                                
                                                else if($gender=='female')
                                                {
                                                    echo("<option value='male'>Male</option>");
                                                    echo("<option value='female' selected>Female</option>");
                                                    echo("<option value='other'>Other</option>");
                                                }
                                                
                                                else
                                                {
                                                    echo("<option value='male' selected>Male</option>");
                                                    echo("<option value='female'>Female</option>");
                                                    echo("<option value='other' selected>Other</option>");
                                                }
                                                ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="file" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="file" aria-label="File" name="CustomerEditImage">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 w-100 mt-4 text-center" >
                            <input type="submit" class="btn btn-success w-50 " value="Update" name="CustomerEdit">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

    <div class ="container-fluid mt-5">&nbsp;</div>
    <div class ="container-fluid mt-1">&nbsp;</div>
    <!-- footer -->
        <footer class="mt-5">
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