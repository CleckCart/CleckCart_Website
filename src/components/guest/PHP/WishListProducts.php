<?php
    include('./connect.php');
    if(isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price'])){
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        header("Location:./WishList.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&success=Added to WishList");
    }
    else{
        header("Location:./wishList.php?id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&success=Something went wrong");
    }
    ?>