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

    <link href="stylesheet.css" type="text/css" rel="stylesheet">



  </head>



  <body style="background-color:  #990000">



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

	<div></div> <!-- Grey Header Bar -->
		<div class="row" style="background-color: #b9bec1">
		</br>
			<div class="col-2"></div>
			<div class="col-8">
				<br>
				<br><br>
			
			</div>
			<div class="col-2"></div>
		</div>
		<br />


    <!-- Page Content -->

	<div class="container">
	
	<div class="row" style= "background-color: #b9bec1">
		</br>
			<div class="col"></div>
			
			<div class="col">
	
				<div class="container">
					<center><h2>
						Thank you for your feedback! You will be redirected shortly.
					</h2></center>
					<!--Username: <?php echo htmlspecialchars($_SESSION['username']); ?> -->
				
				<?php
				$con=mysqli_connect("localhost","root","","honestcraig_db");
				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

				// Perform queries

				 $user= $_SESSION['username'];
				 $userRating = $_POST["userRating"];
				 $userComment = $_POST["userComment"];
				 $seller = $_SESSION['seller'];
				?>

				 <!--Rating: <?php echo $userRating; ?></br>
				 Comment: <?php echo $userComment; ?></br>
				 Seller: <?php echo $seller; ?></br> -->

				 <div id="counter">5</div>
				    <script>
				        setInterval(function() {
				            var div = document.querySelector("#counter");
				            var count = div.textContent * 1 - 1;
				            div.textContent = count;
				            if (count <= 0) {
				                window.location.replace("index.php");
				            }
				        }, 1000);
				    </script>
				    	<br>
				</div>
				<!-- Insert into userRating table --->
			 <?php
				$con=mysqli_connect("localhost","root","","honestcraig_db");
				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
					//Start insert into DB
					$sql = "INSERT INTO users_ratings (username,rating,comment,rater) VALUES('$seller','$userRating','$userComment','$user');";
					mysqli_query($con,$sql);

					$sql2 ="CALL updateRating('$seller');";
					mysqli_query($con,$sql2);
				  
			  ?>
				
				</div>
			<div class="col"></div>
		</div>
	</div>

	
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

