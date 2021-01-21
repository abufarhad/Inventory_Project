<?php

 // echo "OK you can do it ";


include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

// For Registation processing

if (isset($_POST["username"]) AND isset($_POST["email"]))
{
	$user=new User();
	$result=$user->creatuseraccount($_POST["username"], $_POST["email"], $_POST["password1"],$_POST["usertype"] );
	echo $result;

	# code...
}

// For Login processing

if (isset($_POST["log_email"]) AND isset($_POST["log_pass"]))
{
	$user=new User();
	$result=$user->userlogin($_POST["log_email"], $_POST["log_pass"]);
	echo $result;

	# code...
}

// For to getCategory 

if (isset($_POST["getCategory"]) )
{
	$obj= new DBOperation();
	$rows=$obj->getALLRecord("categories");
	foreach ($rows as $row ) 
	{
		echo "<option value=' " .$row["cid"]. " ' >" .$row["category_name"]. "</option>";
	}
	exit();

	# code...
}


// For to getBrand 

if (isset($_POST["getBrand"]) )
{
	$obj= new DBOperation();
	$rows=$obj->getALLRecord("brands");
	foreach ($rows as $row ) 
	{
		echo "<option value=' " .$row["bid"]. " ' >" .$row["brand_name"]. "</option>";
	}
	exit();

	# code...
}




//ADD Category

if(isset($_POST["category_name"]) AND isset($_POST["Parent_cat"]))
{
	$obj=new DBOperation();
	$result=$obj->addcategory( $_POST["Parent_cat"] , $_POST["category_name"]);
	echo $result;
	exit();
}


//ADD Brand
if(isset($_POST["brand_name"]))
{
	$obj=new DBOperation();
	$result=$obj->addbrand( $_POST["brand_name"] );
	echo $result;
	exit();
}




//ADD Product

if(isset($_POST["added_date"]) AND isset($_POST["product_name"]) )
{
	$obj=new DBOperation();
	$result=$obj->addproduct( $_POST["select_cat"],    $_POST["select_brand"] ,
							  $_POST["product_name"],  $_POST["product_price"],
							  $_POST["product_qty"],   $_POST["added_date"] );

	echo $result;
	exit();
}


//Manage Category 
if (isset($_POST["manageCategory"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			  <tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["category"]; ?></td>
			        <td><?php echo $row["parent"]; ?></td>
			       


		        <td><a href="#"  class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" did="<?php echo $row['cid']; ?> " class="btn btn-danger btn-sm del_cat">Delete</a>
		        	<a href="#" eid="<?php echo $row['cid']; ?> "  class="btn btn-info btn-sm edit_cat" data-toggle="modal" data-target="#category" >Edit</a>
		        </td>
		      </tr>

			<?php
			$n++;
		}

		?> 
			<tr> <td colspan="5"> <?php echo $pagination; ?>  </td></tr> 

	    <?php
		
		exit();
	}
} //This culprit tensed me almost 15-16 hour 

//	Delete Category
	if (isset($_POST["deleteCategory"])) 
	{
		$m=new Manage();
		$result=$m->deleteRecord("categories","cid", $_POST["id"]);
		echo $result;

		# code...
	}

//Update Category
	if (isset($_POST["updateCategory"]))
    {
    	$m=new Manage();
		$result=$m->getSingleRecord("categories","cid", $_POST["id"]);
		echo json_encode($result); //converting result , its an array. Reqired in js 
		exit();

		# code...
	}

//Update Record Afetr Getting Data
	if (isset($_POST["update_category"])) 
	{
		$m=new Manage();
		$id=$_POST["cid"];
		$name=$_POST["update_category"];
		$parent=$_POST["parent_cat"];
		$result= $m->update_record("categories", ["cid"=>$id], ["parent_cat"=>$parent , "category_name"=>$name ,"status"=>1]);
		echo $result;

		# code...
	}

//----------------Brand--------------

	//Manage Brand 
