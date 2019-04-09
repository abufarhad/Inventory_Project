<?php

 // echo "OK you can do it ";


include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");

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

?>