<?php
    include('./connect.php');
    if(isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price']) && isset($_GET['quantity'])){
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $productQuantity = $_GET['quantity'];
        header("Location:./ProductDetail.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity&success=Added to Cart");
    }
    else{
        header("Location:./ProductDetail.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&stock=$productStock&quantity=$productQuantity&success=Something went wrong");
    }
    ?>