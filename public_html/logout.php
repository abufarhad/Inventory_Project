<?php
include_once("./database/constants.php");

include_once(" ./session_write.php");
session_destroy();

session_destroy();
header("location:".DOMAIN."/index.php");

?>