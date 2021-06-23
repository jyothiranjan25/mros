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
			$pos_type_name=mysqli_real_escape_string($con, $_POST["name"][$i]);
			$sql = "INSERT INTO `position_type`(name) VALUES('$pos_type_name')";
			mysqli_query($con, $sql);

		
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please try Again";
}