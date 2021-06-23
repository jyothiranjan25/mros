<?php
include('../includes/dbconnection.php');
session_start(); 
$name=$_GET['name'];
$entity=$_SESSION['entity'];

$query = "Select * from `asset_report` Where name='$name'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        if(!$row['asset_id'])
        {
            echo "<option value='".$row['asset']."'>".$row['asset']."</option>";
        }
     
    }
}
else
{
    echo "<option value=0>First Select Position Type</option>";
}

?>