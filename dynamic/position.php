<?php
include('../includes/dbconnection.php');
session_start(); 
$type=$_GET['type'];
$entity=$_SESSION['entity'];

$query = "Select Distinct name from `position` Where type='$type'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
}
else
{
    echo "<option value=0>First Select Position Type</option>";
}

?>