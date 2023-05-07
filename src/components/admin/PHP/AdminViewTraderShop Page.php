<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminViewTrader'sShop</title>
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
 <!-- Vertical navbar -->
 <div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="images/p-1.png" alt="..." width="80" height="80" class="m-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">Admin</h4>
      </div>
    </div>
  </div>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="./AdminDashboard.php" class="nav-link text-dark">
        <i class="fa-solid fa-house fa-lg m-3"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="./AdminViewTraderItemsPage.php" class="nav-link text-dark">
        <i class="fa-regular fa-cube fa-lg m-3"></i>Manage Products
      </a>
    </li>
    <li class="nav-item">
      <a href="./AdminViewTraderPage.php" class="nav-link text-dark">
      <i class="fa-solid fa-user fa-lg m-3"></i>Manage Traders
      </a>
    </li>
    <li class="nav-item">
      <a href="./AdminViewTraderShop Page.php" class="nav-link text-dark">
      <i class="fa-solid fa-shop fa-lg m-3"></i>Manage Shops
      </a>
    </li>
    <li class="nav-item">
      <a href="./AdminViewCustomerPage.php" class="nav-link text-dark">
      <i class="fa-solid fa-headset fa-lg m-3"></i>Manage Customers
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-line-chart m-3 fa-fw fa-lg m-3"></i>Sales Report
      </a>
    </li>
    <li class="nav-item">
      <a href="../../guest/PHP/HomePage.php" class="nav-link text-dark">
        <i class="fa-solid fa-globe fa-lg m-3"></i>Go to Website
      </a>
    </li>
    <li class="nav-item">
      <a href="./AdminApproveTrader.php" class="nav-link text-dark">
      <i class="fa-solid fa-users m-3"></i>Approve Traders
      </a>
    </li>
    <li class="nav-item">
      <a href="./AdminApproveTraderItemPage.php" class="nav-link text-dark">
      <i class="fa-solid fa-square-check m-3"></i>Approve Products
      </a>
    </li>
    <li class="nav-item">
      <a href="./AdminLogout.php" class="nav-link text-dark">
        <i class="fa-solid fa-power-off m-3"></i></i>
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
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-2 bg-success">
        <div class="col p-5">
          <h1>Manage Shops</h1>
        </div>
        <div class="col p-5 text-end">
          <div class="mt-2">
            <form class="d-flex" role="search" method="POST" action="">
              <input type="text" name="searchProduct" placeholder="Search a product" class="form-control border border-dark" value="<?php
              if (isset($_POST['searchProduct'])) {
                   echo (trim($_POST['searchProduct']));
                }
              ?>">
              <input type="submit" name="searchCustomerSubmit" value="Search" class="btn btn-light">
              <a href = "./TraderViewItemsAdd.php" name="searchCustomerSubmit" value="Add Item" class="mx-3 btn btn-light">Add&nbsp;Item</a>
            </form>
          </div>
        </div>
      </div>
      <div class="row table-responsive">
        <table class="table table-light table-striped text-center">
        <?php
        if(isset($_GET['error'])) {?>
          <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
        <?php }?>
        <?php
        if(isset($_GET['success'])) {?>
          <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
        <?php }?>
          <thead class="table-success">
            <tr>
              <th>Select</th>
              <th>Shop Id</th>
              <th>User Id</th>
              <th>Shop Name</th>
              <th>Shop Owner</th>
              <th>Shop Description</th>
              <th colspan=2>Action</th>            
            </tr>
          </thead>
          <?php
          include('connect.php');
          $query = "SELECT * FROM SHOP ORDER BY SHOP_ID";
          $result = oci_parse($conn, $query);
          oci_execute($result);
          while($row = oci_fetch_array($result, OCI_ASSOC)){
            $id = $row['SHOP_ID'];
            $name = $row['SHOP_NAME'];
            echo("<tr><td><input type='checkbox'/></td>");
            echo("<td>$id</td>");
            echo("<td>$row[USER_ID]</td>");
            echo("<td>$row[SHOP_NAME]</td>");
            echo("<td>$row[SHOP_OWNER]</td>");
            echo("<td>$row[SHOP_DESCRIPTION]</td>");
            echo("<td><a href='AdminViewTraderShopEdit.php?id=$id&action=edit' class = 'btn'><img src='./../../../dist/public/edit.svg' alt='edit'></a></td>");
          }
          ?>
        </table>
      </div>
    <!-- End demo content -->
</body>

</html>