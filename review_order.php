<?php

// Initialize the session
session_start();

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login.php");

  exit;

}

$category = $_GET['category'];
$product = $_GET['product'];
$price = $_GET['price'];
$seller = $_GET['seller'];

$_SESSION['category'] = $category;
$_SESSION['product'] = $product;
$_SESSION['price'] = $price;
$_SESSION['seller'] = $seller

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

    <link href="stylesheet.css" type="text/css" rel="stylesheet">



  </head>



  <body style="background-color:  #990000">



        <!-- Navigation -->

    
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="account.php">Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sell.php">Sell</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="row" style="background-color: #990000">
    <br>
        <div class="col-4"></div>
        <div class="col-4"style="background-color:  #b9bec1">
					<h1>Review your order!</h1>
        </div>
       <div class="col-4"></div>
    </div>
    <br>


    <!-- Page Content -->

		

	<div class="container">
	
	<div class="row" style= "background-color: #b9bec1">
		</br>
			<div class="col"></div>
			
			<div class="col">
	
				<div class="container">
					<!--Username: <?php echo htmlspecialchars($_SESSION['username']); ?> 
					<br> -->
					<br>
					Category: <?php echo $category ?>
					<br>
					Seller: <?php echo $seller ?>
					<br>
					Price: <?php echo $price ?>
					<br>
					Product: <?php echo $product ?>

					
					<br>
					<br>

					
					<form action="rating.php" method="post">
					<a href="index.php" class = "btn btn-danger">Cancel</a>
					<button type="submit" class="btn btn-success">Submit</button>
					</form>
					
					<br><br>


				</div>
				
				</div>
			<div class="col"></div>
		</div>
	</div>

      <!-- /.container -->
	
    </footer>
	<nav class="navbar navbar-dark bg-dark fixed-bottom">


		<?php if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
		{
		?>
		<div class="container text-center">
		<p class="navbar-text col-md-12 col-sm-12 col-xs-12 text-white">Copyrighted by HonestCraig<sup>&copy;</sup>
		  <br>  
		  Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?>
		  <br>
		  <a href="logout.php" class="btn btn-danger">Sign Out</a>
		</p>
		</div>
		<?php }else{ ?>
			<div class="container text-center">
		<p class="navbar-text col-md-12 col-sm-12 col-xs-12 text-white">
		Copyrighted by HonestCraig<sup>&copy;
		<br>
		<br>
		<a href="login.php" class="btn btn-success">Sign in</a>
		</p>
		</div>
		<?php } ?>>
		</nav>
	


    <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



  </body>



</html>

