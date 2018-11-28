<?php

// Include config file

require_once 'config.php';

 

// Define variables and initialize with empty values

$username = $password = $confirm_password = "";

$username_err = $password_err = $confirm_password_err = "";

 

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Validate username

    if(empty(trim($_POST["username"]))){

        $username_err = "Please enter a username.";

    } else{

        // Prepare a select statement

        $sql = "SELECT id FROM users WHERE username = ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            

            // Set parameters

            $param_username = trim($_POST["username"]);

            

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                /* store result */

                mysqli_stmt_store_result($stmt);

                

                if(mysqli_stmt_num_rows($stmt) == 1){

                    $username_err = "This username is already taken.";

                } else{

                    $username = trim($_POST["username"]);

                }

            } else{

                echo "Oops! Something went wrong. Please try again later. 1";

            }

        }

         

        // Close statement

        mysqli_stmt_close($stmt);

    }

    

    // Validate password

    if(empty(trim($_POST['password']))){

        $password_err = "Please enter a password.";     

    } elseif(strlen(trim($_POST['password'])) < 6){

        $password_err = "Password must have atleast 6 characters.";

    } else{

        $password = trim($_POST['password']);

    }

    

    // Validate confirm password

    if(empty(trim($_POST["confirm_password"]))){

        $confirm_password_err = 'Please confirm password.';     

    } else{

        $confirm_password = trim($_POST['confirm_password']);

        if($password != $confirm_password){

            $confirm_password_err = 'Password did not match.';

        }

    }

    

    // Check input errors before inserting in database

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        

        // Prepare an insert statement

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

         

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            

            // Set parameters

            $param_username = $username;
            
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                // Redirect to login page

                header("location: login.php");

            } else{

                echo "Something went wrong. Please try again later. 2";

            }

        }

         

        // Close statement

        mysqli_stmt_close($stmt);

    }

    

    // Close connection

    mysqli_close($link);

}

?>





<!DOCTYPE html>

<html lang="en">



  <head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">



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
          
            <li class="nav-item">

                <a class="nav-link" href="Index.php">Home</a>

                </li>
            <li class="nav-item">

              <a class="nav-link" href="login.php">Login</a>

            </li>

            <li class="nav-item active">

              <a class="nav-link" href="registration.php">Sign Up</a>

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
				<h2>Sign Up</h2>
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

				<p>Please fill this form to create an account.</p>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

					<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

						<label>Username</label>

						<input type="text" name="username"class="form-control" value="<?php echo $username; ?>">

						<span class="help-block"><?php echo $username_err; ?></span>

					</div>    

					<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

						<label>Password</label>

						<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">

						<span class="help-block"><?php echo $password_err; ?></span>

					</div>

					<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

						<label>Confirm Password</label>

						<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">

						<span class="help-block"><?php echo $confirm_password_err; ?></span>

					</div>

					<div class="form-group">

						<input type="submit" class="btn btn-primary" value="Submit">

						<input type="reset" class="btn btn-default" value="Reset">

					</div>

					<p>Already have an account? <a href="login.php">Login here</a>.</p>

				</form>
			</div>
			<div class ="col"></div>

    </div>

    <!-- /.container -->






    <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


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
</div>
<?php } ?>>
</nav>
  </body>



</html>

