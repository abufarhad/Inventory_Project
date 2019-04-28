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
	$result=$obj->addbrand( $_POST["Parent_cat"] );
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
	$m= new Manage();
	$result= $m-> manageRecordwithpagination("categories",1);
	$rows=$result["rows"];
	$pagination=$result["pagination"];
	if(count($rows)>0)
	{
		$n=0;
		foreach ($rows as $row) 
		{
			?>

			  <tr>
		        <td> <?php echo ++$n; ?> </td>
		        <td> <?php echo $row["category"]; ?> </td>
		        <td> <?php echo $row["parent"]; ?> </td>


		        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" class="btn btn-danger btn-sm">Delete</a>
		        	<a href="#" class="btn btn-info btn-sm">Edit</a>
		        </td>
		      </tr>

			<?php
			
		}

		?> 
			<tr> <td colspan="5"> <?php echo $pagination; ?>  </td></tr> 

	    <?php
		
		exit();
	}
}

?>