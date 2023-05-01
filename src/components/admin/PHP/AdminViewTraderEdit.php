<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminViewTraders</title>
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
        <a href="./AdminViewTrader'sItemsPage.php" class="nav-link text-dark">
          <i class="fa-regular fa-cube fa-lg m-3"></i>Manage Products
        </a>
      </li>
      <li class="nav-item">
        <a href="./AdminViewTraderPage.php" class="nav-link text-dark">
          <i class="fa-solid fa-user fa-lg m-3"></i>Manage Traders
        </a>
      </li>
      <li class="nav-item">
        <a href="./AdminViewTrader'sShop Page.php" class="nav-link text-dark">
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
        <a href="../../customer/PHP/HomePage.php" class="nav-link text-dark">
          <i class="fa-solid fa-globe fa-lg m-3"></i>Go to Website
        </a>
      </li>
      <li class="nav-item">
        <a href="./AdminApproveTrader'sItemPage.php" class="nav-link text-dark">
          <i class="fa-solid fa-square-check m-3"></i>Approve Products
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
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
          <div class="container bg-light">
            <div class="modal-header text-center">
              <h5 class="modal-title mx-auto w-100" id="exampleModalLabel">Update Trader</h5>
            </div>
            <div class="modal-body">
              <form method="POST" action="AdminViewTraderEditSubmit.php">
              <?php
                if(isset($_GET['error'])) {?>
                    <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
              <?php }?>
                <div class="mb-3">
                  <div class="row mb-3">
                    <div class="col">
                      <label for="exampleInputText1" class="form-label">First Name</label>
                      <input type="text" class="form-control" placeholder="Enter First Name" aria-label="First name" name="TraderEditFirstName">
                    </div>
                    <div class="col">
                      <label for="exampleInputText1" class="form-label">Last Name</label>
                      <input type="text" class="form-control" placeholder="Enter Last Name" aria-label="Last name" name="TraderEditLastName">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col">
                      <label for="exampleInputText1" class="form-label">Username</label>
                      <input type="tel" class="form-control" placeholder="Enter Phone Number" aria-label="Username" name="TraderEditUserName">
                    </div>
                    <div class="col">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" name="TraderEditEmail">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col">
                      <label for="exampleInputText1" class="form-label">Address</label>
                      <input type="tel" class="form-control" placeholder="Enter Address" aria-label="Address" name="TraderEditAddress">
                    </div>
                    <div class="col">
                      <label for="exampleInputText1" class="form-label">Phone</label>
                      <input type="tel" class="form-control" placeholder="Enter Phone Number" aria-label="PhoneNumber" name="TraderEditPhone">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col">
                      <label for="file" class="form-label">Image</label>
                      <input type="file" class="form-control" id="file" aria-label="File" name="TraderEditImage">
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary w-100 " value="Update" name="TraderEditSubmit">
            </div>
            </form>
          </div>
    <!-- End demo content -->
</body>

</html>