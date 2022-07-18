<?php
    require('Top.inc.php');
    $msg='';
    if(isset($_POST['submit'])){
        $storename = mysqli_real_escape_string($con, $_POST['storename']);
        $spassword = mysqli_real_escape_string($con, $_POST['spassword']);
        $slocation = mysqli_real_escape_string($con, $_POST['slocation']);
        $username = $_SESSION['ADMIN_USERNAME'];
       
    }
    if(isset($_POST['submit'])){
        $storename = mysqli_real_escape_string($con, $_POST['storename']);
        $res=mysqli_query($con, "select * from store where id='$storename'");
        $check=mysqli_num_rows($res);
        if($check>0){
            $msg="Store Already Exists";
        }else{
          $sqll=mysqli_query($con, "insert into store values('$storename','$spassword','$slocation', 1,'$username')");
       
          header('location:Store.php');


        }
    }
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title> Add Store </title>
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
                         <a class="nav-link" href="Products.php">Product Master</a>
                      </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="Order.php">Order Master</a>
                     </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="Logout.php">Logout</a>
                     </li>         
                    </ul>
                </div>
            </div>
        </nav>
        <form method="post" >
        <div class="p-3 mb-2 bg-info text-dark">
            <div class="container">
                <h2 class="text-center"><b><i>Add New Stores</i></b></h2>
                <div class="row justify-content-md-center">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Username:</h3></b></label>
                        <input type="text" name="storename" class="form-control" id="formGroupExampleInput" placeholder="Enter the Username" required>
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label"><b><h3>Password:</h3></b></label>
                        <input type="password" name="spassword" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Password"required>
                        
                        <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Location:</h3></b></label>
                        <input type="text" name="slocation" class="form-control" id="formGroupExampleInput" placeholder="Location" required>
                      </div>

                      


                      <div class="d-grid gap-2 col-6 mx-auto">
                        <input class="btn btn-primary btn-lg " type="submit" name="submit" value="Submit"><br>
                    </div>
                    
                      <br>
                      <br>

                </div>
                </div>
                <h5 class="text-center"><b><?php echo $msg?></b></a></h5><br>
            </div>
            
          </form>
    </body>