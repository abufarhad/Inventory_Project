
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

	<script type="text/javascript" src="./js/order.js"></script>
	
</head>

<body>

<!-- Header -->
<div class="overlay"><div class="loader"></div> </div>

<?php  include_once( "./templates/header.php");  ?>

<br/>

<div class="container">
	<div class="row" >
		<div class="col-md-10 mx-auto">
			<!--  -->

			<div class="card" style="box-shadow: 0 0 25px 0 lightgray;">
			  <div class="card-header">
			    <h4>New Orders</h4>
			  </div>
			  <div class="card-body">
			   <form onsubmit="return false">
			   	<div class="form-group row">
			   		<label class="col-sm-3  col-form-label" align="right">Order Date</label>
			   		<div class="col-sm-6">
			   			<input type="text" readonly class="form-control form-control-sm" 
			   			value="<?php echo date("Y-d-m") ; ?> " >
			   		</div>
			   	</div>

			   	<!--  -->
			   	<div class="form-group row">
			   		<label class="col-sm-3 " align="right">Customer Name*</label>
			   		<div class="col-sm-6">
			   			<input type="text"  class="form-control form-control-sm" placeholder="Enter Customer Name" required/>
			   		</div>
			   	</div>
			   	<!--  -->
			   	<br>

			   	<div class="card">
			   		<div class="card-body">
			   			<h3>Make a Order List</h3>

			   			<br>
			   			<!-- Table start -->

			   			<table align="center" style="width: 800px;"> 
			   			<thead>
			   				<tr>
			   					<th>*</th>
			   					<th style="text-align: center;">Item Name</th>
			   					<th style="text-align: center;">Total Quantity</th>
			   					<th style="text-align: center;">Quantity</th>
			   					<th style="text-align: center;">Price</th>
			   					<th>Total</th>
			   				</tr>
			   			</thead>
		<!-- Tbody -->

   			<tbody id="invoice_item">
   				
   				<!-- <tr> 
   					<td><b id="number">1 .</b></td>
   					<td>
   						<select name="pid[]" class="form-control form-control-sm" required>
   							<option>Washing Machine</option>
   						</select>
   					</td>
   					<td><input name="Tqty[]" readonly type="text" class="form-control form-control-sm"> </td>

   					<td><input name="qty[]" type="text" class="form-control form-control-sm" required> </td>

   					<td><input name="Price[]" type="text" class="form-control form-control-sm" readonly> </td>

   					<td> BDT:  1500</td>

   				</tr> -->
   			</tbody>

					</table>
					<br>
					<!-- Table Ends -->
					<center>
						<button id="add" style="width: 150px;" class="btn btn-success">ADD</button>
						<button id="remove" style="width: 150px;" class="btn btn-danger">Remove</button>
					</center>

			   		</div>  
			   		<!-- Inner card ends -->
			   	</div>
			   		<!-- Card Ends -->



			   	<br><br>

			   	<div class="form-group row">
			   	  <label for="sub_total" class="col-sm-3 col-form-label " align="right">Sub Total</label>
			    	<div class="col-sm-6">
			   		<input type="text" name="sub_total" class="form-control form-control-sm" id="sub_total" required>
			   	    </div>	
			   	</div>


			   	<div class="form-group row">
			   	  <label for="gst" class="col-sm-3 col-form-label " align="right">GST (18%)</label>
			    	<div class="col-sm-6">
			   		<input type="text" name="gst" class="form-control form-control-sm" id="gst" required>
			   	    </div>	
			   	</div>


			   	<div class="form-group row">
			   	  <label for="Discount" class="col-sm-3 col-form-label " align="right">Discount</label>
			    	<div class="col-sm-6">
			   		<input type="text" name="Discount" class="form-control form-control-sm" id="Discount" required>
			   	    </div>	
			   	</div>


			   	<div class="form-group row">
			   	  <label for="net_total" class="col-sm-3 col-form-label " align="right">Net Total</label>
			    	<div class="col-sm-6">
			   		<input type="text" name="net_total" class="form-control form-control-sm" id="net_total" required>
			   	    </div>	
			   	</div>


			   	<div class="form-group row">
			   	  <label for="paid" class="col-sm-3 col-form-label " align="right">Paid</label>
			    	<div class="col-sm-6">
			   		<input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
			   	    </div>	
			   	</div>


			   	<div class="form-group row">
			   	  <label for="due" class="col-sm-3 col-form-label " align="right">Due</label>
			    	<div class="col-sm-6">
			   		<input type="text" name="due" class="form-control form-control-sm" id="due" required>
			   	    </div>	
			   	</div>


			   	<div class="form-group row">
			   	  <label for="payment_type" class="col-sm-3 col-form-label " align="right">Payment Type</label>
			    	<div class="col-sm-6">
			   		<select name="payment_type" class="form-control form-control-sm" id="payment_type" required>
			   			<option>Cash</option>
			   			<option>Card</option>
			   			<option>Draft</option>
			   			<option>Cheque</option>
			   		</select>
			   	    </div>	
			   	</div>

			   	<center>
			   		<input type="submit" id="order_form" style="width: 150px;" class="btn btn-info" value="Order">
			   		<input type="submit" id="print_invoice" style="width: 150px;" class="btn btn-success d-none " value="Print Invoice">
			   	</center>

			   </form>
			  </div>
			</div>
			<!--  -->

		</div>
	</div>
</div>


</body>

</html>
