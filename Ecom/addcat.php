<?php
    require('stop.inc.php');
    $msg='';
    if(isset($_POST['submit'])){
        $cname = mysqli_real_escape_string($con, $_POST['cname']);
        $stid=$_SESSION['STORE_ID'];
         
        $sql=mysqli_query($con, "select stid from category");
       
        while ($row = mysqli_fetch_array($sql)) {
            if($stid == $row['stid']){
                echo "You cannot add more than one category ";
                $mee= $_SESSION['STORE_ID'];
                echo($mee);
                die();
            }
            else{
               
            }
            

        }
        $stooore=$_SESSION['STORE_ID'];
        $sqll=mysqli_query($con, "insert into category(cname, stid) values('$cname','$stooore')");
        
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
                         <a class="nav-link" href="sproducts.php">Product Master</a>
                      </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="Order.php">Order Master</a>
                     </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="slogout.php">Logout</a>
                     </li>         
                    </ul>
                </div>
            </div>
        </nav>
        <form method="post" >
        <div class="p-3 mb-2 bg-info text-dark">
            <div class="container">
                <h2 class="text-center"><b><i>Add New Categories.</i></b></h2>
                <div class="row justify-content-md-center">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Category Name:</h3></b></label>
                        <input type="text" name="cname" class="form-control" id="formGroupExampleInput" placeholder="Enter the Category Name:" required>
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
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>

    </body>