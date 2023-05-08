<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!--WebPage Icon-->
    <link rel="stylesheet" href="../CSS/overwrite.css">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <div class = "container">
        <h1>My Orders</h1>
        <div class = "container">
            <div class = "row">
                <div class = "col text-start">
                    <p>Order ID : 324234</p>
                </div>
                <div class = "col text-end">
                    <p>Order Placed By : lorem</p>
                </div>
            </div>
            <div class="row table-responsive">
                <table class="table table-light table-striped text-center">
                    <thead class="table-success">
                        <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th >Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Collection Date</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                        <tr>
                        <td><img src = "../../../dist/public/1.jpg" class = "w-50 h-50"/></td>
                        <td>lorem</td>
                        <td>Lorem</td>
                        <td>Lorem ipsum asdfsdafasdf</td>
                        <td>&pound;200</td>
                        <td>1</td>
                        <td>2023/12/12</td>
                        <td>2023/12/12</td>
                        </tr>
                    ';
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class = "container">
            <div class = "row">
                <div class = "col text-start">
                    <p>Order ID : 324234</p>
                </div>
                <div class = "col text-end">
                    <p>Order Placed By : lorem</p>
                </div>
            </div>
            <div class="row table-responsive">
                <table class="table table-light table-striped text-center">
                    <thead class="table-success">
                        <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th >Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Collection Date</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                        <tr>
                        <td><img src = "../../../dist/public/1.jpg" class = "w-50 h-50"/></td>
                        <td>lorem</td>
                        <td>Lorem</td>
                        <td>Lorem ipsum asdfsdafasdf</td>
                        <td>&pound;200</td>
                        <td>1</td>
                        <td>2023/12/12</td>
                        <td>2023/12/12</td>
                        </tr>
                    ';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class = "container">&nbsp;</div>
    
</body>
</html>