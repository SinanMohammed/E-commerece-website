<?php
  require 'connection.inc.php';
  $msg='';
  if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $sql = "select * from customer where username='$username' and password='$password'";

    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);

    if($count>0){
        $_SESSION['CUSTOMER']='yes';
        $_SESSION['CUSTOMER_USERNAME']=$username;
        header('location:homep.php');
        die();
    }else{
          $msg="Please Enter correct Login Details.";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title> Login or Sign Up </title>
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
                        <a class="nav-link" href="index.html">Home</a>
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
        <form method="post" >
        <div class="p-3 mb-2 bg-info text-dark">
            <div class="container">
                <h2 class="text-center"><b><i>Customers LogIn</i></b></h2>
                <div class="row justify-content-md-center">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b><h3>Username:</h3></b></label>
                        <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Enter your Username" required>
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label"><b><h3>Password:</h3></b></label>
                        <input type="password" name="password"class="form-control" id="formGroupExampleInput2" placeholder="Enter your Password"required>
                        <br>
                        <h6 class="text-center"> Forgot Password? <a href="reset.html"><b>Reset Now </b></a></h6>
                      </div>
                      <div class="d-grid gap-2 col-6 mx-auto">
                        <input class="btn btn-primary btn-lg " type="submit" name="submit" value="Submit"><br>

                      </div>
                      
                   <h5 class="text-center">Not a Member? <a href="cregister.php"><b>SignUp</b></a></h5><br>
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
        <div class="container px-4 bg-dark text-white">
          <div class="row gx-3">
            <div class="col">
             <div class="p-3 text-center">
               <h3>Get to Know Us</h3><br>
               <p >About Us <br> Careers <br> Gift a Smile</p><br>
                </div>
            </div>
            <div class="col">
              <div class="p-3 text-center">
                <h3>Connect with Us</h3><br>
                <p >Facebook <br> twitter <br> Instagram</p><br>
                 </div>
             </div>
             <div class="col">
              <div class="p-3 text-center">
                <h3>Make Money with Us</h3><br>
                <p >Sell on Oraibi <br> Sell under Oraibi Accelerator<br> Advertise Your Products <br> Fulfilment by Oraibi_Store</p>
              </div>
             </div>
          </div>
        </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
