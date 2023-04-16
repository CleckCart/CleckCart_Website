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

  <!-- Vertical navbar -->
  <div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center">
        <img loading="lazy" src="images/p-1.png" alt="..." width="80" height="80" class="m-3 rounded-circle img-thumbnail shadow-sm">
        <div class="media-body">
          <h4 class="m-0">Lorem ipsum</h4>
        </div>
      </div>
    </div>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="./TraderDashboard.php" class="nav-link text-dark">
          <i class="fa-solid fa-house fa-lg m-3"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="./TraderViewItemsPage.php" class="nav-link text-dark">
          <i class="fa-regular fa-cube fa-lg m-3"></i>Manage Products
        </a>
      </li>
      <li class="nav-item">
        <a href="./TraderManageProfile.php" class="nav-link text-dark">
          <i class="fa-solid fa-user fa-lg m-3"></i>Manage Profile
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
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-2 bg-success">
        <div class="col p-5">
          <h1>Manage Products</h1>
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
            </form>
          </div>
        </div>
      </div>
      <div class="row table-responsive">
        <table class="table table-light table-striped text-center">
          <thead class="table-success">
            <tr>
              <th>Select</th>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Date</th>
              <th>Discount</th>
              <th colspan=2>Actions</th>
              <th></th>
            </tr>
          </thead>
          <?php
          for ($i = 0; $i < 10; $i++) {
            echo '
            <tr>
              <td><input type = "checkbox"/></td>
              <td>0</td>
              <td>lorem.jpg</td>
              <td>Lorem</td>
              <td>Lorem ipsum asdjlkasjdlkajsdlk jalsdnlaks jdla</td>
              <td>Lorem</td>
              <td>&pound;100</td>
              <td>50</td>
              <td>2023/04/04</td>
              <td>200</td>
              <td>
                <!-- Edit Button trigger modal -->
                <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                  <img src="./../../../dist/public/edit.svg" alt="person">
                </button>
              </td>
              <td>
                <!-- Delete Button trigger modal -->
                <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalDelete">
                  <img src="./../../../dist/public/delete.svg" alt="person">
                </button>
              </td>
              <td></td>
            </tr>
          ';
          }
          ?>
        </table>
      </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title mx-auto w-100" id="exampleModalLabel">Update Products</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="#">
              <div class="mb-3">
                <div class="row mb-3">
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Name</label>
                    <input type="text" class="form-control" aria-label="Name">
                  </div>
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Category</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Description</label>
                    <textarea class="form-control" placeholder="Leave a comment here" rows="5"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" aria-label="Address">
                  </div>
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Stock</label>
                    <input type="text" class="form-control" aria-label="PhoneNumber">
                  </div>
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Price</label>
                    <input type="text" class="form-control" aria-label="PhoneNumber">
                  </div>
                  <div class="col">
                    <label for="exampleInputText1" class="form-label">Discount</label>
                    <input type="text" class="form-control" aria-label="PhoneNumber">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" class="form-control" id="file" aria-label="File">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="form-control btn btn-primary w-100" value="Update"></button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="exampleModalDelete" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <img src="../../../dist/public/remove.svg" alt="">
            <h3 class="mt-3">Are You Sure?</h3>
            <p>You are about to delete item(s). This process cannot be undone</p>
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-danger mx-auto w-100">Delete</button>
            <button type="button" class="btn btn-secondary mx-auto w-100" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
</body>
</div>
<!-- End demo content -->

</html>