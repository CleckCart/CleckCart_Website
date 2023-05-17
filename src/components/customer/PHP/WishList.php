<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WishList</title>
    <!--WebPage Icon-->
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/homepage.css">
    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>
    <script src = "../../service/passwordVisibility.js"></script>
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
            <div class="row table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="4" class = "text-center"><h1>My WishList</h1></th>
                            <th colspan="4" class = "text-end"><h3>Price</h3></th>
                            <th colspan="3" class = "text-center"><h3>Action</h3></th>
                        </tr>
                    </thead>
                    <?php

                    $queryCustomer = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' AND ROLE = 'customer'";
                    $resultCustomer = oci_parse($conn, $queryCustomer);
                    oci_execute($resultCustomer);
                    while($rowCustomer = oci_fetch_array($resultCustomer, OCI_ASSOC)){
                        $userId = $rowCustomer['USER_ID'];
                    }
                    
                    $queryWishList = "SELECT * FROM WISHLIST WHERE USER_ID = $userId";
                    $resultWishList = oci_parse($conn, $queryWishList);
                    oci_execute($resultWishList);
                    while($rowCart = oci_fetch_array($resultWishList, OCI_ASSOC)){
                        $wishlistId = $rowCart['WISHLIST_ID'];
                    }

                    $queryWishListProduct = "SELECT * FROM WISHLIST_PRODUCT WHERE WISHLIST_ID = $wishlistId";
                    $resultWishListProduct = oci_parse($conn, $queryWishListProduct);
                    oci_execute($resultWishListProduct);
                    while($rowWishListProduct = oci_fetch_array($resultWishListProduct, OCI_ASSOC)){
                        $productId = $rowWishListProduct['PRODUCT_ID'];
                    }
                    
                    $queryProductTable = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $productId";
                    $resultProductTable = oci_parse($conn, $queryProductTable);
                    oci_execute($resultProductTable);
                    while($rowProductTable = oci_fetch_array($resultProductTable, OCI_ASSOC)){
                        $productDescription = $rowProductTable['PRODUCT_DESCRIPTION'];
                    }




                    $queryWishListProduct = "SELECT * FROM WISHLIST_PRODUCT WHERE WISHLIST_ID = $wishlistId";
                    $resultWishListProduct = oci_parse($conn, $queryWishListProduct);
                    oci_execute($resultWishListProduct);
                    $productTotalPrice = 0;
                    while($rowWishListProduct = oci_fetch_array($resultWishListProduct, OCI_ASSOC)){
                        $wishlistId = $rowWishListProduct['WISHLIST_ID'];
                        $wishlistproductId = $rowWishListProduct['WISHLIST_PRODUCT_ID'];
                        $productId = $rowWishListProduct['PRODUCT_ID'];
                        $productImage = $rowWishListProduct['PRODUCT_IMAGE'];
                        $productName = $rowWishListProduct['PRODUCT_NAME'];
                        $productPrice = $rowWishListProduct['PRODUCT_PRICE'];
                        echo "<tr>
                        <td colspan = '3' class ='text-center'><img src='$productImage' alt='image' width='80'height='60'></td>
                        <td colspan = '2' >$productName</td>
                        <td colspan = '3' class = 'text-end'>&pound;$productPrice</td>
                        <td colspan = '3' class = 'text-center'>
                            <!-- Delete Button trigger modal -->
                            <a class='btn custom-btn' href = './CartProducts.php?user=$user&id=$productId&image=$productImage&name=$productName&description=$productDescription&price=$productPrice&quantity=1'>
                                <img src='./../../../dist/public/cart2.svg' alt='delete' >
                            </a>
                            <button class='btn' data-bs-toggle='modal' data-bs-target='#exampleModalDelete' data-id='$wishlistproductId' data-name='$productName' data-user='$user'>
                                <img src='./../../../dist/public/delete.svg' alt='delete'/>
                            </button>
                        </td>
                        </tr>";
                    }
                    ?>
                </table>
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
                        echo("<a href='./WishListProductsDelete.php?user=$user&id=$wishlistproductId' id='deleteLink' class='btn btn-danger mx-auto w-100'>Delete</a>");
                    ?>
                    <button type="button" class="btn btn-secondary mx-auto w-100" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class = 'container'>&nbsp;</div>
        <script>
        $('#exampleModalDelete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var user = button.data('user');
            var id = button.data('id'); // Extract cart product id from data-id attribute
            var name = button.data('name'); // Extract product name from data-name attribute
            var modal = $(this);
            modal.find('#productName').text(name); // Update the modal content
            modal.find('#deleteLink').attr('href', './WishListProductsDelete.php?user=' + user + '&id=' + id + '&action=delete' + '&name=' + name); // Update the delete link
        });
        </script>

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