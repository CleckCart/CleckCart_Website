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
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src = "../../service/passwordVisibility.js"></script>
    <div class="container">
        <div class="d-flex bd-highlight align-items-center">
            <div class="p-2 flex-grow-1 bd-highlight"><h1>My WishList</h1></div>
            <div class="p-2 flex-fill bd-highlight text-end ms-5"><h4>Price</h4></div>
            <div class="p-2 flex-fill bd-highlight text-end me-5"><h4>Actions</h4></div>
        </div>
        <?php
            for($i = 0; $i < 10; $i++) {
                echo'<div class="container mb-5">
                <div class="d-flex bd-highlight bg-primary align-items-center">
                    <div class="p-2 d-flex flex-row flex-grow-1 bd-highlight align-items-center">
                        <div class="flex-fill mx-2"><img src = "../../../dist/public/1.jpg" ></div>
                        <div class="flex-fill mx-2"><p>this is a product</p></div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight text-end me-5">
                        <p>$10.00</p>
                    </div>
                    <div class="p-2 flex-fill bd-highlight text-end">
                        <a class="btn me-4" href="#" role="button"><img src="./../../../dist/public/cart2.svg" alt="search"></a>
                        <a class="btn" href="#" role="button"><img src="./../../../dist/public/delete.svg" alt="search"></a>
                    </div>
                </div>
            </div>';
            }
        ?>
    </div>
</body>
</html>