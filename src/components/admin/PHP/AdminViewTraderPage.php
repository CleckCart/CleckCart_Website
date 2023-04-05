<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Traders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="../CSS/style.css" />
</head>

<body>
  <div class="container-left mainContainer">
    <a href="#" class="btn" style="margin-left:-10px;"><i class="fa-solid fa-bars" style="font-size:24px;color:grey;"></i></a><br><br>
    <div class="row bg-success headingContainer">
      <div class="col">
        <h1>Manage Traders</h1>
      </div><br />
      <div class="col" style="margin-top:10px;text-align:right;">
        <form method="POST" action="">
          <input type="text" name="searchTrader" placeholder="Search a trader" class="border border-dark" value="<?php
          if (isset($_POST['searchTrader'])) {
          echo (trim($_POST['searchTrader']));
          }
          ?>">
          <input type="submit" name="searchTraderSubmit" value="Search">
        </form>
      </div>
    </div>
    <table class="table table-light table-striped" style="text-align:center;">
      <thead class="table-success">
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Username</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Date</th>
          <th colspan=2>Actions</th>
          <th></th>
        </tr>
      </thead>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
      <tr>
        <td>0</td>
        <td>lorem.jpg</td>
        <td>Lorem</td>
        <td>Ipsum</td>
        <td>lorem@ipsum.com</td>
        <td>ipsum8</td>
        <td>Lorem, Ipsum</td>
        <td>123456789</td>
        <td>2023/04/04</td>
        <td><a href="#"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a></td>
        <td><a href="#"><i class="fa-solid fa-trash" style="color:black;"></i></a></td>
        <td></td>
      </tr>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>