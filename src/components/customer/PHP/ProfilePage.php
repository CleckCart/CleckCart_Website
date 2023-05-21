<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleckCart</title>
    <link rel="icon" href="./../../../dist/public/logo.png" sizes="16x16 32x32" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/profilepage.css">

</head>

<body>

    <script src="/jquery/jquery-3.6.0.min.js"></script>
    <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../service/passwordVisibility.js"></script>
    <!-- <script src="../../service/test.js"></script> -->

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
                            <a class='nav-link mr-3 dropdown-toggle text-light' href='#' id='navbarDropdown' role=button data-bs-toggle='dropdown' aria-expanded='false'>
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
    <?php
   
    $query = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE='customer'";
    $result = oci_parse($conn, $query);
    oci_execute($result);
        while($row = oci_fetch_array($result, OCI_ASSOC)){
            $uid = $row['USER_ID'];
            $username = $row['USERNAME'];
            $first_name = $row['FIRST_NAME'];
            $last_name = $row['LAST_NAME'];
            $email = $row['EMAIL'];
            $address = $row['ADDRESS'];
            $phone_number = $row['PHONE_NUMBER'];
            $date_of_birth = $row['DATE_OF_BIRTH'];
            $gender = $row['GENDER'];
            $image = $row['IMAGE'];
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h2 class="mb-3 mt-3">Your Information</h2>
            </div>
            <div class="col "></div>
        </div>

    </div>

    <div class="container bg-light border rounded">

        <div class="row ">
            <div class="col-sm-4 d-flex justify-content-center ">              
                <div class="profile-img-container">

                        <?php echo"<img src='./../../../dist/public/CustomerImages/$image' class='img-circle img-responsive img-thumbnail' alt='$image'>";?>
                </div>

            </div>
            <div class="col-sm-8">
                <?php
                    if (isset($_GET['error'])) { ?>
                        <div class='alert alert-danger text-center' role='alert'><?php echo ($_GET['error']); ?></div>
                    <?php } ?>
                    <?php
                    if (isset($_GET['success'])) { ?>
                        <div class='alert alert-success text-center' role='alert'><?php echo ($_GET['success']); ?></div>
                    <?php } ?>
                    <?php echo("<form class = mt-5 method = 'POST' action = './ProfileUpdate.php?user=$user&id=$uid&fname=$first_name&lname=$last_name&email=$email&address=$address&phone_number=$phone_number&date_of_birth=$date_of_birth&gender=$gender'>")?>
                    <fieldset disabled>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="disabledTextInput-fn" class="form-label mt-2">First Name</label>
                                    <input type="text" id="disabledTextInput-fn" class="form-control" value="<?php echo
                                                                                                                    $first_name ?>" disabled>
                                    <label for="disabledTextInput-g" class="form-label mt-2">Username</label>
                                    <input type="text" id="disabledTextInput-g" class="form-control" value="<?php echo
                                                                                                                    $last_name ?>" disabled>
                                    <label for="disabledTextInput-add" class="form-label mt-2">Address</label>
                                    <input type="text" id="disabledTextInput-add" class="form-control" value="<?php echo
                                                                                                                    $address?>" disabled>
                                    <label for="disabledTextInput-ln" class="form-label mt-2">Date of birth</label>
                                    <input type="text" id="disabledTextInput-ln" class="form-control" value="<?php echo
                                                                                                                    $date_of_birth ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="disabledTextInput-ln" class="form-label mt-2">Last Name</label>
                                    <input type="text" id="disabledTextInput-ln" class="form-control" value="<?php echo
                                                                                                                    $last_name ?>">
                                    <label for="disabledTextInput-email" class="form-label mt-2">Email Address</label>
                                    <input type="text" id="disabledTextInput-email" class="form-control" value="<?php echo
                                                                                                                        $email ?>">
                                    <label for="disabledTextInput-pn" class="form-label mt-2">Phone Number</label>
                                    <input type="text" id="disabledTextInput-pn" class="form-control" value="<?php echo
                                                                                                                    $phone_number ?>">
                                    <label for="disabledTextInput-ln" class="form-label mt-2">Gender</label>
                                    <input type="text" id="disabledTextInput-pn" class="form-control" value="<?php echo
                                                                                                                    $gender; ?>">                                                                                                                       
                                </div>
                            </div>
                    </fieldset>
                    <?php echo("<a class = 'btn btn-success mt-3 mb-3' href='./ProfileUpdate.php?user=$user&id=$uid&fname=$first_name&lname=$last_name&email=$email&address=$address&phone_number=$phone_number&date_of_birth=$date_of_birth&gender=$gender'>Edit Profile</a>"); ?>
                    <?php echo("<a class = 'btn btn-success mt-3 mb-3' href='./PasswordUpdate.php?user=$user&id=$uid&fname=$first_name&lname=$last_name&email=$email&address=$address&phone_number=$phone_number&date_of_birth=$date_of_birth&gender=$gender'>Update Password</a>"); ?>
                </form>
               
            </div>
        </div>
    </div>

    <!-- <footer> -->
    <div class ="container mt-5">&nbsp;</div>
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