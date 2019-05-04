
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

	<script type="text/javascript" src="./js/manage.js"></script>
	
</head>

<body>

<!-- Header -->

<?php  include_once( "./templates/header.php");  ?>

<br/>

<div class="container">
		<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Product</th>
		        <th>Category</th>
		        <th>Brand</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Added Date</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="get_product">
		    	
	<!-- 	    <tr>
		        <td>1</td>
		        <td>Electronics</td>
		        <td>Root</td>
		        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" class="btn btn-danger btn-sm">Delete</a>
		        	<a href="#" class="btn btn-info btn-sm">Edit</a>
		        </td>
		      </tr> -->

		    </tbody>
		  </table>
	</div>

<?php  
	include_once("./templates/update_products.php");
?>

</body>

</html>
