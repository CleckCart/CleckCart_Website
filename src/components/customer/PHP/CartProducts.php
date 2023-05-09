<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price']) && isset($_GET['quantity'])){
        $productUser = $_GET['user'];
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $productQuantity = $_GET['quantity'];
        header("Location:./ProductDetail.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity&success=Added to Cart");
    }
    else{
        header("Location:./ProductDetail.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity&success=Something went wrong");
    }
    ?>