<?php
    session_start();
    unset($_SESSION['CUSTOMER']);
    unset($_SESSION['CUSTOMER_USERNAME']);
    header('location:clogin.php');
    die();
?>