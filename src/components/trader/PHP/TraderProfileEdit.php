<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TraderDashboard</title>
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
 
        if(isset($_GET['id']) && isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['email']) && isset($_GET['address']) && isset($_GET['phone_number']) && isset($_GET['gender']) && isset($_GET['shop'])){
        $userId = $_GET['id'];
        $username = $_GET['user'];
        $first_name = $_GET['fname'];
        $last_name = $_GET['lname'];
        $email = $_GET['email'];
        $image = $_GET['image'];
        $address = $_GET['address'];
        $phone_number = $_GET['phone_number'];
        $date_of_birth = $_GET['date_of_birth'];
        $gender = $_GET['gender'];
        $shopName = $_GET['shop'];
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
    <div class="page-content pt-5 px-5 " id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 "><i class="fa fa-bars mr-2"></i></button>

        <!-- Demo content -->
        <!--Code -->

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="text-center">
                    <h5>Update Your Profile</h5>
                </div>
                <hr>
                <?php echo("<form method='POST' action='./TraderProfileEditSubmit.php?user=$user' enctype='multipart/form-data'>")?>
                    <?php
                    if (isset($_GET['error'])) { ?>
                        <div class='alert alert-danger text-center' role='alert'><?php echo ($_GET['error']); ?></div>
                    <?php } ?>
                    <?php
                    if (isset($_GET['success'])) { ?>
                        <div class='alert alert-success text-center' role='alert'><?php echo ($_GET['success']); ?></div>
                    <?php } ?>
                    <div class="mb-3">
                        <div class="row mb-3">
                            <input type='hidden' name='EditTraderId' value='<?php
                            echo($userId);?>'>

                            <div class="col">
                                <label for="exampleInputText1" class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" aria-label="First name" name="TraderEditFirstname" value = '<?php echo ($first_name)?>'>
                            </div>
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" aria-label="Last name" name="TraderEditLastname" value = '<?php echo ($last_name)?>'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">Username</label>
                                <input type="tel" class="form-control" placeholder="Username" aria-label="Username" name="TraderEditUsername" value = '<?php echo ($user)?>'>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" name="TraderEditEmail" value = '<?php echo ($email)?>'>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">Address</label>
                                <input type="tel" class="form-control" placeholder="Address" aria-label="Address" name="TraderEditAddress" value = '<?php echo ($address)?>'>
                            </div>
                            <div class="col">
                                <label for="exampleInputText1" class="form-label">Phone</label>
                                <input type="number" class="form-control" placeholder="Phone Number" aria-label="PhoneNumber" name="TraderEditPhone" value = '<?php echo ($phone_number)?>'>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="exampleInputText1" class="form-label">Shop Category</label>
                                    <input type="tel" class="form-control" id="exampleInputText1" aria-label="ShopCategory" name="Shop" placeholder="Shop" value = '<?php echo ($shopName)?>' readonly>
                                </div>
                                <div class="col">
                                    <label for="exampleInputText1" class="form-label">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="TraderEditGender">
                                            <?php
                                                if($gender=='male')
                                                {
                                                    echo("<option value='male' selected>Male</option>");
                                                    echo("<option value='female'>Female</option>");
                                                    echo("<option value='other'>Other</option>");
                                                }
                    
                                              else if($gender=='female')
                                                {
                                                    echo("<option value='male'>Male</option>");
                                                    echo("<option value='female' selected>Female</option>");
                                                    echo("<option value='other'>Other</option>");
                                                }
                    
                                              else
                                                {
                                                  echo("<option value='male' selected>Male</option>");
                                                  echo("<option value='female'>Female</option>");
                                                  echo("<option value='other' selected>Other</option>");
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="file" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="file" aria-label="File" name="TraderEditImage">
                                </div>
                                <div class="col">
                                    <label for="date" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="date" aria-label="date" name="TraderEditDate" value='<?php echo ($date_of_birth)?>'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 mt-4">
                        <input type="submit" class="btn btn-primary w-50 " value="Update" name="TraderEdit">
                    </div>
                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>


    </div>
    <!-- End demo content -->

</body>

</html>