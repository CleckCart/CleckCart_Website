<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleckCart</title>
    <!--WebPage Icon-->
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/homepage.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src = "../../service/passwordVisibility.js"></script>

            if(isset($_GET['user'])){
                $user = $_GET['user'];
            }
        ?>
        <!--NavBar-->
        <div class = "topbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-my-custom-color">
            <div class="container-fluid">

                    <img src="./../../../dist/public/logo.png" class="img-fluid" width = "70" height="70" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item me-5">

                        </li>

                        <li class="nav-item dropdown me-5"><!---->
                            <a class="nav-link mr-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              </ul>
                        </li>

                        <li class="nav-item me-5">

                        </li>
                    </ul>

                    <ul class="d-flex mb-2 mb-lg-0 list-unstyled">
                        <li class="nav-item me-3">

                        </li>
                        <li class="nav-item dropdown me-3"><!---->
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./../../../dist/public/person.svg" alt="person">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid text-center mb-5">
        <h1 >PRODUCTS ON SALE</h1>
    </div>
    <div class = "container-fluid p-5">
        <div class="row row-cols-1 row row-cols-md-2 row-cols-xl-4 g-2">
            <?php
                $offerquery = "SELECT * FROM OFFER";
                $offerqueryresult = oci_parse($conn,$offerquery);
                oci_execute($offerqueryresult);
                while($data = oci_fetch_array($offerqueryresult, OCI_ASSOC)){
                    $discountProductID = $data['PRODUCT_ID'];
                    $discountAmount = $data['DISCOUNT'];

                    $query = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$discountProductID'";
                    $result = oci_parse($conn, $query);
                    oci_execute($result);

                    while($row = oci_fetch_array($result, OCI_ASSOC)){
                        $id = $row['PRODUCT_ID'];
                        $name = ucwords($row['PRODUCT_NAME']);
                        $categoryId = $row['CATEGORY_ID'];
                        $shopId = $row['SHOP_ID'];
                        $categoryName = $row['CATEGORY_NAME'];
                        $productImage = $row['PRODUCT_IMAGE'];
                        $productName = ucwords($row['PRODUCT_NAME']);
                        $changecase=ucfirst($row['PRODUCT_NAME']);
                        $productDescription = $row['PRODUCT_DESCRIPTION'];
                        $productPrice = $row['PRODUCT_PRICE'];
                        $productStock = $row['PRODUCT_STOCK'];
                        $discountedPrice = $productPrice-($productPrice*($discountAmount/100));
                        echo("<div class='col p-5'>");
                        echo("<div class='card'style='position:relative'>");
                        echo("<div class='on-sale p-2'style='
                                                            position:absolute;
                                                            background-color:#C41E3A;
                                                            color:#ffffff;'>
                                                            <b>$discountAmount %</b>
                            </div>");
                        echo("<a class = 'text-decoration-none  ' href = './ProductDetail.php?id=$id&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&newPrice=$discountedPrice&stock=$productStock'>
                            <img src='./../../../dist/public/TraderItemImages/$row[PRODUCT_IMAGE]' class='img-thumbnail img-responsive' alt='$row[PRODUCT_IMAGE]' 
                            style='width:100%;
                                   height:17vw;

                        echo("<div class='card-body'>");
                        echo("<div class = 'row'>
                                
                                    <h3 class='card-title text-dark'>$name</h3>
                                </div>
                                <div class = 'row'>
                                    <h3 class='card-title text-dark'> &pound;<del style='color:red';><span style='color:black';>$row[PRODUCT_PRICE]</span></del>&nbsp;&nbsp;&nbsp;&nbsp;$discountedPrice</h3>
                                </div>");           
                        echo("</div></a>");            
                        echo("<div class='d-flex flex-row flex-wrap p-1 align-self-center w-100'>");
                        echo("<a class='#add-to-cart'></a>");   //section of page to be redirected when header is passed            

                        echo("</div>");
                        echo("</div>");
                        echo("</div>");
                    }
                }




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