if (isset($_POST["manageBrand"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("brands",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			  <tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["brand_name"]; ?></td>
			    
			       
		        <td><a href="#"  class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" did="<?php echo $row['bid']; ?> " class="btn btn-danger btn-sm del_brand">Delete</a>
		        	<a href="#" eid="<?php echo $row['bid']; ?> "  class="btn btn-info btn-sm edit_brand" data-toggle="modal" data-target="#from_brand" >Edit</a>
		        </td>
		      </tr>

			<?php
			$n++;
		}

		?> 
			<tr> <td colspan="5"> <?php echo $pagination; ?>  </td></tr> 

	    <?php
		
		exit();
	}
}

//	Delete Brand
	if (isset($_POST["deleteBrand"])) 
	{
		$m=new Manage();
		$result=$m->deleteRecord("brands","bid", $_POST["id"]);
		echo $result;

		# code...
	}


//Update Brand
	if (isset($_POST["updateBrand"]))
    {
    	$m=new Manage();
		$result=$m->getSingleRecord("brands","bid", $_POST["id"]);
		echo json_encode($result); //converting result , its an array. Reqired in js 
		exit();

		# code...
	}

//Update Record Afetr Getting Data
	if (isset($_POST["update_brand"])) 
	{
		$m=new Manage();
		$id=$_POST["bid"];
		$name=$_POST["update_brand"];
		$result= $m->update_record("brands", ["bid"=>$id], [ "brand_name"=>$name ,"status"=>1]);
		echo $result;

		# code...
	}



	//----------------Products--------------

//Manage Products

if (isset($_POST["manageProduct"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("products",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			  <tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["product_name"]; ?></td>
			        <td><?php echo $row["category_name"]; ?></td>
			        <td><?php echo $row["brand_name"]; ?></td>
			        <td><?php echo $row["product_price"]; ?></td>
			        <td><?php echo $row["product_stock"]; ?></td>
			        <td><?php echo $row["added_date"]; ?></td>
			       
			    
			       
		        <td><a href="#"  class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" did="<?php echo $row['pid']; ?> " class="btn btn-danger btn-sm del_product">Delete</a>
		        	<a href="#" eid="<?php echo $row['pid']; ?> "  class="btn btn-info btn-sm edit_product" data-toggle="modal" data-target="#form_product" >Edit</a>
		        </td>
		      </tr>

			<?php
			$n++;
		}

		?> 
			<tr> <td colspan="5"> <?php echo $pagination; ?>  </td></tr> 

	    <?php
		
		exit();
	}
}

//	Delete Product

	if (isset($_POST["deleteProduct"])) 
	{
		$m=new Manage();
		$result=$m->deleteRecord("products","pid", $_POST["id"]);
		echo $result;

		# code...
	}

//Update Product

	if (isset($_POST["updateProduct"]))
    {
    	$m=new Manage();
		$result=$m->getSingleRecord("products","pid", $_POST["id"]);
		echo json_encode($result); //converting result , its an array. Reqired in js 
		exit();

		# code...
	}

//Update Record Afetr Getting Data

	if (isset($_POST["update_product"])) 
	{
		$m=new Manage();
		$id=$_POST["pid"];
		$name=$_POST["update_product"];
		$cat= $_POST["select_cat"]; 
		$brand= $_POST["select_brand"] ;
		
		$price=$_POST["product_price"];
		$qty=$_POST["product_qty"];  
		
		$date=$_POST["added_date"];
		
	$result = $m->update_record("products",["pid"=>$id],["cid"=>$cat,"bid"=>$brand,"product_name"=>$name,"product_price"=>$price,"product_stock"=>$qty,"added_date"=>$date]);
	echo $result;

		# code...
	}


	// --------------------Order Processing ----------------------

	if (isset($_POST["getNewOrderItem"]))
    {
    	$obj= new DBOperation();
    	$rows=$obj->getALLRecord("products");

    	?> 
    	
    	<tr> 
			<td><b class="number">1 </b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm pid" required>
		            <option value="">Choose Product</option>
		            <?php 
		            	foreach ($rows as $row) {
		            		?><option value="<?php echo $row['pid']; ?>"><?php echo $row['product_name']; ?></option><?php
		            	}
		            ?>
		        </select>
		    </td>

			<td><input name="Tqty[]" readonly type="text" class="form-control form-control-sm Tqty"> </td>

			<td><input name="qty[]" type="text" class="form-control form-control-sm qty" required> </td>

			<td><input name="Price[]" type="text" class="form-control form-control-sm price" readonly> </td>

			<span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name" readonly> </span>

			<td> BDT. <span class="amt">0</span> </td>

   		</tr>

    	<?php 
    	exit();
    }


    // Get price and quantity of one item
    if (isset($_POST["getPriceAndQty"] )) 
    {
    	$m= new manage();
    	$result = $m->getSingleRecord("Products", "pid", $_POST["id"]);
    	echo json_encode($result);
    	exit();
    }


?>