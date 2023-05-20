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
                            <?php echo ("<a class='nav-link' href='Sale.php?user=$user'>SALE</a>");?>
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

    <div class="container">

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
                </form>
               
            </div>
        </div>
    </div>
    
    <!-- <div class="col">
                    </div> -->

    <div class="container mt-5 mb-2">
        <div class="row ">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
            <?php echo("<a class = 'btn btn-primary d-block mx-auto' href='./ProfileUpdate.php?user=$user&id=$uid&fname=$first_name&lname=$last_name&email=$email&address=$address&phone_number=$phone_number&date_of_birth=$date_of_birth&gender=$gender'>Edit Profile</a>"); ?>
            </div>

        </div>
    </div>


    <!-- <footer> -->
    <div class ="container mt-5">&nbsp;</div>
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