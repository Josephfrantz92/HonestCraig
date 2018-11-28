<?php

// Initialize the session

session_start();
$con=mysqli_connect("localhost","root","","honestcraig_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
 

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login.php");

  exit;

}

?>


<?php
	$user = ($_SESSION['username']);

	//$sql = "SELECT id from users where username='$user';";
    //$result = mysqli_query($con,$sql);
    //$row = mysqli_fetch_array($result);
    //$user_id = $row['id'];
    



	//$sql = "SELECT * from reservation where reservation.id = '$user_id';";
    //$result = mysqli_query($con,$sql);
    //$row = mysqli_fetch_array($result);
    //$res_id = $row['res_id'];
    //$movie_title = $row['movie_title'];
    //$num_tickets = $row['res_tickets'];
    //$movie_id = $row['movie_id'];


    //echo $user_id. "<br>";
    //echo $movie_title . "<br>";
    //echo $res_id . "<br>";
    //echo $num_tickets . "<br>";
?>


<!DOCTYPE html>

<html lang="en">



  <head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-baqh{text-align:center;vertical-align:center}
.tg .tg-cx4s{background-color:#f7fdfa;text-align:center;vertical-align:center}
.tg .tg-yw4l{vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
    


    <title>HonestCraig</title>



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

            <li class="nav-item ">

              <a class="nav-link" href="index.php">Home</a>

            </li>

            <li class="nav-item">

              <a class="nav-link active" href="account.php">Account</a>

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
				<h2>Your Current Listings</h2>
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
			
			<div class="col">

			  <div class="container">
				<?php

					$sql = "SELECT * from listings where listings.username = '$user';";
					$query = mysqli_query($con,$sql);
				?>



				<div class="tg-wrap"><table class="tg" style="undefined;table-layout: fixed; width: 331px">
				<colgroup>
				<col style="width: 54px">
				<col style="width: 128px">
				<col style="width: 149px">
				<col style="width: 149px">
				</colgroup>
				  <tr>
					<th class="tg-yw4l">ID</th>
					<th class="tg-baqh">Category</th>
					<th class="tg-baqh">Product</th>
					<th class="tg-baqh">Price</th>
				  </tr>
				  <?php
			 
					   while ($row = mysqli_fetch_array($query)) {
						   echo "<tr>";
						   echo "<td>".$row['id']."</td>";
						   echo "<td>".$row['product_category']."</td>";
						   echo "<td>".$row['product']."</td>";
						   echo "<td>".$row['product_price']."</td>";
						   echo "</tr>";
					   }
					?>
				</table></div> 
				<div>
					<center>
					  <h3>Cancel Listing</h3>
					<form action="cancel.php" method="post">
						<input type="text" name="id" placeholder="Enter ID">
						<br><br>
						<input type="submit" class="btn btn-success">
					</form>
					</center>
				</div>
				<br>

			  </div>
			</div>
			<div class="col"></div>
	  </div>
	</div>

    <!-- /.container -->



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

          <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
      });
      </script>


  </body>



</html>

