<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> HonestCraig.org </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="stylesheet.css" type="text/css" rel="stylesheet">


	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<!--<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"> -->
	<link rel="manifest" href="/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

</head>

<body style="background-color:  #990000;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link active" href="index.php">Home</a>
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
        <div class="col-4"style="background-color: #b9bec1">
        <h1>Welcome to Honest Craig!</h1>
        <img src="logo.png" style="height:190px;width:250px;">
        </div>
       <div class="col-4"></div>
    </div>
    <br>

    <div>
        
    </div>
                <center>
                <div id="myCarousel" class="carousel slide col-6" data-ride="carousel" style="background-color: #b9bec1; margin-left: 50px; margin-right: 50px">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h3>Aquatics</h3>
                            
                            <a class="nav-item nav-link" href="Aquatics.php"><img class="d-block w-100" src="photos/aquatics/boatHD.jpg" alt="Aquatics"></a>
                        </div>

                        <div class="carousel-item">
                            <h3>Auto</h3>
                            
                            <a class="nav-item nav-link" href="Auto.php"><img class="d-block w-100" src="photos/auto/showroom.jpg" alt="Auto"></a>
                        </div>

                        <div class="carousel-item">
                            <h3>Home</h3>
                            
                            <a class="nav-item nav-link" href="Home.php"><img class="d-block w-100" src="photos/Home/home.jpg" alt="Home"></a>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <br>
                </center>
                
    </div>


<!--footer-->
<div class="navbar navbar-dark bg-dark static-bottom">


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
</p>
</div>
<?php } ?>>
</div>

<!--Feedback button -->

<div id="mybutton" style=" 
    position: fixed;
  bottom: -4px;
  right: 10px;">
<a a href="mailto:admin@honestcraig.com?Subject=Website%20Feedback" target="_top"><img src="feedback.png" style="height:100px;width:130px;"></a>
</div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>