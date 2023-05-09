<?php
    include('./connect.php');
    if(isset($_GET['user']) && isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price'])){
        $productUser = $_GET['user'];
        $productId = $_GET['id'];
        $productImage = $_GET['image'];
        $productName = $_GET['name'];
        $productDescription = $_GET['description'];
        header("Location:./WishList.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&success=Added to WishList");
    }
    else{
        header("Location:./wishList.php?user=$productUser&id=$productId&name=$productName&description=$productDescription&image=$productImage&price=$productPrice&success=Something went wrong");
    }
    ?>