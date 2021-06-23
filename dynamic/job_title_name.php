<?php
session_start(); 
include('../includes/dbconnection.php');

$number = count($_POST["name"]);
$type=$_GET['type'];
if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{

			$pos_type_name=mysqli_real_escape_string($con, $_POST["name"][$i]);
			$sql = "INSERT INTO `position`(type,name) VALUES('$type','$pos_type_name')";
            mysqli_query($con, $sql);
            $entity_sql = "SELECT * from `entity`";
            $entity_result=mysqli_query($con, $entity_sql);
           
            while ($row=mysqli_fetch_array($entity_result))
            {
                    $entity=$row['entity_name'];
                    $table=strtolower($entity." headcount");
                   // echo $table;
                    for($j=1;$j<13;$j++)
                    {
                        $value=0;
                        $insert_sql = "INSERT INTO `$table`(`position`,`month`,`hc`) VALUES('$pos_type_name','$j','$value')";
                        mysqli_query($con, $insert_sql);
                    }
            }
           
		
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please try Again";
}