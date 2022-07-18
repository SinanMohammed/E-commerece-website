<?php
    session_start();
    unset($_SESSION['STORE']);
    unset($_SESSION['STORE_ID']);
    header('location:slogin.php');
    die();
?>