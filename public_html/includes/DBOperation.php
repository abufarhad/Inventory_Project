<?php

class DBOperation 
{
	private $con;
	function __construct()
	{
		include_once("../database/db.php");
		$db=new Database();
		$this->con= $db->connect();
	}


	public function addcategory($parent, $cat)
	{
		$pre_stmt=$this->con->prepare("INSERT INTO `categories`( `parent_cat`, `category_name`, `status`) VALUES (?,?,?) ");
		$status=1;
		$pre_stmt->bind_param("isi",$parent, $cat,$status);
		$result= $pre_stmt->execute() or die($this->con->error );

		
		if ($result)
	    {
			return "CATEGORY_ADDED"; 
		}
		else
		{
			return 0;
		}

	}

	public function addbrand($brand_name)
	{
		$pre_stmt=$this->con->prepare("INSERT INTO `brands`( `brand_name`, `status`) VALUES (?,?) ");
		$status=1;
		$pre_stmt->bind_param("si",$brand_name,$status);
		$result= $pre_stmt->execute() or die($this->con->error );

		
		if ($result)
	    {
			return "BRAND_ADDED"; 
		}
		else
		{
			return 0;
		}

	}


	public function getALLRecord($table)
	{
		$pre_stmt=$this->con->prepare("SELECT *FROM ".$table);
		$pre_stmt->execute() or die($this->con->error );
		$result=$pre_stmt->get_result();
		$rows=array();

		if ($result->num_rows > 0)
	    {
	    	while ($row = $result->fetch_assoc() ) // fetch associative array that add all the tuple in the rows
	        {
	        	$rows[]=$row;
	    		# code...
	    	}
	    	return $rows;
			# code...
		}
		return "NO_DATA";
	}
}

$opr=new DBOperation();
//echo $opr->addcategory(1,"Mobile");

/*
// To print the asociative array 
echo "<pre>";
print_r($opr->getALLRecord("categories"));
*/


?>