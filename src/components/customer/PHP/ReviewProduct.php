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
    <link rel="stylesheet" href="../CSS/product-detail.css" />
    <link rel="stylesheet" href="../CSS/displayReview.css" />
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php
    include('./connect.php');
      if(isset($_GET['user']) && isset($_GET['id']) ){
        $user = $_GET['user'];
        $productId = $_GET['id'];
      }

      $query = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$productId'";
      $result = oci_parse($conn, $query);
      oci_execute($result);
      while($row = oci_fetch_array($result, OCI_ASSOC)){
        $productName = $row['PRODUCT_NAME'];
        $productDescription = $row['PRODUCT_DESCRIPTION'];
        $productImage = $row['PRODUCT_IMAGE'];
        $productPrice = $row['PRODUCT_PRICE'];
      }
  ?>
  <!--modal code-->
  <!-- <div class="modal">
    <div class="modal-content">
      <h2 class="modal-title">Review</h2>
      <div class="modal-description">
        <span>Description:</span>
        <textarea placeholder="Write your review here"></textarea>
      </div>
      <div class="modal-rating">
        <span>Rating:</span>
        <div class="stars">
          
        </div>
      </div>
      <div class="modal-buttons">
        <button class="modal-cancel">Cancel</button>
        <button class="modal-submit">Submit</button>
      </div>
    </div>
  </div> -->
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
                <img class="<?php echo ($productImage)?>" src="src/assets/img/bakery.jpg" alt="">
              </div>
              <div class="product-info">
                  <div class="product-title-box">
                    <h2 class="product-title"><?php echo($productName)?></h2>
                    <img src="" alt="Favourite icon">
                  </div>
                  <div class="star-rating-box">
                    <p>Star rating <span>No of rating</span></p>
                  </div>
                <p class="product-description"><?php echo($productDescription) ?></p>
                <span class="product-price"><?php echo('&pound;' . $productPrice);?></span>
                <?php echo("<a href = './ReviewPage.php?user=$user&id=$productId' class='btn add-to-cart'>WRITE A REVIEW</a>")?>
                </div>
          </div>
          
          <div class="lower-section">
            <h2 class="review-heading">Customer Reviews</h2>
            <?php
              $queryReview = "SELECT * FROM REVIEW WHERE PRODUCT_ID = '$productId'";
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
                  </div>");
              }
              ?>
          </div>
        </section>
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
                                <a class="nav-link p-3" href="https://twitter.com/" target="_blank"><img src="./../../../dist/public/twitter.svg" alt="twitter"></a>
                                <a class="nav-link p-3" href="https://www.facebook.com/" target="_blank"><img src="./../../../dist/public/facebook.svg" alt="facebook"></a>
                                <a class="nav-link p-3" href="https://www.instagram.com/" target="_blank"><img src="./../../../dist/public/instagram.svg" alt="instagram"></a>
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