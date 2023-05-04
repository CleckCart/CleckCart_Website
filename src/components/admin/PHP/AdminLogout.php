<?php
session_start();
session_destroy();
header('Location:../../trader/PHP/TraderLogin.php');
?>