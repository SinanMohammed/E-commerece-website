<?php
    require 'connection.inc.php';
    $msg='';
    if(isset($_POST['submit'])){
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $country = mysqli_real_escape_string($con, $_POST['country']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $zip = mysqli_real_escape_string($con, $_POST['zip']);
       
    }
    if(isset($_POST['submit'])){
        $storename = mysqli_real_escape_string($con, $_POST['username']);
        $res=mysqli_query($con, "select * from customer where username='$username'");
        $check=mysqli_num_rows($res);
        if($check>0){
            $msg="Usernname is Already Taken.";

        }else{
            $sqll=mysqli_query($con, "insert into customer values('$username','$firstname','$lastname','$password','$country', '$city','$zip')");
       
            header('location:homep.php');

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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
                <img src="logo.png" alt="Image not found" width="60" class="d-inline-block align-top">
              </a>
              <a class="navbar-brand" href="index.html"><h3><b><i>Oraibi Store </i></b></h3></a>
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
                    </ul>
                </div>
            </div>
        </nav>
        <form method="post">
        <div class="p-3 mb-2 bg-info text-dark">
            <div class="container">
                <h2 class="text-center"><b><i>SignUp</i></b></h2>
                <div class="row justify-content-md-center">
                <div class="col-sm-5">
                    <div class="mb-3">
                       
                        <div class="row">
                            <div class="col">
                                <label for="formGroupExampleInput" class="form-label"><b><h5>First Name:</h5></b></label>
                              <input type="text" class="form-control" name="firstname" placeholder="Enter your First name" aria-label="First name">
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput" class="form-label"><b><h5>Last Name:</h5></b></label>
                              <input type="text" class="form-control" name="lastname" placeholder="Enter your Last name" aria-label="Last name">
                            </div>
                          </div> <br>
                        <label for="formGroupExampleInput" class="form-label"><b><h5>Username :</h5></b></label>
                        <input type="text" class="form-control" name="username" id="formGroupExampleInput" placeholder="Enter your Username">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label"><b><h5>Password :</h5></b></label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter your Password">

                        
                      </div>
                     
                        <br>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label"><b><h5>Country</h5></b></label>
                          <input type="text" class="form-control" name="country" id="inputCity">
                        </div>
                        <div class="col-md-4">
                          <label for="inputState" class="form-label"><b><h5>City</h5></b></label>
                          <input type="text" class="form-control" name="city" id="inputState">
                        </div>
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label"><b><h5>Zip</h5></b></label>
                          <input type="text" class="form-control" name="zip" id="inputZip">
                        </div>
                        
                      <input class="btn btn-primary btn-lg " type="submit" name="submit" value="submit"><br>
                   <br><h5 class="text-center"> Already a Member? <a href="clogin.php"><b>Login</b></a></h5><br>
                  
                </div>
                </div>
            </div>  <h5 class="text-center"><b><?php echo $msg?></b></a></h5><br>
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
