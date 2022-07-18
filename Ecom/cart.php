<?php
  require 'connection.inc.php';
  require 'func.inc.php';
  $msg='';
  $username=$_SESSION['CUSTOMER_USERNAME'];
  if(isset($_SESSION['CUSTOMER']) && $_SESSION['CUSTOMER']!=''){
    
}else{
      header('location:clogin.php');
      die();
}

if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con, $_GET['type']);
  if($type=='delete'){
  $id=mysqli_real_escape_string($con, $_GET['product_id']);
  
  $delete_sql = "delete from orders where product_id='$id' and isordered=0 and username='$username'";
  mysqli_query($con,$delete_sql);

  }
}
if(isset($_POST['submit'])){
  $username = $_SESSION['CUSTOMER_USERNAME'];
  // $pid=$_GET['pid'];
  // $cid=$_GET['cid'];
  // $mrp=$_GET['mrp'];
  $sql="select * from orders where isordered=0 and username='$username'";
        $res=mysqli_query($con,$sql);
        // $data=array();
        // while($row=mysqli_fetch_array($res)){
        //   if($row > 0){
          // foreach($row=mysqli_fetch_array($res)){
          //   $upd="update orders set isordered= 1";
          //   $flag=mysqli_query($con,$upd);
          //   // $cnt=1;

          // }
            
        //   else{

        //   }
            
        // }
        $get_order=get_order($con,$username);
        foreach($get_order as $list){
          $upd="update orders set isordered= 1 where isordered=0 and username='$username'";
          $_SESSION["orderid"]  = 0;
          $flag=mysqli_query($con,$upd);
        }
      


  // $id=mysqli_query($con,"select c.stid from category c where c.catid=$cid");
  // if (mysqli_num_rows($id) > 0){
  //   while($rowData = mysqli_fetch_assoc($id)){
  //      $idd=$rowData["stid"].'';
  //   }
  // }


// $qry=mysqli_query($con,"update table orders()")
//   $sqll=mysqli_query($con,"INSERT INTO orders(`username`, `product_id`, `id`, `price`) VALUES ('$username', '$pid', '$idd','$mrp')");
// $get_ord=get_order($con);

				
  
  
  header('location:homep.php');
  
 
}
$sql = "select o.product_id, p.name, p.image, p.mrp from products as p, orders as o where o.product_id=p.product_id and o.isordered=0 and o.username='$username' order by product_id";
    $res= mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title> Cart </title>
    </head>
    <style>
    </style>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="Image not found" width="60" class="d-inline-block align-top">
              </a>
              <a class="navbar-brand" href="index.html"><h3><b><i>Oraibi Store</i></b></h3></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                    <ul class="navbar-nav">
                      <li class="nav-item"> 
                        <a class="nav-link" href="homep.php">Home</a>
                     </li>
                       <li class="nav-item"> 
                         <a class="nav-link" href="#">Products</a>
                      </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="#">Help</a>
                     </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="#">Contact Us</a>
                     </li>  
                     <li class="nav-item"> 
                        <a class="nav-link" href="Login.php">Admin Login</a>
                     </li>
                     <li class="nav-item"> 
                        <a class="nav-link" href="slogin.php">Store Login</a>
                     </li>
                     <li class="nav-item"> 
                        <a class="nav-link" href="clogin.php">Customer Login</a>
                     </li>         
                    </ul>
                </div>
            </div>
        </nav>
        <table class="table">
    <thead>
        <thead class=table-dark>
            <tr>
            <th scope="col"><Sl class="No"></Sl></th>
            <th scope="col">Product id</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">MRP</th> 
            <th scope="col">Remove</th>         
            </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
      while($row=mysqli_fetch_assoc($res)){?>
        <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $row['product_id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><img src="Images/<?php echo $row['image']?>"/></td>
            <td><?php echo $row['mrp'] ?></td>

            <td>
                <?php 
                echo "<a href='?type=delete&product_id=".$row['product_id']."'> Delete </a>&nbsp";
                 ?>
            </td>
        </tr>
        <?php $i++ ?>
    <?php } ?>
  </tbody>
</table>
<div class="d-grid gap-2">
<form action="cart.php" method="POST">
<button type="submit" name="submit" class="btn btn-success">Proceed to checkout</button>
</form>
      </div><br>

<br><br>

</body>