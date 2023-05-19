<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminViewCustomer</title>
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
      <?php
        echo("<a href='#' class='nav-link text-dark'>
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
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-2 bg-success border rounded">
        <div class="col p-5">
          <h1>Manage Customers</h1>
        </div>
        <div class="col p-5 text-end">
          <div class="mt-2">
            <form class="d-flex" role="search" method="POST" action="AdminSearchCustomer.php?user=<?php echo($user);?>" enctype="multipart/form-data">
              <input type="text" name="searchCustomer" placeholder="Search a customer" class="form-control border border-dark" value="<?php
              if (isset($_POST['searchCustomer'])) {
                   echo (trim($_POST['searchCustomer']));
                }
              ?>">
              <input type="submit" name="searchCustomerSubmit" value="Search" class="btn" style='background-color:#C1E1C1;'>
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
          
          <?php
          $Role='customer';
          $searchCustomer = strtolower(trim(filter_input(INPUT_POST, 'searchCustomer', FILTER_SANITIZE_STRING)));
          $query = "SELECT * FROM USER_TABLE WHERE FIRST_NAME LIKE '%' || :CustomerFirstname || '%' AND ROLE=:Role";
          $result = oci_parse($conn, $query);
          oci_bind_by_name($result,':CustomerFirstname', $searchCustomer);
          oci_bind_by_name($result,':Role', $Role);
          oci_execute($result);
          if ($row=oci_fetch_assoc($result)) 
            {
                echo("<thead class='table-success'>
                <tr>
                  <th>Select</th>
                  <th>User Id</th>
                  <th>Image</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Date Of Birth</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th colspan=2>Actions</th>
                </tr>
              </thead>");
                do 
                    {
                        $id = $row['USER_ID'];
                        $name = $row['USERNAME'];
                        $email = $row['EMAIL'];
                        echo("<tr><td><input type='checkbox'/></td>");
                        echo("<td>$id</td>");
                        echo("<td><img src = './../../../dist/public/TraderItemImages/$row[IMAGE]' alt='$row[IMAGE]' class = 'img-circle img-thumbnail' width='100px' height='100px'></td>");
                        echo("<td>$row[USERNAME]</td>");
                        echo("<td>$row[ROLE]</td>");
                        echo("<td>$row[FIRST_NAME]</td>");
                        echo("<td>$row[LAST_NAME]</td>");
                        echo("<td>$row[EMAIL]</td>");
                        echo("<td>$row[GENDER]</td>");
                        echo("<td>$row[DATE_OF_BIRTH]</td>");
                        echo("<td>$row[ADDRESS]</td>");
                        echo("<td>$row[PHONE_NUMBER]</td>");
                        echo("<td><a href='AdminViewCustomerPageEdit.php?user=$user&id=$id&action=edit' class = 'btn'><img src='./../../../dist/public/edit.svg' alt='edit'></a></td>");
                        echo("<td><button class='btn' data-bs-toggle='modal' data-bs-target='#exampleModalDelete' data-user = '$user' data-id='$id' data-name='$name' data-email = '$email'><img src='./../../../dist/public/delete.svg' alt='delete'></button></td></tr>");
                    }   while ($row = oci_fetch_assoc($result));
                }
            
            else
                {
                    echo("<div class='alert alert-danger text-center' role='alert'>");
                    echo("No results found.");
                    echo("</div>");
                }
                
          ?>
        </table>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="exampleModalDelete" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header text-center">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
              <h3 class="mt-3">Are You Sure?</h3>
              <p>You are about to delete <span id="username"></span> along with their products. This process cannot be undone.</p>
            </div>
            <div class="modal-footer text-center">
              <?php
                echo("<a href='./AdminViewCustomerPageDelete.php?user=$user&id=$id&action=delete' id='deleteLink' class='btn btn-danger mx-auto w-100'>Delete</a>");
              ?>
              <button type="button" class="btn btn-secondary mx-auto w-100" data-bs-dismiss="modal" >Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Script to update productId in the modal -->
    <script>
      $('#exampleModalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract trader id from data-id attribute
        var user = button.data('user'); // Extract trader id from data-id attribute
        var name = button.data('name'); // Extract trader name from data-name attribute
        var email = button.data('email'); // Extract trader name from data-name attribute
        var modal = $(this);
        modal.find('#username').text(name); // Update the modal content
        modal.find('#deleteLink').attr('href', './AdminViewCustomerPageDelete.php?user='+ user + 'id=' + id + '&action=delete' + '&username=' + name + '&email=' + email); // Update the delete link
      });
    </script>
    <!-- End demo content -->
  <!-- End demo content -->
</body>
</html>