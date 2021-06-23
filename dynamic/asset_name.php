<?php
include('../includes/dbconnection.php');
session_start(); 



$number = count($_POST["name"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$sql = "INSERT INTO `asset`(name) VALUES('".mysqli_real_escape_string($con, $_POST["name"][$i])."')";
            mysqli_query($con, $sql);
            $altersql = "ALTER TABLE `position` ADD `".mysqli_real_escape_string($con, $_POST["name"][$i])."` INT(2) NOT NULL ";
			mysqli_query($con, $altersql);
		
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please try Again";
}