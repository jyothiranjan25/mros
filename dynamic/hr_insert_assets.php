<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 

$emp_id=$_GET['emp_id'];
$employee_entity = $_GET['employee_entity'];

if (isset($_POST['insert'])) 
{
	$status = 0;
	$number = count($_POST["name"]);
	$date = date("Y-m-d");
	if($number > 0)
	{
		for($i=0; $i<$number; $i++)
		{
			if(trim($_POST["name"][$i] != ''))
			{
				$sql = "INSERT INTO `assets` (emp_id, asset_name, dept, entity, request_date, status) VALUES ('$emp_id','".mysqli_real_escape_string($con, $_POST["name"][$i])."','".mysqli_real_escape_string($con, $_POST["department"][$i])."','$employee_entity','$date','$status')";
	            mysqli_query($con, $sql);
	       
				if ($sql) {
						 echo "<script>window.location.href='index.php';</script>";	
						//echo "successful";
									# code...
						
				}
			}
		}
		
		
	}
	else
	{
		echo "Please try Again";
	}
}
elseif (isset($_POST['update'])) 
{
	$number = count($_POST["name"]);
	$date = date("Y-m-d");
	if($number > 0)
	{
		for($i=0; $i<$number; $i++)
		{
			if(trim($_POST["name"][$i] != ''))
			{
				$sql = "UPDATE `assets` SET `asset_name`='".mysqli_real_escape_string($con, $_POST["name"][$i])."',`asset_id`='".mysqli_real_escape_string($con, $_POST["id"][$i])."', `assigned_date`='$date' WHERE `emp_id`='$emp_id' AND `dept`='$dep'";
	            mysqli_query($con, $sql);
	   
				if ($sql) {
						echo "<script>window.location.href='newEMPassets.php';</script>";				# code...
				}
			}
		}
		
	}
	else
	{
		echo "<script>alert('No data to update.');</script>";
	}
}
