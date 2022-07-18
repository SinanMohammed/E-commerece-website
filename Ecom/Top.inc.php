<?php
  require 'connection.inc.php';
  $msg='';
  
  if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']!=''){
    
    }else{
          header('location:Login.php');
          die();
  }
?>