<?php

  /**
  * User account creation and login porpose 
  */
//session_start();

class User
{
  	private $con;
  	function __construct( )
  	{
  		include_once("../database/db.php");
  		$db=new Database();
  		$this->con=$db->connect();
  		//if($this->con)  {echo "Connected";}
  	}
  


	  // to check user is already register or not 
	  private function emailexist ($email)
	  {

	  	$pre_stmt = $this->con->prepare("SELECT id FROM user WHERE email = ? ");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();

	  	if($result ->num_rows >0)  { return 1;}
	  	else { return 0;} 

	  }


	  public function creatuseraccount($username, $email, $password,$usertype )
	  {
	  	// To protect your Application from sql attack you can user prepares statment

	  	if($this->emailexist($email))
	  	{
	  		//echo  emailexist($email);

	  		return "EMAIL_ALREADY_EXISTS";
	  	}
	  	else
	  	{
	  		$pass_hash=password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
	  		$date=date("Y-m-d");
	  		$notes="";

		  	$pre_stmt=$this->con->prepare("INSERT INTO `user`( `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?) ");
		  	$pre_stmt->bind_param("sssssss", $username,$email,$pass_hash,$usertype,$date,$date,$notes);

		  	$result=$pre_stmt->execute() or die($this->con->error);
		  


		  	if($result )
		  	{
		  		return $this->con->insert_id;
		  	}
		  	else
		  	{
		  		return "SOME_ERROR";
		  	}

	    }
	  }

	  // ------------------------User login-------------------------

	 public function userlogin($email, $password)
	 {
	 	$pre_stmt = $this->con->prepare("SELECT id,username,password,last_login FROM user WHERE email = ?");
	 	

	 	$pre_stmt->bind_param("s",$email);
	 	$pre_stmt->execute() or die($this->con->error);
	 	$result=$pre_stmt->get_result();

	 	if($result->num_rows <1)
	 	{
	 		return "NOT_REGISTERD";
	 	}
	 	else
	 	{


	 		$row=$result->fetch_assoc();
	 		if (password_verify($password,$row["password"]))
	 		 {
	 			$_SESSOIN["userid"]= $row["id"];
	 			$_SESSOIN["username"]=$row["username"];
	 			$_SESSOIN["last_login"]= $row["last_login"];
	 			

	 			// Here we are updating last login time whenhe is performing 
	 			$last_login=date("Y-m-d h:m:s");

	 			$pre_stmt=$this->con->prepare("UPDATE user SET last_login=? WHERE email=?");
	 			$pre_stmt->bind_param("ss",$last_login, $email);

	 			$result=$pre_stmt->execute() or die($this->con->error);


	 			if ($result) 
	 			{
	 				return 1;
	 			}
	 			else
	 			{
	 				return 0;
	 			}

	 		}
	 		else
	 		{
	 			return "PASSWORD_NOT_MATCHED";
	 		}

	 	}

	 }

}
//$user=new User();

//echo $user->creatuseraccount("Test","reng1@gmail.com","1234567890","Admin");

//echo $user->userlogin("reng1@gmail.com","1234567890");

//echo $_SESSION["username"];

?>