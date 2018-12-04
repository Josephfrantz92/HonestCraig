<?php

// Initialize the session

session_start();
$con=mysqli_connect("localhost","root","","honestcraig_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }


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
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#990000;}
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
					<h1>Current Auto Listings!</h1>
        </div>
       <div class="col-4"></div>
    </div>
    <br>

    <!-- Page Content -->

    <div class="container">



      <!-- Page Heading -->

      <div class="row" style= "background-color: #b9bec1">
    </br>
      <div class="col"></div>
      
      <div class="col">

        <div class="container">
        <?php
          //$sql = "SELECT * from listings where product_category = 'Aquatics';";
          $sql ="SELECT * from listings, users where listings.username = users.username AND product_category = 'auto';";
          //$sql = "SELECT * from listings,users where product_category = 'Aquatics' AND users.username = 'admin2';";
          $query = mysqli_query($con,$sql);
        ?>
        <br>
        <div class="tg-wrap"><table class="tg" style="undefined;table-layout: fixed; width: 331px;">
        <colgroup>
        <col style="width: 100px">
        <col style="width: 200px">
        <col style="width: 149px">
        <col style="width: 149px">
        <col style="width: 149px">
        </colgroup>
          <tr>
          <th class="tg-baqh">Product</th>
          <th class="tg-baqh">Product Description</th>
          <th class="tg-baqh">Price</th>
          <th class="tg-baqh">Seller</th>

          <th class="tg-baqh">Purchase</th>
          </tr>
          <?php
             while ($row = mysqli_fetch_array($query)) {

              $product = urlencode($row['product']);
              $category = $row['product_category'];
              $seller = $row['username'];
              $price = $row['product_price'];
              $userRating = $row['rating'];






               echo "<tr>";
               echo "<td>".$row['product']."</td>";
               echo "<td>".$row['product_desc']."</td>";
               echo "<td>$".$row['product_price']."</td>";
               echo "<td><span data-toggle=tooltip title=$userRating>".$row['username']."</span></td>";
               //echo "<td>".$row['rating']."</td>";
               echo "<td><a href=review_order.php?product=".$product."&seller=".$seller."&price=".$price."&category=".$category." style=color:blue>Purchase</a></td>";
               echo "</tr>";
             }
          ?>
        </table>
          <br>
        </div>
        
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

