
<?php

include_once("./database/constants.php");
if (isset($_SESSION["userid"])) 
{
	header("Location:dashboard.php");
}


?>
<!-- jhsdgfh -->

<!DOCTYPE html>
<html>
<head>
	

	<!-- For Responsiveness nxt 2 line that helps to adjust all kind of devices -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Inventory Management System </title>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>



	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Style of Loader -->
	<link rel="stylesheet" type="text/css" href="./includes/style.css">

	<!-- Front Awesome (Mini front like Home, lock,user etc ) -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Js link -->

	<script type="text/javascript" rel="stylesheet" src="./js/main.js"></script>
	
</head>

<body>

<!-- Header -->

<!-- Overlay Loader -->
<div class="overlay"><div class="loader"></div></div>

<?php  include_once( "./templates/header.php");  ?>

<br/>

<div class="container ">
		<!-- Card --> 

		<!-- To print a msg in login form  -->
		<?php 
		if (isset($_GET["msg"]) AND !empty($_GET["msg"]))
	    {
	    	?> 

		    <div class="alert alert-success alert-dismissible fade show" role="alert">
			  <?php  echo $_GET["msg"]; ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>

	    	<?php 
			# code...
		}
		?>

		<!-- class="card mx-auto"  used for come in center position the whole form -->
	<div class="card mx-auto" style="width: 18rem;">
	  <img src="./images/login.png" style="width: 60%" class="card-img-top mx-auto" alt="Login Icon">
	  <div class="card-body">

	    <!-- Login Form -->

	    <form id="form_login" onsubmit="return false">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" name="log_email" id="log_email"  placeholder="Enter email">
		    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		    </div>
		    <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" name="log_pass" id="log_pass" placeholder="Password">

		    <small id="p_error" class="form-text text-muted"></small>

		  </div>
		  <button type="submit" class="btn btn-primary"><i class=" fa fa-lock">&nbsp; </i>Login</button>
		  <span><a href="register.php">Register</a> </span>
	    </form>

	  </div>
	  <div class="card-footer"> <a href="#">Forgate Password ?</a></div>
	</div>
</div>




<!-- 
	<div class="jumbotron" > 
    <h1>Hello world</h1>
	</div>
-->

</body>

</html>
