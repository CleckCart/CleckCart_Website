<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CleckCart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/product-detail.css" />
    <link rel="stylesheet" href="../CSS/displayReview.css" />
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php
    include('./connect.php');
  ?>
                <!--NavBar-->
                <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="./HomePage.php">
                    <img src="./../../../dist/public/logo.jpg" class="img-fluid rounded-circle img-thumbnail" width="80" height="70" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-light" aria-current="page" href="./HomePage.php">HOME</a>
                        </li>

                        <li class="nav-item dropdown me-5"><!---->
                            <a class="nav-link mr-3 dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-success" href="./Categories.php">CATEGORY</a></li>
                            </ul>
                        </li>

                        <li class="nav-item me-5">
                        <a class="nav-link mr-3 text-light" href="./Sale.php">SALE</a>

                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-light" href="./About.php">ABOUT</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link mr-3 text-light" href="./Contact.php">CONTACT</a>
                        </li>
                    </ul>

                    <ul class="d-flex mb-2 mb-lg-0 list-unstyled">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass fa-lg text-white"></i></a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="./WishList.php"><i class="fa-regular fa-heart fa-lg text-white"></i></a>
                        </li>

                        <li class="nav-item dropdown me-3">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user fa-lg text-white"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-success" href="./CustomerLogin.php" >Log In Customer</a></li>
                                <li>
                                    <hr class="dropdown-divider text-success">
                                </li>
                                <li><a class="dropdown-item text-success" href="../../trader/PHP/TraderLogin.php">Log In Trader</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="./Checkout.php"><i class="fa-solid fa-cart-shopping fa-lg text-white" ></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
        <?php
            $id = $_GET['id'];
            $discountedPrice = $_GET['newPrice'];
            $query = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $id";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            while($row = oci_fetch_array($result, OCI_ASSOC)){
              $productStock = $row['PRODUCT_STOCK'];
            }
            $productName = $_GET['name'];
            $productDescription = $_GET['description'];
            $productImage = $_GET['image'];
            $productPrice = $_GET['price'];
            $productQuantity = 1;
          ?>
        <section class="product-detail">
          <?php
          if(isset($_GET['error'])) {?>
            <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
          <?php }?>
          <?php
          if(isset($_GET['success'])) {?>
            <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
          <?php }?>
          <div class="upper-section">
              <div class="product-img-cnt">
                <img class='img-fluid img-thumbnail' src='./../../../dist/public/TraderItemImages/<?php echo($productImage)?>' alt='<?php echo($productImage)?>' width="500px" height="400px">
              </div>
              <div class="product-info">
                  <div class="product-title-box">
                    <h2 class="display-4"><?php echo(ucfirst($productName))?></h2>
                    <?php echo("<a href='./WishListProducts.php?id=$id&image=$productImage&name=$productName&description=$productDescription&price=$productPrice'><img src='./../../../dist/public/heart.svg' alt='heart' style='filter: invert(7%) sepia(100%) saturate(7361%) hue-rotate(347deg) brightness(117%) contrast(100%);'></a>");?>
                  </div>
                <p class="lead"><?php echo($productDescription) ?></p>
                <span class="display-5">&pound;<del style='color:red';><span style='color:black';><?php echo($productPrice)?></span></del>&nbsp;&nbsp;&nbsp;&nbsp;&pound;<?php echo($discountedPrice)?></span>
                <div class="product-quantity">
                  <span class="lead"><b>Quantity</b></span>
                  <div class="increment-decrement rounded">
                    <span class="decrement bg-success text-white">-</span>
                    <span class="quantity bg-success text-white"><?php echo($productQuantity)?></span>
                    <span class="increment bg-success text-white">+</span>
                    <p class = "stockValue"><?php echo($productStock)?></p><p>in stock</p>
                  </div>
                </div>
                <?php echo("<a href = './DiscountCartProducts.php?id=$id&image=$productImage&name=$productName&description=$productDescription&price=$productPrice&newPrice=$discountedPrice&stock=$productStock&quantity=$productQuantity' class='btn add-to-cart'>ADD TO CART</a>")?>
                <?php echo("<a href = './BuyNow.php?&id=$id&image=$productImage&name=$productName&description=$productDescription&price=$discountedPrice&stock=$productStock&quantity=$productQuantity' class='btn buy-now'>BUY NOW</a>")?>
                
                </div>
              <script>
                let increment =document.querySelector('.increment');
                let quantity =document.querySelector('.quantity');
                let decrement =document.querySelector('.decrement');
                let stockValue =document.querySelector('.stockValue');
                let addToCartBtn = document.querySelector('.add-to-cart');
                let buynowBtn = document.querySelector('.buy-now');
                let currentQuantity = parseInt(quantity.innerText);
                increment.addEventListener("click", () => {
                  if(currentQuantity < (stockValue.innerText-1)){
                    currentQuantity++;
                    quantity.innerText = currentQuantity;
                    addToCartBtn.href = `./DiscountCartProducts.php?id=<?php echo ($id)?>&image=<?php echo ($productImage)?>&name=<?php echo ($productName)?>&description=<?php echo ($productDescription)?>&price=<?php echo ($productPrice)?>&newPrice=<?php echo ($discountedPrice)?>&stock=<?php echo ($productStock)?>&quantity=${currentQuantity}`;
                      buynowBtn.href = `./BuyNow.php?id=<?php echo ($id)?>&image=<?php echo ($productImage)?>&name=<?php echo ($productName)?>&description=<?php echo ($productDescription)?>&price=<?php echo ($discountedPrice)?>&stock=<?php echo ($productStock)?>&quantity=${currentQuantity}`;
                  }
                });
                decrement.addEventListener("click", ()=>{
                  if(currentQuantity > 1){
                      currentQuantity--;
                      quantity.innerText = currentQuantity;
                      addToCartBtn.href = `./DiscountCartProducts.php?id=<?php echo ($id)?>&image=<?php echo ($productImage)?>&name=<?php echo ($productName)?>&description=<?php echo ($productDescription)?>&price=<?php echo ($productPrice)?>&newPrice=<?php echo ($discountedPrice)?>&stock=<?php echo ($productStock)?>&quantity=${currentQuantity}`;
                      buynowBtn.href = `./BuyNow.php?id=<?php echo ($id)?>&image=<?php echo ($productImage)?>&name=<?php echo ($productName)?>&description=<?php echo ($productDescription)?>&price=<?php echo ($discountedPrice)?>&stock=<?php echo ($productStock)?>&quantity=${currentQuantity}`;
                  }
                })
              </script>
          </div>
          <div class='lower-section'>
            <h2 class='review-heading'>Customer Reviews</h2>
            <?php
                $queryReview = "SELECT * FROM REVIEW WHERE PRODUCT_ID = '$id'";
                $resultReview = oci_parse($conn, $queryReview);
                oci_execute($resultReview);

                while ($row = oci_fetch_array($resultReview, OCI_ASSOC)) {
                    $reviewId = $row['REVIEW_ID'];
                    $userId = $row['USER_ID'];
                    $reviewDescription = $row['PRODUCT_DESCRIPTION'];
                    $reviewRating = $row['RATING'];
                    $reviewDate = $row['REVIEW_DATE'];
                    $queryCustomer = "SELECT * FROM USER_TABLE WHERE USER_ID = '$userId'";
                    $resultCustomer = oci_parse($conn, $queryCustomer);
                    oci_execute($resultCustomer);

                    while ($row = oci_fetch_array($resultCustomer, OCI_ASSOC)) {
                        $username = $row['USERNAME'];
                    }

                    echo ("
                      <div class='review mt-5'>
                          <div class='review-left'>
                              <h3 class='review-name'>$username</h3>
                              <span class='review-date'>$reviewDate</span>
                          </div>
                          <hr />
                          <div class='review-right'>
                              <div class='rating'>
                      ");

                      for ($i = 5; $i >= 1; $i--) {
                          echo ("<input type='radio' id='star$i-$reviewId' name='rating-$reviewId' value='$i'");
                          if ($reviewRating == $i) {
                              echo (" checked");
                          }
                          echo (">
                              <label for='star$i-$reviewId'>&#9733;</label>");
                      }

                      echo ("
                              </div>
                              <p class='review-description'>$reviewDescription</p>
                          </div>
                        </div>
                    ");
                }
                ?>
          </div>
        </section>
   <!--footer-->
   <footer>
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
                            <a href="./Register.php" class='text-decoration-none text-light' target="_blank"><h5 class="mt-3">Buy from CleckCart</h5></a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 text-center">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h3 class="mt-5">Help</h3>
                            <a href="./Contact.php" class='text-decoration-none text-light' target="_blank"><h5 class="mt-4 mb-3">Contact Us</h5></a>
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