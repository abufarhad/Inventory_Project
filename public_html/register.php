<!DOCTYPE html>
<html>
<head>
	<!-- cnt+/ -->
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

	<!-- Front Awesome (Mini front like Home, lock,user etc ) -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Style of Loader -->
	<link rel="stylesheet" type="text/css" href="./includes/style.css">


	<!-- Js link -->

	<script type="text/javascript" src="./js/main.js"></script>
	
</head>

<body>

<!-- Header -->

<!-- Overlay Loader -->
<div class="overlay"><div class="loader"></div></div>

<?php  include_once( "./templates/header.php");  ?>

<br/>

<!-- Register Form  -->

	<div class="container">
		<div class="card mx-auto" style="width: 30rem;">
	        <div class="card-header">Register</div>
		      <div class="card-body">
		        <form id="register_form" onsubmit="return false" autocomplete="off">
		          <div class="form-group">
		            <label for="username">Full Name</label>
		            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="email">Email address</label>
		            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		            <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		          </div>
		          <div class="form-group">
		            <label for="password1">Password</label>
		            <input type="password" name="password1" class="form-control"  id="password1" placeholder="Password">
		            <small id="p1_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="password2">Re-enter Password</label>
		            <input type="password" name="password2" class="form-control"  id="password2" placeholder="Password">
		            <small id="p2_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="usertype">Usertype</label>
		            <select name="usertype" class="form-control" id="usertype">
		              <option value="">Choose User Type</option>
		              <option value="Admin">Admin</option>
		              <option value="Other">Other</option>
		            </select>
		            <small id="t_error" class="form-text text-muted"></small>
		          </div>
		          <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Register</button>
		          <span><a href="index.php">Login</a></span>
		        </form>
		      </div>
	      <div class="card-footer text-muted">
	        
	      </div>
	    </div>
	</div>



</body>

</html>
