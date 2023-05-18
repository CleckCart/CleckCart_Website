<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraderEditPasswordPage</title>
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <!--font awesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/edit-password.css">
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
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id'])){
      $user = $_GET['user'];
      $id = $_GET['id'];
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
      <?php echo"<img loading='lazy' src='./../../../dist/public/TraderImages/$image' alt='$image' width='90' height='80'class='m-3 rounded-circle img-responsive p-1 border border-grey'>"; ?>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src = "../../service/passwordVisibility.js"></script>
    <?php echo("<form method = 'POST' action = './TraderProfileEditPasswordSubmit.php?user=$user&id=$id'>")?>
      <div class="container">
        <h1>Change Password</h1>
        <div class="logo"></div>
        <?php
            if(isset($_GET['error'])) {?>
            <div class='alert alert-danger text-center' role='alert'><?php echo($_GET['error']);?></div>
        <?php }?>
        <?php
            if(isset($_GET['success'])) {?>
            <div class='alert alert-success text-center' role='alert'><?php echo($_GET['success']);?></div>
        <?php }?>
        <label for="current-password">Current Password</label>
        <input type="password" id="current-password" name="currentPassword" placeholder="Enter Current Password" value="<?php
          if (isset($_POST['currentPassword'])) {
              echo (trim($_POST['currentPassword']));
            }
        ?>">
        
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="newPassword" placeholder = "Enter New Password" value="<?php
          if (isset($_POST['newPassword'])) {
            echo (trim($_POST['newPassword']));
          }
          ?>">
        
        <label for="confirm-new-password">Confirm New Password</label>
        <input type="password" id="confirm-new-password" name="confirmnewPassword" placeholder = "Re-Enter New Password" value="<?php
          if (isset($_POST['confirmnewPassword'])) {
            echo (trim($_POST['confirmnewPassword']));
          }
          ?>">
        
        <input type="submit" value="Update Password" name = "TraderProfileEditPasswordSubmit">
      </div>
    </form>
</div>
<!-- End demo content -->
</body>
</html>