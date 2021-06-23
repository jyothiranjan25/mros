<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 

$emp_id=$_GET['emp_id'];

if (isset($_POST['insert'])) 
{
	$dept = $_SESSION['dep'];
	$candidate_entity = $_SESSION['entity'];
	$status = 1;
	$number = count($_POST["id"]);
	$date = date("Y-m-d");
	$w=0;
	if($number > 0)
	{
		for($i=0; $i<$number; $i++)
		{
			if(trim($_POST["id"][$i] != ''))
			{

				$sql = "UPDATE `assets` SET `asset_id` ='".mysqli_real_escape_string($con, $_POST["id"][$i])."',`assigned_date`= '".$date."',`status`= '".$status."' WHERE `emp_id`= '".$emp_id."' AND `dept`= '".$dept."' AND `entity`= '".$candidate_entity."' AND `asset_name`= '".mysqli_real_escape_string($con, $_POST["name"][$i])."'";
	            mysqli_query($con, $sql);
	            if ($sql)
	            {
	            	$w++;
	            }
	  
				
			}
		}
		if ($w>0) 
		{
			echo "<script>window.location.href='newEMPassets.php';</script>";
		}
		else
		{
			echo "<script>alert('No data was entered.');window.location.href='assign_assets.php?emp_id=".$emp_id."';</script>";
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
