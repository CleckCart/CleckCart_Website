<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TraderViewItems</title>
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

<body>

<?php
    include('./connect.php');
    if(isset($_GET['user'])){
      $user = $_GET['user'];
    }

    $FetchCategory = "SELECT * FROM SHOP WHERE SHOP_OWNER = '$user'";
    $RunFetchCategory = oci_parse($conn, $FetchCategory);
    oci_execute($RunFetchCategory);
    $row = oci_fetch_assoc($RunFetchCategory);
    $Category= $row['SHOP_NAME'];

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
      <?php echo"<img src='./../../../dist/public/TraderImages/$image' alt='$image' width='80' class='m-3 rounded-circle img-responsive img-thumbnail'>"; ?>
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
            <h5 class="modal-title mx-auto w-100" id="exampleModalLabel">Add Products</h5>
          </div>
          <div class="modal-body">
            <?php echo("<form method='POST' action='./TraderViewItemsAddSubmit.php?user=$user' enctype='multipart/form-data'>")?>
            <?php
                if(isset($_GET['success'])) {?>
                  <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
            <?php }?>
            <?php
                if(isset($_GET['error'])) {?>
                  <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
            <?php }?>
              <div class="mb-3">
                <div class="row mb-3">
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Name</label>
                    <input type="text" class="form-control" aria-label="Name" placeholder="Product name" name="TraderItemAddName">
                  </div>
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Category</label>
                    <input type="text" class="form-control" aria-label="Category" name="TraderItemAddCategory" placeholder="Product category" value="<?php
                    echo($Category);?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Description</label>
                    <textarea class="form-control" placeholder="Leave product description here" rows="5" name="TraderItemAddDescription"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Stock</label>
                    <input type="number" class="form-control" aria-label="PhoneNumber" name="TraderItemAddStock" min="0">
                  </div>
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Price</label>
                    <input type="number" class="form-control" aria-label="PhoneNumber" name="TraderItemAddPrice" min="1" step="0.01">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Discount</label>
                    <input type="number" class="form-control" aria-label="Discount" name="TraderItemAddDiscount" placeholder="Product discount" min="0" step="0.01">
                  </div>
                  <div class="col">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" class="form-control" id="file" aria-label="File" name="TraderItemAddImage">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="form-control btn btn-primary w-100" value="Add" name="TraderItemAddSubmit">
          </div>
          </form>
        </div>
      </div>
<!-- End demo content -->

</html>