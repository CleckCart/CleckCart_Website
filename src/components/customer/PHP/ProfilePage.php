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
    <?php
    // echo $id;
    include("../../trader/PHP/connect.php");
    if (isset($_POST['profileimagesubmit'])) {
        $CustomerProfileImage = ($_FILES["CustomerProfileImage"]["name"]);
        $CustomerProfileImageType = ($_FILES["CustomerProfileImage"]["type"]);
        $CustomerProfileImageLocation = "../../dist/CustomerProfileImages/" . $CustomerProfileImage;

        if (($CustomerProfileImageType == "image/jpeg" || $CustomerProfileImageType == "image/jpg" || $CustomerProfileImageType == "image/png")) {

            $ProfileQuery = "UPDATE USER_TABLE SET IMAGE=:images WHERE USER_ID=:USER_ID";

            $ProfileRunQuery = oci_parse($conn, $ProfileQuery);

            oci_bind_by_name($ProfileRunQuery, ':images', $CustomerProfileImage);

            oci_execute($ProfileRunQuery);
        }



        // if ($result) {
        //     header('Location:./ProfilePage.php?success=Image Uploaded!');
        // } else {
        //     header('Location:./ProfilePage.php?error=Error. Please Try Again');
        // }


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
                <?php
                if (isset($_GET['error'])) { ?>
                    <div class='alert alert-danger text-center' role='alert'><?php echo ($_GET['error']); ?></div>
                <?php } ?>
                <?php
                if (isset($_GET['success'])) { ?>
                    <div class='alert alert-success text-center' role='alert'><?php echo ($_GET['success']); ?></div>
                <?php } ?>
                <div class="profile-img-container">
                    <form method="POST" id="form1">

                        <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="img-thumbnail img-circle img-responsive" />
                        <i class="fa fa-upload fa-5x"></i>
                        <!-- <input type="file" name="test"> -->
                        <input type='file' id='uploadfile' name="CustomerProfileImage" class="image-input" onchange="toggleSubmitButton()">
                        <script>
                            $('.profile-img-container img').click(function() {
                                $('#uploadfile').click();
                            });

                            function toggleSubmitButton() {
                                var inputFile = document.querySelector('.image-input');
                                var submitButton = document.querySelector('#image-button');
                                var imageName = document.getElementById('image-name');
                                if (inputFile.files.length > 0) {
                                    imageName.textContent = inputFile.files[0].name;
                                    submitButton.style.display = 'block';
                                } else {
                                    imageName.textContent = '';
                                    submitButton.style.display = 'none';
                                }
                            }
                        </script>
                        <span id="image-name"></span>
                        <input type="submit" class="btn btn-primary w-50 " id="image-button" value="Upload" name="profileimagesubmit">

                    </form>
                </div>

            </div>
            <div class="col-sm-8">
                <form>
                    <fieldset disabled>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="disabledTextInput-fn" class="form-label mt-2">First Name</label>
                                    <input type="text" id="disabledTextInput-fn" class="form-control" placeholder="<?php echo
                                                                                                                    $row['FIRST_NAME'] ?>">
                                    <label for="disabledTextInput-g" class="form-label mt-2">Username</label>
                                    <input type="text" id="disabledTextInput-g" class="form-control" placeholder="<?php echo
                                                                                                                    $row['USERNAME'] ?>">
                                    <label for="disabledTextInput-add" class="form-label mt-2">Address</label>
                                    <input type="text" id="disabledTextInput-add" class="form-control" placeholder="<?php echo
                                                                                                                    $row['ADDRESS'] ?>">
                                    <label for="disabledTextInput-ln" class="form-label mt-2">Date of birth</label>
                                    <input type="text" id="disabledTextInput-ln" class="form-control" placeholder="<?php echo
                                                                                                                    $row['DATE_OF_BIRTH'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="disabledTextInput-ln" class="form-label mt-2">Last Name</label>
                                    <input type="text" id="disabledTextInput-ln" class="form-control" placeholder="<?php echo
                                                                                                                    $row['LAST_NAME'] ?>">
                                    <label for="disabledTextInput-email" class="form-label mt-2">Email Address</label>
                                    <input type="text" id="disabledTextInput-email" class="form-control" placeholder="<?php echo
                                                                                                                        $row['EMAIL'] ?>">
                                    <label for="disabledTextInput-pn" class="form-label mt-2">Phone Number</label>
                                    <input type="text" id="disabledTextInput-pn" class="form-control" placeholder="<?php echo
                                                                                                                    $row['PHONE_NUMBER'] ?>">
                                    <label for="disabledTextInput-ln" class="form-label mt-2">Gender</label>
                                    <input type="text" id="disabledTextInput-pn" class="form-control" placeholder="<?php echo
                                                                                                                    $row['GENDER'] ?>">
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
                <?php echo("<a class='btn btn-primary d-block mx-auto' href='ProfileUpdate.php?user=$user' role='button'>Edit Profile</a>")?>
            </div>

        </div>
    </div>


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
    <!-- <script>
        $('.profile-img-container img').click(function() {
            $('#uploadfile').click();
        });
    </script> -->
</body>

</html>