<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraderDashboard</title>
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
<body>
  <?php
    include('./connect.php');
    if(isset($_GET['user'])){
      $user = $_GET['user'];
    }

    $query = "SELECT * FROM USER_TABLE WHERE USERNAME = '$user' and ROLE='trader'";
    $result = oci_parse($conn, $query);
    oci_execute($result);
    while($row = oci_fetch_array($result, OCI_ASSOC)){
        $image=$row['IMAGE']; 
         
    }
  ?>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
      <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center">
          <?php echo"<img src='./../../../dist/public/TraderImages/$image' alt='$image' class='m-3 rounded-circle img-responsive p-1 border border-grey' alt='$image' width='90' height='80'>"; ?>
          <div class="media-body">
            <?php echo("<h4 class='m-0'>$user</h4>")?>
          </div>
        </div>
      </div>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
        <?php echo("<a href='./TraderDashboard.php?user=$user' class='nav-link text-dark'>")?>
        <i class="fa-solid fa-house fa-lg m-3"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <?php echo("<a href='./TraderViewItems.php?user=$user' class='nav-link text-dark'>")?>
      <i class="fa-solid fa-cart-shopping fa-lg m-3"></i>Manage Products
      </a>
    </li>
    <li class="nav-item">
      <?php echo("<a href='./TraderManageProfile.php?user=$user' class='nav-link text-dark'>")?>
        <i class="fa-solid fa-user fa-lg m-3"></i>Manage Profile
      </a>
    </li>
    <li class="nav-item">
        <?php echo("<a href='./TraderOrderPage.php?user=$user' class='nav-link text-dark'>")?>
        <i class="fa-solid fa-cart-plus fa-lg m-3"></i>Manage Orders
      </a>
    </li>
    <li class="nav-item">
        <?php echo("<a href='#?user=$user' class='nav-link text-dark'>")?>
        <i class="fa fa-line-chart m-3 fa-fw fa-lg m-3"></i>Sales Report
      </a>
    </li>
    <li class="nav-item">
        <?php echo("<a href='../../guest/PHP/HomePage.php?' class='nav-link text-dark'>")?>
        <i class="fa-solid fa-globe fa-lg m-3"></i>Go to Website
      </a>
    </li>
    <li class="nav-item">
      <?php echo("<a href='./TraderLogout.php' class='nav-link text-dark'>")?>
        <i class="fa-solid fa-power-off fa-lg m-3"></i>Log Out
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

            $traderQuery = "SELECT * FROM USER_TABLE WHERE USERNAME='$user' AND ROLE='trader'";
            $runTraderQuery =oci_parse($conn, $traderQuery);
            oci_execute($runTraderQuery);
            $TraderRow = oci_fetch_assoc($runTraderQuery);
            $TraderId = $TraderRow['USER_ID'];

            $ShopQuery = "SELECT * FROM SHOP WHERE USER_ID='$TraderId'";
            $runShopQuery =oci_parse($conn, $ShopQuery);
            oci_execute($runShopQuery);
            $ShopRow = oci_fetch_assoc($runShopQuery);
            $ShopName = $ShopRow['SHOP_NAME'];

            $CartQuery = "SELECT * FROM CART";
            $runCartQuery=oci_parse($conn,$CartQuery);
            oci_execute($runCartQuery);
            
            while($CartRow=oci_fetch_assoc($runCartQuery))
              {
                $CartId = $CartRow['CART_ID'];
                $UserId = $CartRow['USER_ID'];
                $OrderQuery = "SELECT * FROM ORDER_C WHERE CART_ID = '$CartId' AND EXISTS (SELECT * FROM ORDER_PRODUCT op JOIN PRODUCT p ON op.PRODUCT_ID = p.PRODUCT_ID WHERE op.ORDER_ID = ORDER_C.ORDER_ID AND p.CATEGORY_NAME = '$ShopName')";
                $runOrderQuery=oci_parse($conn,$OrderQuery);
                oci_execute($runOrderQuery);

                $hasOrders = false;

                while($row=oci_fetch_assoc($runOrderQuery))
                {
                  $hasOrders = true;
                  $OrderId=$row['ORDER_ID'];
                  $OrderDate=$row['ORDER_DATE'];
                  
                  $UserQuery = "SELECT * FROM USER_TABLE WHERE USER_ID = '$UserId'";
                  $runUserQuery=oci_parse($conn,$UserQuery);
                  oci_execute($runUserQuery);
                  $row2=oci_fetch_assoc($runUserQuery);
                  $Username = $row2['USERNAME'];
                  if ($hasOrders) {
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

                                $ProductQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$ProductId' AND CATEGORY_NAME='$ShopName'";
                                $runProductQuery=oci_parse($conn,$ProductQuery);
                                oci_execute($runProductQuery);  
                                $ProductRow = oci_fetch_assoc($runProductQuery); 

                                $CollectionQuery = "SELECT * FROM COLLECTION_SLOT WHERE ORDER_ID = '$OrderId' AND SLOT_STATUS='Y'";
                                $runCollectionQuery=oci_parse($conn,$CollectionQuery);
                                oci_execute($runCollectionQuery);  
                                $CollectionRow = oci_fetch_assoc($runCollectionQuery); 
                                $CollectionDate=$CollectionRow['COLLECTION_DATE'];
                                
                                $slotStatus = $CollectionRow['SLOT_STATUS'];

                                if($slotStatus=='Y'){
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
            }                                       
        ?>        
  </div>
</div>


</div>
<!-- End demo content -->

</body>
</html>