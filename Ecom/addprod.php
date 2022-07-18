<?php
    require('stop.inc.php');
    $msg='';
    $categories_id='';
   
    if(isset($_POST['submit'])){
        $productname = mysqli_real_escape_string($con, $_POST['productname']);
        $mrp = mysqli_real_escape_string($con, $_POST['mrp']);

        $stid = $_SESSION['STORE_ID'];

$qry = "select catid from category where stid = '$stid'";
        $catres = mysqli_query($con, $qry);
        $cat_id= null;
        while($row=mysqli_fetch_assoc($catres))
        {
          $cat_id = $row['catid'];
        }

        $short_des = mysqli_real_escape_string($con, $_POST['short_des']);
        $descr = mysqli_real_escape_string($con, $_POST['descr']);
        
        $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],'Images/'.$image);
        

        $sqll=mysqli_query($con, "insert into products(name,mrp,category,short_des, status, des,image) values('$productname','$mrp','$cat_id','$short_des', 1,'$descr', '$image')");
       
        header('location:sproducts.php');
    }
    if(isset($_POST['submit'])){
        $storename = mysqli_real_escape_string($con, $_POST['productname']);
        $res=mysqli_query($con, "select * from store where id='$productename'");
        $check=mysqli_num_rows($res);
        if($check>0){
            $msg="Store Already Exists";

        }else{
          

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
                         <a class="nav-link" href="sproducts.php">Product Master</a>
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
        <form method="post" enctype="multipart/form-data">
        <div class="p-3 mb-2 bg-info text-dark">
            <div class="container">
                <h2 class="text-center"><b><i>Add New Products</i></b></h2>
                <div class="row justify-content-md-center">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Name</h3></b></label>
                        <input type="text" name="productname" class="form-control" id="formGroupExampleInput" placeholder="Enter the Name" required>
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label"><b><h3>Mrp</h3></b></label>
                        <input type="text" name="mrp" class="form-control" id="formGroupExampleInput2" placeholder="Enter the MRP"required>
                    </div>
                   
                    <!-- <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Category ID</h3></b></label>
                        <input type="text" name="cat_id" class="form-control" id="formGroupExampleInput" placeholder="Category ID">
                      </div> -->

                        <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Short Description:</h3></b></label>
                        <input type="text" name="short_des" class="form-control" id="formGroupExampleInput" placeholder="Description">
                      </div>

                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Description:</h3></b></label>
                        <input type="text" name="descr" class="form-control" id="formGroupExampleInput" placeholder="Description">
                      </div>

                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Image:</h3></b></label>
                        <input type="file" name="image" class="form-control" id="formGroupExampleInput" placeholder="Image Path">
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