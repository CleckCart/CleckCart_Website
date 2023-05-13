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
    <!--bootstrap JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--Jquery-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>

<body>


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


    <div class="container-fluid">
    <?php
        if(isset($_GET['error'])) {?>
          <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
        <?php }?>
        <?php
        if(isset($_GET['success'])) {?>
          <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
        <?php }?>
        <div class="row px-5 ">
            <div class="col-sm-8 ">
                <h3>My Cart</h3>
            </div>
            <div class="col-sm-4 "></div>
        </div>


        <div class="row px-5 ">
            <div class="col-sm-7 ">
            <div class="row table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th colspan = '2' class = 'text-center'><h3>Name</h3></th>
                            <th class = 'text-center'><h3>Price</h3></th>
                            <th class = 'text-center'><h3>Quantity</h3></th>
                            <th class = 'text-center'><h3>Action</h3></th>
                        </tr>
                    </thead>

                    <?php
                    $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE = 'customer'";
                    $resultCustomer = oci_parse($conn, $queryCustomer);
                    oci_execute($resultCustomer);
                    while($rowCustomer = oci_fetch_array($resultCustomer, OCI_ASSOC)){
                        $userId = $rowCustomer['USER_ID'];
                    }
                    
                    $queryCart = "SELECT * FROM CART WHERE USER_ID = $userId";
                    $resultCart = oci_parse($conn, $queryCart);
                    oci_execute($resultCart);
                    while($rowCart = oci_fetch_array($resultCart, OCI_ASSOC)){
                        $cartId = $rowCart['CART_ID'];
                    }

                    $queryCartProduct = "SELECT * FROM CART_PRODUCT WHERE CART_ID = $cartId";
                    $resultCartProduct = oci_parse($conn, $queryCartProduct);
                    oci_execute($resultCartProduct);
                    $productTotalPrice = 0;
                    while($rowCartProduct = oci_fetch_array($resultCartProduct, OCI_ASSOC)){
                        $cartId = $rowCartProduct['CART_ID'];
                        $cartproductId = $rowCartProduct['CART_PRODUCT_ID'];
                        $productId = $rowCartProduct['PRODUCT_ID'];
                        $productImage = $rowCartProduct['PRODUCT_IMAGE'];
                        $productName = $rowCartProduct['PRODUCT_NAME'];
                        $productPrice = $rowCartProduct['PRODUCT_PRICE'];
                        $productQuantity = $rowCartProduct['PRODUCT_QUANTITY'];
                        $productTotalPrice += $productPrice * $productQuantity;
                        echo ("<tr>
                        <td ><img src='../../../dist/public/$productImage' alt='image' width='80'height='60'></td>
                        <td>$productName</td>
                        <td class = 'text-center'>&pound;$productPrice</td>
                        <td class = 'text-center'>$productQuantity</td>
                        <td class = 'text-center'>
                        <!-- Delete Button trigger modal -->
                        <button class='btn' data-bs-toggle='modal' data-bs-target='#exampleModalDelete' data-id='$cartproductId' data-name='$productName' data-user='$user'>
                        <img src='./../../../dist/public/delete.svg' alt='delete'/>
                        </button>
                        </td>
                        </tr>");
                    }
                    ?>
                </table>
            </div>
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
                    <h5>Sub Total: &pound;<?php echo($productTotalPrice) ?></h5>
                    <?php echo("<a class='btn btn-primary w-50 d-block mx-auto' href='./PayementGateway.php?user=$user' role='button'>Checkout</a>")?>
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
                    <img src="../../../dist/public/remove.svg" alt="">
                    <h3 class="mt-3">Are You Sure?</h3>
                    <p>You are about to remove <span id="productName"> </span> from your cart. This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer text-center">
                    <?php
                        echo("<a href='./CartProductsDelete.php?user=$user&id=$cartproductId' id='deleteLink' class='btn btn-danger mx-auto w-100'>Delete</a>");
                    ?>
                    <button type="button" class="btn btn-secondary mx-auto w-100" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        <script>
        $('#exampleModalDelete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var user = button.data('user');
            var id = button.data('id'); // Extract cart product id from data-id attribute
            var name = button.data('name'); // Extract product name from data-name attribute
            var modal = $(this);
            modal.find('#productName').text(name); // Update the modal content
            modal.find('#deleteLink').attr('href', './CartProductsDelete.php?user=' + user + '&id=' + id + '&action=delete' + '&name=' + name); // Update the delete link
        });
        </script>
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