
<?php

include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) 
{
	header("Location:".DOMAIN."/");
}
?>


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

	<!-- Js link -->

	<script type="text/javascript" src="./js/main.js"></script>
	
</head>

<body>

<!-- Header -->

<?php  include_once( "./templates/header.php");  ?>

<br/>

<div class="container ">

	<div class="row">
		<div class="col-md-4">
			<div class="card mx-auto" >
			  <img src="./images/pinv2.png" style="width: 70%" class="card-img-top mx-auto" alt="card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Profile Info</h5>
			    <p class="card-text"><i class=" fa fa-user">&nbsp; </i>Md: Abu Farhad</p>
			    <p class="card-text"><i class=" fa fa-user">&nbsp; </i>Admin</p>
			    <p class="card-text">Last Login : xxxx-xx-xx</p>
			    <a href="#" class="btn btn-primary"><i class=" fa fa-edit">&nbsp; </i>Edit Profile</a>
			  </div>
			</div>
		</div>


		<div class="col-md-8">
			<div class="jumbotron" style="width: 100%; height: 100%; ">
				<h1>Welcome Admin</h1>

				<div class="row">

				<div class="col-sm-6">
				<iframe src="http://free.timeanddate.com/clock/i6obn4gn/n73/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>
				</div>


				<div class="col-sm-6">
				<div class="card">
			      <div class="card-body">
			        <h5 class="card-title">New Orders</h5>
			        <p class="card-text">Here you can make invoices and create new order</p>
			        <a href="new_order.php" class="btn btn-primary">New Orders</a>
			      </div>
			    </div>

				
				 </div>

				</div>
		    </div>
		</div>
	</div>
</div>
<p></p>
<p></p>
<div class="container">
	<div class="row">

		<div class="col-md-4">
			<div class="card">
		      <div class="card-body" >
		        <h5 class="card-title">Categories</h5>
		        <p class="card-text">Here you can Manage Categories and you can add new parent and Categories </p>
		        <a href="#" data-toggle="modal" data-target="#category" class="btn btn-primary">Add </a>
		        <a href="manage_categories.php" class="btn btn-primary">Manage </a>
		      </div>
		    </div>
		</div>


		<div class="col-md-4">
			
			<div class="card">
		      <div class="card-body" >
		        <h5 class="card-title">Brands</h5>
		        <p class="card-text">Here you can Manage Brands and you can add new  Brands </p>
		        <a href="#" data-toggle="modal" data-target="#brand" class="btn btn-primary">Add </a>
		        <a href="manage_brand.php" class="btn btn-primary">Manage </a>
		      </div>
		    </div>

		</div>


		<div class="col-md-4">
			
			<div class="card">
		      <div class="card-body" >
		        <h5 class="card-title">Products</h5>
		        <p class="card-text">Here you can Manage Products and you can add new Products </p>
		        <a href="#" data-toggle="modal" data-target="#products" class="btn btn-primary">Add </a>
		        <a href="manage_product.php" class="btn btn-primary">Manage </a>
		      </div>
		    </div>

		</div>
		
	</div>
</div>


<!-- Model Creation  Category, brand and products -->
<?php  include_once("./templates/category.php")  ?>
<?php  include_once("./templates/brand.php")  ?>
<?php  include_once("./templates/Products.php")  ?>



</body>

</html>
