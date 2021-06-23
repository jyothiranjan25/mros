<<<<<<< HEAD
<?php
include('../includes/dbconnection.php');
session_start(); 


$def_amt="0";
$number = count($_POST["name"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$sql = "INSERT INTO `currency_control`(name) VALUES('".mysqli_real_escape_string($con, $_POST["name"][$i])."')";
			mysqli_query($con, $sql);
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please try Again";
=======
<?php
include('../includes/dbconnection.php');
session_start(); 


$def_amt="0";
$number = count($_POST["name"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$sql = "INSERT INTO `currency_control`(name) VALUES('".mysqli_real_escape_string($con, $_POST["name"][$i])."')";
			mysqli_query($con, $sql);
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please try Again";
>>>>>>> 1772b5611b8ac2816d1cfb95e1594b57bf05d90e
}