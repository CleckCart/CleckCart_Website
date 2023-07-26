<?php
if(isset($_GET['username']) && isset($_GET['cartId']) && isset($_GET['totalCartItems']) && isset($_GET['collectionDate']) && isset($_GET['collectionTime'])){
    $user = $_GET['username'];
    $guestCartId = $_GET['cartId'];
    $totalCartItems = $_GET['totalCartItems'];
    $collectionDate = $_GET['collectionDate'];
    $collectionTime = $_GET['collectionTime'];
}
    include('./connectSession.php');
    if(isset($_SESSION['username']) && $_SESSION['UserRole'] == 'customer'){
        header("Location:./LoginToInvoice.php?user=$user&cartId=$guestCartId&totalCartItems=$totalCartItems&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Invalid Credentials");
    }
        
    else
        {
            header("Location:./CustomerCheckoutLogin.php?cartId=$guestCartId&totalCartItems=$totalCartItems&collectionDate=$collectionDate&collectionTime=$collectionTime&error=Invalid Credentials");
            if(isset($_SESSION['error']))
                {
                    echo("<br>" .$_SESSION['error']);
                }
        }
?>