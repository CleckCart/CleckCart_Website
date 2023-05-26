<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
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
    $uid = $row['USER_ID'];
    $username = $row['USERNAME'];
    $first_name = $row['FIRST_NAME'];
    $last_name = $row['LAST_NAME'];
    $email = $row['EMAIL'];
    $address = $row['ADDRESS'];
    $phone_number = $row['PHONE_NUMBER'];
    $date_of_birth = $row['DATE_OF_BIRTH'];
    $image=$row['IMAGE'];
    $gender = $row['GENDER'];
}

$queryShop = "SELECT * FROM SHOP WHERE SHOP_OWNER = '$username'";
$resultShop = oci_parse($conn, $queryShop);
oci_execute($resultShop);
while($rowShop = oci_fetch_array($resultShop, OCI_ASSOC)){
  $shopname = $rowShop['SHOP_NAME'];
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
        <?php echo("<a href='http://localhost:8080/apex/f?p=108:LOGIN_DESKTOP:6041658500492:?user=$user' class='nav-link text-dark' target='_blank'>")?>
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
<div class="page-content pt-5 px-5 " id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 "><i class="fa fa-bars mr-2"></i></button>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="mb-3 mt-3">Your Information</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light border rounded p-5 mb-5">
      
      <div class = 'row row-cols-1'>
        <div class="profile-img-container text-center">
            <?php echo"<img src='./../../../dist/public/TraderImages/$image' class='rounded-circle img-responsive p-1 border border-grey' alt='$image' width='200' height='200'>";?>
          </div>
          <?php
            if(isset($_GET['error'])) {?>
            <div class='alert alert-danger text-center mt-5' role='alert'><?php echo($_GET['error']);?></div>
        <?php }?>
        <?php
            if(isset($_GET['success'])) {?>
            <div class='alert alert-success text-center mt-5' role='alert'><?php echo($_GET['success']);?></div>
        <?php }?>
        </div>
        <div class="col text-start">
          <?php echo("<form class = 'mt-5' method = 'POST' action = './TraderProfileEdit.php?user=$user&id=$uid&fname=$first_name&lname=$last_name&email=$email&address=$address&phone_number=$phone_number&date_of_birth=$date_of_birth&gender=$gender&shop=$shopname&image=$image'>")?>
                  <div class="row mb-3">
                    <div class="col">
                      <input type='hidden' name='TraderEditItemId' value='<?php
                      echo($uid);?>'>
                      <label for="disabledTextInput-ln" class="form-label">First Name</label>
                      <input type="text" id="disabledTextInput-ln" class="form-control" placeholder="First Name" value = '<?php echo($first_name)?>' disabled>
                    </div>
                    <div class="col">
                      <label for="disabledTextInput-ln" class="form-label">Last Name</label>
                      <input type="text" id="disabledTextInput-ln" class="form-control" placeholder="Last Name" value = '<?php echo($last_name)?>' disabled>
                    </div>
                  </div>
    
                  <div class="row mb-3">
                    <div class="col">
                      <label for="disabledTextInput-g" class="form-label mt-3" >Username</label>
                      <input type="text" id="disabledTextInput-g" class="form-control" placeholder="Username" value = '<?php echo($username)?>' disabled>
                    </div>
                    <div class="col">
                      <label for="disabledTextInput-add" class="form-label mt-3" >Address</label>
                      <input type="text" id="disabledTextInput-add" class="form-control" placeholder="Address" value = '<?php echo($address)?>' disabled>
                    </div>
                  </div>
    
                  <div class="row mb-3">
                    <div class="col">
                      <label for="disabledTextInput-pn" class="form-label mt-3" >Phone Number</label>
                      <input type="text" id="disabledTextInput-pn" class="form-control" placeholder="Phone Number" value = '<?php echo($phone_number)?>' disabled>
                    </div>
                    <div class="col">
                      <label for="disabledTextInput-pn" class="form-label mt-3" >Date of Birth</label>
                      <input type="text" id="disabledTextInput-pn" class="form-control" placeholder="DOB" value = '<?php echo($date_of_birth)?>' disabled>
                    </div>
                  </div>
    
                  <div class="row mb-3">
                    <div class="col">
                      <label for="disabledTextInput-email" class="form-label mt-3" >Email Address</label>
                      <input type="text" id="disabledTextInput-email" class="form-control" placeholder="Email Address" value = '<?php echo($email)?>' disabled>
                    </div>
                    <div class="col">
                      <label for="disabledTextInput-pn" class="form-label mt-3">Gender</label>
                      <input type="text" id="disabledTextInput-pn" class="form-control" placeholder="Gender" value = '<?php echo($gender)?>' disabled>
                    </div>
                  </div>
    
                  <div class="row mb-3">
                    <div class="col">
                      <label for="disabledTextInput-pn" class="form-label mt-3" >Shop Category</label>
                      <input type="text" id="disabledTextInput-pn" class="form-control w-50" placeholder="Shop Category" value = '<?php echo($shopname)?>'disabled>
                    </div>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-2">
                     <?php echo("<a class = 'btn btn-success d-block mx-auto' href='./TraderProfileEdit.php?user=$user&id=$uid&fname=$first_name&lname=$last_name&email=$email&address=$address&phone_number=$phone_number&date_of_birth=$date_of_birth&gender=$gender&shop=$shopname&image=$image'>Edit Profile</a>"); ?>
                  </div>
                  <div class="col-sm-2">
                      <?php echo("<a class='btn btn-success d-block mx-auto' href='./TraderProfileEditPassword.php?user=$user&id=$uid'>Update Password</a>")?>
                  </div>
                  <div class="col-sm-4"></div>
                </div>
              </form>
        </div>
      </div>
    </div>

</div>
<!-- End demo content -->

</body>
</html>