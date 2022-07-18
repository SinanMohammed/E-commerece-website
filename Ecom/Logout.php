<?php
    session_start();
    unset($_SESSION['ADMIN']);
    unset($_SESSION['ADMIN_USERNAME']);
    header('location:Login.php');
    die();
?>