<?php
    require('Top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=mysqli_real_escape_string($con, $_GET['type']);
    if($type=='status'){
        $operation=mysqli_real_escape_string($con, $_GET['operation']);
        $id=mysqli_real_escape_string($con, $_GET['product_id']);
        if($operation == 'active'){
            $status='1';

        }else{
            $status='0';
        }
        $update_status = "update products set status='$status' where product_id='$id'";
        mysqli_query($con,$update_status);
    }

    if($type=='delete'){
        $id=mysqli_real_escape_string($con, $_GET['product_id']);
        
        $delete_sql = "delete from products where product_id='$id'";
        mysqli_query($con,$delete_sql);


    }
    
}

    $sql = "call category_wise()";
    $res= mysqli_query($con, $sql);
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title> Product </title>
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
                    <ul class="navbar-nav justify-content-center">
                    <li class="nav-item"> 
                         <a class="nav-link" href="Store.php">Store Master</a>
                      </li>

                       <li class="nav-item"> 
                         <a class="nav-link" href="sproducts.php">Product Master</a>
                      </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="Order.php">Order Master</a>
                     </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="procat.php">Category Wise</a>
                     </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="Logout.php">Logout</a>
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
            <th scope="col">Category Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Count</th>
            </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
      while($row=mysqli_fetch_assoc($res)){?>
        <tr>
        <th scope="row"><?php echo $i ?></th>
            <td><?php echo $row['catid'] ?></td>
            <td><?php echo $row['cname'] ?></td>
            <td><?php echo $row['count'] ?></td>
        </tr>
        <?php $i++ ?>
    <?php } ?>
  </tbody>
</table>
    </body>

