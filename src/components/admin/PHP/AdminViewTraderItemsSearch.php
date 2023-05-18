<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminViewTrader'sItems</title>
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
        <img src='./../../../dist/public/logo.png' alt='logo.jpg' width='80' class='rounded-circle img-responsive img-thumbnail'>
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
          <i class='fa-solid fa-users m-3'></i>Approve Traders
          </a>
        ");
      ?>
    </li>
    <li class="nav-item">
      <?php echo("
        <a href='./AdminApproveTraderItemPage.php?user=$user' class='nav-link text-dark'>
        <i class='fa-solid fa-square-check m-3'></i>Approve Products
        </a>
      ")?>
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
          <h1>Manage Products</h1>
        </div>
        <div class="col p-5 text-end">
          <div class="mt-2">
            <?php echo("<form class='d-flex' role='search' method='POST' action='AdminViewTraderItemsSearch.php?user=$user'>")?>
              <input type="text" name="searchProduct" placeholder="Search a product" class="form-control border border-dark" value="<?php
              if (isset($_POST['searchProduct'])) {
                   echo (trim($_POST['searchProduct']));
                }
              ?>">
              <input type="submit" name="searchCustomerSubmit" value="Search" class="btn" style='background-color:#C1E1C1;'>
              <?php echo("<a href = './AdminViewTraderItemsPageAdd.php?user=$user' name='searchCustomerSubmit' value='Add Item' class='mx-3 btn' style='background-color:#C1E1C1;'>Add&nbsp;Item</a>")?>
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
          $ProductName=strtolower(trim(filter_input(INPUT_POST, 'searchProduct', FILTER_SANITIZE_STRING)));
          $SearchProductQuery = "SELECT * FROM PRODUCT WHERE PRODUCT_NAME LIKE '%' || :ProductName || '%' ORDER BY PRODUCT_ID";
          $RunSearchProductQuery = oci_parse($conn, $SearchProductQuery);
          oci_bind_by_name($RunSearchProductQuery,':ProductName', $ProductName);
          oci_execute($RunSearchProductQuery);
          if ($row=oci_fetch_assoc($RunSearchProductQuery)) 
            {
                echo("<thead class=table-success>
                <tr>
                  <th>Select</th>
                  <th>Product Id</th>
                  <th>Category Id</th>
                  <th>Shop Id</th>
                  <th>Category Name</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Added Date</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Stock</th>
                  <th colspan=2>Actions</th>            
                </tr>
              </thead>");
                do 
                    {
                      
                        $id = $row['PRODUCT_ID'];
                        $DiscountQuery = "SELECT * FROM OFFER WHERE PRODUCT_ID=$id";
                        $RunDiscountQuery = oci_parse($conn, $DiscountQuery);
                        oci_execute($RunDiscountQuery);
                        if($Row = oci_fetch_assoc($RunDiscountQuery))
                          {            
                            $Discount=$Row['DISCOUNT'];
                          }
                        
                        else
                          {
                              $Discount=0;
                          }
                        $name = $row['PRODUCT_NAME'];
                        echo("<tr><td><input type='checkbox'/></td>");
                        echo("<td>$id</td>");
                        echo("<td>$row[CATEGORY_ID]</td>");
                        echo("<td>$row[SHOP_ID]</td>");
                        echo("<td>$row[CATEGORY_NAME]</td>");
                        echo("<td><img src = './../../../dist/public/TraderItemImages/$row[PRODUCT_IMAGE]' alt='$row[PRODUCT_IMAGE]' class = 'img-circle img-thumbnail' width='100px' height='100px'></td>");
                        echo("<td>$row[PRODUCT_NAME]</td>");
                        echo("<td>$row[PRODUCT_DESCRIPTION]</td>");
                        echo("<td>$row[PRODUCT_DATE]</td>");
                        echo("<td>$row[PRODUCT_PRICE]</td>");
                        echo("<td>$Row[DISCOUNT]</td>");
                        echo("<td>$row[PRODUCT_STOCK]</td>");
                        echo("<td><a href='./AdminViewTraderItemsPageEdit.php?user=$user&id=$id&action=edit' class = 'btn'><img src='./../../../dist/public/edit.svg' alt='edit'></a></td>");
                        echo("<td><button class='btn' data-bs-toggle='modal' data-bs-target='#exampleModalDelete' data-user = '$user' data-id='$id' data-name='$name'><img src='./../../../dist/public/delete.svg' alt='delete'></button></td></tr>");
                    }while($row = oci_fetch_assoc($RunSearchProductQuery));
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
              <p>You are about to delete <span id="productName"></span>. This process cannot be undone.</p>
            </div>
            <div class="modal-footer text-center">
              <?php
                echo("<a href='./AdminViewTraderItemsDelete.php?user=$user&id=$id&action=delete' id='deleteLink' class='btn btn-danger mx-auto w-100'>Delete</a>");
              ?>
              <button type="button" class="btn btn-secondary mx-auto w-100" data-bs-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Script to update productId in the modal -->
    <script>
      $('#exampleModalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract product id from data-id attribute
        var name = button.data('name'); // Extract product name from data-name attribute
        var user = button.data('user');
        var modal = $(this);
        modal.find('#productId').text(id); // Update the modal content
        modal.find('#productName').text(name); // Update the modal content
        modal.find('#deleteLink').attr('href', './AdminViewTraderItemsDelete.php?user=' + user + '&id=' + id + '&action=delete'); // Update the delete link
      });
    </script>
  <!-- End demo content -->
</body>

</html>