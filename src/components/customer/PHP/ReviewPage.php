<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Review</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/review.css">
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php
    include('./connect.php');
      if(isset($_GET['user']) && isset($_GET['id']) ){
        $user = $_GET['user'];
        $productId = $_GET['id'];
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
                                <?php echo ("<li><a class='dropdown-item text-success' href='./ProfilePage.php?user=$user'>Manage Profile</a></li>")?>
                                <li><hr class="dropdown-divider"></li>
                                <?php echo ("<li><a class='dropdown-item text-success' href='./MyOrders.php?user=$user'>My Orders</a></li>");?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-success" href="./CustomerLogout.php">Log Out</a></li>
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

        <?php echo("<form action = './ReviewSubmit.php?user=$user&id=$productId' method = 'POST'>") ?>
        <div class = 'container mb-5 bg-light text-center w-50 border rounded'>
            <h1 class = "p-5">Review</h1>
            <?php
            if(isset($_GET['error'])) {?>
            <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
            <?php }?>
            <?php
                if(isset($_GET['success'])) {?>
                <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
            <?php }?>
            <p class = "m-5 text-start">Description</p>
            <div class="form-floating m-5">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name = "reviewDescription" style="height: 200px;"></textarea>
                <label for="floatingTextarea2">Leave a review</label>
            </div>
            <p class = "mt-5 p-3">Rating</p>
            <div class="rating text-center">
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1">&#9733;</label>
            </div>
            <div class = "container mt-5">
                <input type="hidden" id="selectedRating" name="selectedRating" value="">
                <input class = "btn btn-success w-100" type = "submit" name = "reviewSubmit" value="SUBMIT"/>
            </div>
        </form>
        <div class = "mt-5">&nbsp;</div>
      </div>
      <script>
        $(document).ready(function() {
            $('.rating input').click(function() {
                var selectedValue = $(this).val();
                $('#selectedRating').val(selectedValue);
            });
        });
      </script>


   <!--footer-->
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