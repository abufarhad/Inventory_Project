<?php


class Database
{
	private $con;
	public function connect()
	{
		include_once("constants.php");
		$this->con =new Mysqli(HOST,USER,PASS,DB);
		if ($this->con) 
		{
			 //echo "-----------------OK Connection Done !! ---------------------";
			return $this->con;
			
		}
		else
			return "DATABASE_CONNECTION_FALT";
		
	}
}

$db =new Database();
$db->connect();


?>