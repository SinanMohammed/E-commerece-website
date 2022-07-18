<?php

  require 'connection.inc.php';
  require 'func.inc.php';
  if(isset($_SESSION['CUSTOMER']) && $_SESSION['CUSTOMER']!=''){
    
  }else{
        header('location:clogin.php');
        die();
}

if(!isset($_SESSION["orderid"]) || $_SESSION["orderid"] == 0)

{$maax=mysqli_query($con,"select max(orderid) as orderid from orders");

while($rowData = mysqli_fetch_assoc($maax)){
  $_SESSION["orderid"]=$rowData["orderid"]+1;
}
}
if(isset($_POST['submit'])){
  $username = $_SESSION['CUSTOMER_USERNAME'];
  $pid=$_GET['pid'];
  $cid=$_GET['cid'];
  $mrp=$_GET['mrp'];
  $id=mysqli_query($con,"select c.stid from category c where c.catid=$cid");
  if (mysqli_num_rows($id) > 0){
    while($rowData = mysqli_fetch_assoc($id)){
       $idd=$rowData["stid"].'';
    }
  }
  $od=$_SESSION["orderid"];
 
  $sqll=mysqli_query($con,"INSERT INTO orders(`username`,`orderid`, `product_id`, `id`, `price`) VALUES ('$username',$od, '$pid', '$idd','$mrp')");
  header('location:cart.php');
  
 
}
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title> Oraibi_Store </title>
    </head>
    <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
      height: auto;
    }
    .carousel-item{
      background-color: black ;
    }
    *{
      margin: 0%;
      padding: 0%;
      box-sizing: border-box;
    }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="homep.php">
                <img src="logo.png" alt="Image not found" width="60" class="d-inline-block align-top">
              </a>
              <a class="navbar-brand" href="homep.php"><h3><b><i>Oraibi Store</i></b></h3></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                <ul class="navbar-nav">
                   <li class="nav-item"> 
                     <a class="nav-link" href="homep.php">Products</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="clogout.php">LOGOUT</a>
                  </li>  
                  <li class="nav-item"> 
                    <a class="nav-link" href="#">Help</a>
                 </li>
                  <li class="nav-item"> 
                    <a class="nav-link" href="#">Contact Us</a>
                 </li>
                 <div class="position-absolute top-40 end-0">
                  <li class="nav-item">          
                   <a class="nav-link" href="cart.php">
                    <img src="cart.jpg" alt="Image not found" height="60"/></a>
                 </li>
                </div>
                              
                </ul>
              </div>
            </div>
        </nav>
        <!--Carousel-->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">  
           <div class="carousel-item active">
              <img src="watch3.jpeg" class="center" alt="Error"/>
               <div class="carousel-caption">
                <h1><b>Watches</b></h2>
                <p><h4><b>"Bestseller of the Month"</b></h4></p>
              </div>
            </div>
            <div class="carousel-item">
               <img src="shoes3.jpeg" class="center" alt="Error"/>
               <div class="carousel-caption">
                 <h1>Shoes</h1>
                 <p"><b><h4>Best selling Shoes of the Month.</h4></b></p>
               </div>
             </div>
             <div class="carousel-item">
               <img src="clothing.jpeg" class="center" alt="Error"/>
               <div class="carousel-caption">
                 <h1>Clothing </h1>
                 <p><b> <h4>Brand new collection..</h4></b></p>
               </div>
             </div>
           </div>
           <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Previous</span>
           </a>
           <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Next</span>
           </a>
          </div>
          <hr>
          <!--CARDS-->
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <a class="nav-link" href="#">
                <img src="logo.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title">Customers Feedback</h5>
                  <p class="card-text">The main Motto of Oraibi Store is to win the confidence and to satisfy its customers.</p>
                </div>
                <div class="card-footer">
                  <a class="nav-link" href="#"><small class="text-muted">Readd more.</small></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <a class="nav-link" href="#">
                <img src="Watch.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title"><b>Watches</b></h5>
                  <p class="card-text">Check out the Best Collecction of Watches on hugee Discounts.</p>
                </div>
                <div class="card-footer">
                  <a class="nav-link" href="#">
                  <small class="text-muted">View more..</small></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <a class="nav-link" href="#">
                <img src="accessories1.jpeg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title">Accessories</h5>
                  <p class="card-text">Check out the Latest Collectione of Mens Accessories.</p>
                </div>
                <div class="card-footer">
                  <a class="nav-link" href="#"> <small class="text-muted">View More</small></a>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <!--CARDS Layer 2-->
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <a class="nav-link" href="#">
                <img src="formal.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title">Fromals.</h5>
                  <p class="card-text">Best accessories for Formal Attires. </p>
                </div>
                <div class="card-footer">
                  <a class="nav-link" href="#"><small class="text-muted">View more.</small></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <a class="nav-link" href="#">
                <img src="Shoe.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title"><b>Shoes</b></h5>
                  <p class="card-text">Check out the Best Collecction of Shoes on hugee Discounts.</p>
                </div>
                <div class="card-footer">
                  <a class="nav-link" href="#">
                  <small class="text-muted">View more..</small></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <a class="nav-link" href="#">
                <img src="jackets.jpeg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title">Clothing</h5>
                  <p class="card-text">Check out the Latest Collectione of Mens Clothing.</p>
                </div>
                <div class="card-footer">
                  <a class="nav-link" href="#"> <small class="text-muted">View More</small></a>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <br>
          <div class="row row-cols-1 row-cols-md-1  g-4">
          <div class="col">
          <?php
        		$get_product=get_product($con);
				foreach($get_product as $list){
		?>    
          <div class="card h-100">
          <form method="post" action="homep.php?action=add&pid=<?php echo $list["product_id"];?>&cid=<?php echo $list["category"];?>&mrp=<?php echo $list["mrp"];?>">
                <a class="nav-link" href="#">
                <img src="Images/<?php echo $list['image'];
                $image=$list['image'];?>" alt="product images"></a>
                
                <div class="card-body">
                  <h5 class="card-title"><?php echo $list['name'];
                  $name=$list['name']?></h5>
                  <p class="card-text"><?php echo $list['short_des'];
                  $short_des=$list['short_des']?></p>
                </div>
                <div class="card-footer">
                  <a class="nav-link" href="#"> <small class="text-muted"><b>MRP:Rs.<?php echo $list['mrp'];
                  $mrpp=$list['mrp'];?></b></small></a>
                
                <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button></div>
               

                </form>
                
                
                <?php } ?>
            </div>
                </div>
                </div>
                </div>
                        
          <!--Subscribing-->
          <p class="text-center">Stay Updated with the Latest Content.</p>
          <h1 class="display-5 text-center"><b>Subscribe Now!</b></h1>
          <div class="row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email:</b></label>
            <div class="col-sm-6">
              <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Please Enter Your E-mail">
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary d-grid gap-2 col-2 mx-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Submit!
            </button>
          </div>    
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Congratulations!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p class="text-success">You have Subscribed for E-mails about the New offers and New arrivals.</p>
                  </div>
                </div>
              </div>
            </div>
            <hr>
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
            <br>
            <hr>
            <br>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
