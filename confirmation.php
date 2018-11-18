<?php

// Initialize the session
session_start();

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login.php");

  exit;

}

?>


<!DOCTYPE html>

<html lang="en">



  <head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Popped</title>



    <!-- Bootstrap core CSS -->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->

    <link href="css/3-col-portfolio.css" rel="stylesheet">



  </head>



  <body>



    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

      <div class="container">

        <a class="navbar-brand" href="#"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item">

              <a class="nav-link" href="index.php">Home</a>

            <li class="nav-item">

              <a class="nav-link" href="account.php">Account</a>

            </li>

          </ul>

        </div>

      </div>

    </nav>



    <!-- Page Content -->

    <div class="container">
    	<center><h2>
    		Success!
    	</h2></center>
    	Username: <?php echo htmlspecialchars($_SESSION['username']); ?> 
    
    <?php
    $con=mysqli_connect("localhost","root","","honestcraig_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    // Perform queries

     $user= $_SESSION['username'];
    $sql = "SELECT id FROM users WHERE username = '$user'";
    $result = mysqli_query($con,$sql);
     while($row = mysqli_fetch_array($result))
        {
    $userid = $row['id'];
        }
    ?>

    <br>
  Your category choice is: <?php echo $_POST["category"]; ?></br>
  Your product's name is: <?php echo $_POST["product_name"]; ?></br>
  Your product's description is: <?php echo $_POST["description"]; ?></br>
  Your product's price is: <?php echo $_POST["price"]; ?></br>
  
    <?php
    $con=mysqli_connect("localhost","root","","honestcraig_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    // Perform queries
      $category = $_POST['category'];
      $product_name = $_POST['product_name'];
      $description = $_POST["description"];
      $price = $_POST["price"];
    ?>
  </br>
 


  <?php
    $con=mysqli_connect("localhost","root","","honestcraig_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
        //Start insert into DB
        $sql_insert_listing = "INSERT INTO listings (product_category,product,product_desc,product_price,username) VALUES('$category','$product_name','$description','$price', '$user');";
        mysqli_query($con,$sql_insert_listing);
      
  ?>


      <!-- Page Heading -->


      

    </div>

    <!-- Footer -->

    <footer class="py-5 bg-dark">

      <div class="container">

        <p class="m-0 text-center text-white">Copyrighted by Popped!<sup>&copy;</sup></p>

        <p class="m-0 text-center text-white">Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></p>

        <p align="center"><a href="logout.php" class="btn btn-danger">Sign Out</a></p>

      </div>

      <!-- /.container -->

    </footer>



    <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



  </body>



</html>

