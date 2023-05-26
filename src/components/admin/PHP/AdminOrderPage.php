<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <!--font awesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome CSS-->
    <link rel="stylesheet" href="../CSS/style.css">
    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--Custom-->
    <script src="../../service/sidebartoggle.js"></script>
</head>
<body>
  <?php
    include('connect.php');
    if(isset($_GET['user'])){
      $user = $_GET['user'];
    }
  ?>
  <!-- Vertical navbar -->
  <div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center mt-4 mb-4">
        <img src='./../../../dist/public/logo.jpg' alt='logo.jpg' class='rounded-circle img-responsive p-1 border border-grey' width='80' height='70'>
        <div class="media-body">
          <?php echo("<h4 class='ms-3'>$user</h4>")?>
        </div>
      </div>
    </div>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <?php echo("<a href='./AdminDashboard.php?user=$user' class='nav-link text-dark'>
        <i class='fa-solid fa-house fa-lg m-3'></i> Dashboard
      </a>");?>
    </li>
    <li class="nav-item">
      <?php echo("<a href='./AdminViewTraderItemsPage.php?user=$user' class='nav-link text-dark'>
        <i class='fa-solid fa-cart-shopping fa-lg m-3'></i></i>Manage Products
      </a>");?>
    </li>
    <li class="nav-item">
      <?php
      echo("<a href='./AdminViewTraderPage.php?user=$user' class='nav-link text-dark'>
      <i class='fa-solid fa-user fa-lg m-3'></i>Manage Traders
      </a>");?>
    </li>
    <li class="nav-item">
      <?php echo("<a href='./AdminViewTraderShop Page.php?user=$user' class='nav-link text-dark'>
      <i class='fa-solid fa-shop fa-lg m-3'></i>Manage Shops
      </a>");?>
    </li>
    <li class="nav-item">
      <?php echo ("
        <a href='./AdminViewCustomerPage.php?user=$user' class='nav-link text-dark'>
        <i class='fa-solid fa-headset fa-lg m-3'></i>Manage Customers
        </a>
      ");?>
    </li>
    <li class="nav-item">
        <?php echo("<a href='./AdminOrderPage.php?user=$user' class='nav-link text-dark'>")?>
        <i class="fa-solid fa-cart-plus fa-lg m-3"></i>Manage Orders
      </a>
    </li>
    <li class="nav-item">
      <?php
        echo("<a href='http://localhost:8080/apex/f?p=108:LOGIN_DESKTOP:6262924551559:::::' class='nav-link text-dark'>
        <i class='fa fa-line-chart m-3 fa-fw fa-lg m-3'></i>Sales Report
      </a>")
      ?>
    </li>
    <li class="nav-item">
        <a href='../../guest/PHP/HomePage.php' class='nav-link text-dark'>
          <i class='fa-solid fa-globe fa-lg m-3'></i>Go to Website
        </a>
    </li>
    <li class="nav-item">
      <?php
        echo("
          <a href='./AdminApproveTrader.php?user=$user' class='nav-link text-dark'>
          <i class='fa-solid fa-users fa-lg m-3'></i>Approve Traders
          </a>
        ");
      ?>
    </li>
    <li class="nav-item">
      <?php echo("
        <a href='./AdminApproveTraderItemPage.php?user=$user' class='nav-link text-dark'>
        <i class='fa-solid fa-square-check fa-lg m-3'></i>Approve Products
        </a>
      ")?>
    </li>
    <li class="nav-item">
      <a href="./AdminLogout.php" class="nav-link text-dark">
        <i class="fa-solid fa-power-off fa-lg m-3"></i></i>
                Log Out
            </a>
    </li>
  </ul>
  </div>
<!-- End vertical navbar -->




<!-- Page content holder -->


<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i></button>

  <!-- Demo content -->
  <!--Code -->
  <div class="container">
      <div class="row bg-success border rounded">
        <div class="col-12 p-5">
          <h1>Manage Orders</h1>
        </div>
      </div>
        <?php
            if(isset($_GET['error'])) {?>
                <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
        <?php }?>
        <?php
            if(isset($_GET['success'])) {?>
                <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
        <?php }?>
        <?php

            $CartQuery = "SELECT * FROM CART";
            $runCartQuery=oci_parse($conn,$CartQuery);
            oci_execute($runCartQuery);
            
            while($CartRow=oci_fetch_assoc($runCartQuery))
              {
                $CartId = $CartRow['CART_ID'];
                $UserId = $CartRow['USER_ID'];
                $OrderQuery = "SELECT * FROM ORDER_C WHERE CART_ID = '$CartId'";
                $runOrderQuery=oci_parse($conn,$OrderQuery);
                oci_execute($runOrderQuery);

                
                while($row=oci_fetch_assoc($runOrderQuery))
                {
                  $OrderId=$row['ORDER_ID'];
                  $OrderDate=$row['ORDER_DATE'];
                  
                  $UserQuery = "SELECT * FROM USER_TABLE WHERE USER_ID = '$UserId'";
                  $runUserQuery=oci_parse($conn,$UserQuery);
                  oci_execute($runUserQuery);
                  $row2=oci_fetch_assoc($runUserQuery);
                  $Username = $row2['USERNAME'];
                        echo("
                            <div class = 'container bg-light border rounded mb-3 w-100 mt-3'>
                                <div class = 'container mt-3'>
                                    <p><b>Order Id : $OrderId<br>
                                    Customer Username : $Username</b></p>
                                        <div class='row table-responsive rounded'>
                                            <table class='table table-striped text-center'>
                                                <thead class='table-success'>
                                                    <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Order Date</th>
                                                    <th>Collection Date</th>
                                                    </tr>
                                                </thead><tbody>");
                        $OrderProductQuery = "SELECT * FROM ORDER_PRODUCT WHERE ORDER_ID = '$OrderId'";
                        $runOrderProductQuery=oci_parse($conn,$OrderProductQuery);
                        oci_execute($runOrderProductQuery);
                        while($row2=oci_fetch_assoc($runOrderProductQuery))
                            {
                                
                                $ProductId = $row2['PRODUCT_ID'];
                                $ProductQuantity = $row2['ORDER_QUANTITY'];

                                $ProductQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$ProductId'";
                                $runProductQuery=oci_parse($conn,$ProductQuery);
                                oci_execute($runProductQuery);  
                                $ProductRow = oci_fetch_assoc($runProductQuery); 

                                $CollectionQuery = "SELECT * FROM COLLECTION_SLOT WHERE ORDER_ID = '$OrderId' AND SLOT_STATUS='Y'";
                                $runCollectionQuery=oci_parse($conn,$CollectionQuery);
                                oci_execute($runCollectionQuery);  
                                $CollectionRow = oci_fetch_assoc($runCollectionQuery); 
                                $CollectionDate=$CollectionRow['COLLECTION_DATE'];
                                
                                $slotStatus = $CollectionRow['SLOT_STATUS'];

                                if(!empty($slotStatus)){
                                    echo("<tr>
                                            <td>$ProductRow[PRODUCT_IMAGE]</td>
                                            <td>$ProductRow[PRODUCT_NAME]</td>
                                            <td>$ProductRow[CATEGORY_NAME]</td>
                                            <td>$ProductRow[PRODUCT_DESCRIPTION]</td>
                                            <td>&pound;$ProductRow[PRODUCT_PRICE]</td>
                                            <td>$ProductQuantity</td>
                                            <td>$OrderDate</td>
                                            <td>$CollectionDate</td>
                                            </tr>");
                                }
                                else{
                                    echo("<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No payment made for this order.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>");
                                }

                            }
                        echo("</tbody></table></div></div></div>");
                    }    
              }                                        
        ?>        
  </div>
</div>



</body>
</html>