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



  <body  style="background-color:  #990000">



    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

      <div class="container">

        <a class="navbar-brand" href="#"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">

              <a class="nav-link" href="index.php">Home

                <span class="sr-only">(current)</span>

              </a>

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
				<h2>Create a Listing</h2>
			</div>
			<div class="col-2"></div>
		</div>
		<br />



    <!-- Page Content -->

    <div class="container">


      <!-- Page Heading -->
	  
	  <div class="row" style= "background-color: #b9bec1">
		</br>
			<div class="col"></div>
			
			<div class="col-lg">

			  <h1 align="center">What are we selling today?</h1>

					<form action="confirmation.php" method="post">
					<h3>Category:
					  <select name="category">
						<option value="Aquatics">Aquatics</option>
						<option value="Auto">Auto</option>
						<option value="Home">Home</option>
					  </select>
					</h3>
					<h3>Product Name:</h3>
					  <input type="text" name="product_name">
					
					<h3>Product Description:</h3>
					  <textarea name="description" rows="5" cols="50"></textarea>
					  <br>
					  <h3>Product Price:</h3>
					  <input type="text" name="price" size="5">
					
					<br>
					<h3>Image of product:</h3>
					<p style="font-size:100%;"><input type="file" name="img" id="img"></p>
					
					<br>
					<center><button type="submit" class="btn btn-success">Submit</button></center>
					<br>
					
					

				</form>
			</div>
			<div class="col"></div>
		</div>
	</div>

<!--footer-->
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

