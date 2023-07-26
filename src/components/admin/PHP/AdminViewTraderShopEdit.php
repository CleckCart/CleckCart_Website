<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Shop</title>
  <link rel="icon" href="./../../../dist/public/logo.png" sizes="16x16 32x32" type="image/png">
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
          <i class='fa-solid fa-users m-3 fa-lg'></i>Approve Traders
          </a>
        ");
      ?>
    </li>
    <li class="nav-item">
      <?php echo("
        <a href='./AdminApproveTraderItemPage.php?user=$user' class='nav-link text-dark'>
        <i class='fa-solid fa-square-check m-3 fa-lg'></i>Approve Products
        </a>
      ")?>
    </li>
    <li class="nav-item">
      <a href="./AdminLogout.php" class="nav-link text-dark">
        <i class="fa-solid fa-power-off m-3 fa-lg"></i></i>
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
          <?php
            if(isset($_GET['id']) && isset($_GET['action'])) 
              {
                  $EditShopId = $_GET['id'];
                  $FetchShopQuery = "SELECT * FROM SHOP WHERE SHOP_ID = $EditShopId";                 
                  $RunFetchShopQuery = oci_parse($conn, $FetchShopQuery);;
                  oci_execute($RunFetchShopQuery); 
              
                  while($row=oci_fetch_array($RunFetchShopQuery, OCI_ASSOC))
                      {
                          $ShopId = $row['SHOP_ID'];
                          $ShopName = $row['SHOP_NAME'];
                          $ShopDescription = $row['SHOP_DESCRIPTION'];
                      }
              }
          ?>
          <div class="container bg-light border rounded">
            <div class="modal-header text-center">
              <h5 class="modal-title mx-auto w-100" id="exampleModalLabel">Update Shops</h5>
            </div>
            <div class="modal-body">
              <?php echo("<form method='POST' action='AdminViewTraderShopEditSubmit.php?user=$user'>")?>
                <?php
                  if(isset($_GET['error'])) {?>
                      <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
                <?php }?>
                <?php
                  if(isset($_GET['success'])) {?>
                      <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
                <?php }?>
                  <div class="mb-3">
                    <div class="row mb-3">
                      <div class="col">
                        <input type='hidden' name='EditShopId' value='<?php
                        echo($ShopId);?>'>
                        <label for="exampleInputText1" class="form-label">Name</label>
                        <input type="text" class="form-control" aria-label="Name" name="TraderShopName" placeholder="Shop name" value="<?php
                        echo($ShopName);
                        ?>">
                      </div>
                    </div>
                  </div>
                    <div class="row mb-3">
                      <div class="col">
                        <label for="exampleInputText1" class="form-label">Description</label>
                        <textarea class="form-control" placeholder="Leave a comment here" rows="5" name="TraderShopDescription"><?php
                        echo($ShopDescription);
                        ?></textarea>
                      </div>
                    </div>
                  </div>
              
                  <div class="modal-footer">
                    <input type="submit" class="form-control btn btn-success w-100" value="Update" name="TraderShopEditSubmit"></button>
                  </div>
              </form>
          </div>
    <!-- End demo content -->
</body>

</html>