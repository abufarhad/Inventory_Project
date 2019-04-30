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
function pagination($con, $table, $pno, $n)
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

}

//$obj=new Manage();
//echo "<pre>";
//print_r($obj->manageRecordwithpagination("categories",1));

?>