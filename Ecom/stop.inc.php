<?php
  require 'connection.inc.php';
  $msg='';
  
  if(isset($_SESSION['STORE']) && $_SESSION['STORE_ID']!=''){
    
    }else{
          header('location:slogin.php');
          die();
  }
?>