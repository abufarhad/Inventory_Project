<?php
session_start();

if (isset($_GET["userid"])) 
	{
		$_SESSION["userid"] = $_GET["userid"];
		//echo "string";

		header("Location:dashboard.php");

	}
?>