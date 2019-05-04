<?php

class Manage
{
	
	private $con;
	function __construct()
	{
		include_once("../database/db.php");
		$db=new Database();
		$this->con= $db->connect();
	}

	public function manageRecordwithpagination($table, $pno)
	{
		$a =$this->pagination($this->con, $table, $pno, 5);
		if($table=="categories")
		{
		$sql="SELECT p.cid, p.category_name as category, c.category_name as parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid ".$a["limit"];
		
		}
		else if ($table=="products") 
		{
			$sql=" SELECT p.pid, p.product_name ,c.category_name, b.brand_name, p.product_price, p.product_stock, p.added_date, p.p_status FROM products p, categories c, brands b WHERE p.bid=b.bid AND p.cid=c.cid ".$a["limit"];
			# code...
		}

		else
		{
			$sql="SELECT * FROM ".$table." ".$a["limit"];
		}
		$result=$this->con->query($sql) or die($this->con->error);

		$rows=array();
		if($result->num_rows >0)
		{
			while ( $row= $result->fetch_assoc()) 
			{
				$rows[]=$row;
			}
		}
		return ["rows"=>$rows, "pagination"=>$a["pagination"]];
	} 



// Pagination 
private function pagination($con, $table, $pno, $n)
{
	//$totalRecords=100000;

	$query=$con->query("SELECT COUNT(*) AS ROWS FROM  ".$table);
	$row=mysqli_fetch_assoc($query);

	$pageno=$pno;
	$numberofRecordsPerPgae= $n;

	$last=ceil($row["ROWS"]/ $numberofRecordsPerPgae );

	//echo "Total Pages ".$last."</br>";

	$pagination="<ul class='pagination'>";

	if ($last !=1)
	{
		if ($pageno>1)
	    {
			$previous="";
			$previous=$pageno-1;
			$pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color : #333;' >Previous </a></li> ";
		}

		for ($i=$pageno-5 ; $i < $pageno ; $i++) 
		{ 
			if($i >0)
			{
			$pagination .= "<li class='page-item'><a class='page-link' pn=' ".$i."' href ='#' > ".$i." </a></li> ";
			}
		}

		$pagination .= "<li class='page-item'><a class='page-link' pn='".$pageno."' href='#' style='color : #333;' >$pageno </a> </li> ";

		for ($i=$pageno+1; $i <=$last ; $i++) 
		{ 
			$pagination .= "<li class='page-item'><a class='page-link' pn=' ".$i."' href ='#'> ".$i." </a></li> ";
			if ($i > $pageno+4)
		    {
				break;
			}
		}

		if ($last>$pageno)
	    {
	    	$next=$pageno+1;
	    	$pagination .= "<li class='page-item'><a class='page-link' pn=' ".$next."' href='#' style='color : #333;' >Next </a> </li> </ul>";
	    }

	}


	//LIMIT 0,10, (10,10), (20,10),.......
		
	$limit= "LIMIT ".($pageno-1)* $numberofRecordsPerPgae." ,".$numberofRecordsPerPgae;


	return ["pagination"=>$pagination,"limit"=>$limit];
   }

   //Delete Record

public function deleteRecord($table,$pk,$id){


		if($table == "categories"){

			$pre_stmt = $this->con->prepare("SELECT ".$id." FROM categories WHERE parent_cat = ?");
			$pre_stmt->bind_param("i",$id);
			$pre_stmt->execute();
			$result = $pre_stmt->get_result() or die($this->con->error);
			if ($result->num_rows > 0) {
				return "DEPENDENT_CATEGORY";
			}else{
				$pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
				$pre_stmt->bind_param("i",$id);
				$result = $pre_stmt->execute() or die($this->con->error);
				if ($result) {
					return "CATEGORY_DELETED";
				}
			}
		}
		else{
			$pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
			$pre_stmt->bind_param("i",$id);
			$result = $pre_stmt->execute() or die($this->con->error);
				if ($result) {
					return "DELETED";
			}
		}
	}

	//Update Record

	public function getSingleRecord( $table, $pk, $id)
	{
		$pre_stmt= $this->con->prepare("SELECT * FROM ".$table. " where ".$pk."=? LIMIT 1");
		$pre_stmt->bind_param("i",$id);
		$pre_stmt->execute()or die($this->con->error);
		$result= $pre_stmt->get_result();
		if ($result->num_rows ==1 )
	    {
	    	$row= $result->fetch_assoc();
			# code...
		}
		return $row;

	}

//Update by CRUD function 	

public function update_record($table,$where,$fields)
{
	$sql = "";
	$condition = "";
	foreach ($where as $key => $value) 
		{
		// id = '5' AND m_name = 'something'
		$condition .= $key . "='" . $value . "' AND ";
		}
	$condition = substr($condition, 0, -5);
	foreach ($fields as $key => $value) 
		{
		//UPDATE table SET m_name = '' , qty = '' WHERE id = '';
		$sql .= $key . "='".$value."', ";
		}
	$sql = substr($sql, 0,-2);
	$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
	if(mysqli_query($this->con,$sql)){
	return "UPDATED";
	}
	else
	{
		return "Can't Updated ! It Seems That Your Updated Data May Duplicate or Something Enter Worng";
	}
}

}

//$obj=new Manage();
//echo "<pre>";
//print_r($obj->manageRecordwithpagination("categories",1));

//echo $obj->deleteRecord("categories","cid", 37);
//echo $obj->deleteRecord("categories","cid",14);
//print_r($obj->getSingleRecord("categories","cid",1) );
//echo $obj->update_record("categories", ["cid"=>1], ["parent_cat"=>0 , "category_name"=>"Electro" ,"status"=>1]);
?>